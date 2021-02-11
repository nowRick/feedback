<?php

namespace App\Factories\Feedback;

use Illuminate\Support\Facades\Storage;
use App\Interfaces\StorageInterface;
use Carbon\Carbon;

class FileStorage implements StorageInterface
{
    public function __construct(string $name, string $phone, string $application)
    {
        $this->name = $name;
        $this->phone = $phone;
        $this->application = $application;
        $this->type = 'file';
    }

    public function store(): Void
    {
        $fileName = Carbon::now()->format('d_m_Y_s_i_H_') . $this->phone . '.txt';
        $text = "Имя: $this->name, телефон: $this->phone" . PHP_EOL . "заявка: $this->application";

        Storage::put($fileName, $text);
    }
}
