<?php
$plan = $_GET['plan'] ?? null;
$user_id = $_GET['user_id'] ?? 1;
$callback_url = "https://localhost/mobile-event-planner/plan/callback_handler.php";

if ($plan === 'monthly') {
    $amount = 29900;
    $description = "Monthly Organizer Plan";
} elseif ($plan === 'yearly') {
    $amount = 349900;
    $description = "Yearly Organizer Plan";
} else {
    die("Invalid plan selected.");
}

$curl = curl_init();

curl_setopt_array($curl, [
    CURLOPT_URL => "https://api.paymongo.com/v1/links",
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 30,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => "POST",
    CURLOPT_POSTFIELDS => json_encode([
        'data' => [
            'attributes' => [
                'amount' => $amount,
                'description' => $description,
                'remarks' => $description,
                'callback_url' => $callback_url
            ]
        ]
    ]),
    CURLOPT_HTTPHEADER => [
        "accept: application/json",
        "authorization: Basic c2tfdGVzdF95b3RFcnpkQzc5REdmdWVLZzd1UG5kaEU6",
        "content-type: application/json"
    ],
]);

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);

if ($err) {
    echo "cURL Error #:" . $err;
} else {
    $response_data = json_decode($response, true);

    // Check the response
    $payment_url = $response_data['data']['attributes']['checkout_url'] ?? null;

    if ($payment_url) {
        header("Location: " . $payment_url);
        exit;
    } else {
        echo "Failed to get payment link.";
    }
}
?>