<?php

namespace App\Factories\Feedback;

use App\Interfaces\StorageInterface;
use App\Models\Application;

class DatabaseStorage implements StorageInterface
{
    public function __construct(string $name, string $phone, string $application)
    {
        $this->name = $name;
        $this->phone = $phone;
        $this->application = $application;
        $this->type = 'database';
    }

    public function store(): Void
    {
        Application::create([
            'name' => $this->name,
            'phone' => $this->phone,
            'application' => $this->application,
        ]);
    }
}
