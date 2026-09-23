<?php
declare(strict_types=1);

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: /');
    exit;
}

$demoUser = 'demo.capacitacion@busman.example';
$demoPass = 'DEMO-Busman2026';
$username = trim((string)($_POST['username'] ?? ''));
$password = trim((string)($_POST['password'] ?? ''));

if (!hash_equals($demoUser, $username) || !hash_equals($demoPass, $password)) {
    http_response_code(400);
    exit('Valor rechazado. Este simulador solo acepta las credenciales DEMO mostradas en pantalla.');
}

// No se guardan credenciales, IPs ni User-Agent en el servidor.
// El evento educativo se registra únicamente en localStorage del navegador.
?>
<!doctype html>
<html lang="es">
<head><meta charset="utf-8"><meta name="viewport" content="width=device-width,initial-scale=1"><title>Procesando demostración</title></head>
<body>
<script>
(() => {
  try {
    const key = 'busman_demo_events';
    const events = JSON.parse(localStorage.getItem(key) || '[]');
    events.push({time: new Date().toISOString(), user: 'demo.capacitacion@busman.example', status: 'DEMO completado'});
    localStorage.setItem(key, JSON.stringify(events.slice(-50)));
  } catch (e) {}
  window.location.replace('/verified.php?demo=1');
})();
</script>
<noscript><meta http-equiv="refresh" content="0;url=/verified.php?demo=1"></noscript>
</body>
</html>
