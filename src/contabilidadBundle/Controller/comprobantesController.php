<?php

namespace contabilidadBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use contabilidadBundle\Entity\comprobantes;
use contabilidadBundle\Form\comprobantesType;

/**
 * comprobantes controller.
 *
 */
class comprobantesController extends Controller
{

    /**
     * Lists all comprobantes entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();
        $entity = new comprobantes();
        $formulario   = $this->createCreateForm($entity);
        $entities = $em->getRepository('contabilidadBundle:comprobantes')->findAll();

        return $this->render('contabilidadBundle:comprobantes:index.html.twig', array(
            'entities' => $entities,
            'formulario'   => $formulario->createView(),
        ));
    }
    /**
     * Creates a new comprobantes entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity = new comprobantes();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('comprobantes_show', array('id' => $entity->getId())));
        }

        return $this->render('contabilidadBundle:comprobantes:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Creates a form to create a comprobantes entity.
     *
     * @param comprobantes $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(comprobantes $entity)
    {
        $form = $this->createForm(new comprobantesType(), $entity, array(
            'action' => $this->generateUrl('comprobantes_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new comprobantes entity.
     *
     */
    public function newAction()
    {
        $entity = new comprobantes();
        $form   = $this->createCreateForm($entity);

        return $this->render('contabilidadBundle:comprobantes:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a comprobantes entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('contabilidadBundle:comprobantes')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find comprobantes entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('contabilidadBundle:comprobantes:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing comprobantes entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('contabilidadBundle:comprobantes')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find comprobantes entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('contabilidadBundle:comprobantes:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
    * Creates a form to edit a comprobantes entity.
    *
    * @param comprobantes $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(comprobantes $entity)
    {
        $form = $this->createForm(new comprobantesType(), $entity, array(
            'action' => $this->generateUrl('comprobantes_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing comprobantes entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('contabilidadBundle:comprobantes')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find comprobantes entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('comprobantes_edit', array('id' => $id)));
        }

        return $this->render('contabilidadBundle:comprobantes:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a comprobantes entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('contabilidadBundle:comprobantes')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find comprobantes entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('comprobantes'));
    }

    /**
     * Creates a form to delete a comprobantes entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('comprobantes_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
