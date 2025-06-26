<?php

require_once 'Task.php';

class TaskManager
{
    private $tasks = [];
    private $nextId = 1;

    public function addTask(Task $task): void
    {
        $task->setId($this->nextId);
        $this->tasks[$this->nextId] = $task;
        $this->nextId++;
    }

    public function getAllTasks(): array
    {
        return array_values($this->tasks);
    }

    public function getTasksByStatus(string $status): array
    {
        return array_values(array_filter($this->tasks, function (Task $task) use ($status) {
            return $task->getStatus() === $status;
        }));
    }

    public function findTaskById(int $id): ?Task
    {
        return $this->tasks[$id] ?? null;
    }
}
