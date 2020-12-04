<?php

namespace FavorisBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class FavorisController extends Controller
{
    public function ajouterAction()
    {
        return $this->render('@Commande/Utilisateur/favoris.html.twig');
    }
    public function ajoutfavorisAction(Request $request)
    {  $favoris = new Favoris();
        $f = $this->createForm(FavorisType::class,$favoris);
        $f = $f->handleRequest($request);
        if($f->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($favoris);
            $em->flush();
            return $this->redirectToRoute('favoris_homepage');
        }
        return $this->render('@Commande/Utilisateur/favoris.html.twig',array('f'=>$f->createView()));

    }
    /* public function lireAction(Request $request){
         $commande=$this->getDoctrine()->getRepository(Commande::class)->findAll();
 return $this->render('@Commande/Utilisateur/affiche.html.twig', array('commande'=>$commande));
 }*/
    public function deleteAction($nom)
    {
        $sem=$this->getDoctrine()->getManager();
        $favoris=$sem->getRepository(Favoris::class)->find($nom);
        $sem->remove($favoris);
        $sem->flush();
        return $this->redirectToRoute("favoris_homepage");
    }
    /*   public function modifAction($id,Request $request){
           $sem=$this->getDoctrine()->getManager();
           $commande=$sem->getRepository(Commande::class)->find($id);
           $f=$this->createForm(CommandeType::class, $commande);
           $f=$f->handleRequest($request);
           if($f->isValid()){
               $sem=$this->getDoctrine()->getManager();
               $sem->persist($commande);
               $sem->flush();
               return $this->redirectToRoute("commande_affichebase");}
           return $this->render('@Commande/Utilisateur/updatecommande.html.twig',array('f'=> $f->createView()));
       }*/

}
