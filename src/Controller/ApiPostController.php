<?php

namespace App\Controller;

use Symfony\Component\Mime\Email;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class ApiPostController extends AbstractController
{
    /**
     * @Route("/api/post", name="api_post_index", methods={"GET"})
     */
    public function index(Request $request): Response
    {
        return $this->json($request->getContent(), 200);
    }

    /**
     * @Route("/api/post", name="api_post_store", methods={"POST"})
     */
    public function store(Request $request, MailerInterface $mailer)
    {
        $jsonReceived = $request->getContent();

        $response = new Response();

        $response->headers->set('Access-Control-Allow-Origin', 'json/application');

        // $message = (new Email())
        //     ->from($jsonReceived)
        //     ->to('votreadresse@example.com')
        //     ->subject('Time for Symfony Mailer!')
        //     ->text('Sending emails is fun again!')
        //     ->html('<p>See Twig integration for better HTML integration!</p>');

        // $mailer->send($message);

        return $this->json($jsonReceived, 201);
    }
}
