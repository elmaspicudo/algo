<?php

namespace productoBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use productoBundle\Entity\inventario;
use productoBundle\Form\inventarioType;

/**
 * inventario controller.
 *
 */
class inventarioController extends Controller
{

    /**
     * Lists all inventario entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();
        $entity = new inventario();
        $form   = $this->createCreateForm($entity);
        $entities = $em->getRepository('productoBundle:inventario')->findAll();

        return $this->render('productoBundle:inventario:index.html.twig', array(
            'entities' => $entities,
            'formulario' => $form->createView(),
        ));
    }
    /**
     * Creates a new inventario entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity = new inventario();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('inventario_show', array('id' => $entity->getId())));
        }

        return $this->render('productoBundle:inventario:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Creates a form to create a inventario entity.
     *
     * @param inventario $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(inventario $entity)
    {
        $form = $this->createForm(new inventarioType(), $entity, array(
            'action' => $this->generateUrl('inventario_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new inventario entity.
     *
     */
    public function newAction()
    {
        $entity = new inventario();
        $form   = $this->createCreateForm($entity);

        return $this->render('productoBundle:inventario:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a inventario entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('productoBundle:inventario')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find inventario entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('productoBundle:inventario:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing inventario entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('productoBundle:inventario')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find inventario entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('productoBundle:inventario:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
    * Creates a form to edit a inventario entity.
    *
    * @param inventario $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(inventario $entity)
    {
        $form = $this->createForm(new inventarioType(), $entity, array(
            'action' => $this->generateUrl('inventario_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing inventario entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('productoBundle:inventario')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find inventario entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('inventario_edit', array('id' => $id)));
        }

        return $this->render('productoBundle:inventario:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a inventario entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('productoBundle:inventario')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find inventario entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('inventario'));
    }

    /**
     * Creates a form to delete a inventario entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('inventario_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
