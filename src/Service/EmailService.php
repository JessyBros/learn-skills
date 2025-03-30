<?php

namespace App\Service;

use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Email;

class EmailService
{
    private MailerInterface $mailer;

    public function __construct(MailerInterface $mailer)
    {
        $this->mailer = $mailer;
    }

    public function sendEmail(): void
    {
        $email = (new Email())
            ->from('noreply@example.com')
            ->to('recipient@example.com')
            ->subject('Test Email')
            ->text('Ceci est un e-mail de test envoyé depuis Symfony.')
            ->html('<p>Ceci est un <strong>e-mail de test</strong> envoyé depuis Symfony.</p>');


        $this->mailer->send($email);
    }
}
