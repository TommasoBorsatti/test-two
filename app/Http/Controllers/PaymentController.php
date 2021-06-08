<?php

namespace App\Http\Controllers;

use App\Guest;
use App\Http\Controllers\Controller;
use Braintree\PaymentMethod;
use Braintree\PaymentMethodNonce;
use Braintree\Transaction;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
     public function process(Request $request) 
     {
         
           // get your logged in customer
           $customer = Guest::first();
           
           // when client hit checkout button
           if( $request->isMethod('post') ) 
           {
                // brain tree customer payment nouce
                $payment_method_nonce = $request->get('payment_method_nonce');

                // make sure that if we do not have customer nonce already
                // then we create nonce and save it to our database
                if ( !$customer->braintree_nonce ) 
                {
                      // once we recieved customer payment nonce
                      // we have to save this nonce to our customer table
                      // so that next time user does not need to enter his credit card details
                      $result = PaymentMethod::create([
                        'customerId' => $customer->braintree_customer_id,
                        'paymentMethodNonce' => $payment_method_nonce
                      ]);

                      // save this nonce to customer table
                      $customer->braintree_nonce = $result->paymentMethod->token;
                      $customer->save();
                }
                
                // process the customer payment
                $client_nonce = PaymentMethodNonce::create($customer->braintree_nonce);
                $result = Transaction::sale([
                     'amount' => 100,
                     'options' => [ 'submitForSettlement' => True ],
                     'paymentMethodNonce' => $client_nonce->paymentMethodNonce->nonce
                ]);

                // check to see if braintree has processed
                // our client purchase transaction
                if( !empty($result->transaction) ) {
                    // your customer payment is done successfully  
                }
           }
           return view('checkout', [
              'braintree_customer_id' => $customer->braintree_customer_id
           ]);
     }
}