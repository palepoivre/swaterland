<?php

namespace SwaterLand\ActeurBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('SwaterLandActeurBundle:Default:index.html.twig', array('name' => $name));
    }
}
