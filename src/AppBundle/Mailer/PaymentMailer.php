<?php
/**
 * Created by PhpStorm.
 * User: Suraj Gusain
 * Date: 27-10-2017
 * Time: 15:48
 */

namespace AppBundle\Mailer;


use AppBundle\Command\PaymentCommand;

class PaymentMailer
{

    protected $mailer;
    /**@var \Symfony\Bundle\TwigBundle\TwigEngine */
    protected $templating;

    public function __construct(\Swift_Mailer $mailer, $templating)
    {
        $this->mailer = $mailer;
        $this->templating = $templating;
    }

    public function sendPaymentToSenderEmail(PaymentCommand $command, $invoice_id)
    {

        try {
            $message = (new \Swift_Message())
                ->setFrom($command->getFrom())
                ->setTo($command->getTo())
                ->setSubject('Payment done')
                ->setBody(

                    $this->templating->render('from_payment_details.html.twig',
                        [
                            'amount' => $command->getAmount(),
                            'from_email' => $command->getTo(),
                            'invoice_id' => $invoice_id
                        ])
                );

            $this->mailer->send($message);

        } catch (\Swift_TransportException $e) {
            throw new \Swift_TransportException($e->getMessage());
        }
    }

    public function sendPaymentToReceiverEmail(PaymentCommand $command, $invoice_id) {

        try {
            $message = (new \Swift_Message())
                ->setFrom($command->getTo())
                ->setTo($command->getFrom())
                ->setSubject('Payment credited')
                ->setBody(

                    $this->templating->render('to_payment_details.html.twig',
                        [
                            'amount' => $command->getAmount(),
                            'from_email' => $command->getTo(),
                            'invoice_id' => $invoice_id
                        ])
                );

            $this->mailer->send($message);

        } catch (\Swift_TransportException $e) {
            throw new \Swift_TransportException($e->getMessage());
        }
    }

}