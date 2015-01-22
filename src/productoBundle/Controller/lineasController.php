<?php

namespace productoBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use productoBundle\Entity\lineas;
use productoBundle\Form\lineasType;

/**
 * lineas controller.
 *
 */
class lineasController extends Controller
{

    /**
     * Lists all lineas entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();
        $entity = new lineas();
        $form   = $this->createCreateForm($entity);
        $entities = $em->getRepository('productoBundle:lineas')->findAll();

        return $this->render('productoBundle:lineas:index.html.twig', array(
            'entities' => $entities,
            'formulario' => $form->createView(),
        ));
    }
    /**
     * Creates a new lineas entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity = new lineas();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('lineas_show', array('id' => $entity->getId())));
        }

        return $this->render('productoBundle:lineas:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Creates a form to create a lineas entity.
     *
     * @param lineas $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(lineas $entity)
    {
        $form = $this->createForm(new lineasType(), $entity, array(
            'action' => $this->generateUrl('lineas_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new lineas entity.
     *
     */
    public function newAction()
    {
        $entity = new lineas();
        $form   = $this->createCreateForm($entity);

        return $this->render('productoBundle:lineas:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a lineas entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('productoBundle:lineas')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find lineas entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('productoBundle:lineas:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing lineas entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('productoBundle:lineas')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find lineas entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('productoBundle:lineas:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
    * Creates a form to edit a lineas entity.
    *
    * @param lineas $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(lineas $entity)
    {
        $form = $this->createForm(new lineasType(), $entity, array(
            'action' => $this->generateUrl('lineas_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing lineas entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('productoBundle:lineas')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find lineas entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('lineas_edit', array('id' => $id)));
        }

        return $this->render('productoBundle:lineas:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a lineas entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('productoBundle:lineas')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find lineas entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('lineas'));
    }

    /**
     * Creates a form to delete a lineas entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('lineas_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
