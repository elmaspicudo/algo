<?php

namespace contabilidadBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use contabilidadBundle\Entity\balanzas;
use contabilidadBundle\Form\balanzasType;

/**
 * balanzas controller.
 *
 */
class balanzasController extends Controller
{

    /**
     * Lists all balanzas entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('contabilidadBundle:balanzas')->findAll();

        return $this->render('contabilidadBundle:balanzas:index.html.twig', array(
            'entities' => $entities,
        ));
    }
    /**
     * Creates a new balanzas entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity = new balanzas();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('balanzas_show', array('id' => $entity->getId())));
        }

        return $this->render('contabilidadBundle:balanzas:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Creates a form to create a balanzas entity.
     *
     * @param balanzas $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(balanzas $entity)
    {
        $form = $this->createForm(new balanzasType(), $entity, array(
            'action' => $this->generateUrl('balanzas_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new balanzas entity.
     *
     */
    public function newAction()
    {
        $entity = new balanzas();
        $form   = $this->createCreateForm($entity);

        return $this->render('contabilidadBundle:balanzas:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a balanzas entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('contabilidadBundle:balanzas')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find balanzas entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('contabilidadBundle:balanzas:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing balanzas entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('contabilidadBundle:balanzas')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find balanzas entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('contabilidadBundle:balanzas:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
    * Creates a form to edit a balanzas entity.
    *
    * @param balanzas $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(balanzas $entity)
    {
        $form = $this->createForm(new balanzasType(), $entity, array(
            'action' => $this->generateUrl('balanzas_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing balanzas entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('contabilidadBundle:balanzas')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find balanzas entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('balanzas_edit', array('id' => $id)));
        }

        return $this->render('contabilidadBundle:balanzas:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a balanzas entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('contabilidadBundle:balanzas')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find balanzas entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('balanzas'));
    }

    /**
     * Creates a form to delete a balanzas entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('balanzas_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
