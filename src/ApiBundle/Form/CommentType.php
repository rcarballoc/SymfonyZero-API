<?php

namespace ApiBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;

class CommentType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('comment', null, [])
            ->add('date', DateTimeType::class, array(
                'widget' => 'single_text',
                'model_timezone' => 'UTC',
            ))
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'ApiBundle\Entity\Comment',
            'csrf_protection'=>false
        ));
    }

    public function getName()
    {
        return 'symfonyzero_comment';
    }
}