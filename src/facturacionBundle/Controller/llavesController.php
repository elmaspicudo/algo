<?php

namespace facturacionBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use facturacionBundle\Entity\llaves;
use facturacionBundle\Form\llavesType;

/**
 * llaves controller.
 *
 */
class llavesController extends Controller
{

    /**
     * Lists all llaves entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();
        $entity = new llaves();
        $form   = $this->createCreateForm($entity);
        $entities = $em->getRepository('facturacionBundle:llaves')->findAll();

        return $this->render('facturacionBundle:llaves:index.html.twig', array(
            'entities' => $entities,
            'formulario' => $form->createView(),
        ));
    }
    /**
     * Creates a new llaves entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity = new llaves();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('llaves_show', array('id' => $entity->getId())));
        }

        return $this->render('facturacionBundle:llaves:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Creates a form to create a llaves entity.
     *
     * @param llaves $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(llaves $entity)
    {
        $form = $this->createForm(new llavesType(), $entity, array(
            'action' => $this->generateUrl('llaves_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new llaves entity.
     *
     */
    public function newAction()
    {
        $entity = new llaves();
        $form   = $this->createCreateForm($entity);

        return $this->render('facturacionBundle:llaves:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a llaves entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('facturacionBundle:llaves')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find llaves entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('facturacionBundle:llaves:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing llaves entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('facturacionBundle:llaves')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find llaves entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('facturacionBundle:llaves:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
    * Creates a form to edit a llaves entity.
    *
    * @param llaves $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(llaves $entity)
    {
        $form = $this->createForm(new llavesType(), $entity, array(
            'action' => $this->generateUrl('llaves_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing llaves entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('facturacionBundle:llaves')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find llaves entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('llaves_edit', array('id' => $id)));
        }

        return $this->render('facturacionBundle:llaves:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a llaves entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('facturacionBundle:llaves')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find llaves entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('llaves'));
    }

    /**
     * Creates a form to delete a llaves entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('llaves_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
