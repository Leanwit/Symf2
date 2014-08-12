<?php

namespace Witzke\FacturaBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Witzke\FacturaBundle\Entity\CondicionPago;
use Witzke\FacturaBundle\Form\CondicionPagoType;

/**
 * CondicionPago controller.
 *
 */
class CondicionPagoController extends Controller
{

    /**
     * Lists all CondicionPago entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('FacturaBundle:CondicionPago')->findAll();

        return $this->render('FacturaBundle:CondicionPago:index.html.twig', array(
            'entities' => $entities,
        ));
    }
    /**
     * Creates a new CondicionPago entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity = new CondicionPago();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('condicionpago_show', array('id' => $entity->getId())));
        }

        return $this->render('FacturaBundle:CondicionPago:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Creates a form to create a CondicionPago entity.
     *
     * @param CondicionPago $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(CondicionPago $entity)
    {
        $form = $this->createForm(new CondicionPagoType(), $entity, array(
            'action' => $this->generateUrl('condicionpago_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new CondicionPago entity.
     *
     */
    public function newAction()
    {
        $entity = new CondicionPago();
        $form   = $this->createCreateForm($entity);

        return $this->render('FacturaBundle:CondicionPago:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a CondicionPago entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('FacturaBundle:CondicionPago')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find CondicionPago entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('FacturaBundle:CondicionPago:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing CondicionPago entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('FacturaBundle:CondicionPago')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find CondicionPago entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('FacturaBundle:CondicionPago:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
    * Creates a form to edit a CondicionPago entity.
    *
    * @param CondicionPago $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(CondicionPago $entity)
    {
        $form = $this->createForm(new CondicionPagoType(), $entity, array(
            'action' => $this->generateUrl('condicionpago_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing CondicionPago entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('FacturaBundle:CondicionPago')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find CondicionPago entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('condicionpago_edit', array('id' => $id)));
        }

        return $this->render('FacturaBundle:CondicionPago:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a CondicionPago entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('FacturaBundle:CondicionPago')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find CondicionPago entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('condicionpago'));
    }

    /**
     * Creates a form to delete a CondicionPago entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('condicionpago_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
