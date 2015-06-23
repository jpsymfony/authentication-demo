<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

class RegistrationType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('username', 'text');
        $builder->add('email', 'email');
        $builder->add('password', 'repeated', array(
            'first_name'  => 'password',
            'second_name' => 'confirm',
            'type'        => 'password',
        ));
        $builder->add('Register', 'submit');
    }

    public function getName()
    {
        return 'registration_form';
    }
} 
