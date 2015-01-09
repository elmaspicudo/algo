<?php

namespace cartBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use cartBundle\Entity\carrito;
use cartBundle\Form\carritoType;
use userBundle\Entity\usuario;
use userBundle\Form\usuarioType;
/**
 * carrito controller.
 *
 */
class carritoController extends Controller
{

    /**
     * Lists all carrito entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('cartBundle:carrito')->findAll();

        return $this->render('cartBundle:carrito:index.html.twig', array(
            'entities' => $entities,
        ));
    }

     /**
     * revisar si el usuario esta logueado.
     *
     */
    public function checkAutAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        $user = $this->container->get('security.context')->getToken()->getUser();
        //print_r($user);
        if($user=='anon.'){
           $entity = new usuario();
           $form   = $this->CreateFormUser($entity);

           return $this->render('userBundle:usuario:registro.html.twig', array(
                'entity' => $entity,
                'form'   => $form->createView(),'id'=>$id,
           ));
          
        }else{
            $entity = $em->getRepository('cartBundle:carrito')->find($id);
            if (!$entity) {
                throw $this->createNotFoundException('Unable to find carrito entity.');
            }
            $line=$em->getRepository('cartBundle:itemCarrito')->findBy(array('carrito'=>$entity));
            //$deleteForm = $this->createDeleteForm($id);

            return $this->render('cartBundle:carrito:pagar.html.twig', array(
                'entity'      => $entity,
                'cartLines'   =>$line,
                'totalItemNumber'=>count($line),
                //'delete_form' => $deleteForm->createView(),
            ));      
        }
      
       
    }

     /**
     * revisar si el usuario esta logueado.
     *
     */
    public function adduserAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        $user = $this->container->get('security.context')->getToken()->getUser();
        //print_r($user);
        if($user=='anon.'){
          return $this->render('cartBundle:carrito:vacio.html.twig', array(                
                //'delete_form' => $deleteForm->createView(),
            ));
          
        }else{
          $usuario= $em->getRepository('userBundle:usuario')->find($user->getId());
          $entity = $em->getRepository('cartBundle:carrito')->find($id);
          $carritoanterior = $em->getRepository('cartBundle:carrito')->findOneBy(array('status'=>1,'usuario'=>$usuario));
            if (!$carritoanterior) {
                $elid=$entity->getId();
                $entity->setUsuario($usuario);    
                $em->persist($entity);
                $em->flush();

            }else{
                $line=$em->getRepository('cartBundle:itemCarrito')->findBy(array('carrito'=>$entity));
                foreach ($line as $key ) {                   
                        $key->setCarrito($carritoanterior);
                        $em->persist($key);
                        $em->flush();                   
                }
                $em->remove($entity);
                $em->flush();
                $elid=$carritoanterior->getId();
            }
            
            return $this->redirect($this->generateUrl('carrito_show', array('id' => $elid)));
                
        }
      
       
    }
    /**
     * Creates a new carrito entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity = new carrito();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('carrito_show', array('id' => $entity->getId())));
        }

        return $this->render('cartBundle:carrito:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Creates a form to create a carrito entity.
     *
     * @param carrito $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(carrito $entity)
    {
        $form = $this->createForm(new carritoType(), $entity, array(
            'action' => $this->generateUrl('carrito_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new carrito entity.
     *
     */
    public function newAction()
    {
        $entity = new carrito();
        $form   = $this->createCreateForm($entity);

        return $this->render('cartBundle:carrito:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a carrito entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();        
        //$deleteForm = $this->createDeleteForm($id);
        $user = $this->container->get('security.context')->getToken()->getUser();
        //print_r($user);
        if($user=='anon.'){
            if (!session_id()) {
               session_start();
            }
            $sessionID = session_id();
            $entity = $em->getRepository('cartBundle:carrito')->findOneBy(array('id'=>$id,'llave'=>$sessionID));        
            $line=$em->getRepository('cartBundle:itemCarrito')->findItemByCart($entity->getId());
            return $this->render('cartBundle:carrito:show.html.twig', array(
                'entity'      => $entity,
                'cartLines'   =>$line,
                'totalItemNumber'=>count($line),
                //'delete_form' => $deleteForm->createView(),
            ));
        }else{
             $usuario= $em->getRepository('userBundle:usuario')->find($user->getId());
             $entity = $em->getRepository('cartBundle:carrito')->findOneBy(array('status'=>1,'usuario'=>$usuario));        
             $line=$em->getRepository('cartBundle:itemCarrito')->findItemByCart($entity->getId());
             $masked = "C|$id|hola|".$user->getId();
             $masked = base64_encode($masked);
             $masked = urlencode($masked);
             $masked = preg_replace('/=$/','',$masked);
             $masked = preg_replace('/=$/','',$masked);
             return $this->render('cartBundle:carrito:pagar.html.twig', array(
                'entity'      => $entity,
                'cartLines'   =>$line,
                'totalItemNumber'=>count($line),'masked'=>$masked,
                //'delete_form' => $deleteForm->createView(),
            ));     

        }
    }
   
    /**
     * Displays a form to edit an existing carrito entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('cartBundle:carrito')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find carrito entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('cartBundle:carrito:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
    * Creates a form to edit a carrito entity.
    *
    * @param carrito $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(carrito $entity)
    {
        $form = $this->createForm(new carritoType(), $entity, array(
            'action' => $this->generateUrl('carrito_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing carrito entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('cartBundle:carrito')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find carrito entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('carrito_edit', array('id' => $id)));
        }

        return $this->render('cartBundle:carrito:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a carrito entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('cartBundle:carrito')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find carrito entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('carrito'));
    }

    /**
     * Creates a form to delete a carrito entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('carrito_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }

        /**
     * Creates a form to create a usuario entity.
     *
     * @param usuario $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function CreateFormUser(usuario $entity)
    {
        $form = $this->createForm(new usuarioType(), $entity, array(
            'action' => $this->generateUrl('usuario_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }
}
