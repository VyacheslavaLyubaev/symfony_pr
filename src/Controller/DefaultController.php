<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DefaultController extends AbstractController
{
    /**
     * @Route("/", name="homepage")
     *
     *
     */
    public function indexAction(): Response
    {
        return $this->render('base.html.twig', [
            'name' => 'я тебя люблю'
        ]);
    }
}
