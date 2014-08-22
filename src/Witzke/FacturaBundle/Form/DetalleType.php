<?php

namespace Witzke\FacturaBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class DetalleType extends AbstractType {

    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options) {
        $builder
                ->add('cantidad', 'number', array(
                    'required' => true
                ))
                ->add('producto', 'entity', array('required' => true,
                    'class' => 'FacturaBundle:Producto',
                    'empty_value' => ''
                ))
            ;
    }

    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver) {
        $resolver->setDefaults(array(
            'data_class' => 'Witzke\FacturaBundle\Entity\Detalle'
        ));
    }

    /**
     * @return string
     */
    public function getName() {
        return 'witzke_facturabundle_detalle';
    }

}
