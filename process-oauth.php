<?php
include("config.php");
if (!isset($_GET['code'])) {
    die("no code available");
}

$discord_code = $_GET['code'];


$payload = [
    'code' => $discord_code,
    'client_id' => $client_id,
    'client_secret' => $secret,
    'grant_type' => 'authorization_code',
    'redirect_uri' => $redirect_uri,
    'scope' => 'identify%20email',
];

$payload_string = http_build_query($payload);
$discord_token_url = "https://discordapp.com/api/oauth2/token";

$curl = curl_init();
curl_setopt($curl, CURLOPT_URL, $discord_token_url);
curl_setopt($curl, CURLOPT_POST, true);
curl_setopt($curl, CURLOPT_POSTFIELDS, $payload_string);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0);
$result = curl_exec($curl);
curl_close($curl);

if (!$result) {
    echo curl_error($ch);
}

$result = json_decode($result, true);
$access_token = $result['access_token'];

echo "The Access Token : $access_token<br>";

$discord_user_url = "https://discordapp.com/api/v6/users/@me";
$header = array("Authorization: Bearer $access_token", "Content-Type: application/x-www-form-urlencoded");



$curl = curl_init();
curl_setopt($curl, CURLOPT_HTTPHEADER, $header);
curl_setopt($curl, CURLOPT_URL, $discord_user_url);
curl_setopt($curl, CURLOPT_POST, false);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0);
$result = curl_exec($curl);
echo $result;

$result = json_decode($result, true);
session_start();
$_SESSION['loggedin'] = true;
$_SESSION['userData'] = [
    'name' => $result['username'],
    'discord_id' => $result['id'],
    'avatar' => $result['avatar'],
    'email' => $result['email'],
];
