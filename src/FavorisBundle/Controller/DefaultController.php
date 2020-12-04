<?php

namespace FavorisBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('FavorisBundle:Default:index.html.twig');
    }
}
