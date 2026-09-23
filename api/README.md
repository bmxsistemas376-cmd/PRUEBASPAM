# Simulador PHP educativo de dos pasos

Ahora el flujo replica el comportamiento visual de un inicio de sesión en dos etapas:

```text
index.php
  ↓
Introduce usuario DEMO
  ↓
Siguiente
  ↓
password.php
  ↓
Muestra el usuario elegido
  ↓
Introduce contraseña DEMO
  ↓
Iniciar sesión
  ↓
verified.php
```

El panel continúa disponible de forma independiente:

```text
http://127.0.0.1:8080/panel.php
```

## Ejecutar en Windows

```cmd
php -S 127.0.0.1:8080
```

Página principal:

```text
http://127.0.0.1:8080/index.php
```

Panel:

```text
http://127.0.0.1:8080/panel.php
```

## Seguridad

Solo admite valores sintéticos:

```text
demo_1234
DEMO-123456
```

El backend rechaza correos y contraseñas normales.

## Credenciales de demostración fijadas

Usuario mostrado en la práctica:

```text
anthony.flores@busman.com.mx
```

Contraseña sintética usada por seguridad:

```text
DEMO-Busman2026
```

La contraseña real solicitada no se incorpora al simulador. La versión usa un valor claramente de demostración para evitar manejar o recolectar credenciales reales.
