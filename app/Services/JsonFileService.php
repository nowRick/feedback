<?php

namespace App\Services;

class JsonFileService
{
    public function getDataFromFile(string $path): array
    {
        $content = file_get_contents($path, true);

        return json_decode($content, true);
    }

    public function setDataToFile(string $path, array $data): array
    {
        file_put_contents($path, json_encode($data));

        return $this->getDataFromFile($path, true);
    }
}
