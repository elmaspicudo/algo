<?php

namespace configuracionBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use configuracionBundle\Entity\corporativo;
use configuracionBundle\Form\corporativoType;

/**
 * corporativo controller.
 *
 */
class corporativoController extends Controller
{

    /**
     * Lists all corporativo entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('configuracionBundle:corporativo')->findAll();

        return $this->render('configuracionBundle:corporativo:index.html.twig', array(
            'entities' => $entities,
        ));
    }
    /**
     * Creates a new corporativo entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity = new corporativo();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('corporativo_show', array('id' => $entity->getId())));
        }

        return $this->render('configuracionBundle:corporativo:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Creates a form to create a corporativo entity.
     *
     * @param corporativo $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(corporativo $entity)
    {
        $form = $this->createForm(new corporativoType(), $entity, array(
            'action' => $this->generateUrl('corporativo_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new corporativo entity.
     *
     */
    public function newAction()
    {
        $entity = new corporativo();
        $form   = $this->createCreateForm($entity);

        return $this->render('configuracionBundle:corporativo:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a corporativo entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('configuracionBundle:corporativo')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find corporativo entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('configuracionBundle:corporativo:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing corporativo entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('configuracionBundle:corporativo')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find corporativo entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('configuracionBundle:corporativo:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
    * Creates a form to edit a corporativo entity.
    *
    * @param corporativo $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(corporativo $entity)
    {
        $form = $this->createForm(new corporativoType(), $entity, array(
            'action' => $this->generateUrl('corporativo_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing corporativo entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('configuracionBundle:corporativo')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find corporativo entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('corporativo_edit', array('id' => $id)));
        }

        return $this->render('configuracionBundle:corporativo:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a corporativo entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('configuracionBundle:corporativo')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find corporativo entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('corporativo'));
    }

    /**
     * Creates a form to delete a corporativo entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('corporativo_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
