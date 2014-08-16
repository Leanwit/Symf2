<?php

namespace Witzke\FacturaBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class FacturaType extends AbstractType
{
        /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('numeroFactura')
            ->add('fecha')
            ->add('total')
            ->add('iva')
            ->add('condicionPago')
            ->add('localidad')
                
        ;        
        $builder->add('detalles', 'collection', array(
            'type' => new DetalleType(),
            'allow_add'    => true, 
            'by_reference' => false
            ));
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Witzke\FacturaBundle\Entity\Factura'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'witzke_facturabundle_factura';
    }
}
