# Simulador educativo PHP preparado para Vercel

Este paquete está preparado para desplegarse en Vercel mediante `vercel-php@0.9.0`.

## Corrección para Vercel

La versión anterior dependía de `$_SESSION` para comunicar `password.php`,
`submit.php` y `verified.php`. En Vercel esos endpoints pueden ejecutarse como
funciones independientes, por lo que una sesión basada en archivos locales no es
una base fiable para mantener el flujo.

Esta versión es **stateless**:

```text
index.php -> POST -> password.php -> POST -> submit.php -> verified.php
```

El usuario DEMO viaja como un campo oculto entre las dos pantallas y el backend
vuelve a validarlo. No se almacenan credenciales, IPs ni User-Agent en el servidor.

## Seguridad de la demostración

- Solo acepta valores DEMO fijados en el código.
- No usa `$_SESSION`.
- No guarda la contraseña enviada.
- No almacena IP ni User-Agent.
- El panel usa únicamente `localStorage` del navegador para registrar que la práctica fue completada.

Credenciales DEMO:

```text
Usuario: anthony.flores@busman.com.mx
Contraseña: DEMO-Busman2026
```

## Estructura

```text
.
├── api/
│   ├── index.php
│   ├── password.php
│   ├── submit.php
│   ├── verified.php
│   ├── panel.php
│   └── clear.php
├── background-original.png
├── vercel.json
└── README.md
```

## Despliegue en Vercel

1. Sube **el contenido de esta carpeta** a la raíz de tu repositorio.
2. En Vercel selecciona `Add New -> Project` e importa el repositorio.
3. Usa `Framework Preset: Other`.
4. Deja `Root Directory` en `./`.
5. No definas Build Command ni Output Directory.
6. Haz un nuevo deployment.

La portada queda en `/` y el panel de demostración en `/panel.php`.
