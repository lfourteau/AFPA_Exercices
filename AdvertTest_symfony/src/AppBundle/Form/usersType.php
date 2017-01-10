<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;

class usersType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('username', TextType::class, array('attr' => array('placeholder' => 'Username')))
                ->add('password',PasswordType::class, array('attr' => array('placeholder' => 'Password')))
                ->add('email',TextType::class, array('attr' => array('placeholder' => 'Email')))
                ->add('firstname',TextType::class, array('attr' => array('placeholder' => 'Firstname')))
                ->add('lastname',TextType::class, array('attr' => array('placeholder' => 'Lastname')))
                ->add('cellphone',TextType::class, array('attr' => array('placeholder' => 'Cellphone')))
                ->add('phone',TextType::class, array('attr' => array('placeholder' => 'Phone')));
    }
    
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\users'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'appbundle_users';
    }


}
