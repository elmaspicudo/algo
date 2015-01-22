<?php

namespace productoBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use productoBundle\Entity\recepcionDeMercancia;
use productoBundle\Form\recepcionDeMercanciaType;

/**
 * recepcionDeMercancia controller.
 *
 */
class recepcionDeMercanciaController extends Controller
{

    /**
     * Lists all recepcionDeMercancia entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('productoBundle:recepcionDeMercancia')->findAll();

        return $this->render('productoBundle:recepcionDeMercancia:index.html.twig', array(
            'entities' => $entities,
        ));
    }
    /**
     * Creates a new recepcionDeMercancia entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity = new recepcionDeMercancia();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('recepciondemercancia_show', array('id' => $entity->getId())));
        }

        return $this->render('productoBundle:recepcionDeMercancia:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Creates a form to create a recepcionDeMercancia entity.
     *
     * @param recepcionDeMercancia $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(recepcionDeMercancia $entity)
    {
        $form = $this->createForm(new recepcionDeMercanciaType(), $entity, array(
            'action' => $this->generateUrl('recepciondemercancia_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new recepcionDeMercancia entity.
     *
     */
    public function newAction()
    {
        $entity = new recepcionDeMercancia();
        $form   = $this->createCreateForm($entity);

        return $this->render('productoBundle:recepcionDeMercancia:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a recepcionDeMercancia entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('productoBundle:recepcionDeMercancia')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find recepcionDeMercancia entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('productoBundle:recepcionDeMercancia:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing recepcionDeMercancia entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('productoBundle:recepcionDeMercancia')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find recepcionDeMercancia entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('productoBundle:recepcionDeMercancia:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
    * Creates a form to edit a recepcionDeMercancia entity.
    *
    * @param recepcionDeMercancia $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(recepcionDeMercancia $entity)
    {
        $form = $this->createForm(new recepcionDeMercanciaType(), $entity, array(
            'action' => $this->generateUrl('recepciondemercancia_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing recepcionDeMercancia entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('productoBundle:recepcionDeMercancia')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find recepcionDeMercancia entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('recepciondemercancia_edit', array('id' => $id)));
        }

        return $this->render('productoBundle:recepcionDeMercancia:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a recepcionDeMercancia entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('productoBundle:recepcionDeMercancia')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find recepcionDeMercancia entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('recepciondemercancia'));
    }

    /**
     * Creates a form to delete a recepcionDeMercancia entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('recepciondemercancia_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
