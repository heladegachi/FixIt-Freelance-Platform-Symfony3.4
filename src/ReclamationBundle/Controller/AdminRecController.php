<?php

namespace ReclamationBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use vendor\docdocdoc\nexmoBundle\DocDocDoc\NexmoBundle\DocDocDocNexmoBundle;

class AdminRecController extends Controller
{
    public function indexAction()
    {
        $user = $this->container->get('security.token_storage')->getToken()->getUser();
        $reclamations = $this->getDoctrine()->getRepository('ReclamationBundle:Reclamation')->findAll();
        //  var_dump($reclamations);
        return $this->render('@Reclamation/AdminRec/index.html.twig', array('recs' =>$reclamations));
    }
}
