<?php

namespace Witzke\FacturaBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class ProveedorType extends AbstractType {

    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options) {
        $builder
                ->add('descripcion', 'text', array(
                    'required' => true
                ))
                ->add('direccion', 'text', array(
                    'required' => true
                ))
                ->add('telefono', 'text', array(
                    'required' => true
                ))
                ->add('email', 'email', array(
                    'required' => true
                ))
        ;
    }

    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver) {
        $resolver->setDefaults(array(
            'data_class' => 'Witzke\FacturaBundle\Entity\Proveedor'
        ));
    }

    /**
     * @return string
     */
    public function getName() {
        return 'witzke_facturabundle_proveedor';
    }

}
