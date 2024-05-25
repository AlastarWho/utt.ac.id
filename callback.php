<?php
require_once 'vendor/autoload.php';
session_start();

$client = new Google_Client();
$client->setAuthConfig('idclient.json'); // Sesuaikan dengan nama file konfigurasi Anda
$client->setRedirectUri('http://localhost/revisi_semester2/callback.php'); // Sesuaikan dengan URI pengalihan yang Anda tentukan
$client->addScope(Google_Service_Oauth2::USERINFO_PROFILE);
$client->addScope(Google_Service_Oauth2::USERINFO_EMAIL);

if (isset($_GET['code'])) {
    try {
        $token = $client->fetchAccessTokenWithAuthCode($_GET['code']);
        if (!isset($token['error'])) {
            $_SESSION['access_token'] = $token;
            $oauth2 = new Google_Service_Oauth2($client);
            $userInfo = $oauth2->userinfo->get();
            $_SESSION['user_info'] = [
                'name' => $userInfo->getName(),
                'email' => $userInfo->getEmail()
            ];
            header('Location: index.php'); // Sesuaikan dengan halaman tujuan setelah berhasil login
            exit;
        } else {
            echo "Error: " . $token['error'];
        }
    } catch (Exception $e) {
        echo "Exception: " . $e->getMessage();
    }
} else {
    echo "Authorization code not found.";
}
?>
