<?php

require_once 'F:/webdev/htdocs/google-drive/vendor/autoload.php';

function getConfig() {
    $config = file_get_contents('F:/webdev/htdocs/google-drive/config/config.json');
    $config = json_decode($config);
    return $config;
}

function getCredentials() {
    $credentials = file_get_contents('F:/webdev/htdocs/google-drive/config/token.json');
    return $credentials;
}

function getAuthUrl() {
    $config = getConfig();
    $client = new Google_Client();
    $client->setApplicationName($config->application_name);
    $client->setAuthConfigFile($config->credentials_path);
    $client->setScopes($config->scopes);
    $client->setAccessType($config->access_type);
    return $client->createAuthUrl();
}

function exchangeCode($authcode) {
    $config = getConfig();
    $client = new Google_Client();
    $client->setAuthConfigFile($config->credentials_path);
    $token = $client->fetchAccessTokenWithAuthCode($authcode);
    $token = json_encode($token);
    file_put_contents('F:/webdev/htdocs/google-drive/config/token.json', $token);
}

function getDriveService() {
    $client = new Google_Client();
    $credentials = getCredentials();
    $client->setAccessToken($credentials);
    return new Google_Service_Drive($client);
}