<?php

namespace SwaterLand\FilmBundle\Controller;

use Doctrine\ORM\Query\ResultSetMappingBuilder;
use SwaterLand\FilmBundle\Form\BlurayType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use SwaterLand\FilmBundle\Entity\Bluray;

/**
 * Bluray controller.
 *
 * @Route("/bluray")
 */
class BlurayController extends Controller
{

    /**
     * Lists all Bluray entities.
     *
     * @Route("/", name="bluray")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('SwaterLandFilmBundle:Bluray')->findAll();

        return $this->render("SwaterLandFilmBundle:Bluray:index.html.twig",array('entities'=>$entities));

    }
    /**
     * Creates a new Bluray entity.
     *

     */
    public function createAction(Request $request)
    {

        $entity = new Bluray();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity->upload();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('swater_land_bluray_show', array('id' => $entity->getId())));
        }

        return
            array(
            'entity' => $entity,
            'form'   => $form->createView(),

        );
    }

    /**
     * Creates a form to create a Film entity.
     *
     * @param Bluray $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(Bluray $entity)
    {
        $form = $this->createForm(new BlurayType(), $entity, array(
            'action' => $this->generateUrl('swater_land_bluray_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new Film entity.
     *
     * @Route("/new", name="bluray_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        $entity = new Bluray();
        $form   = $this->createCreateForm($entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Finds and displays a Bluray entity.
     *
     * @Route("/{id}", name="bluray_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('SwaterLandFilmBundle:Bluray')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Bluray entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to edit an existing Bluray entity.
     *
     * @Route("/{id}/edit", name="bluray_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('SwaterLandFilmBundle:Bluray')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Bluray entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
    * Creates a form to edit a Film entity.
    *
    * @param Bluray $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Bluray $entity)
    {
        $form = $this->createForm(new BlurayType(), $entity, array(
            'action' => $this->generateUrl('swater_land_bluray_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing Bluray entity.
     *
     * @Route("/{id}", name="bluray_update")
     * @Method("PUT")
     * @Template("SwaterLandFilmBundle:Bluray:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('SwaterLandFilmBundle:Bluray')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Bluray entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('swater_land_bluray_update', array('id' => $id)));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }
    /**
     * Deletes a Bluray entity.
     *
     * @Route("/{id}", name="bluray_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('SwaterLandFilmBundle:Bluray')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Bluray entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('swater_land_bluray_homepage'));
    }

    /**
     * Creates a form to delete a Film entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('swater_land_bluray_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }

    public function blurayAction(Request $request)
    {
        $em = $this->getDoctrine()->getEntityManager();
        $dql = "SELECT b FROM SwaterLandFilmBundle:Bluray b";
        $query = $em->createQuery($dql);

        $paginator = $this->get('knp_paginator');
        $blurays = $paginator->paginate(
            $query, /* query NOT result */
            $request->query->getInt('page', 1)/*page number*/,
            25/*limit per page*/
        );

        return $this->render("SwaterLandFilmBundle:Bluray:Bluray.html.twig",array('blurays'=>$blurays));
    }

    public function vueblurayAction($id,$bluray)
    {

        // On récupère l'id

        $em = $this->container->get('doctrine')->getEntityManager();

        $blurays = $em->getRepository('SwaterLandFilmBundle:Bluray')->findBy(array('id'=>$id,'nom'=>$bluray));

        $em = $this->container->get('doctrine')->getEntityManager();

        $commentaires = $em->getRepository('SwaterLandCommentaireBundle:Commentaire')->findAll();

        $memegenres = $em->createQueryBuilder();
        $memegenres->select('mg')
            ->from('SwaterLandFilmBundle:Bluray','mg')
            ->setMaxResults(5);
        ;

        $query = $memegenres->getQuery();
        $memegenres = $query->getResult();

        return $this->render("SwaterLandFilmBundle:Bluray:vuebluray.html.twig",array('memegenres'=>$memegenres, 'blurays'=>$blurays,'commentaires'=>$commentaires));
    }

  /*  private function createIndex($bluray)
    {
        $search = $this->get('ewz_search.lucene');

        $document = new Document();
        $document->addField(Field::Keyword('key', $bluray->getId()));
        $document->addField(Field::UnStored('non', $bluray->getNom()));
        $document->addField(Field::UnStored('image', $bluray->getImage()));
        $document->addField(Field::UnStored('duree', $bluray->getDuree()));
        $document->addField(Field::UnStored('date', $bluray->getDate()));
        $document->addField(Field::UnStored('synopsis', $bluray->getSynopsis()));

        $search->addDocument($document);
        $search->updateIndex();
    }*/
}
