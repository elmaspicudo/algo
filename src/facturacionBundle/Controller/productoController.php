<?php

namespace facturacionBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use facturacionBundle\Entity\producto;
use facturacionBundle\Form\productoType;

/**
 * producto controller.
 *
 */
class productoController extends Controller
{

    /**
     * Lists all producto entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();
        $entity = new producto();
        $formulario   = $this->createCreateForm($entity);
        $entities = $em->getRepository('facturacionBundle:producto')->findAll();

        return $this->render('facturacionBundle:producto:index.html.twig', array(
            'entities' => $entities,
            'formulario'   => $formulario->createView(),
        ));
    }
    /**
     * Creates a new producto entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity = new producto();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('producto_show', array('id' => $entity->getId())));
        }

        return $this->render('facturacionBundle:producto:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Creates a form to create a producto entity.
     *
     * @param producto $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(producto $entity)
    {
        $form = $this->createForm(new productoType(), $entity, array(
            'action' => $this->generateUrl('producto_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new producto entity.
     *
     */
    public function newAction()
    {
        $entity = new producto();
        $form   = $this->createCreateForm($entity);

        return $this->render('facturacionBundle:producto:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a producto entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('facturacionBundle:producto')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find producto entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('facturacionBundle:producto:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing producto entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('facturacionBundle:producto')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find producto entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('facturacionBundle:producto:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
    * Creates a form to edit a producto entity.
    *
    * @param producto $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(producto $entity)
    {
        $form = $this->createForm(new productoType(), $entity, array(
            'action' => $this->generateUrl('producto_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing producto entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('facturacionBundle:producto')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find producto entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('producto_edit', array('id' => $id)));
        }

        return $this->render('facturacionBundle:producto:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a producto entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('facturacionBundle:producto')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find producto entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('producto'));
    }

    /**
     * Creates a form to delete a producto entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('producto_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}