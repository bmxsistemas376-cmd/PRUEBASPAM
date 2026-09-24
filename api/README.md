# Flujo PHP educativo de dos pasos

La versión para Vercel no depende de sesiones PHP.

```text
index.php
  ↓ POST usuario DEMO
password.php
  ↓ POST usuario DEMO + clave DEMO
submit.php
  ↓ validación exacta
verified.php?demo=ok
```

Credenciales admitidas:

```text
Usuario: anthony.flores@busman.com.mx
Contraseña: DEMO-Busman2026
```

`submit.php` no registra la contraseña, la IP ni el User-Agent. `verified.php`
registra únicamente un evento de finalización en `localStorage` del navegador para
que pueda visualizarse en `/panel.php`.
