<?php
//  mkhatrin bili rak ghadi tnsay kifach middleware kaykhdam 10/04/2022
define("MAIN_PATIENT_KEY", "reference");
define("MIDDLEWARE", "middleware");

$arr = explode("\\", dirname(dirname(__DIR__)));
$projectName = end($arr);
define("PROJECT_NAME", $projectName);
