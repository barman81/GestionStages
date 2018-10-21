<?php

namespace AppBundle\Form;

use AppBundle\Entity\Entreprises;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class PropositionsType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('titreproposition', TextType::class)
            ->add('descriptionproposition',TextareaType::class)
            ->add('codeentreprise', ChoiceType::class, array(
                'choices'  => array(
                    'Maybe' => null,
                    'Yes' => true,
                    'No' => false,

                )))
            ->add('codeclasse',ChoiceType::class, array(
                'choices'  => array(
                    'Maybe' => null,
                    'Yes' => true,
                    'No' => false,

                )))
            ->add('codetechnololgie',ChoiceType::class, array(
                'choices'  => array(
                    'Maybe' => null,
                    'Yes' => true,
                    'No' => false,

                )));
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
