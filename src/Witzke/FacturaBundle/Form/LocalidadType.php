<?php

namespace Witzke\FacturaBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class LocalidadType extends AbstractType
{
        /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('descripcion','text', array(
                'required'=>true
            ))
            ->add('codigoPostal')
            ->add('provincia', 'entity', array('required' => true,
                    'class' => 'FacturaBundle:Provincia',
                    'empty_value' => ''
                ))
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Witzke\FacturaBundle\Entity\Localidad'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'witzke_facturabundle_localidad';
    }
}
