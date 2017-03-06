<?php

namespace SwaterLand\EpisodeBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('SwaterLandEpisodeBundle:Default:index.html.twig', array('name' => $name));
    }
}
