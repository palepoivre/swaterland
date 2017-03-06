<?php

namespace SwaterLand\GenreBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('SwaterLandGenreBundle:Default:index.html.twig');
    }
}
