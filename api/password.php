<?php
declare(strict_types=1);

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: /');
    exit;
}

$username = trim((string)($_POST['username'] ?? ''));
$demoUser = 'demo.capacitacion@busman.example';
$demoPass = 'DEMO-Busman2026';

if (!hash_equals($demoUser, $username)) {
    http_response_code(400);
    exit('Valor rechazado. Usa únicamente el usuario DEMO mostrado en la página.');
}
?>
<!doctype html>
<html lang="es">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width,initial-scale=1">
<title>Escribir contraseña - Simulación educativa</title>
<style>
*{box-sizing:border-box}html,body{margin:0;width:100%;height:100%;overflow:hidden;background:#eef2f8;font-family:"Segoe UI",Arial,sans-serif;color:#1b1b1b}.viewport{width:100vw;height:100vh;display:flex;align-items:center;justify-content:center;overflow:hidden}.scene{position:relative;width:min(100vw,calc(100vh * 2.1177884615));aspect-ratio:1762/832;max-height:100vh;background:url("/background-original.png") center/100% 100% no-repeat;container-type:inline-size}.safe-badge{position:absolute;top:.70cqw;left:.70cqw;z-index:5;padding:.34cqw .56cqw;background:rgba(255,244,206,.98);border:1px solid rgba(226,198,97,.95);border-radius:3px;font-size:.56cqw;font-weight:700;color:#5b4a00}.login-card{position:absolute;left:38.48%;top:26.08%;width:23.04%;height:40.60%;background:#fff;box-shadow:0 2px 7px rgba(0,0,0,.22);padding:2.32cqw 2.38cqw 1.95cqw;overflow:hidden}.brand{display:flex;align-items:center;gap:.35cqw;margin-bottom:1.00cqw}.ms-grid{display:grid;grid-template-columns:.55cqw .55cqw;grid-template-rows:.55cqw .55cqw;gap:.10cqw}.ms-grid span:nth-child(1){background:#f25022}.ms-grid span:nth-child(2){background:#7fba00}.ms-grid span:nth-child(3){background:#00a4ef}.ms-grid span:nth-child(4){background:#ffb900}.ms-name{font-size:1.03cqw;color:#5e5e5e;font-weight:600}.account-line{display:flex;align-items:center;gap:.45cqw;margin-bottom:.80cqw;font-size:.73cqw}.back-link{color:#555;text-decoration:none;font-size:1.15cqw;line-height:1}h1{margin:0 0 .80cqw;font-size:1.28cqw;font-weight:600}.demo-hint{margin:0 0 .55cqw;padding:.38cqw .48cqw;background:#eef6ff;border-left:.18cqw solid #0067b8;font-size:.60cqw;line-height:1.35}input{display:block;width:100%;border:0;border-bottom:2px solid #0067b8;outline:none;background:transparent;padding:.42cqw .05cqw .30cqw;margin:0 0 .70cqw;font-family:inherit;font-size:.76cqw}.forgot{margin:.60cqw 0 0;font-size:.64cqw}.forgot a{color:#0067b8;text-decoration:none}.actions{display:flex;justify-content:flex-end;margin-top:1.55cqw}.btn{width:6.20cqw;height:1.80cqw;border:0;font-family:inherit;font-size:.75cqw;cursor:pointer;background:#0067b8;color:#fff}
</style>
</head>
<body>
<div class="viewport"><div class="scene">
  <div class="safe-badge">SIMULACIÓN EDUCATIVA · NO USE CREDENCIALES REALES</div>
  <section class="login-card">
    <div class="brand"><span class="ms-grid"><span></span><span></span><span></span><span></span></span><span class="ms-name">Microsoft</span></div>
    <div class="account-line"><a class="back-link" href="/" aria-label="Volver">←</a><span><?= htmlspecialchars($username, ENT_QUOTES, 'UTF-8') ?></span></div>
    <h1>Escribir contraseña</h1>
    <p class="demo-hint">Contraseña DEMO: <strong><?= htmlspecialchars($demoPass, ENT_QUOTES, 'UTF-8') ?></strong></p>
    <form action="/submit.php" method="post" autocomplete="off">
      <input type="hidden" name="username" value="<?= htmlspecialchars($username, ENT_QUOTES, 'UTF-8') ?>">
      <input name="password" type="text" placeholder="Contraseña" required pattern="DEMO-Busman2026" title="Usa únicamente la contraseña DEMO mostrada arriba">
      <p class="forgot"><a href="#" onclick="return false;">He olvidado mi contraseña</a></p>
      <div class="actions"><button class="btn" type="submit">Iniciar sesión</button></div>
    </form>
  </section>
</div></div>
</body>
</html>
