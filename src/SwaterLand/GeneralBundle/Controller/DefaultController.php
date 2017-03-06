<?php

namespace SwaterLand\GeneralBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        $em = $this->container->get('doctrine')->getEntityManager();

        $blurays = $em->createQueryBuilder();
        $blurays->select('b')
                ->from('SwaterLandFilmBundle:Bluray','b')
                ->orderBy('b.id','DESC')
                ->setMaxResults(12);

        $query = $blurays->getQuery();
        $blurays = $query->getResult();


        $em = $this->container->get('doctrine')->getEntityManager();

        $dvdrips = $em->createQueryBuilder();
        $dvdrips->select('d')
            ->from('SwaterLandFilmBundle:Dvdrip','d')
            ->orderBy('d.id','DESC')
            ->setMaxResults(20);

        $query = $dvdrips->getQuery();
        $dvdrips = $query->getResult();


        $em = $this->container->get('doctrine')->getEntityManager();

        $series = $em->createQueryBuilder();
        $series->select('s')
            ->from('SwaterLandSerieBundle:Serie','s')
            ->orderBy('s.id','DESC')
            ->setMaxResults(20);

        $query = $series->getQuery();
        $series = $query->getResult();

        $em = $this->container->get('doctrine')->getEntityManager();

        $exclus = $em->createQueryBuilder();
        $exclus->select('e')
            ->from('SwaterLandFilmBundle:Bluray','e')
            ->where('e.exclu = 1')
            ->orderBy('e.id','DESC')
            ->setMaxResults(5);

        $query = $exclus->getQuery();
        $exclus = $query->getResult();

        return $this->render("SwaterLandGeneralBundle:Default:index.html.twig",array('blurays'=>$blurays, 'dvdrips'=>$dvdrips, 'series'=>$series,'exclus'=>$exclus));
    }
}
