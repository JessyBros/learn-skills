<?php

namespace App\Controller;

use App\Service\EmailService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MailController extends AbstractController
{
    public function __construct(private EmailService $emailService) {}

    #[Route('/send-email', name: 'send_email')]
    public function sendEmail(): Response
    {
        $this->emailService->sendEmail();

        return new Response('E-mail envoyé avec succès !');
    }
}
