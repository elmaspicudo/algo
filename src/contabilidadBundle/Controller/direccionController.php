<?php

namespace contabilidadBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use contabilidadBundle\Entity\direccion;
use contabilidadBundle\Form\direccionType;

/**
 * direccion controller.
 *
 */
class direccionController extends Controller
{

    /**
     * Lists all direccion entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();
        $entity = new direccion();
        $formulario   = $this->createCreateForm($entity);
        $entities = $em->getRepository('contabilidadBundle:direccion')->findAll();

        return $this->render('contabilidadBundle:direccion:index.html.twig', array(
            'entities' => $entities,
            'formulario'   => $formulario->createView(),
        ));
    }
    /**
     * Creates a new direccion entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity = new direccion();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('direccion_show', array('id' => $entity->getId())));
        }

        return $this->render('contabilidadBundle:direccion:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Creates a form to create a direccion entity.
     *
     * @param direccion $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(direccion $entity)
    {
        $form = $this->createForm(new direccionType(), $entity, array(
            'action' => $this->generateUrl('direccion_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new direccion entity.
     *
     */
    public function newAction()
    {
        $entity = new direccion();
        $form   = $this->createCreateForm($entity);

        return $this->render('contabilidadBundle:direccion:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a direccion entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('contabilidadBundle:direccion')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find direccion entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('contabilidadBundle:direccion:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing direccion entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('contabilidadBundle:direccion')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find direccion entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('contabilidadBundle:direccion:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
    * Creates a form to edit a direccion entity.
    *
    * @param direccion $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(direccion $entity)
    {
        $form = $this->createForm(new direccionType(), $entity, array(
            'action' => $this->generateUrl('direccion_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing direccion entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('contabilidadBundle:direccion')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find direccion entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('direccion_edit', array('id' => $id)));
        }

        return $this->render('contabilidadBundle:direccion:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a direccion entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('contabilidadBundle:direccion')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find direccion entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('direccion'));
    }

    /**
     * Creates a form to delete a direccion entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('direccion_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
