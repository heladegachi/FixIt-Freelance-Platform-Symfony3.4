<?php

namespace ReclamationBundle\Controller;

use ReclamationBundle\Entity\ProduitRec;
use ReclamationBundle\Entity\Reclamation;
use ReclamationBundle\Form\ReclamationType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use UserBundle\Entity\User;
use vendor\docdocdoc\nexmoBundle\DocDocDoc\NexmoBundle\DocDocDocNexmoBundle;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use ReclamationBundle\Repository\ReclamationRepository;

use Symfony\Component\Serializer\Serializer;

class MobiRecController extends Controller
{
    public function allAction()
    {
        $tasks = $this->getDoctrine()->getManager()->getRepository('ReclamationBundle:MobiRec')->Searchsouscategories();
        $serializer = new Serializer([new ObjectNormalizer()]);
        $formatted = $serializer->normalize($tasks);
        return new JsonResponse($formatted);
    }
    public function GetidcategorieAction($nomcategorieparam)
    {
        $tasks = $this->getDoctrine()->getManager()->getRepository('ReclamationBundle:MobiRec')->Getid($nomcategorieparam);
        $serializer = new Serializer([new ObjectNormalizer()]);
        $formatted = $serializer->normalize($tasks);
        return new JsonResponse($formatted);
    }
    public function showRecMobileAction(){

        $reclamation = $this->getDoctrine()->getRepository(Reclamation::class)->findAll();
        $serializer = new Serializer([new ObjectNormalizer()]);
        $formatted=$serializer->normalize($reclamation);
        return new JsonResponse($formatted);

    }

    public function chercherrecAction($id)
    {
        $Reclamation = new Reclamation();
        $em = $this->getDoctrine()->getManager();
        $Reclamation = $em->getRepository(Reclamation::class)->findrec($id);
        $serializer = new Serializer([new ObjectNormalizer()]);
        $formatted = $serializer->normalize($Reclamation);
        return new JsonResponse($formatted);
    }
    public function showProdMobileAction(){

        $reclamation = $this->getDoctrine()->getRepository(ProduitRec::class)->findAll();
        $serializer = new Serializer([new ObjectNormalizer()]);
        $formatted=$serializer->normalize($reclamation);
        return new JsonResponse($formatted);

    }

    public function chercherprodAction($id)
    {
        $Reclamation = new ProduitRec();
        $em = $this->getDoctrine()->getManager();
        $Reclamation = $em->getRepository(ProduitRec::class)->findBynom($id);
        $serializer = new Serializer([new ObjectNormalizer()]);
        $formatted = $serializer->normalize($Reclamation);
        return new JsonResponse($formatted);
    }










    public function ajoutMobileAction(Request $request){

        $com = new Reclamation(); // un lien entre l'entity et la table
        $em=$this->getDoctrine()->getManager();
        $com->setDescription($request->get('description'));



        $em->persist($com); // integrer dans la table club dans lab bd
        $em->flush();
        $serializer= new Serializer([new ObjectNormalizer()]);
        $formatted=$serializer->normalize($em);
        return new JsonResponse($formatted);

    }
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

        $serializer = new Serializer([new ObjectNormalizer()]);
        $formatted = $serializer->normalize($em);
        return new JsonResponse($formatted);
    }
    public function ajoutREcAction(Request $request)
    {
        $em=$this->getDoctrine()->getManager();
        $sos=new Reclamation();

        $sos->setDescription($request->get('description'));
   //     $sos->setUser($request->get('user_id'));
  //      $cat = $this->getDoctrine()->getRepository('ReclamationBundle:CatReclamation')->Getid();
  //      $sos->setIdcategorie($cat);

        $sos->setEtat(0);
        $time = new \DateTime("now");
        $sos->setDatereclamation($time);

        $sos->setImage("image");
  //      $produit = $this->getDoctrine()->getRepository('ReclamationBundle:ProduitRec')->find(20);
  //      $sos->setProduit($produit);





        $em->persist($sos);
        $em->flush();
        $serializer=new Serializer([new ObjectNormalizer()]);
        $formatted=$serializer->normalize($sos);
        return new JsonResponse($formatted);
    }

    public function modifmAction(Request $request)
    {
        $id=$request->get('id');
        $em = $this->getDoctrine()->getManager();
        $reclamation=$em->getRepository(Reclamation::class)->find($id);

        $reclamation->setDescription($request->get('description'));


        $em->persist($reclamation);
        $em->flush();
        $serializer = new Serializer([new ObjectNormalizer()]);
        $formatted = $serializer->normalize("ok");
        return new JsonResponse($formatted);
    }

    public function deletemAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        $reclamation = $em->getRepository(Reclamation::class)->find($id);
        $em->remove($reclamation);
        $em->flush();
        $serializer = new Serializer([new ObjectNormalizer()]);
        $formatted = $serializer->normalize($reclamation);
        return new JsonResponse($formatted);
    }
    public function authenAction($email){
        $em = $this->getDoctrine()->getManager();
        $rec = $em->getRepository(user::class)->findBy(array('email'=>$email));

        $serializer = new Serializer([new ObjectNormalizer()]);
        $formatted = $serializer->normalize($rec);
        return new JsonResponse($formatted);


    }

}
