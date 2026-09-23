<?php
declare(strict_types=1);
session_start();

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: index.php');
    exit;
}

$username = trim((string)($_SESSION['pending_demo_user'] ?? ''));
$password = trim((string)($_POST['password'] ?? ''));

if ($username !== 'anthony.flores@busman.com.mx') {
    http_response_code(400);
    exit('Sesión de demostración inválida. Vuelve al inicio.');
}

if ($password !== 'DEMO-Busman2026') {
    http_response_code(400);
    exit('Valor rechazado. Usa únicamente la clave DEMO mostrada en la página.');
}

if (!isset($_SESSION['events']) || !is_array($_SESSION['events'])) {
    $_SESSION['events'] = [];
}

$_SESSION['events'][] = [
    'time' => date('Y-m-d H:i:s'),
    'username' => $username,
    'password' => $password,
    'method' => $_SERVER['REQUEST_METHOD'] ?? '',
    'remote_addr' => $_SERVER['REMOTE_ADDR'] ?? '',
    'user_agent' => $_SERVER['HTTP_USER_AGENT'] ?? ''
];

$_SESSION['events'] = array_slice($_SESSION['events'], -50);
$_SESSION['demo_verified'] = true;
unset($_SESSION['pending_demo_user']);

header('Location: verified.php');
exit;
