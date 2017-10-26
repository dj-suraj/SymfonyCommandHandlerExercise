<?php
/**
 * Created by PhpStorm.
 * User: asola
 * Date: 25/10/2017
 * Time: 12:33
 */

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

class PaymentController extends Controller
{
    /**
     * @Route("/", name="home")
     */
    public function hometAction(Request $request)
    {
        $bankAccount=$this->get("bank_account");
        return new JsonResponse([
            'amount' => $bankAccount->getAmount(),
            '_links' => [
                'payment-process'=>$this->generateUrl('payment', [], true),
                'transfer-in'=>$this->generateUrl('trainsfer_in', ['amount'=>15], true),
            ]

        ]);
    }

    /**
     * @Route("/process-payment", name="payment")
     */
    public function paymentAction(Request $request)
    {
        /*
         * Implement using Command Form and Handler the following business logic:
         *
         * Input:
         * - From (Email)
         * - To (Email)
         * - Amount (Money)
         *
         * Business requirements:
         * - Create a payment
         * - Process payment
         * - Create invoice
         * - Send Email to From with the payment details and invoice ID and current amount in the account
         * - Send Email to To with the payment details and invoice ID
         * -
         *
         * Controller response:
         * - Invoice ID
         * - Funds in the account
         */
    }

    /**
     * @Route("/transfer-in/{amount}", name="trainsfer_in")
     */
    public function transferInAction(Request $request, $amount)
    {
        $bankAccount=$this->get("bank_account");
        $bankAccount->transfer($amount);
        $bankAccount->persist();
        return new JsonResponse([
            'current_amount'=>$bankAccount->getAmount(),
            'transferred_in'=>$amount
        ]);

    }
}