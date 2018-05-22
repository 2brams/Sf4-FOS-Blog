<?php

namespace App\Controller;

use App\Repository\SlideRepository;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{

    /**
     *@Route("/",name="home_page")
     */
    public function index(SlideRepository $slideRepository)
    {
        return $this->render('landing/homepage.html.twig', [
            'slides' => $slideRepository->findAll(),
        ]);
    }
    /**
     *@Route("/login_ok",name="login_ok")
     *
     *@Security("has_role('ROLE_USER')")
     *
     */
    public function login_ok()
    {
        return $this->render('login_success.html.twig');
    }
    /**
     *@Route("/client",name="client_page")
     */
    public function client()
    {
        return $this->render('client.html.twig');
    }
    /**
     *@Route("/admin",name="admin_page")
     */
    public function admin()
    {
        return $this->render('admin/admin.html.twig');
    }

    /**
     * @Route("/user", name="user_info")
     *
     * @Security("is_granted('IS_AUTHENTICATED_FULLY')")
     */
    public function showUser()
    {
        if ($this->get('security.authorization_checker')->isGranted('ROLE_ADMIN')) {
            return $this->render('admin.html.twig');
        }
        if ($this->get('security.authorization_checker')->isGranted('ROLE_USER')) {
            return $this->render('client.html.twig');
        }

    }

}
