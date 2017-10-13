<?php

namespace GeopagosBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;

class UsuarioType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('usuario')->add('clave')->add('edad')/*->add('pagos')*/
                        ->add('favoritos', EntityType::class,
                    array('class' => 'GeopagosBundle:Usuario','choice_label' => 'usuario',/*'attr'=>array('style'=>'min-height:350px'),*/'multiple' => true, 'expanded' => true,


                        ));
    }
    
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'GeopagosBundle\Entity\Usuario'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'geopagosbundle_usuario';
    }


}
