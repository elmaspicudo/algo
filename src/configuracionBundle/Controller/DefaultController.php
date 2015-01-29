<?php

namespace configuracionBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('configuracionBundle:Default:index.html.twig', array('name' => $name));
    }
}
