<?php
require_once("../../loader.php");
require_once("../config.php");

//设置app id, app secret, master secret, test secret
$api->registerApp(APP_ID, APP_SECRET, MASTER_SECRET, TEST_SECRET);
$data["timestamp"] = time() * 1000;
$data["channel"] = "ALI_OFFLINE_QRCODE";
$data["bill_no"] = $_GET["billNo"];
try {
    $result = $api->offline_bill_status($data);
    if ($result->result_code != 0) {
        print_r($result);
        exit();
    }
    echo json_encode($result);
} catch (Exception $e) {
    echo $e->getMessage();
    exit();
}