<?php declare(strict_types=1); ?>
<!doctype html>
<html lang="es">
<head>
<meta charset="utf-8"><meta name="viewport" content="width=device-width,initial-scale=1"><title>Panel de demostración</title>
<style>
*{box-sizing:border-box}body{margin:0;font-family:"Segoe UI",Arial,sans-serif;background:#f5f7fa;color:#1b1b1b}header{background:#fff;padding:22px 30px;border-bottom:1px solid #ddd;display:flex;justify-content:space-between;align-items:center}h1{margin:0;font-size:24px}main{max-width:950px;margin:30px auto;padding:0 20px}.notice{background:#eef6ff;border-left:4px solid #0067b8;padding:15px 17px;margin-bottom:20px;line-height:1.5}.card{background:#fff;border:1px solid #e1e1e1;box-shadow:0 1px 4px rgba(0,0,0,.06);overflow:auto}table{width:100%;border-collapse:collapse}th,td{text-align:left;padding:12px 14px;border-bottom:1px solid #eee;font-size:13px}th{background:#f8f9fb}.btn{display:inline-block;background:#0067b8;color:#fff;text-decoration:none;padding:9px 14px;border:0;cursor:pointer}.safe{color:#107c10;font-weight:700}.empty{padding:35px;text-align:center;color:#666}.toolbar{display:flex;gap:10px}
</style>
</head>
<body>
<header><h1>Panel de demostración</h1><div class="toolbar"><a class="btn" href="/">Abrir formulario</a><button class="btn" id="clear" type="button">Limpiar registro local</button></div></header>
<main>
  <div class="notice">Este panel muestra únicamente eventos DEMO guardados en <strong>localStorage</strong> de este navegador. No recibe ni almacena credenciales reales, IPs o User-Agent en el servidor.</div>
  <div class="card" id="content"></div>
</main>
<script>
const key='busman_demo_events';
function esc(v){return String(v).replace(/[&<>'"]/g,c=>({'&':'&amp;','<':'&lt;','>':'&gt;',"'":'&#39;','"':'&quot;'}[c]));}
function render(){
  let events=[]; try{events=JSON.parse(localStorage.getItem(key)||'[]');}catch(e){}
  const el=document.getElementById('content');
  if(!Array.isArray(events)||!events.length){el.innerHTML='<div class="empty">No hay eventos DEMO en este navegador.</div>';return;}
  el.innerHTML='<table><thead><tr><th>Fecha</th><th>Usuario DEMO</th><th>Estado</th></tr></thead><tbody>'+events.slice().reverse().map(e=>`<tr><td>${esc(e.time||'')}</td><td><code>${esc(e.user||'')}</code></td><td class="safe">${esc(e.status||'DEMO')}</td></tr>`).join('')+'</tbody></table>';
}
document.getElementById('clear').addEventListener('click',()=>{localStorage.removeItem(key);render();});
render();
</script>
</body>
</html>
