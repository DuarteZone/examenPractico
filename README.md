## Evaluar habilidades básicas de modelado, programación orientada a objetos en PHP, manejo de
lógica de negocio y buenas prácticas.



##  Estructura del proyecto

```
.
├── index.php            # Script principal con menú interactivo
├── Task.php             # Clase que representa una tarea
├── TaskManager.php      # Clase que maneja el listado de tareas
└── README.md            # Este archivo
```

## Cómo usar

1. Clona o descarga este repo (o descomprime el `.zip`).
2. Abre una terminal en la carpeta del proyecto.
3. Ejecuta:

```bash
php index.php
```

4. Sigue el menú interactivo para agregar, listar o actualizar tareas.

## Ejemplo rápido

```
==== Gestor de Tareas (CLI) ====
1. Agregar tarea
2. Ver todas las tareas
3. Ver tareas por estado
4. Marcar tarea como en progreso
5. Marcar tarea como completada
6. Salir



Elige una opcion: 1
Titulo: Estudiar PHP
Descripcion: Terminar el reto de tareas
Tarea agregada.
```

## Estados permitidos

- `pending` (por defecto)
- `in_progress`
- `done`


## Autor

Hecho por Joc Duarte en modo examen 
