<?php

require_once __DIR__ . "/../vendor/autoload.php";

use Razorpay\Api\Api;

$keyId = "rzp_test_THNC3CVq0UUfCC";
$keySecret = "Sgu4cN9XiC49B1dvSfoMd0HL";

$api = new Api($keyId, $keySecret);