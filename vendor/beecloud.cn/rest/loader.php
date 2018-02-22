<?php
if(version_compare(PHP_VERSION, '5.3.0','>')) {
    require_once("sdk/src/rest/config.php");
    require_once("sdk/src/rest/network.php");
    require_once("sdk/src/rest/api.php");
    $api = new \beecloud\rest\api();
    $international = new \beecloud\rest\international();
} else {
    require_once("sdk/src/beecloud.php");
    $api = new BCRESTApi();
    $international = new BCRESTInternational();
}