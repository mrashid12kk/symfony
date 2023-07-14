<?php

namespace App\Controller;

use App\Entity\Admin;
use App\Form\Admin1Type;
use App\Repository\AdminRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


class HomeController extends AbstractController
{
    #[Route('admin/test2', name: 'test2', methods: ['GET'])]
    public function index(AdminRepository $adminRepository): Response
    {
        
        return new response('admin/index.html.twig');
    }
}
