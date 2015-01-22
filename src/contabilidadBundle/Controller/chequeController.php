<?php

namespace contabilidadBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use contabilidadBundle\Entity\cheque;
use contabilidadBundle\Form\chequeType;

/**
 * cheque controller.
 *
 */
class chequeController extends Controller
{

    /**
     * Lists all cheque entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();
        $entity = new cheque();
        $formulario   = $this->createCreateForm($entity);   
            
        $entities = $em->getRepository('contabilidadBundle:cheque')->findAll();

        return $this->render('contabilidadBundle:cheque:index.html.twig', array(
            'entities' => $entities,
            'formulario'   => $formulario->createView(),
        ));
    }
    /**
     * Creates a new cheque entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity = new cheque();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('cheque_show', array('id' => $entity->getId())));
        }

        return $this->render('contabilidadBundle:cheque:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Creates a form to create a cheque entity.
     *
     * @param cheque $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(cheque $entity)
    {
        $form = $this->createForm(new chequeType(), $entity, array(
            'action' => $this->generateUrl('cheque_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new cheque entity.
     *
     */
    public function newAction()
    {
        $entity = new cheque();
        $form   = $this->createCreateForm($entity);

        return $this->render('contabilidadBundle:cheque:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a cheque entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('contabilidadBundle:cheque')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find cheque entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('contabilidadBundle:cheque:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing cheque entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('contabilidadBundle:cheque')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find cheque entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('contabilidadBundle:cheque:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
    * Creates a form to edit a cheque entity.
    *
    * @param cheque $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(cheque $entity)
    {
        $form = $this->createForm(new chequeType(), $entity, array(
            'action' => $this->generateUrl('cheque_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing cheque entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('contabilidadBundle:cheque')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find cheque entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('cheque_edit', array('id' => $id)));
        }

        return $this->render('contabilidadBundle:cheque:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a cheque entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('contabilidadBundle:cheque')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find cheque entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('cheque'));
    }

    /**
     * Creates a form to delete a cheque entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('cheque_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
