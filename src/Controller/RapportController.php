<?php

namespace App\Controller;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
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
    var_dump($req["RAP_OFF"]);
    $offs = $this->getDoctrine()
    ->getRepository(Offre::class)->findById($req["RAP_OFF"]);
    $rapport->setRAPNUM($req["RAP_NUM"]);
    $rapport->setRAPDATE(
      \DateTime::createFromFormat("d/m/Y",$req["RAP_DATE"])
    );
    $rapport->setRAPBILAN($req["RAP_BILAN"]);
    $rapport->setRAPMOTIF($req["RAP_MOTIF"]);
    $rapport->setVisiteur($vis);
    $rapport->setPraticien($pra);
    $rapport->addOffres($offs);
    $entityManager = $this->getDoctrine()->getManager();
    $entityManager->persist($rapport);
    $entityManager->flush();
    return new Response();

  }
  /**
   * @Route("/", name="report_post", methods={"PUT"})
   */
  public function do_put(Request $request) {
    $req = json_decode($request->getContent(), true);
    $rapport = this->getDoctrine()
    ->getRepository(rapportVisite::class)->findOneById($req["id"]);
    $vis = $this->getDoctrine()
    ->getRepository(visiteur::class)->findOneById($req["RAP_VIS"]);
    $pra = $this->getDoctrine()
    ->getRepository(praticien::class)->findOneById($req["RAP_PRA"]);
    var_dump($req["RAP_OFF"]);
    $offs = $this->getDoctrine()
    ->getRepository(Offre::class)->findById($req["RAP_OFF"]);
    $rapport->setRAPNUM($req["RAP_NUM"]);
    $rapport->setRAPDATE(
      \DateTime::createFromFormat("d/m/Y",$req["RAP_DATE"])
    );
    $rapport->setRAPBILAN($req["RAP_BILAN"]);
    $rapport->setRAPMOTIF($req["RAP_MOTIF"]);
    $rapport->setVisiteur($vis);
    $rapport->setPraticien($pra);
    $rapport->addOffres($offs);
    $entityManager = $this->getDoctrine()->getManager();
    $entityManager->persist($rapport);
    $entityManager->flush();
    return new Response();

  }

}
