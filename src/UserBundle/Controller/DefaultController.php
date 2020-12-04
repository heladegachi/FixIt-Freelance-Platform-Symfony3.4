<?php

namespace UserBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        $securityContext = $this->container->get('security.authorization_checker');
        if ($securityContext->isGranted('IS_AUTHENTICATED_REMEMBERED')) {
            // authenticated REMEMBERED, FULLY will imply REMEMBERED (NON anonymous)
            $authChecker = $this->container->get('security.authorization_checker');
            $router = $this->container->get('router');

            if ($authChecker->isGranted('ROLE_ADMIN')) {
                return $this->render('@admintmp/Default/index.html.twig');

            }
            if ($authChecker->isGranted('ROLE_USER')) {
                return $this->render('@admintmp/Default/index2.html.twig');

            }

            }


    }
}
