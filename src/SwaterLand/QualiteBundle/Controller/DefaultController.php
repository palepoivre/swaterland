<?php

namespace SwaterLand\QualiteBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('SwaterLandQualiteBundle:Default:index.html.twig', array('name' => $name));
    }
}
