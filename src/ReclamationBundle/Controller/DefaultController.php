<?php

namespace ReclamationBundle\Controller;

use ReclamationBundle\Entity\CatReclamation;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use EvenementBundle\Entity\Reclamation;
use Integration1\vendor\docdocdoc\nexmoBundle\DocDocDoc\NexmoBundle\Message\Simple;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('@Reclamation/Default/index.html.twig');
    }
// taamel c update esm el bundle baad houa ijib les fichiers wi7othom fil vender wou baad nzidou fil APP kernel wel composer.Json
//

    public function listrecAction(Request $request)
    {
        $user = $this->container->get('security.token_storage')->getToken()->getUser();
        $reclamations = $this->getDoctrine()->getRepository('ReclamationBundle:Reclamation')->findBy(
            [
                'user'=>$user
            ]
        );
        $em = $this->getDoctrine()->getManager();


        if($request->isMethod('POST')){
            //pour le filtre
            $etat = $request->get("etat");
            $em = $this->getDoctrine()->getManager();
            $recl2 = $em->getRepository('ReclamationBundle:Reclamation')->findDQL($etat,$user->getId());
            //var_dump($recl2);


        }
        //  var_dump($recl2);
        //var_dump($reclamations);
        return $this->render('@Reclamation/Default/listRec.html.twig',array(
            'recs'=>$reclamations,
        ));
    }

    public function detailsreclamationAction($id)
    {
        $user = $this->container->get('security.token_storage')->getToken()->getUser();
        // var_dump($user);
        $reclamation = $this->getDoctrine()->getRepository('ReclamationBundle:Reclamation')->find($id);
        //var_dump($reclamations);
        return $this->render('@Reclamation/Default/detailsrec.html.twig',array(
            'rec'=>$reclamation,
        ));
    }


    public function traiterAction(Request $request,$id)
    {
        $user = $this->container->get('security.token_storage')->getToken()->getUser();

        $reclamation = $this->getDoctrine()->getRepository('ReclamationBundle:Reclamation')->find($id);
        $reclamation->setEtat(1);
        $em = $this->getDoctrine()->getManager();
        $em->persist($reclamation);
        $em->flush();
        //return $this->redirectToRoute('index_back');
        $request->getSession()
            ->getFlashBag()
            ->add('success', 'La Reclamation a été Traité avec succées ...!');
//nexmo
        $message = new \DocDocDoc\NexmoBundle\Message\Simple("Service reclamation", "21699113721", "Votre reclamation a été traité avec succés");
        $nexmoResponse = $this->container->get('doc_doc_doc_nexmo')->send($message);



        $url = $this->generateUrl('admin_index');

        return $this->redirect($url);
        //var_dump($reclamations);

    }


    public function reclamerAction(Request $request,$id)
    {

        $em= $this->getDoctrine()->getManager();

        $user = $this->container->get('security.token_storage')->getToken()->getUser();
        $produit = $this->getDoctrine()->getRepository('ReclamationBundle:ProduitRec')->find($id);
        $categories= $em->getRepository(CatReclamation::class)->findAll();

        if($request->isMethod('POST')){
            $reclamation = new \ReclamationBundle\Entity\Reclamation();
            $reclamation->setDescription($request->get('description'));
            $reclamation->setImage($request->get('image'));
            $time = new \DateTime("now");
            $reclamation->setDatereclamation($time);
            $reclamation->setEtat(0);
            $reclamation->setProduit($produit);
            $reclamation->setUser($user);
            $cat = $em->getRepository(CatReclamation::class)->find($request->get('id'));
            $reclamation->setIdcategorie($cat);
            //$reclamation->set(1);

            //  var_dump($reclamation);

            $em = $this->getDoctrine()->getManager();
            $em->persist($reclamation);
            $em->flush();
            $request->getSession()
                ->getFlashBag()
                ->add('success', 'La reclamation a été ajouté avec succées ...!');

            $url = $this->generateUrl('All_reclamation');

            return $this->redirect($url);
        }

        return $this->render('@Reclamation/Default/reclamer.html.twig', array(
            'produit' => $produit,
            'categories'=>$categories
        ));
    }





    public function supprimerRecAction($id,Request $request)
    {
        $reclamation = $this->getDoctrine()
            ->getRepository('ReclamationBundle:Reclamation')
            ->find($id);

        $em =$this->getDoctrine()->getManager();

        $em->remove($reclamation);
        $em->flush();

        $request->getSession()
            ->getFlashBag()
            ->add('success', 'La reclamation a été supprimer avec succées ...!');

        return $this->redirectToRoute('All_reclamation');
    }

    public function modifierRecAction($id,Request $request)
    {
        $user = $this->container->get('security.token_storage')->getToken()->getUser();
        // $produit = $this->getDoctrine()->getRepository('ProduitBundle:Produit')->find($id);
        $reclamation = $this->getDoctrine()->getRepository('ReclamationBundle:Reclamation')->find($id);
        if($request->isMethod('POST')){

            $reclamation->setDescription($request->get('description'));
            var_dump($request->get('image'));
            $reclamation->setImage($request->get('image'));
            $time = new \DateTime("now");
            $reclamation->setDateReclamation($time);
            $reclamation->setEtat(0);

            $reclamation->setUser($user);
            //$reclamation->set(1);

            //    var_dump($reclamation);

            $em = $this->getDoctrine()->getManager();
            $em->persist($reclamation);
            $em->flush();
            $request->getSession()
                ->getFlashBag()
                ->add('success', 'La reclamation a été modifier avec succées ...!');

            $url = $this->generateUrl('All_reclamation');

            return $this->redirect($url);
        }
        //var_dump($reclamation);

        return $this->render('@Reclamation/Default/modifierRecl.html.twig',array(
            'rec'=>$reclamation,
        ));

    }

    public function listProAction()
    {
        $user = $this->container->get('security.token_storage')->getToken()->getUser();
        $produits = $this->getDoctrine()->getRepository('ReclamationBundle:ProduitRec')->findAll();


        foreach ($produits as $p) {

        }


        //var_dump($reclamations);
        return $this->render('@Reclamation/Default/listProduit.html.twig',array(
            'recs'=>$produits,
        ));
    }


    public function ShowreclamationByEtatAction(Request $request)
    {
        $user = $this->container->get('security.token_storage')->getToken()->getUser();

        $etat = $request->get("etat");
        $em = $this->getDoctrine()->getManager();



        $recl2 = $em->getRepository('ReclamationBundle:Reclamation')->findDQL($etat,$user->getId());

        var_dump($recl2);

        return $this->render('@Reclamation/Default/listRec.html.twig',array(
            'recs'=>$recl2,
        ));
    }















}
