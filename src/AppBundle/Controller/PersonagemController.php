<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Personagem;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Personagem controller.
 *
 * @Route("personagem")
 */
class PersonagemController extends Controller
{
    /**
     * Lists all personagem entities.
     *
     * @Route("/", name="personagem_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $personagems = $em->getRepository('AppBundle:Personagem')->findAll();

        return $this->render('personagem/index.html.twig', array(
            'personagems' => $personagems,
        ));
    }

    /**
     * Creates a new personagem entity.
     *
     * @Route("/new", name="personagem_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $personagem = new Personagem();
        $personagem->setLevel(1);
        $personagem->setHpmax(100);
        $personagem->setHpcurrent(100);
        $personagem->setStrength(5);
        $personagem->setDefence(5);
        $personagem->setResistence(5);
        $form = $this->createForm('AppBundle\Form\PersonagemType', $personagem);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($personagem);
            $em->flush();

            return $this->redirectToRoute('personagem_show', array('id' => $personagem->getId()));
        }

        return $this->render('personagem/new.html.twig', array(
            'personagem' => $personagem,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a personagem entity.
     *
     * @Route("/{id}", name="personagem_show")
     * @Method("GET")
     */
    public function showAction(Personagem $personagem)
    {
        $deleteForm = $this->createDeleteForm($personagem);

        return $this->render('personagem/show.html.twig', array(
            'personagem' => $personagem,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing personagem entity.
     *
     * @Route("/{id}/edit", name="personagem_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Personagem $personagem)
    {
        $deleteForm = $this->createDeleteForm($personagem);
        $editForm = $this->createForm('AppBundle\Form\PersonagemType', $personagem);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('personagem_edit', array('id' => $personagem->getId()));
        }

        return $this->render('personagem/edit.html.twig', array(
            'personagem' => $personagem,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a personagem entity.
     *
     * @Route("/{id}", name="personagem_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Personagem $personagem)
    {
        $form = $this->createDeleteForm($personagem);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($personagem);
            $em->flush();
        }

        return $this->redirectToRoute('personagem_index');
    }

    /**
     * Creates a form to delete a personagem entity.
     *
     * @param Personagem $personagem The personagem entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Personagem $personagem)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('personagem_delete', array('id' => $personagem->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
