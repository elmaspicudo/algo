<?php

namespace productoBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use productoBundle\Entity\proveedores;
use productoBundle\Form\proveedoresType;

/**
 * proveedores controller.
 *
 */
class proveedoresController extends Controller
{

    /**
     * Lists all proveedores entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('productoBundle:proveedores')->findAll();

        return $this->render('productoBundle:proveedores:index.html.twig', array(
            'entities' => $entities,
        ));
    }
    /**
     * Creates a new proveedores entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity = new proveedores();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('proveedores_show', array('id' => $entity->getId())));
        }

        return $this->render('productoBundle:proveedores:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Creates a form to create a proveedores entity.
     *
     * @param proveedores $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(proveedores $entity)
    {
        $form = $this->createForm(new proveedoresType(), $entity, array(
            'action' => $this->generateUrl('proveedores_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new proveedores entity.
     *
     */
    public function newAction()
    {
        $entity = new proveedores();
        $form   = $this->createCreateForm($entity);

        return $this->render('productoBundle:proveedores:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a proveedores entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('productoBundle:proveedores')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find proveedores entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('productoBundle:proveedores:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing proveedores entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('productoBundle:proveedores')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find proveedores entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('productoBundle:proveedores:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
    * Creates a form to edit a proveedores entity.
    *
    * @param proveedores $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(proveedores $entity)
    {
        $form = $this->createForm(new proveedoresType(), $entity, array(
            'action' => $this->generateUrl('proveedores_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing proveedores entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('productoBundle:proveedores')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find proveedores entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('proveedores_edit', array('id' => $id)));
        }

        return $this->render('productoBundle:proveedores:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a proveedores entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('productoBundle:proveedores')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find proveedores entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('proveedores'));
    }

    /**
     * Creates a form to delete a proveedores entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('proveedores_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
