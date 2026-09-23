<?php
declare(strict_types=1);
session_start();

if (empty($_SESSION['demo_verified'])) {
    header('Location: index.php');
    exit;
}

unset($_SESSION['demo_verified']);
?>
<!doctype html>
<html lang="es">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width,initial-scale=1">
<title>Cuenta verificada</title>
<style>
*{box-sizing:border-box}
html,body{margin:0;width:100%;height:100%;font-family:"Segoe UI",Arial,sans-serif;color:#1b1b1b;background:#eef2f8}
.viewport{width:100vw;height:100vh;display:flex;align-items:center;justify-content:center;overflow:hidden}
.scene{
  position:relative;
  width:min(100vw, calc(100vh * 2.1177884615));
  aspect-ratio:1762 / 832;
  max-height:100vh;
  background:url("background-original.png") center/100% 100% no-repeat;
  container-type:inline-size;
}
.success-card{
  position:absolute;left:38.48%;top:26.08%;width:23.04%;min-height:37.50%;
  background:#fff;box-shadow:0 2px 7px rgba(0,0,0,.22);
  padding:2.45cqw 2.35cqw 2.10cqw;
}
.brand{display:flex;align-items:center;gap:.35cqw;margin-bottom:1.15cqw}
.ms-grid{display:grid;grid-template-columns:.55cqw .55cqw;grid-template-rows:.55cqw .55cqw;gap:.10cqw}
.ms-grid span:nth-child(1){background:#f25022}.ms-grid span:nth-child(2){background:#7fba00}
.ms-grid span:nth-child(3){background:#00a4ef}.ms-grid span:nth-child(4){background:#ffb900}
.ms-name{font-size:1.03cqw;color:#5e5e5e;font-weight:600}
.demo-tag{margin-left:.25cqw;font-size:.48cqw;padding:.10cqw .25cqw;border:1px solid #b8b8b8;border-radius:2px;color:#666}
.check{width:2.7cqw;height:2.7cqw;border-radius:50%;background:#107c10;color:#fff;display:grid;place-items:center;font-size:1.65cqw;font-weight:700;margin:.75cqw 0 1cqw}
h1{margin:0 0 .8cqw;font-size:1.3cqw;font-weight:600}
p{margin:0 0 .85cqw;font-size:.74cqw;line-height:1.5;color:#444}
.notice{margin-top:1cqw;padding:.7cqw .8cqw;background:#eef6ff;border-left:.18cqw solid #0067b8;font-size:.64cqw;line-height:1.45}
.btn{display:inline-block;margin-top:1.2cqw;background:#3568b8;color:#fff;text-decoration:none;padding:.55cqw 1.05cqw;font-size:.72cqw}
.safe-badge{position:absolute;top:.70cqw;left:.70cqw;z-index:5;padding:.30cqw .52cqw;background:rgba(255,244,206,.95);border:1px solid rgba(226,198,97,.95);border-radius:3px;font-size:.55cqw;font-weight:700;color:#5b4a00}
</style>
</head>
<body>
<div class="viewport">
  <div class="scene">
 
    <section class="success-card">
      <div class="brand">
        <span class="ms-grid"><span></span><span></span><span></span><span></span></span>
        <span class="ms-name">Microsoft</span>
       
      </div>

      <div class="check">✓</div>
      <h1>Ahora tu cuenta ha sido verificada</h1>
      <p>La verificación de demostración se completó correctamente.</p>

      <div class="notice">
      </div>

      <a class="btn" href="index.php">Volver al inicio</a>
    </section>
  </div>
</div>
</body>
</html>
