<?php

class Task
{
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

    public function __construct($title, $description, $status = self::STATUS_PENDING)
    {
        $this->title = $title;
        $this->description = $description;
        $this->setStatus($status);
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    private function setStatus($status)
    {
        if (!in_array($status, self::$validStatuses)) {
            throw new InvalidArgumentException("Invalid status: $status");
        }
        $this->status = $status;
    }

    public function markInProgress()
    {
        $this->setStatus(self::STATUS_IN_PROGRESS);
    }

    public function markDone()
    {
        $this->setStatus(self::STATUS_DONE);
    }

    public function getId()
    {
        return $this->id;
    }

    public function getStatus()
    {
        return $this->status;
    }

    public function __toString()
    {
        return "[$this->id] $this->title - $this->status";
    }
}
