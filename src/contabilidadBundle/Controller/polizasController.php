<?php

namespace contabilidadBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use contabilidadBundle\Entity\polizas;
use contabilidadBundle\Form\polizasType;

/**
 * polizas controller.
 *
 */
class polizasController extends Controller
{

    /**
     * Lists all polizas entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();
        $entity = new polizas();
        $formulario   = $this->createCreateForm($entity);
        $entities = $em->getRepository('contabilidadBundle:polizas')->findAll();

        return $this->render('contabilidadBundle:polizas:index.html.twig', array(
            'entities' => $entities,
            'formulario'   => $formulario->createView(),
        ));
    }
    /**
     * Creates a new polizas entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity = new polizas();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('polizas_show', array('id' => $entity->getId())));
        }

        return $this->render('contabilidadBundle:polizas:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Creates a form to create a polizas entity.
     *
     * @param polizas $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(polizas $entity)
    {
        $form = $this->createForm(new polizasType(), $entity, array(
            'action' => $this->generateUrl('polizas_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new polizas entity.
     *
     */
    public function newAction()
    {
        $entity = new polizas();
        $form   = $this->createCreateForm($entity);

        return $this->render('contabilidadBundle:polizas:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a polizas entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('contabilidadBundle:polizas')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find polizas entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('contabilidadBundle:polizas:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing polizas entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('contabilidadBundle:polizas')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find polizas entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('contabilidadBundle:polizas:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
    * Creates a form to edit a polizas entity.
    *
    * @param polizas $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(polizas $entity)
    {
        $form = $this->createForm(new polizasType(), $entity, array(
            'action' => $this->generateUrl('polizas_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing polizas entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('contabilidadBundle:polizas')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find polizas entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('polizas_edit', array('id' => $id)));
        }

        return $this->render('contabilidadBundle:polizas:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a polizas entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('contabilidadBundle:polizas')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find polizas entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('polizas'));
    }

    /**
     * Creates a form to delete a polizas entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('polizas_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
