<?php

namespace SwaterLand\ActeurBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use SwaterLand\ActeurBundle\Entity\Acteur;
use SwaterLand\ActeurBundle\Form\ActeurType;

/**
 * Acteur controller.
 *
 */
class ActeurController extends Controller
{

    /**
     * Lists all Acteur entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('SwaterLandActeurBundle:Acteur')->findAll();

        return $this->render('SwaterLandActeurBundle:Acteur:index.html.twig', array(
            'entities' => $entities,
        ));
    }
    /**
     * Creates a new Acteur entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity = new Acteur();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('acteur_show', array('id' => $entity->getId())));
        }

        return $this->render('SwaterLandActeurBundle:Acteur:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Creates a form to create a Acteur entity.
     *
     * @param Acteur $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(Acteur $entity)
    {
        $form = $this->createForm(new ActeurType(), $entity, array(
            'action' => $this->generateUrl('acteur_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new Acteur entity.
     *
     */
    public function newAction()
    {
        $entity = new Acteur();
        $form   = $this->createCreateForm($entity);

        return $this->render('SwaterLandActeurBundle:Acteur:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Acteur entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('SwaterLandActeurBundle:Acteur')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Acteur entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('SwaterLandActeurBundle:Acteur:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Acteur entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('SwaterLandActeurBundle:Acteur')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Acteur entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('SwaterLandActeurBundle:Acteur:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
    * Creates a form to edit a Acteur entity.
    *
    * @param Acteur $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Acteur $entity)
    {
        $form = $this->createForm(new ActeurType(), $entity, array(
            'action' => $this->generateUrl('acteur_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing Acteur entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('SwaterLandActeurBundle:Acteur')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Acteur entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('acteur_edit', array('id' => $id)));
        }

        return $this->render('SwaterLandActeurBundle:Acteur:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a Acteur entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('SwaterLandActeurBundle:Acteur')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Acteur entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('acteur'));
    }

    /**
     * Creates a form to delete a Acteur entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('acteur_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
