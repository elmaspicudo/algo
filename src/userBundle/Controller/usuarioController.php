<?php

namespace userBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use userBundle\Entity\usuario;
use userBundle\Form\usuarioType;

/**
 * usuario controller.
 *
 */
class usuarioController extends Controller
{

    /**
     * Lists all usuario entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('userBundle:usuario')->findAll();

        return $this->render('userBundle:usuario:index.html.twig', array(
            'entities' => $entities,
        ));
    }

     /**
     * Lists all usuario entities.
     *
     */
    public function direccionAction()
    {
        $user = $this->container->get('security.context')->getToken()->getUser();
        $sessionID = session_id();
        if($user=='anon.'){ 
                return $this->redirect($this->generateUrl('contenido_homepage'));
        }else{
            $em = $this->getDoctrine()->getManager();
            $usuario= $em->getRepository('dscorpBundle:usuario')->find($user->getId());
            $direccion= $em->getRepository('dscorpBundle:datosFiscales')->findOneBy(array('usuario'=>$usuario));
            if(!$direccion){
                $entity = new datosFiscales();
                $form   = $this->createdireccionForm($entity);

                return $this->render('dscorpBundle:datosFiscales:new.html.twig', array(
                    'entity' => $entity,
                    'form'   => $form->createView(),
                    'elid'   => $id,
                    'error'   => '',
                ));

            }else{
                $editForm = $this->createdireccionForm($direccion);         

                return $this->render('dscorpBundle:datosFiscales:edit.html.twig', array(
                    'entity'      => $direccion,
                    'form'   => $editForm->createView(),
                    'error'   => '',
                    'elid'   => $id,                    
                ));

            }

        }

    }
    /**
     * Creates a new usuario entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity = new usuario();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('usuario_show', array('id' => $entity->getId())));
        }

        return $this->render('userBundle:usuario:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Creates a form to create a usuario entity.
     *
     * @param usuario $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(usuario $entity)
    {
        $form = $this->createForm(new usuarioType(), $entity, array(
            'action' => $this->generateUrl('usuario_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new usuario entity.
     *
     */
    public function newAction()
    {
        $entity = new usuario();
        $form   = $this->createCreateForm($entity);

        return $this->render('userBundle:usuario:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a usuario entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('userBundle:usuario')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find usuario entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('userBundle:usuario:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing usuario entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('userBundle:usuario')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find usuario entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('userBundle:usuario:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
    * Creates a form to edit a usuario entity.
    *
    * @param usuario $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(usuario $entity)
    {
        $form = $this->createForm(new usuarioType(), $entity, array(
            'action' => $this->generateUrl('usuario_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing usuario entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('userBundle:usuario')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find usuario entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('usuario_edit', array('id' => $id)));
        }

        return $this->render('userBundle:usuario:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a usuario entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('userBundle:usuario')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find usuario entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('usuario'));
    }

    /**
     * Creates a form to delete a usuario entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('usuario_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
