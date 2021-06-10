<?php

namespace App\Controller;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use App\Entity\praticien;
/**
 * @Route("/departements")
 */
class DepartementController extends AbstractController {

  /**
   * @Route("/", name="deps")
   */
  public function deps() : Response {
      return new JsonResponse($this->getDoctrine()
      ->getRepository(praticien::class)->getDeps());

  }
}
