<?php

namespace SwaterLand\RealisateurBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use SwaterLand\RealisateurBundle\Entity\Realisateur;
use SwaterLand\RealisateurBundle\Form\RealisateurType;

/**
 * Realisateur controller.
 *
 */
class RealisateurController extends Controller
{

    /**
     * Lists all Realisateur entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('SwaterLandRealisateurBundle:Realisateur')->findAll();

        return $this->render('SwaterLandRealisateurBundle:Realisateur:index.html.twig', array(
            'entities' => $entities,
        ));
    }
    /**
     * Creates a new Realisateur entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity = new Realisateur();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('realisateur_show', array('id' => $entity->getId())));
        }

        return $this->render('SwaterLandRealisateurBundle:Realisateur:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Creates a form to create a Realisateur entity.
     *
     * @param Realisateur $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(Realisateur $entity)
    {
        $form = $this->createForm(new RealisateurType(), $entity, array(
            'action' => $this->generateUrl('realisateur_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new Realisateur entity.
     *
     */
    public function newAction()
    {
        $entity = new Realisateur();
        $form   = $this->createCreateForm($entity);

        return $this->render('SwaterLandRealisateurBundle:Realisateur:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Realisateur entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('SwaterLandRealisateurBundle:Realisateur')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Realisateur entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('SwaterLandRealisateurBundle:Realisateur:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Realisateur entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('SwaterLandRealisateurBundle:Realisateur')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Realisateur entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('SwaterLandRealisateurBundle:Realisateur:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
    * Creates a form to edit a Realisateur entity.
    *
    * @param Realisateur $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Realisateur $entity)
    {
        $form = $this->createForm(new RealisateurType(), $entity, array(
            'action' => $this->generateUrl('realisateur_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing Realisateur entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('SwaterLandRealisateurBundle:Realisateur')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Realisateur entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('realisateur_edit', array('id' => $id)));
        }

        return $this->render('SwaterLandRealisateurBundle:Realisateur:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a Realisateur entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('SwaterLandRealisateurBundle:Realisateur')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Realisateur entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('realisateur'));
    }

    /**
     * Creates a form to delete a Realisateur entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('realisateur_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
