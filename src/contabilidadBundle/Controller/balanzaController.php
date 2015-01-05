<?php

namespace contabilidadBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use contabilidadBundle\Entity\balanza;
use contabilidadBundle\Form\balanzaType;

/**
 * balanza controller.
 *
 */
class balanzaController extends Controller
{

    /**
     * Lists all balanza entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();
        $entity = new balanza();
        $form   = $this->createCreateForm($entity);

        $entities = $em->getRepository('contabilidadBundle:balanza')->findAll();

        return $this->render('contabilidadBundle:balanza:index.html.twig', array(
            'entities' => $entities,
            'formulario' => $form->createView(),
        ));
    }
    /**
     * Creates a new balanza entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity = new balanza();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('balanza_show', array('id' => $entity->getId())));
        }

        return $this->render('contabilidadBundle:balanza:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Creates a form to create a balanza entity.
     *
     * @param balanza $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(balanza $entity)
    {
        $form = $this->createForm(new balanzaType(), $entity, array(
            'action' => $this->generateUrl('balanza_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new balanza entity.
     *
     */
    public function newAction()
    {
        $entity = new balanza();
        $form   = $this->createCreateForm($entity);

        return $this->render('contabilidadBundle:balanza:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a balanza entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('contabilidadBundle:balanza')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find balanza entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('contabilidadBundle:balanza:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing balanza entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('contabilidadBundle:balanza')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find balanza entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('contabilidadBundle:balanza:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
    * Creates a form to edit a balanza entity.
    *
    * @param balanza $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(balanza $entity)
    {
        $form = $this->createForm(new balanzaType(), $entity, array(
            'action' => $this->generateUrl('balanza_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing balanza entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('contabilidadBundle:balanza')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find balanza entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('balanza_edit', array('id' => $id)));
        }

        return $this->render('contabilidadBundle:balanza:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a balanza entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('contabilidadBundle:balanza')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find balanza entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('balanza'));
    }

    /**
     * Creates a form to delete a balanza entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('balanza_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
