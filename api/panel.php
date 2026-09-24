<?php
declare(strict_types=1);
?>
<!doctype html>
<html lang="es">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width,initial-scale=1">
<title>Panel Principal</title>
<style>
*{box-sizing:border-box}
body{margin:0;font-family:"Segoe UI",Arial,sans-serif;background:#f5f7fa;color:#1b1b1b}
header{background:#fff;padding:22px 30px;border-bottom:1px solid #ddd;display:flex;justify-content:space-between;align-items:center}
h1{margin:0;font-size:24px}
main{max-width:1000px;margin:30px auto;padding:0 20px}
.notice{background:#eef6ff;border-left:4px solid #0067b8;padding:15px 17px;margin-bottom:20px;line-height:1.5}
.card{background:#fff;border:1px solid #e1e1e1;box-shadow:0 1px 4px rgba(0,0,0,.06);overflow:auto}
table{width:100%;border-collapse:collapse;min-width:650px}
th,td{text-align:left;padding:12px 14px;border-bottom:1px solid #eee;font-size:13px;vertical-align:top}
th{background:#f8f9fb}
.btn{display:inline-block;background:#0067b8;color:#fff;text-decoration:none;padding:9px 14px;border:0;cursor:pointer;font:inherit}
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
    <button class="btn" id="clearBtn" type="button">Limpiar eventos</button>
  </div>
</header>



<script>
const storageKey = 'busman_demo_events_v1';
const content = document.getElementById('content');

function escapeHtml(value) {
  return String(value).replace(/[&<>'"]/g, ch => ({
    '&':'&amp;', '<':'&lt;', '>':'&gt;', "'":'&#39;', '"':'&quot;'
  }[ch]));
}

function render() {
  let events = [];
  try {
    events = JSON.parse(localStorage.getItem(storageKey) || '[]');
    if (!Array.isArray(events)) events = [];
  } catch (_) {
    events = [];
  }

  // Migra registros DEMO creados por versiones anteriores del panel.
  // Solo completa la contraseña DEMO fija; nunca toma una contraseña arbitraria.
  let migrated = false;
  events = events.map(event => {
    if (event &&
        event.username === 'anthony.flores@busman.com.mx' &&
        event.status === 'Cuenta Filtrada' &&
        !event.password) {
      migrated = true;
      return { ...event, password: 'DEMO-Busman2026' };
    }
    return event;
  });

  if (migrated) {
    try {
      localStorage.setItem(storageKey, JSON.stringify(events));
    } catch (_) {}
  }

  events = events.slice().reverse();
  if (!events.length) {
    content.innerHTML = '<div class="empty">No hay eventos DEMO guardados en este navegador.</div>';
    return;
  }

  const rows = events.map(event => `
    <tr>
      <td>${escapeHtml(event.time || '')}</td>
      <td><code>${escapeHtml(event.username || '')}</code></td>
      <td><code>${escapeHtml(event.password || '—')}</code></td>
      <td class="safe">${escapeHtml(event.status || 'DEMO')}</td>
    </tr>`).join('');

  content.innerHTML = `
    <table>
      <thead><tr><th>Fecha</th><th>Usuario</th><th>Contraseña</th><th>Estado</th></tr></thead>
      <tbody>${rows}</tbody>
    </table>`;
}

document.getElementById('clearBtn').addEventListener('click', () => {
  localStorage.removeItem(storageKey);
  render();
});

render();
</script>
</body>
</html>
