<?php

    if($_SERVER['REQUEST_METHOD'] != 'POST'){
        header("Location:index.php");
        exit;
    }

    $name         = trim($_POST['name']);
    $contactno    = trim($_POST['contactno']);
    $email        = trim($_POST['email']);
    $course       = trim($_POST['selectcourse']);
    $state    = trim($_POST['state']);
    $message      = trim($_POST['message']);
    $domain       = $_SERVER['HTTP_HOST'];

    /*
    |--------------------------------------------------------------------------
    | LeadSquared Credentials
    |--------------------------------------------------------------------------
    */

    $accessKey = 'u$rd947bff097d689e952c3137c436749e1';
    $secretKey = 'ab0bc2b7779a4ea2e104b059018b72a21d9b66ce';

    $data = [
        [
            "Attribute" => "FirstName",
            "Value" => $name
        ],

        [
            "Attribute" => "Phone",
            "Value" => $contactno
        ],

        [
            "Attribute" => "mx_Course",
            "Value" => $course
        ],

        [
            "Attribute" => "mx_State_New",
            "Value" => $state
        ],

        [
            "Attribute" => "Notes",
            "Value" => $message
        ],

        [
            "Attribute" => "Source",
            "Value" => "Organic Marwadi"
        ],

        [
            "Attribute" => "mx_Source_URL",
            "Value" => $domain
        ],

        [
            "Attribute" => "mx_Sub_Source",
            "Value" => "Website"
        ]

    ];

    if(!empty($email)){
        $data[] = [
            "Attribute" => "EmailAddress",
            "Value" => $email
        ];
    }

    $url = "https://api-in21.leadsquared.com/v2/LeadManagement.svc/Lead.Capture?accessKey=".$accessKey."&secretKey=".$secretKey;

    $ch = curl_init();

    curl_setopt_array($ch,[
        CURLOPT_URL => $url,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_POST => true,
        CURLOPT_POSTFIELDS => json_encode($data),
        CURLOPT_HTTPHEADER => [
            "Content-Type: application/json"
        ]
    ]);

    $response = curl_exec($ch);
    $error = curl_error($ch);

    curl_close($ch);

    if($error){
        header("Location:index.php?error=1");
        exit;
    }

    $result = json_decode($response,true);

    if(
        isset($result['Status']) &&
        $result['Status'] == 'Success'
    ){
        header("Location:index.php?success=1");
        exit;
    }else{
        header("Location:index.php?error=1");
        exit;
    }