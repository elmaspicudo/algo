<?php

namespace pagosBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        $user = $this->container->get('security.context')->getToken()->getUser();
        
          $usuario= $em->getRepository('dscorpBundle:usuario')->find($user->getId());
          $entity = $em->getRepository('cartBundle:carrito')->find(9);
          $line=$em->getRepository('cartBundle:itemCarrito')->findBy(array('carrito'=>$entity));
          $body1=$this->renderView('pagosBundle:Default:mensaje.html.twig',
                array('datos' => $usuario,'cartLines' => $line));
          $body3=$this->renderView('pagosBundle:Default:mensaje_acceso.html.twig');
          $body2=$this->renderView('pagosBundle:Default:mensaje_nuevo.html.twig');
//echo $body3;
          
          $this->mailAviso('nypo59@hotmail.com',$body1);
          //$this->mailNuevoSisnet('nypo59@hotmail.com',$body2);
          $this->mailConfigurarSisnet('nypo59@hotmail.com',$body3);     
          return $this->render('pagosBundle:Default:index.html.twig', array('name' => 'HOLA'));
 
        
    }
    public function mailAviso($mail,$body){ 

     $message = \Swift_Message::newInstance()
        ->setContentType('text/html')
        ->setSubject('Compraron un nuevo sisnet')
        ->setFrom('soporte@sisnet.mx')
        ->setTo($mail)
        ->setBody( $body);
    $this->get('mailer')->send($message);
    }
    public function mailNuevoSisnet($mail,$body){
         $message = \Swift_Message::newInstance()
            ->setContentType('text/html')
            ->setSubject('Gracias por comprar tu Sisnet')
            ->setFrom('soporte@sisnet.mx')
            ->setTo($mail)
            ->setBody($body)
        ;
        $this->get('mailer')->send($message);
    }

    public function mailConfigurarSisnet($mail,$body){
         $message = \Swift_Message::newInstance()
            ->setContentType('text/html')
            ->setSubject('Datos de acceso a tu Sisnet')
            ->setFrom('soporte@sisnet.mx')
            ->setTo($mail)
            ->setBody($body)
        ;
        $this->get('mailer')->send($message);
    }

}
