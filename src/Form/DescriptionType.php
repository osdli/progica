<?php

namespace App\Form;

use App\Entity\Lodge;
use App\Entity\Cities;
use App\Repository\CitiesRepository;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\MoneyType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class DescriptionType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder

            ->add('title', TextType::class, [
                'label' => 'Le nom de votre résidence',

                'attr' => [
                    'placeholder' => 'Merci de rajouter le nom de votre résidence ']
            ])
            ->add('description', TextType::class, [
                'label' => 'Votre annonce',

                'attr' => [
                    'placeholder' => 'Merci d\'ajouter ici la description de votre bien']
            ])
            ->add('picture', FileType::class,[

                'required' => false,
             ])
            ->add('animal', CheckboxType::class,
            ['label'=> 'Si  vous autorisez les animaux veuillez cocher cette case'])
            ->add('animal_cost', MoneyType::class, [
                'label'=>'Supplément de paiement en cas de possession d\'animaux'
            ])
            ->add('high_season_price', MoneyType::class, [
                'label'=>'Prix saison haute'
            ])
            ->add('low_season_price', MoneyType::class, [
                'label'=>'Prix saison basse'
            ])
           ->add('location', EntityType::class,[
                'class' => Cities::class,
                'query_builder' => function (CitiesRepository $er) {
                return $er ->createQueryBuilder('c')
                    ->orderBy('c.name', 'ASC')->setMaxResults(50);
                },
                'choice_label' => 'name',
            ])
            ->add('area',TextType::class, [
                'label' => 'La surface de votre résidence',

                'attr' => [
                    'placeholder' => 'Merci de saisir la surface de votre résidence en m²']
            ])
            ->add('bed', IntegerType::class,[
                'label' => 'Nombre de couchages',

                'attr' => [
                    'placeholder' => 'Merci de saisir le nombre de couchages']
            ])
            ->add('bedroom', IntegerType::class, [
                'label' => 'Le nombre de chambres à coucher',

                'attr' => [
                    'placeholder' => 'Merci de saisir nombre de chambres à coucher']
            ])
            ->add('submit', SubmitType::class, [
                'label' => "Publier"
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Lodge::class,
        ]);
    }
}
