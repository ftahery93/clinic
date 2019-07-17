<?php

$id = $_GET['id'];
$payID = $_GET['paymentId'];
$actual_link = 'http://' . $_SERVER['HTTP_HOST'] . dirname($_SERVER['PHP_SELF']) . '/payment/paymentCheckStatus/' . $id . '/' . $payID;
header('location:' . $actual_link);
