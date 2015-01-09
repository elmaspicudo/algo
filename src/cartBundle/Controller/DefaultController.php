<?php

namespace cartBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('cartBundle:Default:index.html.twig', array('name' => $name));
    }
}
