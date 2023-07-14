<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CustomerController extends AbstractController
{
    #[Route('admin/customer', name: 'customer')]
    public function index(Request $request): Response
    {
         $session = $request->getSession();
        if ($session->has("email")) {
            return $this->redirectToRoute("login");
            
        }
        return $this->render('customer/index.html.twig', [
            'controller_name' => 'CustomerController',
        ]);
    }
}
