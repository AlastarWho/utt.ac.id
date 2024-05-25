<?php
require_once 'vendor/autoload.php';

session_start();

$client = new Google_Client();
$client->setAuthConfig('idclient.json'); // Ganti dengan nama file konfigurasi Anda
$client->setRedirectUri('http://localhost/revisi_semester2/callback.php'); // Sesuaikan dengan URI pengalihan yang Anda tentukan
$client->addScope(Google_Service_Oauth2::USERINFO_PROFILE);
$client->addScope(Google_Service_Oauth2::USERINFO_EMAIL);

if (isset($_SESSION['access_token']) && $_SESSION['access_token']) {
    header('Location: index.php'); // Jika pengguna sudah login, arahkan ke halaman utama
    exit;
} else {
    $authUrl = $client->createAuthUrl();
    echo '<a href="' . $authUrl . '"></a>';
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .container {
            margin-top: 100px;
        }
        .card {
            border: none;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .card-header {
            background-color: #007bff;
            color: #fff;
            text-align: center;
            border-radius: 10px 10px 0 0;
        }
        .card-body {
            padding: 30px;
        }
        .btn-login {
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 5px;
            padding: 10px 20px;
            cursor: pointer;
        }
        .btn-login:hover {
            background-color: #0056b3;
        }
        .icon-google {
            margin-right: 10px;
        }
    </style>
</head>
<body>
    
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h3>Login with Google</h3>
                </div>
                <div class="card-body">
                    <p>Agar bisa melanjutkan ke Dashboard, silakan login dengan akun Google Anda.</p>
                    <a href="<?php echo $authUrl; ?>" class="btn btn-login btn-block">
                        <i class="fab fa-google icon-google"></i>
                        Login with Google
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Memuat script Bootstrap dan Font Awesome -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/js/all.min.js"></script>

</body>
</html>
