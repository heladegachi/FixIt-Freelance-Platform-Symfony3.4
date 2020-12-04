<?php

namespace UserBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class userController extends Controller
{
    public function redAction()
    {
        $u = $this->container->get('security.token_storage')->getToken()->getUser();
        switch ($u->getRoles()[0]) {
            case "ROLE_ADMIN":
                return $this->redirect('admintmp');
                break;
            case "ROLE_USER":
                return $this->redirect('');
                break;

        }



    }

}
