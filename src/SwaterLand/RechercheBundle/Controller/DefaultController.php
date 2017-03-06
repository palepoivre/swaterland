<?php

namespace SwaterLand\RechercheBundle\Controller;

use SwaterLand\ActeurBundle\SwaterLandActeurBundle;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('SwaterLandRechercheBundle:Default:index.html.twig');
    }

    public function searchAction()
    {
        $request = $this->getRequest();
        $data = $request->request->get('search');

        if(strlen($data) >2) {
            $em = $this->getDoctrine()->getManager();
            $queryb = $em->createQuery(
                'SELECT b FROM SwaterLandFilmBundle:Bluray b
            WHERE b.nom LIKE :data')
                ->setParameter('data', '%' . $data . '%');

            $reb = $queryb->getResult();

            $em = $this->getDoctrine()->getManager();
            $queryd = $em->createQuery(
                'SELECT d FROM SwaterLandFilmBundle:Dvdrip d
            WHERE d.nom LIKE :data')
                ->setParameter('data', '%' . $data . '%');

            $red = $queryd->getResult();

            $em = $this->getDoctrine()->getManager();
            $querys = $em->createQuery(
                'SELECT s FROM SwaterLandSerieBundle:Serie s
            WHERE s.nom LIKE :data')
                ->setParameter('data', '%' . $data . '%');

            $res = $querys->getResult();

            $em = $this->getDoctrine()->getEntityManager();
            $query = $em->createQueryBuilder()
                ->select('b')
                ->from('SwaterLandFilmBundle:Bluray', 'b')
                ->join('b.acteurs', 'ba')
                ->where('ba.acteur LIKE :data')
                ->setParameter('data', '%' . $data . '%');
            // Enfin, on retourne le résultat.

            $qb = $query->getQuery();
            $reab = $qb->getResult();

            $em = $this->getDoctrine()->getEntityManager();
            $query = $em->createQueryBuilder()
                ->select('d')
                ->from('SwaterLandFilmBundle:Dvdrip', 'd')
                ->join('d.acteurs', 'da')
                ->where('da.acteur LIKE :data')
                ->setParameter('data', '%' . $data . '%');
            // Enfin, on retourne le résultat.

            $qb = $query->getQuery();
            $read = $qb->getResult();

            $em = $this->getDoctrine()->getEntityManager();
            $query = $em->createQueryBuilder()
                ->select('s')
                ->from('SwaterLandSerieBundle:Serie', 's')
                ->join('s.acteurs', 'sa')
                ->where('sa.acteur LIKE :data')
                ->setParameter('data', '%' . $data . '%');
            // Enfin, on retourne le résultat.

            $qb = $query->getQuery();
            $reas = $qb->getResult();

            return $this->render('SwaterLandRechercheBundle:Default:reponse.html.twig', array(
                'res' => $res, 'red' => $red, 'reb' => $reb, 'reab' => $reab, 'read' => $read, 'reas' => $reas));
    }else{
            return $this->render('SwaterLandRechercheBundle:Default:reponse.html.twig');
    }

    }
    public function searchgenreAction()
    {
        $request = $this->getRequest();
        $data = $request->request->get('search');

        $qb = $this
        ->createQueryBuilder('b')

        ->leftJoin('b.genres', 'g')

        ->addSelect('g');


        $reb = $qb->getResult();



        return $this->render('SwaterLandRechercheBundle:Default:reponsegenre.html.twig', array(
            'reb' => $reb ));

    }
}
