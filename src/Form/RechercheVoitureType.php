<?php

namespace App\Form;

use App\Entity\RechercheVoiture;
use App\Form\RechercheVoitureType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;

class RechercheVoitureType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('minAnnee', IntegerType::class, [
                "required" => false,
                "label" => "De l'année : "
            ])
            ->add('maxAnnee', IntegerType::class, [
                "required" => false,
                "label" => "A l'année : "
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => RechercheVoiture::class,
        ]);
    }
}
