<?php
declare(strict_types=1);
session_start();

$events = $_SESSION['events'] ?? [];
if (!is_array($events)) {
    $events = [];
}
$events = array_reverse($events);
?>
<!doctype html>
<html lang="es">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width,initial-scale=1">
<title>Panel local de demostración</title>
<style>
*{box-sizing:border-box}
body{margin:0;font-family:"Segoe UI",Arial,sans-serif;background:#f5f7fa;color:#1b1b1b}
header{background:#fff;padding:22px 30px;border-bottom:1px solid #ddd;display:flex;justify-content:space-between;align-items:center}
h1{margin:0;font-size:24px}
main{max-width:1150px;margin:30px auto;padding:0 20px}
.notice{background:#eef6ff;border-left:4px solid #0067b8;padding:15px 17px;margin-bottom:20px;line-height:1.5}
.card{background:#fff;border:1px solid #e1e1e1;box-shadow:0 1px 4px rgba(0,0,0,.06);overflow:auto}
table{width:100%;border-collapse:collapse;min-width:900px}
th,td{text-align:left;padding:12px 14px;border-bottom:1px solid #eee;font-size:13px;vertical-align:top}
th{background:#f8f9fb}
.btn{display:inline-block;background:#0067b8;color:#fff;text-decoration:none;padding:9px 14px;border:0;cursor:pointer}
code{background:#f2f2f2;padding:2px 5px;border-radius:3px}
.safe{color:#107c10;font-weight:700}
.empty{padding:35px;text-align:center;color:#666}
.toolbar{display:flex;gap:10px}
</style>
</head>
<body>
<header>
  <h1>Panel local de demostración</h1>
  <div class="toolbar">
    <a class="btn" href="index.php">Abrir formulario</a>
    <form action="clear.php" method="post" style="margin:0">
      <button class="btn" type="submit">Limpiar sesión</button>
    </form>
  </div>
</header>

<main>
  <div class="notice">
    Este panel se abre de forma independiente mediante <code>/panel.php</code>.
    El usuario que completa el formulario es redirigido a <code>/verified.php</code>.
  </div>

  <div class="card">
  <?php if (!$events): ?>
    <div class="empty">No hay eventos DEMO en esta sesión.</div>
  <?php else: ?>
    <table>
      <thead>
        <tr>
          <th>Fecha</th>
          <th>Usuario DEMO</th>
          <th>Contraseña DEMO</th>
          <th>Método</th>
          <th>IP local</th>
          <th>User-Agent</th>
          <th>Estado</th>
        </tr>
      </thead>
      <tbody>
      <?php foreach ($events as $event): ?>
        <tr>
          <td><?= htmlspecialchars((string)($event['time'] ?? '')) ?></td>
          <td><code><?= htmlspecialchars((string)($event['username'] ?? '')) ?></code></td>
          <td><code><?= htmlspecialchars((string)($event['password'] ?? '')) ?></code></td>
          <td><?= htmlspecialchars((string)($event['method'] ?? '')) ?></td>
          <td><?= htmlspecialchars((string)($event['remote_addr'] ?? '')) ?></td>
          <td><?= htmlspecialchars((string)($event['user_agent'] ?? '')) ?></td>
          <td class="safe">DEMO</td>
        </tr>
      <?php endforeach; ?>
      </tbody>
    </table>
  <?php endif; ?>
  </div>
</main>
</body>
</html>
