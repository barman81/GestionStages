<?php
/**
 * Created by PhpStorm.
 * User: axelc
 * Date: 23/10/2018
 * Time: 23:32
 */

namespace AppBundle\Controller;

use AppBundle\Entity\Entreprises;
use AppBundle\Form\EntreprisesType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class EntreprisesController extends Controller
{

    /**
     *
     * @Route("/addE", name="addEntreprise")
     *
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function addAction(Request $request){
        // creer un new Entreprise
        $entreprise = new Entreprises();

        // recuperer le form
        $form = $this->createForm(EntreprisesType::class,$entreprise);

       $form->handleRequest($request);

       //si le formulaire est validé
        if($form->isSubmitted()){
            // on enregistre l'entreprise en BDD
            $em = $this->getDoctrine()->getManager();

            $em->persist($entreprise);
            $em->flush();

            return new Response('Entreprise Ajouté !');
        }

        //generer HTML du form
        $formView = $form->createView();

        // on retourne la vue
        return $this->render('entrepriseAdd.html.twig',array('form'=>$formView));
    }

}