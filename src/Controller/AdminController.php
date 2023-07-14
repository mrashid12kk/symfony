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


class AdminController extends AbstractController
{
    #[Route('/', name: 'app_index', methods: ['GET'])]
    public function index(Request $request,AdminRepository $adminRepository): Response
    {
        $session = $request->getSession();
        if ($session->has("email")) {
            $email = $session->get("email");
            echo $email;
            
        }else{
            return $this->redirectToRoute('login');
           
        }
        return $this->render('admin/index.html.twig', [
            'admins' => $adminRepository->findAll(),
        ]);
    }
    #[Route('/login', name: 'login', methods: ['GET'])]
    public function login(Request $request,AdminRepository $adminRepository): Response
    {
        $session = $request->getSession();
        if ($session->has("email")) {
            return $this->redirectToRoute("customer");
            
        }
        
        return $this->render('admin/login.html.twig');
    }
    #[Route('/logout', name: 'logout', methods: ['GET'])]
    public function logout(Request $request,AdminRepository $adminRepository): Response
    {
        $session = $request->getSession();
        if ($session->has("email")) {
            return $this->redirectToRoute("login");
            
        }
        
        return $this->render('admin/login.html.twig');
    }
    #[Route('/submitLogin', name: 'submitLogin')]
    public function submitLogin(Request $request,AdminRepository $adminRepository): Response
    {
         $email = $request->get('email');
         $password = $request->get('password');
        $user     = $adminRepository->findOneBy(['admin_email'=>$email,'password'=>$password]);
        //dd($user);
    if ($user === null) {
        $this->addFlash('success', 'Categorie ajouté');
        return $this->redirectToRoute('login');
        
    }else{
        $session = $request->getSession();
        $session->set('email', $user->getAdminEmail());
        $session->set('admin_name', $user->getAdminName());
        $session = $request->getSession();
        dd($session);

    }
        return new response('fdfd');

    
    }
   

    #[Route('/new', name: 'app_admin_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $admin = new Admin();
        $form = $this->createForm(Admin1Type::class, $admin);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($admin);
            $entityManager->flush();

            return $this->redirectToRoute('app_admin_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('admin/new.html.twig', [
            'admin' => $admin,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_admin_show', methods: ['GET'])]
    public function show(Admin $admin): Response
    {
        return $this->render('admin/show.html.twig', [
            'admin' => $admin,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_admin_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Admin $admin, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(Admin1Type::class, $admin);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_admin_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('admin/edit.html.twig', [
            'admin' => $admin,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_admin_delete', methods: ['POST'])]
    public function delete(Request $request, Admin $admin, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$admin->getId(), $request->request->get('_token'))) {
            $entityManager->remove($admin);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_admin_index', [], Response::HTTP_SEE_OTHER);
    }
    
    
}
