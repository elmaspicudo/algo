<?php

namespace facturacionBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use facturacionBundle\Entity\impuestos;
use facturacionBundle\Form\impuestosType;

/**
 * impuestos controller.
 *
 */
class impuestosController extends Controller
{

    /**
     * Lists all impuestos entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('facturacionBundle:impuestos')->findAll();

        return $this->render('facturacionBundle:impuestos:index.html.twig', array(
            'entities' => $entities,
        ));
    }
    /**
     * Creates a new impuestos entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity = new impuestos();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('impuestos_show', array('id' => $entity->getId())));
        }

        return $this->render('facturacionBundle:impuestos:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Creates a form to create a impuestos entity.
     *
     * @param impuestos $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(impuestos $entity)
    {
        $form = $this->createForm(new impuestosType(), $entity, array(
            'action' => $this->generateUrl('impuestos_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new impuestos entity.
     *
     */
    public function newAction()
    {
        $entity = new impuestos();
        $form   = $this->createCreateForm($entity);

        return $this->render('facturacionBundle:impuestos:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a impuestos entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('facturacionBundle:impuestos')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find impuestos entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('facturacionBundle:impuestos:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing impuestos entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('facturacionBundle:impuestos')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find impuestos entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('facturacionBundle:impuestos:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
    * Creates a form to edit a impuestos entity.
    *
    * @param impuestos $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(impuestos $entity)
    {
        $form = $this->createForm(new impuestosType(), $entity, array(
            'action' => $this->generateUrl('impuestos_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing impuestos entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('facturacionBundle:impuestos')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find impuestos entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('impuestos_edit', array('id' => $id)));
        }

        return $this->render('facturacionBundle:impuestos:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a impuestos entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('facturacionBundle:impuestos')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find impuestos entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('impuestos'));
    }

    /**
     * Creates a form to delete a impuestos entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('impuestos_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
