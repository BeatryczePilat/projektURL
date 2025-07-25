<?php

/**
 * Tag Type.
 */

namespace App\Form;

use App\Entity\Tag;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

/**
 * Formularz do tworzenia i edycji tagów.
 */
class TagType extends AbstractType
{
    /**
     * Obsługa budowania formularza tagu.
     *
     * @param FormBuilderInterface $builder Obiekt budujący formularz
     * @param array                $options Opcje przekazane do formularza
     */
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder->add('name', TextType::class, [
            'label' => 'form.tag.name.label',
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
            'data_class' => Tag::class,
        ]);
    }
}
