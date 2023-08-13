<?php

namespace App\Controller;

use App\Entity\User;
use Twig\Environment;
use Aws\Ses\SesClient;
use App\Form\RegistrationType;
use Aws\Exception\AwsException;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

class SecurityController extends AbstractController
{
    #[Route("/", name:"registration")]
    public function registration(Request $request,EntityManagerInterface $entityManager,Environment $twig): Response
    { 
        $user = new User();
        $form = $this->createForm(RegistrationType::class, $user);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $data = $form->getData();
            $entityManager->persist($data);
            $entityManager->flush();
            $sesClient = new SesClient([
                'version' => 'latest',
                'region' => 'eu-north-1',
                'credentials' => [
                    'key' => 'AKIAS5ZPV6OI6D3PIYUQ',
                    'secret' => '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',
                ],
            ]);
        $emailContent = $twig->render('email/email.html.twig', []);
        $emailParams = [
            'Source' => 'mikoajmicht@gmail.com',
            'Destination' => [
                'ToAddresses' => $data->getEmail(),
            ],
            'Message' => [
                'Subject' => [
                    'Data' => 'Confirmation message',
                ],
                'Body' => [
                    'Text' => [
                        'Data' => $emailContent,
                    ],
                ],
            ],
        ];
        try {
            $result = $sesClient->sendEmail($emailParams);
            return $this->json([
                'success' => true,
                'message' => 'E-mail sent successfully',
            ]);
        } catch (AwsException) {
            return $this->json([
                'success' => false,
                'message' => 'An error occurred while sending the email',
            ]);
        }
            $this->addFlash("successCreated", "Account successfully created");
            return $this->redirectToRoute('app_login');
        }
        return $this->render('index.html.twig', [
            'controller_name' => 'DefaultController',
            'registrationForm' => $form->createView(),
        ]);
        
    }
    #[Route(path: '/login', name: 'app_login')]
    public function login(AuthenticationUtils $authenticationUtils): Response
    {
        // if ($this->getUser()) {
        //     return $this->redirectToRoute('target_path');
        // }

        // get the login error if there is one
        $error = $authenticationUtils->getLastAuthenticationError();
        // last username entered by the user
        $lastUsername = $authenticationUtils->getLastUsername();
        return $this->render('security/login.html.twig', ['last_username' => $lastUsername, 'error' => $error]);
    }

    #[Route(path: '/logout', name: 'app_logout')]
    public function logout(): void
    {
        throw new \LogicException('This method can be blank - it will be intercepted by the logout key on your firewall.');
    }

   
}
