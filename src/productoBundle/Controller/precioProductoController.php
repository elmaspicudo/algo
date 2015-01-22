<?php

namespace productoBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use productoBundle\Entity\precioProducto;
use productoBundle\Form\precioProductoType;

/**
 * precioProducto controller.
 *
 */
class precioProductoController extends Controller
{

    /**
     * Lists all precioProducto entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();
        $entity = new precioProducto();
        $form   = $this->createCreateForm($entity);
        $entities = $em->getRepository('productoBundle:precioProducto')->findAll();

        return $this->render('productoBundle:precioProducto:index.html.twig', array(
            'entities' => $entities,
            'formulario' => $form->createView(),
        ));
    }
    /**
     * Creates a new precioProducto entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity = new precioProducto();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('precioproducto_show', array('id' => $entity->getId())));
        }

        return $this->render('productoBundle:precioProducto:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Creates a form to create a precioProducto entity.
     *
     * @param precioProducto $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(precioProducto $entity)
    {
        $form = $this->createForm(new precioProductoType(), $entity, array(
            'action' => $this->generateUrl('precioproducto_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new precioProducto entity.
     *
     */
    public function newAction()
    {
        $entity = new precioProducto();
        $form   = $this->createCreateForm($entity);

        return $this->render('productoBundle:precioProducto:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a precioProducto entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('productoBundle:precioProducto')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find precioProducto entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('productoBundle:precioProducto:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing precioProducto entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('productoBundle:precioProducto')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find precioProducto entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('productoBundle:precioProducto:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
    * Creates a form to edit a precioProducto entity.
    *
    * @param precioProducto $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(precioProducto $entity)
    {
        $form = $this->createForm(new precioProductoType(), $entity, array(
            'action' => $this->generateUrl('precioproducto_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing precioProducto entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('productoBundle:precioProducto')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find precioProducto entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('precioproducto_edit', array('id' => $id)));
        }

        return $this->render('productoBundle:precioProducto:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a precioProducto entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('productoBundle:precioProducto')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find precioProducto entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('precioproducto'));
    }

    /**
     * Creates a form to delete a precioProducto entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('precioproducto_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
