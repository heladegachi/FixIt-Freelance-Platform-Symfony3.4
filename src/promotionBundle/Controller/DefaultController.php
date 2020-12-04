<?php

namespace promotionBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('promotionBundle:Default:index.html.twig');
    }
}
