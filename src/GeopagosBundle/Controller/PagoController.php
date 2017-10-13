<?php

namespace GeopagosBundle\Controller;

use GeopagosBundle\Entity\Pago;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * Pago controller.
 *
 */
class PagoController extends Controller
{
    /**
     * Lists all pago entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $pagos = $em->getRepository('GeopagosBundle:Pago')->findAll();

        return $this->render('pago/index.html.twig', array(
            'pagos' => $pagos,
        ));
    }

    /**
     * Creates a new pago entity.
     *
     */
    public function newAction(Request $request)
    {
        $pago = new Pago();
        $form = $this->createForm('GeopagosBundle\Form\PagoType', $pago);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($pago);
            $em->flush();

            return $this->redirectToRoute('pago_show', array('codigopago' => $pago->getCodigopago()));
        }

        return $this->render('pago/new.html.twig', array(
            'pago' => $pago,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a pago entity.
     *
     */
    public function showAction(Pago $pago)
    {
        $deleteForm = $this->createDeleteForm($pago);

        return $this->render('pago/show.html.twig', array(
            'pago' => $pago,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing pago entity.
     *
     */
    public function editAction(Request $request, Pago $pago)
    {
        $deleteForm = $this->createDeleteForm($pago);
        $editForm = $this->createForm('GeopagosBundle\Form\PagoType', $pago);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('pago_edit', array('codigopago' => $pago->getCodigopago()));
        }

        return $this->render('pago/edit.html.twig', array(
            'pago' => $pago,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a pago entity.
     *
     */
    public function deleteAction(Request $request, Pago $pago)
    {
        $form = $this->createDeleteForm($pago);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($pago);
            $em->flush();
        }

        return $this->redirectToRoute('pago_index');
    }

    /**
     * Creates a form to delete a pago entity.
     *
     * @param Pago $pago The pago entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Pago $pago)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('pago_delete', array('codigopago' => $pago->getCodigopago())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
