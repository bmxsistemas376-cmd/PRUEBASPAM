# Simulador educativo PHP preparado para Vercel

Este paquete está preparado para desplegarse en Vercel mediante `vercel-php@0.9.0`.

## Seguridad de la demostración

- Solo acepta valores DEMO fijados en el código.
- No almacena contraseñas, IPs ni User-Agent en el servidor.
- El panel usa únicamente `localStorage` del navegador para registrar que la práctica fue completada.
- La interfaz muestra un aviso permanente de simulación educativa.

Credenciales DEMO:

```text
Usuario: demo.capacitacion@busman.example
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

1. Sube **el contenido de esta carpeta** a la raíz de tu repositorio de GitHub.
2. En Vercel selecciona `Add New -> Project` e importa el repositorio.
3. Usa `Framework Preset: Other`.
4. Deja `Root Directory` en `./`.
5. No definas Build Command ni Output Directory.
6. Pulsa `Deploy`.

La portada quedará en `/` y el panel de demostración en `/panel.php`.
