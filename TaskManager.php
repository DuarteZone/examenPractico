<?php
// se carga la clase Task
require_once 'Task.php';


/**
 * TaskManager class para gestionar una lista de tareas.
 * * Esta clase permite agregar tareas, obtener todas las tareas,
 * * filtrar tareas por estado y buscar tareas por ID.
 * * @package TaskManager
 * @version 1.0
 * @author JocDurte
 * 
 * */

class TaskManager
{
    /**
     * @var Task[] $tasks Lista de tareas gestionadas por el TaskManager.
     * @var int $nextId Contador para asignar IDs únicos a las tareas.
     */
    /** @var Task[] $tasks Lista de tareas gestionadas por el TaskManager. */
    /** @var int $nextId Contador para asignar IDs únicos a las tareas. */

    private $tasks = [];
    private $nextId = 1;

    /**
     * Agrega una nueva tarea al gestor de tareas.
     * 
     * @param Task $task La tarea a agregar.
     * @throws InvalidArgumentException Si la tarea ya tiene un ID asignado.
     */


    public function addTask(Task $task): void
    {
        $task->setId($this->nextId);
        $this->tasks[$this->nextId] = $task;
        $this->nextId++;
    }

    /**
     * Obtiene todas las tareas del gestor de tareas.
     * 
     * @return Task[] Lista de todas las tareas.
     */

    public function getAllTasks(): array
    {
        return array_values($this->tasks);
    }
    /**
     * Obtiene las tareas filtradas por estado.
     * 
     * @param string $status Estado de las tareas a filtrar.
     * @return Task[] Lista de tareas con el estado especificado.
     * @throws InvalidArgumentException Si el estado no es válido.
     * 
     * 
     */


    public function getTasksByStatus(string $status): array
    {
        return array_values(array_filter($this->tasks, function (Task $task) use ($status) {
            return $task->getStatus() === $status;
        }));
    }


    /**
     * Busca una tarea por su ID.
     * 
     * @param int $id ID de la tarea a buscar.
     * @return Task|null La tarea encontrada o null si no existe.
     */

    public function findTaskById(int $id): ?Task
    {
        return $this->tasks[$id] ?? null;
    }
}
