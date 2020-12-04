<?php

namespace ReclamationBundle\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use ReclamationBundle\ReclamationBundle;

use ReclamationBundle\Form\ReclamationType;
use ReclamationBundle\Entity\Reclamation;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Serializer;

class ReclamationController extends Controller
{
    public function AjouterRecAction(Request $request)
    {

        $Reclamation = new Reclamation();

        $form = $this->createForm(
            ReclamationType::class, $Reclamation);

        $form->handleRequest($request);
        //$Reclamation -> setObjet()


        if ($form->isSubmitted() && $form->isValid()) {

            $em = $this->getDoctrine()->getManager();
            $em->persist($Reclamation);
            $em->flush();
            //return $this->render("@Reclamation/ajouter_rec.html.twig");
        }
        //die();

        return $this->render("@Reclamation/ajouter_rec.html.twig", array(
            "form" => $form->createView()));
    }

    public function readRecAction()
    {
        $em = $this->getDoctrine()
            ->getRepository('ReclamationBundle:CatReclamation');
        $re = $em->findAll();

        return $this->render('@Reclamation/affiche_rec.html.twig', array(
            'res' => $re,
        ));


    }
    public function DeleteRecAction(Request $request, Reclamation $id )
    {


        $em = $this->getDoctrine()->getManager();
        $em->remove($id);
        $em->flush();

        return $this->forward('ReclamationBundle:Reclamation:readRec');
    }






}
