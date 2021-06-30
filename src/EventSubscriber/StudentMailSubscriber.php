<?php
// src/EventSubscriber/StudentMailSubscriber.php

namespace App\EventSubscriber;

use App\Entity\Student;
use Symfony\Component\Mime\Email;
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

        $message = (new Email())
            ->from('system@example.com')
            ->to('contact.ibnmaalik@gmail.com')
            ->subject('Time for Symfony Mailer!')
            ->text('Sending emails is fun again!')
            ->html('<p>Ibn Maalik!</p>');

        $this->mailer->send($message);
    }
}
