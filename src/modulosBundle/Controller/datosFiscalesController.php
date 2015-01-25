<?php

namespace modulosBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use modulosBundle\Entity\datosFiscales;
use modulosBundle\Form\datosFiscalesType;

/**
 * datosFiscales controller.
 *
 */
class datosFiscalesController extends Controller
{

    /**
     * Lists all datosFiscales entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('modulosBundle:datosFiscales')->findAll();

        return $this->render('modulosBundle:datosFiscales:index.html.twig', array(
            'entities' => $entities,
        ));
    }
    /**
     * Creates a new datosFiscales entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity = new datosFiscales();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $user = $this->container->get('security.context')->getToken()->getUser();       
            $usuario= $em->getRepository('userBundle:usuario')->find($user->getId());
            $entity->setUsuario($usuario);
            $em->persist($entity);
            $em->flush();
            if($request->get('redirect')==1){
                return $this->redirect($this->generateUrl('carrito_pagar', array('id' => $request->request->get('idcarrito')))); 
            }else{
                return $this->redirect($this->generateUrl('datosfiscales_show', array('id' => $entity->getId())));
            }
        }

        return $this->render('modulosBundle:datosFiscales:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
            'elid'     => $request->get('idcarrito')
        ));
    }

    /**
     * Creates a form to create a datosFiscales entity.
     *
     * @param datosFiscales $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(datosFiscales $entity)
    {
        $form = $this->createForm(new datosFiscalesType(), $entity, array(
            'action' => $this->generateUrl('datosfiscales_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new datosFiscales entity.
     *
     */
    public function newAction()
    {
        $entity = new datosFiscales();
        $form   = $this->createCreateForm($entity);

        return $this->render('modulosBundle:datosFiscales:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a datosFiscales entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('modulosBundle:datosFiscales')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find datosFiscales entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('modulosBundle:datosFiscales:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing datosFiscales entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('modulosBundle:datosFiscales')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find datosFiscales entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('modulosBundle:datosFiscales:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
    * Creates a form to edit a datosFiscales entity.
    *
    * @param datosFiscales $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(datosFiscales $entity)
    {
        $form = $this->createForm(new datosFiscalesType(), $entity, array(
            'action' => $this->generateUrl('datosfiscales_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing datosFiscales entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('modulosBundle:datosFiscales')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find datosFiscales entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('datosfiscales_edit', array('id' => $id)));
        }

        return $this->render('modulosBundle:datosFiscales:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a datosFiscales entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('modulosBundle:datosFiscales')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find datosFiscales entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('datosfiscales'));
    }

    /**
     * Creates a form to delete a datosFiscales entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('datosfiscales_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
