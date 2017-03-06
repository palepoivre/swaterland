<?php

namespace SwaterLand\EpisodeBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use SwaterLand\EpisodeBundle\Entity\Episode;
use SwaterLand\EpisodeBundle\Form\EpisodeType;

/**
 * Episode controller.
 *
 * @Route("/episode")
 */
class EpisodeController extends Controller
{

    /**
     * Lists all Episode entities.
     *
     * @Route("/", name="episode")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('SwaterLandEpisodeBundle:Episode')->findAll();

        return array(
            'entities' => $entities,
        );
    }
    /**
     * Creates a new Episode entity.
     *
     * @Route("/", name="episode_create")
     * @Method("POST")
     * @Template("SwaterLandEpisodeBundle:Episode:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity = new Episode();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('swater_land_episode_show', array('id' => $entity->getId())));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Creates a form to create a Episode entity.
     *
     * @param Episode $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(Episode $entity)
    {
        $form = $this->createForm(new EpisodeType(), $entity, array(
            'action' => $this->generateUrl('swater_land_episode_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new Episode entity.
     *
     * @Route("/new", name="episode_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        $entity = new Episode();
        $form   = $this->createCreateForm($entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Finds and displays a Episode entity.
     *
     * @Route("/{id}", name="episode_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('SwaterLandEpisodeBundle:Episode')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Episode entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to edit an existing Episode entity.
     *
     * @Route("/{id}/edit", name="episode_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('SwaterLandEpisodeBundle:Episode')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Episode entity.');
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
    * Creates a form to edit a Episode entity.
    *
    * @param Episode $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Episode $entity)
    {
        $form = $this->createForm(new EpisodeType(), $entity, array(
            'action' => $this->generateUrl('swater_land_episode_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing Episode entity.
     *
     * @Route("/{id}", name="episode_update")
     * @Method("PUT")
     * @Template("SwaterLandEpisodeBundle:Episode:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('SwaterLandEpisodeBundle:Episode')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Episode entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('swater_land_episode_edit', array('id' => $id)));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }
    /**
     * Deletes a Episode entity.
     *
     * @Route("/{id}", name="episode_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('SwaterLandEpisodeBundle:Episode')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Episode entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('swater_land_episode'));
    }

    /**
     * Creates a form to delete a Episode entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('swater_land_episode_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
