<?php

namespace App\Form;

use App\Entity\Media;
use App\Entity\Trick;
use App\Entity\TrickCategory;
use App\Entity\User;
use App\Repository\MediaRepository;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\ChoiceList\ChoiceList;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\IsTrue;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;

class TrickFormType extends AbstractType
{
    private $mediaRepository;

    public function __construct(MediaRepository $mediaRepository)
    {
        $this->mediaRepository = $mediaRepository;
    }
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('name', TextType::class, [
                'label' => false,
                'empty_data' => ''
            ])
            ->add('description', TextareaType::class, [
                'empty_data' => ''
            ])
            ->add('category', EntityType::class, [
                'class' => TrickCategory::class,
                'choice_label' => 'name'
            ])
            ->add('mediaCover', EntityType::class, [
                'class' => Media::class,
                'choice_label' => 'url',
                'choices' => $this->mediaRepository->findBy(['type' => '1']),
                'label' => false
            ])
            ->add('imageMedias', CollectionType::class, [
                'entry_type' => ImageMediaFormType::class,
                'entry_options' => ['label' => false],
                'allow_add' => true,
            ])
            ->add('videoMedias', CollectionType::class, [
                'entry_type' => VideoMediaFormType::class,
                'entry_options' => ['label' => false],
                'allow_add' => true
            ])
            ->add('medias', CollectionType::class, [
                'entry_type' => MediaFormType::class,
                'entry_options' => ['label' => false],
                'allow_delete' => true,
                'by_reference' => false
            ]);
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Trick::class,
        ]);
    }
}
