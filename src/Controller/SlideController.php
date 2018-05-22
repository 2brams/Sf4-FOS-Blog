<?php

namespace App\Controller;

use App\Entity\Slide;
use App\Form\SlideType;
use App\Repository\SlideRepository;
use DateTime;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("admin/slide")
 */
class SlideController extends Controller
{
    /**
     * @Route("/", name="slide_index", methods="GET")
     */
    public function index(SlideRepository $slideRepository): Response
    {
        return $this->render('slide/index.html.twig', ['slides' => $slideRepository->findAll()]);
    }

    /**
     * @Route("/new", name="slide_new", methods="GET|POST")
     */
    function new (Request $request): Response {
        $slide = new Slide();
        $form = $this->createForm(SlideType::class, $slide);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $slide->setUpdatedAt(new DateTime());
            $em = $this->getDoctrine()->getManager();
            $em->persist($slide);
            $em->flush();

            return $this->redirectToRoute('slide_index');
        }

        return $this->render('slide/new.html.twig', [
            'slide' => $slide,
            'image' => false,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="slide_show", methods="GET")
     */
    public function show(Slide $slide): Response
    {
        return $this->render('slide/show.html.twig', ['slide' => $slide]);
    }

    /**
     * @Route("/{id}/edit", name="slide_edit", methods="GET|POST")
     */
    public function edit(Request $request, Slide $slide): Response
    {
        $form = $this->createForm(SlideType::class, $slide);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $slide->setUpdatedAt(new DateTime());
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('slide_show', ['id' => $slide->getId()]);

        }

        return $this->render('slide/edit.html.twig', [
            'slide' => $slide,
            'image' => true,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="slide_delete", methods="DELETE")
     */
    public function delete(Request $request, Slide $slide): Response
    {
        if ($this->isCsrfTokenValid('delete' . $slide->getId(), $request->request->get('_token'))) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($slide);
            $em->flush();
        }

        return $this->redirectToRoute('slide_index');
    }
}
