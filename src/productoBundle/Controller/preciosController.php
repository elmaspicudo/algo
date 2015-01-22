<?php

namespace productoBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use productoBundle\Entity\precios;
use productoBundle\Form\preciosType;

/**
 * precios controller.
 *
 */
class preciosController extends Controller
{

    /**
     * Lists all precios entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('productoBundle:precios')->findAll();

        return $this->render('productoBundle:precios:index.html.twig', array(
            'entities' => $entities,
        ));
    }
    /**
     * Creates a new precios entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity = new precios();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('precios_show', array('id' => $entity->getId())));
        }

        return $this->render('productoBundle:precios:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Creates a form to create a precios entity.
     *
     * @param precios $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(precios $entity)
    {
        $form = $this->createForm(new preciosType(), $entity, array(
            'action' => $this->generateUrl('precios_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new precios entity.
     *
     */
    public function newAction()
    {
        $entity = new precios();
        $form   = $this->createCreateForm($entity);

        return $this->render('productoBundle:precios:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a precios entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('productoBundle:precios')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find precios entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('productoBundle:precios:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing precios entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('productoBundle:precios')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find precios entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('productoBundle:precios:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
    * Creates a form to edit a precios entity.
    *
    * @param precios $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(precios $entity)
    {
        $form = $this->createForm(new preciosType(), $entity, array(
            'action' => $this->generateUrl('precios_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing precios entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('productoBundle:precios')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find precios entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('precios_edit', array('id' => $id)));
        }

        return $this->render('productoBundle:precios:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a precios entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('productoBundle:precios')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find precios entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('precios'));
    }

    /**
     * Creates a form to delete a precios entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('precios_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
