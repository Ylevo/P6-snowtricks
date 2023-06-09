<?php

namespace App\Form;

use App\Entity\Media;
use App\Entity\MediaType;
use App\Entity\Trick;
use App\Entity\TrickCategory;
use App\Entity\User;
use App\Repository\MediaRepository;
use App\Repository\MediaTypeRepository;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\ChoiceList\ChoiceList;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\IsTrue;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Constraints\NotNull;

class MediaFormType extends AbstractType
{
    public function __construct(private MediaTypeRepository $mediaTypeRepository
    ){
    }
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('url', TextType::class, [
                'label' => 'Filename/URL',
                'disabled' => true
            ])
            ->add('altText', TextType::class, [
                'empty_data' => ''
            ])
            ->add('type', EntityType::class, [
                'class' => MediaType::class,
                'choice_label' => 'name',
                'choices' => $this->mediaTypeRepository->findAll(),
                'label' => 'Media Type'
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Media::class,
        ]);
    }
}
