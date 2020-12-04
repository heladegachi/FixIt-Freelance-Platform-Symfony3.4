<?php

namespace ReclamationBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use ReclamationBundle\Entity\Reclamation;
use ReclamationBundle\Entity\CatReclamation;
use ReclamationBundle\Form\CatReclamationType;

class CatReclamationController extends Controller
{
    /**
     * Lists all CatReclamation entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $em = $this->getDoctrine()
            ->getRepository('ReclamationBundle:CatReclamation');
        $re = $em->findAll();


        return $this->render('@Reclamation/CatReclamation/index.html.twig', array(
            'res' => $re,
        ));
    }



    /**
     * Deletes a CatReclamation entity.
     *
     */

    public function deleteAction()
    {
        $categorie = $this->getDoctrine()->getRepository(CatReclamation::class);
        $obj = $categorie->find($_GET['id']);
        $categorie = $this->getDoctrine()->getManager();
        $categorie->remove($obj);
        $categorie->flush();
        return $this->redirectToRoute('categorieRec_index');

    }

    public function newAction(Request $request)
    {
        $CatReclamation = new CatReclamation();

        $form = $this->createForm(
            CatReclamationType::class, $CatReclamation);

        $form->handleRequest($request);
        //$Reclamation -> setObjet()


        if ($form->isSubmitted() && $form->isValid()) {

            $em = $this->getDoctrine()->getManager();
            $em->persist($CatReclamation);
            $em->flush();
            return $this->redirectToRoute('categorieRec_index');}
            //return $this->render("@Reclamation/ajouter_rec.html.twig");

        //die();

        return $this->render("@Reclamation/CatReclamation/new.html.twig", array(
            "form" => $form->createView()));




    }

    /**
     * Displays a form to edit an existing CatReclamation entity.
     *
     */

    public function updateAction(Request $request, CatReclamation $CatReclamation)
    {


        $editForm = $this->createForm('ReclamationBundle\Form\CatReclamationType', $CatReclamation);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();


            return $this->redirectToRoute('categorieRec_edit', array('id' => $CatReclamation->getId()));
        }

        return $this->render('@Reclamation/CatReclamation/edit.html.twig', array(
            'categorie' => $CatReclamation,
            'edit_form' => $editForm->createView(),

        ));
    }

    public function rechercheAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $nomcategorie = $request->get('nomcategorie');

        $categories = [];
        $categopar = [];
        $result = $this->getDoctrine()->getManager()->getRepository(CatReclamation::class)->advancedSearch($nomcategorie);

        // $categoriespqrents= $em->getRepository(CatReclamation::class)->findby(['idcategorieproduitparent'=>null]);

        foreach ($result as $cat) {
            $categ = $em->getRepository(CatReclamation::class)->findby(['idcategorie' => $cat]);

            $categories[$cat->getIdcategorie()] = $categ;
            $categopar[$cat->getIdcategorie()] = $cat->getName();
        }

        //var_dump($categories);

        return $this->render('@Reclamation/CatReclamation/index.html.twig', array(
            'categories' => $categories,
            'categopar' => $categopar,

        ));


    }




}
