<?php

namespace productoBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('productoBundle:Default:index.html.twig', array('name' => $name));
    }
}
