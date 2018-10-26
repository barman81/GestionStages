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
     * @Route("/entreprises/add", name="addEntreprise")
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
        if($form->isSubmitted() && $form->isValid()){
            // on enregistre l'entreprise en BDD
            $em = $this->getDoctrine()->getManager();
            //$_SESSION['entreprise'] = $entreprise;
            $em->persist($entreprise);
            $em->flush();

            //var_dump($_SESSION);
            //var_dump($em);

            // On affiche message de validation dans le formulaire de redirection
            $this->get('session')->getFlashBag()->add('notice','Entreprise ('.$entreprise->getNomentreprise().') ajouté !');
            return $this->redirect($this->generateUrl('showEntreprises'));
        }

        //generer HTML du form
        $formView = $form->createView();

        // on retourne la vue
        return $this->render('entreprises/entrepriseAdd.html.twig',array('form'=>$formView));
    }

    /**
     * @param Request $request
     * @param Entreprises $entreprise
     * @return Response
     * @Route("/entreprises/edit/{id}", name="editEntreprise")
     */
    public function edit(Request $request, Entreprises $entreprise){
        $form = $this->createForm(EntreprisesType::class, $entreprise);

        $form->handleRequest($request);

        //si le formulaire a été soumis

        if($form->isSubmitted()){

            //on enregistre l'entreprise dans la bdd
            $em = $this-> getDoctrine()->getManager();
            $em->flush();

            //Envoi un message de validation
            $this->get('session')->getFlashBag()->add('notice','Entreprise ('.$entreprise->getNomentreprise().') modifiée !');

            // Retourne form de la liste des entreprises
            return $this->redirect($this->generateUrl('showEntreprises'));

        }


        //On génére le fichier final
        $formView = $form->createView();

        //on rend la vue
        return $this->render('entreprises/entrepriseAdd.html.twig', array('form'=>$formView));
    }

    /**
     * @param Entreprises $entreprise
     * @return Response
     * @Route("/entreprises/blacklist/{id}", name="blackListEntreprise")
     *
     */

    public function blackListEntreprise(Entreprises $entreprise){
        //modification de l'attribut blacklist de l'objet
        $entreprise->setBlacklister(1);
        //enregistrement en BDD de la modification
        $em = $this-> getDoctrine()->getManager();
        $em->flush();
        $this->get('session')->getFlashBag()->add('notice','L\'Entreprise ('.$entreprise->getNomentreprise().') est dans la BlackList !');
        return $this->redirect($this->generateUrl('showEntreprisesBlackList'));
    }

    /**
     * @param Entreprises $entreprise
     * @return Response
     * @Route("/entreprises/noblacklist/{id}", name="noBlackListEntreprise")
     *
     */

    public function noblackListEntreprise(Entreprises $entreprise){
        //modification de l'attribut blacklist de l'objet
        $entreprise->setBlacklister(0);
        //enregistrement en BDD de la modification
        $em = $this-> getDoctrine()->getManager();
        $em->flush();
        $this->get('session')->getFlashBag()->add('notice','L\'Entreprise ('.$entreprise->getNomentreprise().') est revenue dans la liste !');
        return $this->redirect($this->generateUrl('showEntreprises'));
    }

    /**
     *
     * @Route("/entreprises/show", name="showEntreprises")
     *
     * @return Response
     *
     */
    public function showEntreprises()
    {
        $repository = $this->getDoctrine()
            ->getRepository(Entreprises::class);

        $query = $repository->createQueryBuilder('e')
            ->where('e.blacklister = 0')
            ->getQuery();

        $entreprises = $query->getResult();

        return $this->render('entreprises/entreprisesShow.html.twig',['entreprises' => $entreprises]);
    }

    /**
     *
     * @Route("/entreprises/showBlackList", name="showEntreprisesBlackList")
     *
     * @return Response
     *
     */
    public function showEntreprisesBlackList()
    {
        $repository = $this->getDoctrine()
            ->getRepository(Entreprises::class);

        $query = $repository->createQueryBuilder('e')
            ->where('e.blacklister = 1')
            ->getQuery();

        $entreprises = $query->getResult();

        return $this->render('entreprises/entreprisesShowBlackList.html.twig',['entreprises' => $entreprises]);
    }

}