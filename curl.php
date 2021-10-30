<?php

$userData = array("username" => "loser", "password" => "LOSERforever1");
$ch = curl_init("http://magento2.local/rest/V1/integration/admin/token");
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($userData));
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, array("Content-Type: application/json", "Content-Lenght: " . strlen(json_encode($userData))));
$token = curl_exec($ch);
//echo $token;

$ch = curl_init("http://magento2.local/rest/V1/customers/2");
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, array("Content-Type: application/json", "Authorization: Bearer " . json_decode($token)));
$result = curl_exec($ch);
//echo $result;

$url = 'http://magento2.local/rest/V1/customers/search';
$params =[
    'search_criteria[filter_groups][0][filters][0][field]' => 'email',
    'search_criteria[filter_groups][0][filters][0][value]' => 'test%',
    'search_criteria[filter_groups][0][filters][0][condition_type]' => 'like',
    'search_criteria[sortOrders][0][field]' => 'email',
];
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url.'?'.http_build_query($params));
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, array("Content-Type: application/json", "Authorization: Bearer " . json_decode($token)));
$result = curl_exec($ch);
//echo $result;

$ch = curl_init("http://magento2.local/rest/V1/products/24-MB01");
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, array("Content-Type: application/json", "Authorization: Bearer " . json_decode($token)));
$result = curl_exec($ch);
//echo $result;

$ch = curl_init("http://magento2.local/rest/V1/module7/listing/2");
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, array("Content-Type: application/json", "Authorization: Bearer " . json_decode($token)));
$result = curl_exec($ch);
//echo $result;

?>

