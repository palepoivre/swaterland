<?php

namespace SwaterLand\GenreBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use SwaterLand\GenreBundle\Entity\Genre;
use SwaterLand\GenreBundle\Form\GenreType;

/**
 * Genre controller.
 *
 */
class GenreController extends Controller
{

    /**
     * Lists all Genre entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('SwaterLandGenreBundle:Genre')->findAll();

        return $this->render('SwaterLandGenreBundle:Genre:index.html.twig', array(
            'entities' => $entities,
        ));
    }

    /**
     * Creates a new Genre entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity = new Genre();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('genre_show', array('id' => $entity->getId())));
        }

        return $this->render('SwaterLandGenreBundle:Genre:new.html.twig', array(
            'entity' => $entity,
            'form' => $form->createView(),
        ));
    }

    /**
     * Creates a form to create a Genre entity.
     *
     * @param Genre $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(Genre $entity)
    {
        $form = $this->createForm(new GenreType(), $entity, array(
            'action' => $this->generateUrl('genre_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new Genre entity.
     *
     */
    public function newAction()
    {
        $entity = new Genre();
        $form = $this->createCreateForm($entity);

        return $this->render('SwaterLandGenreBundle:Genre:new.html.twig', array(
            'entity' => $entity,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Genre entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('SwaterLandGenreBundle:Genre')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Genre entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('SwaterLandGenreBundle:Genre:show.html.twig', array(
            'entity' => $entity,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Genre entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('SwaterLandGenreBundle:Genre')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Genre entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('SwaterLandGenreBundle:Genre:edit.html.twig', array(
            'entity' => $entity,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Creates a form to edit a Genre entity.
     *
     * @param Genre $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createEditForm(Genre $entity)
    {
        $form = $this->createForm(new GenreType(), $entity, array(
            'action' => $this->generateUrl('genre_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }

    /**
     * Edits an existing Genre entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('SwaterLandGenreBundle:Genre')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Genre entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('genre_edit', array('id' => $id)));
        }

        return $this->render('SwaterLandGenreBundle:Genre:edit.html.twig', array(
            'entity' => $entity,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a Genre entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('SwaterLandGenreBundle:Genre')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Genre entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('genre'));
    }

    /**
     * Creates a form to delete a Genre entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('genre_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm();
    }

    public function reponsegenreAction($genre)
    {
        $em = $this->getDoctrine()->getManager();

        $genre = $em->getRepository('SwaterLandGenreBundle:Genre')->findByGenre($genre);

            return $this->render('SwaterLandGenreBundle:Default:index.html.twig', array(
                'genre' => $genre));
    }

}