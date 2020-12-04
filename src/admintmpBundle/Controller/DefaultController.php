<?php

namespace admintmpBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('@admintmp/Default/index.html.twig');
    }
}
