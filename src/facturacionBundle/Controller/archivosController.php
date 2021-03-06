<?php

namespace facturacionBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use facturacionBundle\Entity\archivos;
use facturacionBundle\Form\archivosType;

/**
 * archivos controller.
 *
 */
class archivosController extends Controller
{

    /**
     * Lists all archivos entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();
        $entity = new archivos();

        $formulario   = $this->createCreateForm($entity);
        $entities = $em->getRepository('facturacionBundle:archivos')->findAll();

        return $this->render('facturacionBundle:archivos:index.html.twig', array(
            'entities' => $entities,
            'formulario'   => $formulario->createView(),
        ));
    }
    /**
     * Creates a new archivos entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity = new archivos();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('archivos_show', array('id' => $entity->getId())));
        }

        return $this->render('facturacionBundle:archivos:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Creates a form to create a archivos entity.
     *
     * @param archivos $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(archivos $entity)
    {
        $form = $this->createForm(new archivosType(), $entity, array(
            'action' => $this->generateUrl('archivos_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new archivos entity.
     *
     */
    public function newAction()
    {
        $entity = new archivos();
        $form   = $this->createCreateForm($entity);

        return $this->render('facturacionBundle:archivos:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a archivos entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('facturacionBundle:archivos')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find archivos entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('facturacionBundle:archivos:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing archivos entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('facturacionBundle:archivos')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find archivos entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('facturacionBundle:archivos:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
    * Creates a form to edit a archivos entity.
    *
    * @param archivos $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(archivos $entity)
    {
        $form = $this->createForm(new archivosType(), $entity, array(
            'action' => $this->generateUrl('archivos_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing archivos entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('facturacionBundle:archivos')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find archivos entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('archivos_edit', array('id' => $id)));
        }

        return $this->render('facturacionBundle:archivos:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a archivos entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('facturacionBundle:archivos')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find archivos entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('archivos'));
    }

    /**
     * Creates a form to delete a archivos entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('archivos_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
