<?php

namespace AppBundle\Form;

use AppBundle\Entity\Entreprises;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;

class PropositionsType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('titreproposition', TextType::class)
            ->add('descriptionproposition',TextareaType::class)
            ->add('codeentreprise', EntityType::class, array(
                'class'  => 'AppBundle:Entreprises',
	            'choice_label' => 'nomentreprise',
	            ))
            ->add('codeclasse',EntityType::class, array(
                'class' => 'AppBundle:Classes',
	            'choice_label' => 'nomclasse',
	            'multiple' => true,
                ))
            ->add('codetechnololgie',EntityType::class, array(
                'class' => 'AppBundle:Technologies',
	            'choice_label' => 'nomtechnologie',
	            'multiple' => true,
            ));
    }/**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\Propositions'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'appbundle_propositions';
    }


}
