<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\RegistrationType;
use App\Repository\UserRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class AdminController extends AbstractController
{
    private $entityManager;
    private $userRepository;
    public function __construct(EntityManagerInterface $entityManager, UserRepository $userRepository)
    {
        $this->entityManager = $entityManager;
        $this->userRepository = $userRepository;
    }
    #[Route('/admin', name: 'admin_list_users')]
    public function showUser(): Response
    {
        $users = $this->userRepository->findAll();
        return $this->render('admin/index.html.twig', [
            'users' => $users,
        ]);
    }
    #[Route('/admin/{id}/edit', name: 'admin_edit_user', methods: ['GET', 'POST'])]
    public function editUser(Request $request,$id)
    {
        $user = $this->userRepository->find($id);
        $form = $this->createForm(RegistrationType::class, $user);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $this->entityManager->flush();
            $this->addFlash('successEdit', 'User updated successfully.');
            return $this->redirectToRoute('admin_list_users');
        }
        return $this->render('admin/edit_user.html.twig', [
            'user' => $user,
            'form' => $form->createView(),
        ]);
    }
    #[Route('/admin/{id}/delete', name: 'admin_delete_user' )]
    public function deleteUser($id): Response
    {
        $user = $this->entityManager->getRepository(User::class)->find($id);
        $this->entityManager->remove($user);
        $this->addFlash("successDelete", "User successfully removed");
        $this->entityManager->flush();
        return $this->redirectToRoute('admin_list_users');
    }
}
