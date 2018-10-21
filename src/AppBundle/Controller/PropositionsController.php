<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Propositions;
use AppBundle\Form\PropositionsType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class PropositionsController extends Controller
{
    /**
     *
     * @Route("/add, name="addProposition")
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
}
