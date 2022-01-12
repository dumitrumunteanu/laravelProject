<?php

namespace App\Services;

use Illuminate\Mail\Mailer;
use Illuminate\Mail\Message;
use Psr\Log\LoggerInterface;

class ContactMailer {
    private Mailer $mailer;
    private LoggerInterface $logger;

    public function __construct(Mailer $mailer, LoggerInterface $logger) {
        $this->mailer = $mailer;
        $this->logger = $logger;
    }

    public function send(array $data) {
        $this->mailer->send(
            'emails.contact',
            [
                'firstName' => $data['first-name'],
                'lastName' => $data['last-name'],
                'email' => $data['email'],
                'department' => $data['department'],
                'content' => $data['message'],
            ],
            function (Message $message) use ($data) {
                $message->subject('User requested attention');
                $message->to('contact@organizer.com');
                $message->from($data['email']);
            }
        );
        $this->logger->info('Message sent with: ', $data);

    }
}
