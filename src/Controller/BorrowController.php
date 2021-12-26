<?php

namespace App\Controller;

use App\Entity\User;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class BorrowController extends AbstractController
{
    /**
     * @Route("/borrow", name="borrow")
     */
    public function index(): Response
    {
        return $this->render('borrow/index.html.twig', [
            'controller_name' => 'BorrowController',
        ]);
    }

    /**
     * @Route ("/", name="home")
    */
    public function home() {
        return $this->render('borrow/home.html.twig', [
            "user" => $this->getDoctrine()->getRepository(User::class)->findOneByUsername("MrLambda")
        ]);
    }
}
