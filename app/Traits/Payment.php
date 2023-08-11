<?php

namespace App\Traits;

use \Cartalyst\Stripe\Stripe;
use Exception;

trait Payment {
    public function charge($data) {
        $stripe = new Stripe(env('STRIPE_SECRET'));

        $response = ['success' => true];

        try {
            $token = $stripe->tokens()->create([
                'card' => [
                    'number' => $data['card-no'],
                    'exp_month' => $data['expiry-month'],
                    'exp_year' => $data['expiry-year'],
                    'cvc' => $data['cvv'],
                ]
            ]);

            if (!isset($token['id'])) {
                $response['success'] = false;

                return $response;
            } else {
                $charge = $stripe->charges()->create([
                    'card' => $token['id'],
                    'currency' => 'USD',
                    'amount' => $data['price'],
                    'description' => 'Payment for service: ' . $data['name'],
                    ]);

                if($charge['status'] != 'succeeded') {
                    $response['success'] = false;
                }
            }

            return $response;            
        } catch (Exception $ex) {
            $response['success'] = false;

            return $response;
        }
    }
}