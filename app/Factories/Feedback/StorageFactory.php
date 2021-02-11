<?php

namespace App\Factories\Feedback;

class StorageFactory
{
    static $list = [
        'database' => DatabaseStorage::class,
        'file' => FileStorage::class,
        'other_database' => OtherDatabaseStorage::class,
    ];

    public static function create(string $name, string $phone, string $application, string $type): object
    {
        $storage = self::$list[$type];

        return new $storage($name, $phone, $application);
    }
}
