<?php

namespace Witzke\FacturaBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Witzke\FacturaBundle\Entity\Detalle;
use Witzke\FacturaBundle\Entity\Factura;
use Witzke\FacturaBundle\Form\DetalleType;

/**
 * Detalle controller.
 *
 */
class DetalleController extends Controller
{

    /**
     * Lists all Detalle entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('FacturaBundle:Detalle')->findAll();

        return $this->render('FacturaBundle:Detalle:index.html.twig', array(
            'entities' => $entities,
        ));
    }
    /**
     * Creates a new Detalle entity.
     *
     */
    public function createAction(Request $request, Factura $unaFactura)
    {
        $entity = new Detalle();
        $entity->setFactura($unaFactura);
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('detalle_show', array('id' => $entity->getId())));
        }

        return $this->render('FacturaBundle:Detalle:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Creates a form to create a Detalle entity.
     *
     * @param Detalle $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(Detalle $entity)
    {
        $form = $this->createForm(new DetalleType(), $entity, array(
            'action' => $this->generateUrl('detalle_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new Detalle entity.
     *
     */
    public function newAction()
    {
        $entity = new Detalle();        
        $form = $this->createForm(new DetalleType(), $entity);

        return $this->render('FacturaBundle:Detalle:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Detalle entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('FacturaBundle:Detalle')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Detalle entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('FacturaBundle:Detalle:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Detalle entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        
        $entity = $em->getRepository('FacturaBundle:Detalle')->find($id);
        
        
        
        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Detalle entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('FacturaBundle:Detalle:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
    * Creates a form to edit a Detalle entity.
    *
    * @param Detalle $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Detalle $entity)
    {
        $form = $this->createForm(new DetalleType(), $entity, array(
            'action' => $this->generateUrl('detalle_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing Detalle entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('FacturaBundle:Detalle')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Detalle entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('detalle_edit', array('id' => $id)));
        }

        return $this->render('FacturaBundle:Detalle:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a Detalle entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('FacturaBundle:Detalle')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Detalle entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('detalle'));
    }

    /**
     * Creates a form to delete a Detalle entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('detalle_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
