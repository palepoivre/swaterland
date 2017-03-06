<?php

namespace SwaterLand\RealisateurBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('SwaterLandRealisateurBundle:Default:index.html.twig', array('name' => $name));
    }
}
