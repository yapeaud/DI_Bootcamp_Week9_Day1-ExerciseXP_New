<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;

class GreetingController extends AbstractController
{
    public function greeting(): Response
    {
        return $this->render('greeting/index.html.twig');
    }
}
