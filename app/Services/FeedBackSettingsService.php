<?php

namespace App\Services;

class FeedBackSettingsService
{
    protected $jsonFileService;

    public function __construct(JsonFileService $jsonFileService)
    {
        $this->jsonFileService = $jsonFileService;
    }

    public function update($settings): array
    {
        $path = self::getPathForFileSettings();
        $settings = [
            'storage' => $settings['storage']['type'],
            'settings' => $settings['settings']
        ];

        return $this->jsonFileService->setDataToFile($path, $settings);
    }

    public static function getPathForFileSettings(): string
    {
        $fileName = config('settings.feedback.settings_file');

        return base_path($fileName);
    }

    public function getDataForIndex(): array
    {
        return $this->jsonFileService->getDataFromFile(self::getPathForFileSettings());
    }
}
