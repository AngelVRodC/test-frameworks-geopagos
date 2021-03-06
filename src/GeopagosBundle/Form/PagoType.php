<?php

namespace GeopagosBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;

class PagoType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('importe','number', array('label' => false, 'attr' => array('class' => 'form-control','placeholder' => 'Importe')))
        ->add('fecha')
        ->add('usuarios', EntityType::class,
                    array('class' => 'GeopagosBundle:Usuario','choice_label' => 'usuario','multiple' => true, 'expanded' => true,


                        ));
    }
    
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'GeopagosBundle\Entity\Pago'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'geopagosbundle_pago';
    }


}
