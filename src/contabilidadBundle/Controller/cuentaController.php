<?php

namespace contabilidadBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use contabilidadBundle\Entity\cuenta;
use contabilidadBundle\Form\cuentaType;

/**
 * cuenta controller.
 *
 */
class cuentaController extends Controller
{

    /**
     * Lists all cuenta entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();
        $entity = new cuenta();
        $formulario   = $this->createCreateForm($entity);
        $entities = $em->getRepository('contabilidadBundle:cuenta')->findAll();

        return $this->render('contabilidadBundle:cuenta:index.html.twig', array(
            'entities' => $entities,
            'formulario'   => $formulario->createView(),
        ));
    }
    /**
     * Creates a new cuenta entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity = new cuenta();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('cuenta_show', array('id' => $entity->getId())));
        }

        return $this->render('contabilidadBundle:cuenta:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Creates a form to create a cuenta entity.
     *
     * @param cuenta $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(cuenta $entity)
    {
        $form = $this->createForm(new cuentaType(), $entity, array(
            'action' => $this->generateUrl('cuenta_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new cuenta entity.
     *
     */
    public function newAction()
    {
        $entity = new cuenta();
        $form   = $this->createCreateForm($entity);

        return $this->render('contabilidadBundle:cuenta:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a cuenta entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('contabilidadBundle:cuenta')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find cuenta entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('contabilidadBundle:cuenta:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing cuenta entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('contabilidadBundle:cuenta')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find cuenta entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('contabilidadBundle:cuenta:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
    * Creates a form to edit a cuenta entity.
    *
    * @param cuenta $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(cuenta $entity)
    {
        $form = $this->createForm(new cuentaType(), $entity, array(
            'action' => $this->generateUrl('cuenta_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing cuenta entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('contabilidadBundle:cuenta')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find cuenta entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('cuenta_edit', array('id' => $id)));
        }

        return $this->render('contabilidadBundle:cuenta:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a cuenta entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('contabilidadBundle:cuenta')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find cuenta entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('cuenta'));
    }

    /**
     * Creates a form to delete a cuenta entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('cuenta_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
