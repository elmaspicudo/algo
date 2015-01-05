<?php

namespace contabilidadBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use contabilidadBundle\Entity\cuentas;
use contabilidadBundle\Form\cuentasType;

/**
 * cuentas controller.
 *
 */
class cuentasController extends Controller
{

    /**
     * Lists all cuentas entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('contabilidadBundle:cuentas')->findAll();

        return $this->render('contabilidadBundle:cuentas:index.html.twig', array(
            'entities' => $entities,
        ));
    }
    /**
     * Creates a new cuentas entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity = new cuentas();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('cuentas_show', array('id' => $entity->getId())));
        }

        return $this->render('contabilidadBundle:cuentas:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Creates a form to create a cuentas entity.
     *
     * @param cuentas $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(cuentas $entity)
    {
        $form = $this->createForm(new cuentasType(), $entity, array(
            'action' => $this->generateUrl('cuentas_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new cuentas entity.
     *
     */
    public function newAction()
    {
        $entity = new cuentas();
        $form   = $this->createCreateForm($entity);

        return $this->render('contabilidadBundle:cuentas:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a cuentas entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('contabilidadBundle:cuentas')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find cuentas entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('contabilidadBundle:cuentas:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing cuentas entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('contabilidadBundle:cuentas')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find cuentas entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('contabilidadBundle:cuentas:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
    * Creates a form to edit a cuentas entity.
    *
    * @param cuentas $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(cuentas $entity)
    {
        $form = $this->createForm(new cuentasType(), $entity, array(
            'action' => $this->generateUrl('cuentas_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing cuentas entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('contabilidadBundle:cuentas')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find cuentas entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('cuentas_edit', array('id' => $id)));
        }

        return $this->render('contabilidadBundle:cuentas:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a cuentas entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('contabilidadBundle:cuentas')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find cuentas entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('cuentas'));
    }

    /**
     * Creates a form to delete a cuentas entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('cuentas_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
