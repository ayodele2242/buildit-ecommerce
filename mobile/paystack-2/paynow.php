<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

$_POST = json_decode(file_get_contents('php://input'), true);
//pull in the database
//require 'dbconfig.php';
require 'Paystack.php';

// Capture Post Data that is coming from the form
$name = $_POST['name'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$amount = $_POST['amount'];




$paystack = new Paystack('sk_live_f3eca3ac348415810cf6776dcef154aa434977e3');
// the code below throws an exception if there was a problem completing the request, 
// else returns an object created from the json response
        // the code below throws an exception if there was a problem completing the request,
        // else returns an object created from the json response
        $trx = $paystack->transaction->initialize(
        [
            'amount'=> $amount, /* 20 naira */
            'email'=> $email,
            'callback_url'=>'https://fagdevsoft.com/buildit/mobile/verify.php',
            'metadata' => json_encode([
                'custom_fields'=> [
                    [
                    'display_name'=> "First Name",
                    'variable_name'=> "first_name",
                    'value'=> $name
                    ],
                    [
                    'display_name'=> "Last Name",
                    'variable_name'=> "last_name",
                    'value'=> 'awlo'
                    ],
                    [
                    'display_name'=> "Mobile Number",
                    'variable_name'=> "mobile_number",
                    'value'=> $phone
                    ]
                ]
            ])
        ]
        );

        // status should be true if there was a successful call
        // if (!$trx->status) {
        //     exit($trx->message);
        // }


        echo json_encode($trx->data->authorization_url);

// full sample initialize response is here: https://developers.paystack.co/docs/initialize-a-transaction
// Get the user to click link to start payment or simply redirect to the url generated
//header('Location: ' . $trx->data->authorization_url);
