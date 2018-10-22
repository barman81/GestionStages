<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Propositions;
use AppBundle\Form\PropositionsType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Response;

class PropositionsController extends Controller
{
    /**
     *
     * @Route("/add", name="addProposition")
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */

    public function addAction()
    {
        //On crée une nouvelle proposition
        $proposition = new Propositions();

        //On récupère le form
        $form = $this->createForm(PropositionsType::class, $proposition);

        //On génére le fichier final
        $formView = $form->createView();

        //on rend la vue
        return $this->render('propositionAdd.html.twig', array('form'=>$formView));

    }

    /**
     *
     * @Route("/show/{id}", name="afficherPropositionbyid", requirements={"id"="\d+"})
     *
     */

    public function showPropositionById($id)
    {
        $proposition = $this->getDoctrine()
            ->getRepository('AppBundle:Propositions')
            ->find($id);

        return new Response($proposition->getTitreproposition());
    }
    /**
     *
     * @Route("/show", name="afficherProposition")
     *
     */
    public function showProposition()
    {
        $em = $this->getDoctrine()->getManager();
        $propositions = $this->getDoctrine()
            ->getRepository(Propositions::class)
            ->findAll();

        return $this->render('propositionShow.html.twig',['propositions' => $propositions]);
    }
}
