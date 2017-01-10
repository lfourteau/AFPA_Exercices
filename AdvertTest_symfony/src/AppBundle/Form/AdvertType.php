<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\FileType;

class AdvertType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
//        $builder->add('title')->add('description')->add('prices')->add('km')->add('years')->add('date')->add('photo1')->add('model')->add('color')->add('user')->add('department')        ;
     $builder->add('Title', TextType::class, array('attr' => array('placeholder' => 'Title')))
                    ->add('Description', TextareaType::class, array('attr' => array('placeholder' => 'Description')))
                    ->add('Prices', IntegerType::class, array('attr' => array('placeholder' => 'Prices')))
                    ->add('Km', IntegerType::class, array('attr' => array('placeholder' => 'Kilometers')))
                    ->add('Years', IntegerType::class, array('attr' => array('placeholder' => 'Years')))
                    ->add('color', EntityType::class, array('placeholder' => 'Color', 'class' => 'AppBundle:Color'))
                    ->add('Photo1', TextType::class, array('attr' => array('placeholder' => 'Picture')))
                    ->add('model', EntityType::class, array('placeholder' => 'Model', 'class' => 'AppBundle:Models'))
                    ->add('department', EntityType::class, array('placeholder' => 'Department', 'class' => 'AppBundle:Departements'))
                    ->add('user', EntityType::class, array('placeholder' => 'User', 'class' => 'AppBundle:users'));
        
    }
    
    /**
     * {@inheritdoc}
     */ 
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\Advert'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'appbundle_advert';
    }


}
