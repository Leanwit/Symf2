<?php

namespace Witzke\FacturaBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class ProductoType extends AbstractType {

    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options) {
        $builder
                ->add('descripcion', 'text', array(
                    'required' => true
                ))
                ->add('precio', 'number', array(
                    'required' => true,
                    'precision' => 2
                ))
                ->add('precioCosto', 'number', array(
                    'required' => true,
                    'precision' => 2
                ))
                ->add('activo' , 'checkbox', array (
                    'required'=>false))
                ->add('fechaAlta', 'date', array(
                    'format' => 'dd-MM-yyyy',
                    'empty_value' => '',
                    'required' => true))
                ->add('proveedor', 'entity', array('required' => true,
                    'class' => 'FacturaBundle:Proveedor',
                    'empty_value' => ''
                ))
        ;
    }

    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver) {
        $resolver->setDefaults(array(
            'data_class' => 'Witzke\FacturaBundle\Entity\Producto'
        ));
    }

    /**
     * @return string
     */
    public function getName() {
        return 'witzke_facturabundle_producto';
    }

}
