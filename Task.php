<?php
//class Task 
/**
 * Task class para representar una tarea en un gestor de tareas.
 * * Esta clase permite crear tareas con un título, descripción y estado.
 * * Los estados válidos son: 'pending', 'in_progress', 'done'.
 * * Permite marcar tareas como en progreso o completadas.
 * * @package TaskManager
 * @version 1.0
 * @author JocDurte

 */


class Task
{
    /**
     * @var int|null $id Identificador único de la tarea.
     */
    /** @var string $title Título de la tarea. */
    /** @var string $description Descripción de la tarea. */
    /** @var string $status Estado de la tarea. Puede ser 'pending', 'in_progress' o 'done'. */
    /** @var array $validStatuses Lista de estados válidos para la tarea. */
    private $id;
    private $title;
    private $description;
    private $status;

    const STATUS_PENDING = 'pending';
    const STATUS_IN_PROGRESS = 'in_progress';
    const STATUS_DONE = 'done';

    private static $validStatuses = [
        self::STATUS_PENDING,
        self::STATUS_IN_PROGRESS,
        self::STATUS_DONE
    ];

    /**
     * Constructor de la clase Task.
     * 
     * @param string $title Título de la tarea.
     * @param string $description Descripción de la tarea.
     * @param string $status Estado inicial de la tarea (opcional, por defecto 'pending').
     * @throws InvalidArgumentException Si el estado no es válido.
     */

    public function __construct($title, $description, $status = self::STATUS_PENDING)
    {
        $this->title = $title;
        $this->description = $description;
        $this->setStatus($status);
    }

    /**
     * Establece el identificador de la tarea.
     * 
     * @param int $id Identificador único de la tarea.
     */

    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * Establece el estado de la tarea.
     * 
     * @param string $status Estado de la tarea.
     * @throws InvalidArgumentException Si el estado no es válido.
     */

    private function setStatus($status)
    {
        if (!in_array($status, self::$validStatuses)) {
            throw new InvalidArgumentException("Invalid status: $status");
        }
        $this->status = $status;
    }

    /**
     * Marca la tarea como pendiente.
     */

    public function markInProgress()
    {
        $this->setStatus(self::STATUS_IN_PROGRESS);
    }

    /**
     * Marca la tarea como completada.
     */

    public function markDone()
    {
        $this->setStatus(self::STATUS_DONE);
    }
    /**
     * Obtiene el identificador único de la tarea.
     * 
     * @return int|null El identificador de la tarea o null si no está establecido.
     */
    public function getId()
    {
        return $this->id;
    }
    /**
     * Obtiene el stado de la tarea.
     * 
     * @return string el stado de la tarea.
     */
    public function getStatus()
    {
        return $this->status;
    }

    public function __toString()
    {
        return "[$this->id] $this->title - $this->status";
    }
}
