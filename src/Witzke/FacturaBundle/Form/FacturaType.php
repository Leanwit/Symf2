<?php

namespace Witzke\FacturaBundle\Form;

use Doctrine\ORM\EntityRepository;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Witzke\FacturaBundle\Form\EventListeners\AddLocalidadFieldSubscriber;
use Witzke\FacturaBundle\Form\EventListeners\AddProvinciaFieldSubscriber;

class FacturaType extends AbstractType {

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
        'required' => true
        ))
        ->add('fecha', 'date', array(
        'format' => 'dd-MM-yyyy',
        'empty_value' => '',
        'required' => true,
         'attr' => array('class'=>'factura_fecha'),
        ))
        ->add('total', 'number', array(
        'read_only' => true,
        'data' => 0,
        'disabled' => false, 
        'attr' => array('class'=>'factura_total'),
        ))
        ->add('iva', 'entity', array('required' => true,
        'class' => 'FacturaBundle:Iva',
        'empty_value' => '',))        
        ->add('condicionPago', 'entity', array(
        'required' => true,
        'class' => 'FacturaBundle:CondicionPago',
        'empty_value' => '',
        ))        
        ->add('provincia', 'entity', array(
        'class' => 'FacturaBundle:Provincia',
        'mapped'=> false,        
            ))
       ->add('localidad', 'entity', array(
            'required' => true,
            'class' => 'FacturaBundle:Localidad',
            'empty_value' => '',           
        ))

        ;
        
        $builder->add('detalles', 'collection', array(
            'type' => new DetalleType(),
            'allow_add' => true,
            'by_reference' => false,
            'allow_delete' => true,
            'required' => true,  
            ));
    }

    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver) {
        $resolver->setDefaults(array(
            'data_class' => 'Witzke\FacturaBundle\Entity\Factura'
        ));
    }

    /**
     * @return string
     */
    public function getName() {
        return 'witzke_facturabundle_factura';
    }

}
