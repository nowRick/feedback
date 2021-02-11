<?php

namespace App\Http\Controllers;

use App\Factories\Feedback\StorageFactory;
use App\Services\FeedBackSettingsService;
use App\Http\Requests\FeedBackRequest;
use App\Services\JsonFileService;
use Illuminate\Http\JsonResponse;

class FeedBackController extends Controller
{
    protected $jsonFileService;

    public function __construct(JsonFileService $jsonFileService)
    {
        $this->jsonFileService = $jsonFileService;
    }

    public function store(FeedBackRequest $request): JsonResponse
    {
        $path = FeedBackSettingsService::getPathForFileSettings();
        $settings = $this->jsonFileService->getDataFromFile($path);

        $storage = StorageFactory::create(
            $request->name,
            $request->phone,
            $request->application,
            $settings['storage']
        );

        $storage->store();

        return response()->json(['status' => true]);
    }
}
