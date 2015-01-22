<?php

namespace facturacionBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use facturacionBundle\Entity\customerDireccion;
use facturacionBundle\Form\customerDireccionType;

/**
 * customerDireccion controller.
 *
 */
class customerDireccionController extends Controller
{

    /**
     * Lists all customerDireccion entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();
        $entity = new customerDireccion();
        $formulario   = $this->createCreateForm($entity);
        $entities = $em->getRepository('facturacionBundle:customerDireccion')->findAll();

        return $this->render('facturacionBundle:customerDireccion:index.html.twig', array(
            'entities' => $entities,
            'formulario'   => $formulario->createView(),
        ));
    }
    /**
     * Creates a new customerDireccion entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity = new customerDireccion();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('customerdireccion_show', array('id' => $entity->getId())));
        }

        return $this->render('facturacionBundle:customerDireccion:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Creates a form to create a customerDireccion entity.
     *
     * @param customerDireccion $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(customerDireccion $entity)
    {
        $form = $this->createForm(new customerDireccionType(), $entity, array(
            'action' => $this->generateUrl('customerdireccion_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new customerDireccion entity.
     *
     */
    public function newAction()
    {
        $entity = new customerDireccion();
        $form   = $this->createCreateForm($entity);

        return $this->render('facturacionBundle:customerDireccion:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a customerDireccion entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('facturacionBundle:customerDireccion')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find customerDireccion entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('facturacionBundle:customerDireccion:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing customerDireccion entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('facturacionBundle:customerDireccion')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find customerDireccion entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('facturacionBundle:customerDireccion:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
    * Creates a form to edit a customerDireccion entity.
    *
    * @param customerDireccion $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(customerDireccion $entity)
    {
        $form = $this->createForm(new customerDireccionType(), $entity, array(
            'action' => $this->generateUrl('customerdireccion_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing customerDireccion entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('facturacionBundle:customerDireccion')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find customerDireccion entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('customerdireccion_edit', array('id' => $id)));
        }

        return $this->render('facturacionBundle:customerDireccion:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a customerDireccion entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('facturacionBundle:customerDireccion')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find customerDireccion entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('customerdireccion'));
    }

    /**
     * Creates a form to delete a customerDireccion entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('customerdireccion_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
