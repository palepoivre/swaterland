<?php

namespace SwaterLand\SerieBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use SwaterLand\SerieBundle\Entity\Serie;
use SwaterLand\SerieBundle\Form\SerieType;

/**
 * Serie controller.
 *
 * @Route("/serie")
 */
class SerieController extends Controller
{

    /**
     * Lists all Serie entities.
     *
     * @Route("/", name="serie")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('SwaterLandSerieBundle:Serie')->findAll();

        return array(
            'entities' => $entities,
        );
    }
    /**
     * Creates a new Serie entity.
     *
     * @Route("/", name="serie_create")
     * @Method("POST")
     * @Template("SwaterLandSerieBundle:Serie:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity = new Serie();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->upload();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('swater_land_serie_show', array('id' => $entity->getId())));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Creates a form to create a Serie entity.
     *
     * @param Serie $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(Serie $entity)
    {
        $form = $this->createForm(new SerieType(), $entity, array(
            'action' => $this->generateUrl('swater_land_serie_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new Serie entity.
     *
     * @Route("/new", name="serie_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        $entity = new Serie();
        $form   = $this->createCreateForm($entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Finds and displays a Serie entity.
     *
     * @Route("/{id}", name="serie_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('SwaterLandSerieBundle:Serie')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Serie entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to edit an existing Serie entity.
     *
     * @Route("/{id}/edit", name="serie_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('SwaterLandSerieBundle:Serie')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Serie entity.');
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
    * Creates a form to edit a Serie entity.
    *
    * @param Serie $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Serie $entity)
    {
        $form = $this->createForm(new SerieType(), $entity, array(
            'action' => $this->generateUrl('swater_land_serie_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing Serie entity.
     *
     * @Route("/{id}", name="serie_update")
     * @Method("PUT")
     * @Template("SwaterLandSerieBundle:Serie:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('SwaterLandSerieBundle:Serie')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Serie entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('swater_land_serie_edit', array('id' => $id)));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }
    /**
     * Deletes a Serie entity.
     *
     * @Route("/{id}", name="serie_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('SwaterLandSerieBundle:Serie')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Serie entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('swater_land_serie_homepage'));
    }

    /**
     * Creates a form to delete a Serie entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('swater_land_serie_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }

    public function serieAction(Request $request)
    {
        $em    = $this->get('doctrine.orm.entity_manager');
        $dql   = "SELECT s FROM SwaterLandSerieBundle:Serie s";
        $query = $em->createQuery($dql);

        $paginator  = $this->get('knp_paginator');
        $series = $paginator->paginate(
            $query, /* query NOT result */
            $request->query->getInt('page', 1)/*page number*/,
            25/*limit per page*/
        );

        return $this->render("SwaterLandSerieBundle:Serie:serie.html.twig",array('series'=>$series));
    }

    public function vueserieAction($serie)
    {

        // On récupère le id

        $em = $this->container->get('doctrine')->getEntityManager();

        $series = $em->getRepository('SwaterLandSerieBundle:Serie')->findBy(array('nomannonce'=>$serie));

        $em = $this->container->get('doctrine')->getEntityManager();

        $episodes = $em->getRepository('SwaterLandEpisodeBundle:Episode')->findAll();

        $em = $this->container->get('doctrine')->getEntityManager();

        $commentaires = $em->getRepository('SwaterLandCommentaireBundle:Commentaire')->findAll();

        $em = $this->container->get('doctrine')->getEntityManager();

        $autreseries = $em->createQueryBuilder();
        $autreseries->select('st')
            ->from('SwaterLandSerieBundle:Serie','st');

        $query = $autreseries->getQuery();
        $autreseries = $query->getResult();

        return $this->render("SwaterLandSerieBundle:Serie:vueserie.html.twig",array('autreseries'=>$autreseries, 'series'=>$series, 'episodes'=>$episodes, 'commentaires'=>$commentaires));

    }
}
