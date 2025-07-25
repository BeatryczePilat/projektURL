<?php

/**
 * Url Type.
 */

namespace App\Form;

use App\Entity\Tag;
use App\Entity\Url;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

/**
 * Formularz do tworzenia lub edycji skracanych adresów URL.
 */
class UrlType extends AbstractType
{
    /**
     * Obsługa budowania formularza adresu URL.
     *
     * @param FormBuilderInterface $builder Obiekt budujący formularz
     * @param array                $options Opcje przekazane do formularza
     */
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('originalUrl', TextType::class, [
                'label' => 'form.url.original_url.label',
            ])
            ->add('email', EmailType::class, [
                'required' => false,
                'label' => 'form.url.email.label',
            ])
            ->add('tags', EntityType::class, [
                'class' => Tag::class,
                'choice_label' => 'name',
                'multiple' => true,
                'expanded' => false,
                'required' => false,
                'label' => 'form.url.tags.label',
            ]);
    }

    /**
     * Obsługa konfiguracji opcji formularza.
     *
     * @param OptionsResolver $resolver Obiekt konfigurujący opcje
     */
    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Url::class,
        ]);
    }
}
