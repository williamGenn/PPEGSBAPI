<?php

namespace App\Controller;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
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
    $req = $request->request;
    $vis = $this->getDoctrine()
    ->getRepository(visiteur::class)->findOneById($req->get("RAP_VIS"));
    $pra = $this->getDoctrine()
    ->getRepository(praticien::class)->findOneById($req->get("RAP_PRA"));
    $offs = $this->getDoctrine()
    ->getRepository(Offre::class)->findById($req->get("RAP_OFF"));
    $rapport->setRAPNUM($req->get("RAP_NUM"));
    $rapport->setRAPDATE($req->get("RAP_DATE"));
    $rapport->setRAPBILANT($req->get("RAP_BILAN"));
    $rapport->setRAPMOTIF($req->get("RAP_MOTIF"));
    $rapport->setVisiteur($vis);
    $rapport->setPraticien($pra);
    $rapport->addOffres($offs);
    $entityManager = $this->getDoctrine()->getManager();
    $entityManager->persist($rapport);

  }

}
