<?php

namespace contabilidadBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use contabilidadBundle\Entity\poliza;
use contabilidadBundle\Form\polizaType;

/**
 * poliza controller.
 *
 */
class polizaController extends Controller
{

    /**
     * Lists all poliza entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('contabilidadBundle:poliza')->findAll();

        return $this->render('contabilidadBundle:poliza:index.html.twig', array(
            'entities' => $entities,
        ));
    }
    /**
     * Creates a new poliza entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity = new poliza();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('poliza_show', array('id' => $entity->getId())));
        }

        return $this->render('contabilidadBundle:poliza:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Creates a form to create a poliza entity.
     *
     * @param poliza $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(poliza $entity)
    {
        $form = $this->createForm(new polizaType(), $entity, array(
            'action' => $this->generateUrl('poliza_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new poliza entity.
     *
     */
    public function newAction()
    {
        $entity = new poliza();
        $form   = $this->createCreateForm($entity);

        return $this->render('contabilidadBundle:poliza:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a poliza entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('contabilidadBundle:poliza')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find poliza entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('contabilidadBundle:poliza:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing poliza entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('contabilidadBundle:poliza')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find poliza entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('contabilidadBundle:poliza:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
    * Creates a form to edit a poliza entity.
    *
    * @param poliza $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(poliza $entity)
    {
        $form = $this->createForm(new polizaType(), $entity, array(
            'action' => $this->generateUrl('poliza_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing poliza entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('contabilidadBundle:poliza')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find poliza entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('poliza_edit', array('id' => $id)));
        }

        return $this->render('contabilidadBundle:poliza:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a poliza entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('contabilidadBundle:poliza')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find poliza entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('poliza'));
    }

    /**
     * Creates a form to delete a poliza entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('poliza_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
