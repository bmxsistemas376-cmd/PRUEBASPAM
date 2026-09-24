<?php
declare(strict_types=1);

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: index.php');
    exit;
}

$username = trim((string)($_POST['username'] ?? ''));
$password = trim((string)($_POST['password'] ?? ''));
$eventId = trim((string)($_POST['event_id'] ?? ''));

if ($eventId !== '' && !preg_match('/^[A-Za-z0-9_-]{1,80}$/', $eventId)) {
    $eventId = '';
}

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
$location = 'verified.php?demo=ok';
if ($eventId !== '') {
    $location .= '&event_id=' . rawurlencode($eventId);
}
header('Location: ' . $location);
exit;
