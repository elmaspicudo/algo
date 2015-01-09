<?php

namespace contenidoBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
    	$em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('contenidoBundle:misProductos')->findAll();

        return $this->render('contenidoBundle:Default:index.html.twig', array(
            'entities' => $entities,
        ));
       
    }
}
