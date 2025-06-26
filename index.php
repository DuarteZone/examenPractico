<?php
require_once 'Task.php';
require_once 'TaskManager.php';

$manager = new TaskManager();

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

function readInput(string $prompt): string
{
    echo $prompt;
    return trim(fgets(STDIN));
}

while (true) {
    showMenu();
    $option = readInput('');

    switch ($option) {
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
