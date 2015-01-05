<?php

namespace contaBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('contaBundle:Default:index.html.twig', array('name' => $name));
    }
}
