<?php

namespace cartBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use cartBundle\Entity\itemCarrito;
use cartBundle\Form\itemCarritoType;
use cartBundle\Entity\carrito;

/**
 * itemCarrito controller.
 *
 */
class itemCarritoController extends Controller
{

    /**
     * Lists all itemCarrito entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('cartBundle:itemCarrito')->findAll();

        return $this->render('cartBundle:itemCarrito:index.html.twig', array(
            'entities' => $entities,
        ));
    }
    /**
     * Creates a new itemCarrito from carrito.
     *
     */
    public function addAction($producto_id)
    {
        $em = $this->getDoctrine()->getManager();
        $user = $this->container->get('security.context')->getToken()->getUser();
        //print_r($user);
        if (!session_id()) {
               session_start();
            }
        $sessionID = session_id();
        if($user=='anon.'){            
            $entityCarrito= $em->getRepository('cartBundle:carrito')->findOneBy(array('llave'=>$sessionID,'status'=>1));
            if(!$entityCarrito){
                //echo 'fdsh';
                $entityCarrito = new carrito();
                $usuario= $em->getRepository('userBundle:usuario')->find(2);                
                $entityCarrito->setLlave($sessionID);
                $entityCarrito->setStatus(1);
                $entityCarrito->setUsuario($usuario);               
                $em->persist($entityCarrito);
                $em->flush();
            }
        }else{
            $usuario= $em->getRepository('userBundle:usuario')->find($user->getId());
            $entityCarrito= $em->getRepository('cartBundle:carrito')->findOneBy(array('usuario'=>$usuario,'status'=>1));
            if(!$entityCarrito){
                $entityCarrito = new carrito();                
                $entityCarrito->setLlave($sessionID);
                $entityCarrito->setStatus(1);
                $entityCarrito->setUsuario($usuario);               
                $em->persist($entityCarrito);
                $em->flush();

            }
            
        }
      
        $producto=$em->getRepository('contenidoBundle:misProductos')->find($producto_id);
        $renta= $em->getRepository('modulosBundle:renta')->find(2);
        $periodo= $em->getRepository('modulosBundle:periodo')->find(2);
        $entity = new itemCarrito();
        $entity->setCantidad(1);
        $entity->setCantidadPeriodo(1);
        $entity->setRenta($renta);
        $entity->setPeriodo($periodo);
        $entity->setTotal($producto->getPrecio());
        $entity->setCarrito($entityCarrito);
        $entity->setProducto($producto);        
        $em = $this->getDoctrine()->getManager();
        $em->persist($entity);
        $em->flush();

            return $this->redirect($this->generateUrl('carrito_show', array('id' => $entityCarrito->getId())));    

        
    }

    /**
     * Creates a form to create a itemCarrito entity.
     *
     * @param itemCarrito $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(itemCarrito $entity)
    {
        $form = $this->createForm(new itemCarritoType(), $entity, array(
            'action' => $this->generateUrl('item_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new itemCarrito entity.
     *
     */
    public function newAction()
    {
        $entity = new itemCarrito();
        $form   = $this->createCreateForm($entity);

        return $this->render('cartBundle:itemCarrito:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a itemCarrito entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('cartBundle:itemCarrito')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find itemCarrito entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('cartBundle:itemCarrito:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing itemCarrito entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('cartBundle:itemCarrito')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find itemCarrito entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('cartBundle:itemCarrito:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
    * Creates a form to edit a itemCarrito entity.
    *
    * @param itemCarrito $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(itemCarrito $entity)
    {
        $form = $this->createForm(new itemCarritoType(), $entity, array(
            'action' => $this->generateUrl('item_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing itemCarrito entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('cartBundle:itemCarrito')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find itemCarrito entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('item_edit', array('id' => $id)));
        }

        return $this->render('cartBundle:itemCarrito:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a itemCarrito entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('cartBundle:itemCarrito')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find itemCarrito entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('item'));
    }

    /**
     * Creates a form to delete a itemCarrito entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('item_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
