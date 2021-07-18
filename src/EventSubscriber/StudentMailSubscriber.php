<?php
// src/EventSubscriber/StudentMailSubscriber.php

namespace App\EventSubscriber;

use App\Entity\Student;
use Symfony\Component\Mime\Email;
use Symfony\Bridge\Twig\Mime\TemplatedEmail;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\HttpKernel\KernelEvents;
use Symfony\Component\HttpKernel\Event\ViewEvent;
use ApiPlatform\Core\EventListener\EventPriorities;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;

final class StudentMailSubscriber implements EventSubscriberInterface
{
    private $mailer;

    public function __construct(MailerInterface $mailer)
    {
        $this->mailer = $mailer;
    }

    public static function getSubscribedEvents()
    {
        return [
            KernelEvents::VIEW => ['sendMail', EventPriorities::POST_WRITE],
        ];
    }

    public function sendMail(ViewEvent $event): void
    {
        $student = $event->getControllerResult();
        $method = $event->getRequest()->getMethod();


        if (!$student instanceof Student || Request::METHOD_POST !== $method) {
            return;
        }

        $message = (new TemplatedEmail())
            ->from($student->getEmail())
            ->to('contact.ibnmaalik@gmail.com')
            ->subject('Time for Symfony Mailer!')
            ->text('Sending emails is fun again!')
            ->htmlTemplate('emails/student_view.html.twig')
            ->context([
                'student' => $student
            ]);

        $this->mailer->send($message);

        $message1 = (new TemplatedEmail())
            ->from('contact.ibnmaalik@gmail.com')
            ->to($student->getEmail())
            ->subject('Confirmation d\'inscription')
            ->text('Sending emails is fun again!')
            ->htmlTemplate('emails/student_confirmation.html.twig');

        $this->mailer->send($message1);
    }
}
