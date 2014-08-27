<?php

namespace Witzke\FacturaBundle\Form\EventListeners;

use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;
use Symfony\Component\Form\FormFactoryInterface;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Doctrine\ORM\EntityRepository;
use Witzke\FacturaBundle\Entity\Provincia;

class AddLocalidadFieldSubscriber implements EventSubscriberInterface {

    private $factory;

    public function __construct(FormFactoryInterface $factory) {
        $this->factory = $factory;
    }

    public static function getSubscribedEvents() {
        return array(
            FormEvents::PRE_SET_DATA => 'preSetData',
            FormEvents::PRE_BIND => 'preBind'
        );
    }

    private function addLocalidadForm($form, $provincia) {
        $form->add($this->factory->createNamed('localidad', 'entity', null, array(
                    'class' => 'FacturaBundle:Localidad',
                    'empty_value' => 'Localidad',
                    'auto_initialize' => false,
                    'query_builder' => function (EntityRepository $repository) use ($provincia) {
                        $qb = $repository->createQueryBuilder('localidad')
                                ->innerJoin('localidad.provincia', 'provincia');
                        if ($provincia instanceof Provincia) {
                            $qb->where('localidad.provincia = :provincia')
                                    ->setParameter('provincia', $provincia);
                        } elseif (is_numeric($provincia)) {
                            $qb->where('provincia.id = :provincia')
                                    ->setParameter('provincia', $provincia);
                        } else {
                            $qb->where('provincia.nombre = :provincia')
                                    ->setParameter('provincia', null);
                        }
                        return $qb;
                    }
        )));
    }

    public function preSetData(FormEvent $event) {
        $data = $event->getData();
        $form = $event->getForm();
        if (null === $data) {
            return;
        }
        $provincia = ($data->getLocalidad()) ? $data->getLocalidad()->getProvincia() : null;
        $this->addLocalidadForm($form, $provincia);
    }

    public function preBind(FormEvent $event) {
        $data = $event->getData();
        $form = $event->getForm();
        if (null === $data) {
            return;
        }
        $provincia = array_key_exists('provincia', $data) ? $data['provincia'] : null;
        $this->addLocalidadForm($form, $provincia);
    }

}