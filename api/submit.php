<?php
declare(strict_types=1);

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: index.php');
    exit;
}

$username = trim((string)($_POST['username'] ?? ''));
$password = trim((string)($_POST['password'] ?? ''));

if ($username !== 'anthony.flores@busman.com.mx') {
    http_response_code(400);
    exit('Usuario DEMO inválido. Vuelve al inicio.');
}

if ($password !== 'DEMO-Busman2026') {
    http_response_code(400);
    exit('Valor rechazado. Usa únicamente la clave DEMO configurada.');
}

// Vercel ejecuta cada endpoint como una función independiente. Por eso este
// flujo no usa $_SESSION ni almacenamiento temporal del servidor.
header('Location: verified.php?demo=ok');
exit;
