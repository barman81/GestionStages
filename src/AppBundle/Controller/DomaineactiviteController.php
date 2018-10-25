<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Domaineactivite;
use AppBundle\Form\DomaineactiviteType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class DomaineactiviteController extends Controller

{
    /**
     *
     * @Route("/domaineactivite/add", name="addDomaineActivite")
     *
     * @return \Symfony\Component\HttpFoundation\Response
     *
     */

    public function addAction()
    {
        //On crée un nouveau domaine d'activité
        $domaineAct = new Domaineactivite();

        //On récupère le form
        $form = $this->createForm(DomaineactiviteType::class, $domaineAct);

        //On génére le fichier final
        $formView = $form->createView();

        //on rend la vue
        return $this->render('domaineActAdd.html.twig', array('form'=>$formView));

    }

}
