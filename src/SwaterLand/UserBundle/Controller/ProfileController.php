<?php

namespace SwaterLand\UserBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class ProfileController extends Controller
{
    public function showAction()
    {
        $em = $this->container->get('doctrine')->getEntityManager();

        $commentaires = $em->getRepository('SwaterLandCommentaireBundle:Commentaire')->findAll();

        return $this->render('SwaterLandUserBundle:Profile:show.html.twig',array('commentaires'=>$commentaires));
    }
    public function loginAction()
    {
        return $this->render('SwaterLandUserBundle::layout.html.twig');
    }
    public function registerAction()
    {
        return $this->render('SwaterLandUserBundle:Registration:register_content.html.twig');
    }
    public function resetAction()
    {
        return $this->render('SwaterLandUserBundle:Resetting:reset_content.html.twig');
    }
}