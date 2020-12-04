<?php

namespace CommandeBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use CommandeBundle\Entity\Commande;
use Symfony\Component\HttpFoundation\Request;
use CommandeBundle\Form\CommandeType;

class CommandeController extends Controller
{
    public function ajouterAction()
    {
        return $this->render('@Commande/commande.html.twig');
    }
    public function affichage1Action(Request $request)
    {  $commande = new Commande();
        $f = $this->createForm(CommandeType::class,$commande);
        $f = $f->handleRequest($request);
        if($f->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($commande);
            $em->flush();
            return $this->redirectToRoute('commande_affichebase');
        }
        return $this->render('@Commande/commande.html.twig',array('f'=>$f->createView(),'commande'=> $commande));

    }
    public function lireAction(Request $request){
        $commande=$this->getDoctrine()->getRepository(Commande::class)->findAll();
        return $this->render('@Commande/affiche.html.twig', array('commande'=>$commande));
    }
    public function deleteAction($id)
    {
        $sem=$this->getDoctrine()->getManager();
        $commande=$sem->getRepository(Commande::class)->find($id);
        $sem->remove($commande);
        $sem->flush();
        return $this->redirectToRoute("commande_affichebase");
    }

    public function delete1Action($id)
    {
        $sem=$this->getDoctrine()->getManager();
        $commande=$sem->getRepository(Commande::class)->find($id);
        $sem->remove($commande);
        $sem->flush();
        return $this->redirectToRoute("favoris_homepage");
    }

    public function modifAction($id,Request $request){
        $sem=$this->getDoctrine()->getManager();
        $commande=$sem->getRepository(Commande::class)->find($id);
        $f=$this->createForm(CommandeType::class,$commande);
        $f=$f->handleRequest($request);
        if ($f->isValid()){
            $sem=$this->getDoctrine()->getManager();
            $sem->persist($commande);
            $sem->flush();
            return $this->redirectToRoute("commande_affichebase");}
        return $this->render('@Commande/updatecommande.html.twig',array('commande'=> $f->createView()));
    }
    public function afficheadminAction()
    {   $commande=$this->getDoctrine()->getRepository(Commande::class)->findAll();
        return $this->render('@Commande/Admin/afficheadmine.html.twig',array('commande'=>$commande));
    }

    public function AfficheAnnonceAction()
    {
        return $this->render('@Commande/Annonce.html.twig');
    }
}
