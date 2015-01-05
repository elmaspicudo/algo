<?php

namespace contabilidadBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('contabilidadBundle:Default:index.html.twig', array('name' => $name));
    }
}
