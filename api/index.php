<?php
declare(strict_types=1);
$demoUser = 'demo.capacitacion@busman.example';
?>
<!doctype html>
<html lang="es">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width,initial-scale=1">
<title>Simulación educativa de inicio de sesión</title>
<style>
*{box-sizing:border-box}
html,body{margin:0;width:100%;height:100%;overflow:hidden;background:#eef2f8;font-family:"Segoe UI",Arial,sans-serif;color:#1b1b1b}
.viewport{width:100vw;height:100vh;display:flex;align-items:center;justify-content:center;overflow:hidden}
.scene{position:relative;width:min(100vw,calc(100vh * 2.1177884615));aspect-ratio:1762/832;max-height:100vh;background:url("/background-original.png") center/100% 100% no-repeat;container-type:inline-size}
.safe-badge{position:absolute;top:.70cqw;left:.70cqw;z-index:5;padding:.34cqw .56cqw;background:rgba(255,244,206,.98);border:1px solid rgba(226,198,97,.95);border-radius:3px;font-size:.56cqw;font-weight:700;color:#5b4a00}
.login-card{position:absolute;left:38.48%;top:26.08%;width:23.04%;height:37.50%;background:#fff;box-shadow:0 2px 7px rgba(0,0,0,.22);padding:2.32cqw 2.38cqw 1.95cqw;overflow:hidden}
.options{position:absolute;left:38.48%;top:65.75%;width:23.04%;height:5.41%;border:0;background:#fff;box-shadow:0 2px 7px rgba(0,0,0,.22);display:flex;align-items:center;padding-left:2.35cqw;gap:.78cqw;font-family:inherit;font-size:.83cqw;color:#333}
.brand{display:flex;align-items:center;gap:.35cqw;margin-bottom:1.05cqw}.ms-grid{display:grid;grid-template-columns:.55cqw .55cqw;grid-template-rows:.55cqw .55cqw;gap:.10cqw}.ms-grid span:nth-child(1){background:#f25022}.ms-grid span:nth-child(2){background:#7fba00}.ms-grid span:nth-child(3){background:#00a4ef}.ms-grid span:nth-child(4){background:#ffb900}.ms-name{font-size:1.03cqw;color:#5e5e5e;font-weight:600}
h1{margin:0 0 .85cqw;font-size:1.28cqw;font-weight:600}.demo-hint{margin:0 0 .60cqw;padding:.40cqw .48cqw;background:#eef6ff;border-left:.18cqw solid #0067b8;font-size:.60cqw;line-height:1.35}
input{display:block;width:100%;border:0;border-bottom:1px solid #777;outline:none;background:transparent;padding:.40cqw .05cqw .30cqw;margin:0 0 .60cqw;font-family:inherit;font-size:.76cqw}input:focus{border-bottom:2px solid #0067b8}.info{margin:.62cqw 0 0;font-size:.64cqw;line-height:1.45}.info a{color:#0067b8;text-decoration:none}.help{margin-top:.72cqw}.actions{display:flex;justify-content:flex-end;gap:.25cqw;margin-top:1.08cqw}.btn{width:5.65cqw;height:1.73cqw;border:0;font-family:inherit;font-size:.75cqw;cursor:pointer}.secondary{background:#d0d0d0;color:#111}.primary{background:#3568b8;color:#fff}.key-icon{width:1.25cqw;height:1.25cqw;display:inline-flex}.key-icon svg{width:100%;height:100%}
</style>
</head>
<body>
<div class="viewport"><div class="scene">
  <div class="safe-badge">SIMULACIÓN EDUCATIVA · NO USE CREDENCIALES REALES</div>
  <section class="login-card">
    <div class="brand"><span class="ms-grid"><span></span><span></span><span></span><span></span></span><span class="ms-name">Microsoft</span></div>
    <h1>Iniciar sesión</h1>
    <p class="demo-hint">Usuario de demostración: <strong><?= htmlspecialchars($demoUser, ENT_QUOTES, 'UTF-8') ?></strong></p>
    <form action="/password.php" method="post" autocomplete="off">
      <input name="username" type="text" placeholder="Correo electrónico, teléfono o Skype" required pattern="demo\.capacitacion@busman\.example" title="Usa únicamente el usuario DEMO mostrado arriba">
      <p class="info">¿No tiene una cuenta? <a href="#" onclick="return false;">Cree una.</a></p>
      <p class="info help"><a href="#" onclick="return false;">¿No puede acceder a su cuenta?</a></p>
      <div class="actions"><button class="btn secondary" type="reset">Atrás</button><button class="btn primary" type="submit">Siguiente</button></div>
    </form>
  </section>
  <button class="options" type="button"><span class="key-icon"><svg viewBox="0 0 24 24" fill="none"><circle cx="8" cy="8" r="4.3" stroke="currentColor" stroke-width="1.5"/><path d="M11.2 11.2L20 20M16.2 16.2L18 14.4M18.2 18.2L20 16.4" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"/></svg></span><span>Opciones de inicio de sesión</span></button>
</div></div>
</body>
</html>
