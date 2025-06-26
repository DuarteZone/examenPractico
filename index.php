<?php

/* * index.php
 * 
 * Este script es la interfaz de línea de comandos (CLI) para el gestor de tareas.
 * Permite al usuario interactuar con el TaskManager para agregar, ver y modificar tareas.
 * 
 * @package TaskManager
 * @version 1.0
 * @author JocDurte
 */
require_once 'Task.php';
require_once 'TaskManager.php';

$manager = new TaskManager();

/**
 * Muestra el menú principal del gestor de tareas.
 * 
 * Esta función imprime las opciones disponibles para el usuario en la consola.
 */
function showMenu()
{
    echo "\n==== Gestor de Tareas (CLI) ====\n";
    echo "1. Agregar tarea\n";
    echo "2. Ver todas las tareas\n";
    echo "3. Ver tareas por estado\n";
    echo "4. Marcar tarea como en progreso\n";
    echo "5. Marcar tarea como completada\n";
    echo "6. Salir\n";
    echo "Elige una opcion: ";
}

/**
 * Lee la entrada del usuario desde la consola.
 * 
 * @param string $prompt El mensaje que se muestra al usuario para solicitar entrada.
 * @return string La entrada del usuario, sin espacios en blanco al inicio o al final.
 */

function readInput(string $prompt): string
{
    echo $prompt;
    return trim(fgets(STDIN));
}

/**
 * Muestra el menú y maneja la interacción del usuario.
 * 
 * Este bucle infinito permite al usuario seleccionar opciones del menú y realizar acciones
 * hasta que decida salir.
 */

while (true) {
    showMenu();
    $option = readInput('');

    switch ($option) {
        /* * Maneja las opciones del menú.
         * 
         * 1. Agregar tarea: Solicita título y descripción, crea una nueva tarea y la agrega al gestor.
         * 2. Ver todas las tareas: Muestra todas las tareas almacenadas en el gestor.
         * 3. Ver tareas por estado: Filtra y muestra tareas según el estado especificado por el usuario.
         * 4. Marcar tarea como en progreso: Cambia el estado de una tarea a 'in_progress'.
         * 5. Marcar tarea como completada: Cambia el estado de una tarea a 'done'.
         * 6. Salir: Termina la ejecución del script.
         */
        case '1':
            $title = readInput("Titulo: ");
            $desc = readInput("Descripcion: ");
            $task = new Task($title, $desc);
            $manager->addTask($task);
            echo "Tarea agregada.\n";
            break;

        case '2':
            $tasks = $manager->getAllTasks();
            if (empty($tasks)) {
                echo "No hay tareas todavia.\n";
            } else {
                foreach ($tasks as $task) {
                    echo $task . PHP_EOL;
                }
            }
            break;

        case '3':
            $status = readInput("Estado (pending, in_progress, done): ");
            $filtered = $manager->getTasksByStatus($status);
            if (empty($filtered)) {
                echo "No hay tareas con ese estado.\n";
            } else {
                foreach ($filtered as $task) {
                    echo $task . PHP_EOL;
                }
            }
            break;

        case '4':
            $id = (int)readInput("ID de la tarea a marcar como en progreso: ");
            $task = $manager->findTaskById($id);
            if ($task) {
                $task->markInProgress();
                echo "Tarea #$id ahora está en progreso.\n";
            } else {
                echo " No se encontro esa tarea.\n";
            }
            break;

        case '5':
            $id = (int)readInput("ID de la tarea a marcar como completada: ");
            $task = $manager->findTaskById($id);
            if ($task) {
                $task->markDone();
                echo "Tarea #$id completada!\n";
            } else {
                echo " Esa tarea no existe.\n";
            }
            break;

        case '6':
            echo "¡Nos vemos!\n";
            exit;

        default:
            echo "Opcion invalida, intenta otra vez.\n";
            break;
    }
}
