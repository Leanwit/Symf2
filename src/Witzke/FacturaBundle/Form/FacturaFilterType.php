<?php

namespace Witzke\FacturaBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Witzke\FacturaBundle\Form\EventListeners\AddLocalidadFieldSubscriber;
use Witzke\FacturaBundle\Form\EventListeners\AddProvinciaFieldSubscriber;

class FacturaFilterType extends AbstractType {

    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options) {
        $factory = $builder->getFormFactory();
        $provinciaSubscriber = new AddProvinciaFieldSubscriber($factory);
        $builder->addEventSubscriber($provinciaSubscriber);
        $localidadSubscriber = new AddLocalidadFieldSubscriber($factory);
        $builder->addEventSubscriber($localidadSubscriber);
        
        $builder
        ->add('numeroFactura', 'number', array(
        'required' => false
        ))
        ->add('fecha', 'date', array(
        'format' => 'dd-MM-yyyy',
        'empty_value' => '',
        'required' => false
        ))
        ->add('total', 'number', array(
        'read_only' => true,
        'empty_data' => '0',
        'disabled' => true
        ))
        ->add('iva', 'entity', array('required' => true,
        'class' => 'FacturaBundle:Iva',
        'empty_value' => '',
            'required'=> false,
            ))
        ->add('condicionPago', 'entity', array(
        'required' => false,
        'class' => 'FacturaBundle:CondicionPago',
        'empty_value' => '',
        ))        
//        ->add('provincia', 'entity', array(
//        'class' => 'FacturaBundle:Provincia',
//        'mapped'=> false,
//            ))
//       ->add('localidad', 'entity', array(
//            'required' => true,
//            'class' => 'FacturaBundle:Localidad',
//            'empty_value' => '',           
//        ))

        ;
        
//        $builder->add('detalles', 'collection', array(
//            'type' => new DetalleType(),
//            'allow_add' => true,
//            'by_reference' => false
//        ));
    }

    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver) {
        $resolver->setDefaults(array(
            'csrf_protection' => false
        ));
    }

    /**
     * @return string
     */
    public function getName() {
        return 'witzke_facturabundle_factura';
    }

}
