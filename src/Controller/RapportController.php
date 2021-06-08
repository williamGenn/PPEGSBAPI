<?php

namespace App\Controller;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Exception\BadRequestHttpException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use App\Entity\rapportVisite;
use App\Entity\visiteur;
use App\Entity\praticien;
use App\Entity\Offre;
/**
 * @Route("/report")
 */
class RapportController extends AbstractController {

  /**
   * @Route("/", name="report_post", methods={"POST"})
   */
  public function do_post(Request $request) {
    $rapport = new rapportVisite();
    $req = json_decode($request->getContent(), true);
    $vis = $this->getDoctrine()
    ->getRepository(visiteur::class)->findOneById($req["RAP_VIS"]);
    $pra = $this->getDoctrine()
    ->getRepository(praticien::class)->findOneById($req["RAP_PRA"]);
    $offs = $this->getDoctrine()->getRepository(Offre::class)
    ->findOrCreateSeveral($req["RAP_OFF"], $this->getDoctrine());
    $rapport->setRAPDATE(
      \DateTime::createFromFormat("Y-m-d",$req["RAP_DATE"])
    );
    $rapport->setRAPBILAN($req["RAP_BILAN"]);
    $rapport->setRAPMOTIF($req["RAP_MOTIF"]);
    $rapport->setVisiteur($vis);
    $rapport->setPraticien($pra);
    $rapport->addOffres($offs);
    $entityManager = $this->getDoctrine()->getManager();
    foreach ($rapport->getOffres() as $off) {
      $entityManager->persist($off);
    }
    $entityManager->persist($rapport);
    $entityManager->flush();
    return new JsonResponse(["id" => $rapport->getId()]);

  }
  /**
   * @Route("/", name="report_put", methods={"PUT"})
   */
  public function do_put(Request $request) {
    $req = json_decode($request->getContent(), true);
    if ($req == null) {
      throw new BadRequestHttpException('Bad JSON');
    }
    $rapport = $this->getDoctrine()
    ->getRepository(rapportVisite::class)->findOneById($req["id"]);
    if ($rapport == null) {
      throw $this->createNotFoundException("No report with id ".strval($req["id"]));
    }

    $vis = $this->getDoctrine()
    ->getRepository(visiteur::class)->findOneById($req["RAP_VIS"]);
    $pra = $this->getDoctrine()
    ->getRepository(praticien::class)->findOneById($req["RAP_PRA"]);
    $offs = $this->getDoctrine()->getRepository(Offre::class)
    ->findOrCreateSeveral($req["RAP_OFF"], $this->getDoctrine());
    $rapport->setRAPDATE(
      \DateTime::createFromFormat("Y-m-d",$req["RAP_DATE"])
    );
    $rapport->setRAPBILAN($req["RAP_BILAN"]);
    $rapport->setRAPMOTIF($req["RAP_MOTIF"]);
    $rapport->setVisiteur($vis);
    $rapport->setPraticien($pra);
    $rapport->removeOffres();
    $rapport->addOffres($offs);
    $entityManager = $this->getDoctrine()->getManager();
    $entityManager->persist($rapport);
    foreach ($rapport->getOffres() as $off) {
      $entityManager->persist($off);
    }
    $entityManager->flush();
    return new JsonResponse(["id" => $rapport->getId()]);

  }

}
