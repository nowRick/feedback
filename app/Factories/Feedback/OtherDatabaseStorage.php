<?php

namespace App\Factories\Feedback;

use App\Interfaces\StorageInterface;
use App\Services\FeedBackSettingsService;
use App\Services\JsonFileService;
use Illuminate\Support\Facades\DB;

class OtherDatabaseStorage implements StorageInterface
{
    public function __construct(string $name, string $phone, string $application)
    {
        $this->name = $name;
        $this->phone = $phone;
        $this->application = $application;
        $this->type = 'other_database';
    }

    public function store(): Void
    {
        $jsonFileService = new JsonFileService;
        $path = FeedBackSettingsService::getPathForFileSettings();
        $settings = $jsonFileService->getDataFromFile($path);

        config(['database.connections.mysql' => $settings['settings']]);

        DB::connection('mysql')->table('applications')->insert([
            'name' => $this->name,
            'phone' => $this->phone,
            'application' => $this->application,
        ]);
    }
}
