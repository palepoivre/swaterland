<?php

namespace SwaterLand\FilmBundle\Controller;

use SwaterLand\FilmBundle\Entity\Dvdrip;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use SwaterLand\FilmBundle\Form\DvdripType;

/**
 * Dvdrip controller.
 *
 * @Route("/dvdrip")
 */
class DvdripController extends Controller
{

    /**
     * Lists all Bluray entities.
     *
     * @Route("/", name="dvdrip")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('SwaterLandFilmBundle:Dvdrip')->findAll();

        return array(
            'entities' => $entities,
        );
    }
    /**
     * Creates a new Dvdrip entity.
     *
     * @Route("/", name="dvdrip_create")
     * @Method("POST")
     * @Template("SwaterLandFilmBundle:Dvdrip:new.html.twig")
     */
    public function createAction(Request $request)
    {

        $entity = new Dvdrip();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->upload();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('swater_land_dvdrip_show', array('id' => $entity->getId())));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Creates a form to create a Dvdrip entity.
     *
     * @param Dvdrip $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(Dvdrip $entity)
    {
        $form = $this->createForm(new DvdripType(), $entity, array(
            'action' => $this->generateUrl('swater_land_dvdrip_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new Dvdrip entity.
     *
     * @Route("/new", name="dvdrip_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        $entity = new Dvdrip();
        $form   = $this->createCreateForm($entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Finds and displays a Dvdrip entity.
     *
     * @Route("/{id}", name="dvdrip_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('SwaterLandFilmBundle:Dvdrip')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Dvdrip entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to edit an existing Dvdrip entity.
     *
     * @Route("/{id}/edit", name="dvdrip_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('SwaterLandFilmBundle:Dvdrip')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Dvdrip entity.');
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
    * Creates a form to edit a Dvdrip entity.
    *
    * @param Dvdrip $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Dvdrip $entity)
    {
        $form = $this->createForm(new DvdripType(), $entity, array(
            'action' => $this->generateUrl('swater_land_dvdrip_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing Dvdrip entity.
     *
     * @Route("/{id}", name="dvdrip_update")
     * @Method("PUT")
     * @Template("SwaterLandDvdripBundle:Dvdrip:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('SwaterLandFilmBundle:Dvdrip')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Dvdrip entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('swater_land_dvdrip_update', array('id' => $id)));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }
    /**
     * Deletes a Dvdrip entity.
     *
     * @Route("/{id}", name="dvdrip_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('SwaterLandFilmBundle:Dvdrip')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Dvdrip entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('swater_land_dvdrip_homepage'));
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
            ->setAction($this->generateUrl('swater_land_dvdrip_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }

    public function dvdripAction(Request $request)
    {
        $em    = $this->get('doctrine.orm.entity_manager');
        $dql   = "SELECT d FROM SwaterLandFilmBundle:Dvdrip d";
        $query = $em->createQuery($dql);

        $paginator  = $this->get('knp_paginator');
        $dvdrips = $paginator->paginate(
            $query, /* query NOT result */
            $request->query->getInt('page', 1)/*page number*/,
            25/*limit per page*/
        );

        return $this->render("SwaterLandFilmBundle:Dvdrip:dvdrip.html.twig",array('dvdrips'=>$dvdrips));
    }

    public function vuedvdripAction($id, $dvdrip)
    {

        // On récupère le id

        $em = $this->container->get('doctrine')->getEntityManager();

        $dvdrips = $em->getRepository('SwaterLandFilmBundle:Dvdrip')->findBy(array('id'=>$id,'nom'=>$dvdrip));

        $memegenres = $em->createQueryBuilder();
        $memegenres->select('mg')
            ->from('SwaterLandFilmBundle:Dvdrip','mg')
        ;

        $query = $memegenres->getQuery();
        $memegenres = $query->getResult();

        $em = $this->container->get('doctrine')->getEntityManager();

        $commentaires = $em->getRepository('SwaterLandCommentaireBundle:Commentaire')->findAll();

        return $this->render("SwaterLandFilmBundle:Dvdrip:vuedvdrip.html.twig",array('dvdrips'=>$dvdrips,'memegenres'=>$memegenres,'commentaires'=>$commentaires));
    }

}
