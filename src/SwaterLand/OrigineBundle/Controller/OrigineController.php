<?php

namespace SwaterLand\OrigineBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use SwaterLand\OrigineBundle\Entity\Origine;
use SwaterLand\OrigineBundle\Form\OrigineType;

/**
 * Origine controller.
 *
 */
class OrigineController extends Controller
{

    /**
     * Lists all Origine entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('SwaterLandOrigineBundle:Origine')->findAll();

        return $this->render('SwaterLandOrigineBundle:Origine:index.html.twig', array(
            'entities' => $entities,
        ));
    }
    /**
     * Creates a new Origine entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity = new Origine();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('origine_show', array('id' => $entity->getId())));
        }

        return $this->render('SwaterLandOrigineBundle:Origine:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Creates a form to create a Origine entity.
     *
     * @param Origine $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(Origine $entity)
    {
        $form = $this->createForm(new OrigineType(), $entity, array(
            'action' => $this->generateUrl('origine_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new Origine entity.
     *
     */
    public function newAction()
    {
        $entity = new Origine();
        $form   = $this->createCreateForm($entity);

        return $this->render('SwaterLandOrigineBundle:Origine:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Origine entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('SwaterLandOrigineBundle:Origine')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Origine entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('SwaterLandOrigineBundle:Origine:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Origine entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('SwaterLandOrigineBundle:Origine')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Origine entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('SwaterLandOrigineBundle:Origine:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
    * Creates a form to edit a Origine entity.
    *
    * @param Origine $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Origine $entity)
    {
        $form = $this->createForm(new OrigineType(), $entity, array(
            'action' => $this->generateUrl('origine_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing Origine entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('SwaterLandOrigineBundle:Origine')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Origine entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('origine_edit', array('id' => $id)));
        }

        return $this->render('SwaterLandOrigineBundle:Origine:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a Origine entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('SwaterLandOrigineBundle:Origine')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Origine entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('origine'));
    }

    /**
     * Creates a form to delete a Origine entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('origine_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
