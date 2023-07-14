<?php

namespace App\Form;

use App\Entity\Admin;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class Admin1Type extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('admin_name')
            ->add('password')
            ->add('admin_role')
            ->add('admin_email')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Admin::class,
        ]);
    }
}
