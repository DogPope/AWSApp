<?php
use Aws\SecretsManager\SecretManagerClient;
use Aws\Exception\AwsException;
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
$client = new SecretManagerClient([
    'region' => "eu-west-1",
    'version' => 'latest'
]);

$result = $client->getSecretValue([
    'SecretId' => $_ENV["SECRET_NAME"]
]);

$myJSON = json_decode($result['SecretString']);
define('DB_SERVER', $_ENV['DB_ENDPOINT']);
define('DB_USERNAME', $myJSON->username);
define('DB_PASSWORD', $myJSON->password);
define('DB_DATABASE', $_ENV['DB_NAME']);

$db = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_DATABASE);
?>