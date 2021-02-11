<?php

namespace App\Http\Controllers;

use App\Http\Requests\FeedBackSettingsRequest;
use App\Services\FeedBackSettingsService;
use Illuminate\Http\JsonResponse;

class FeedBackSettingsController extends Controller
{
    protected $service;

    public function __construct(FeedBackSettingsService $feedBackSettingsService)
    {
        $this->service = $feedBackSettingsService;
    }

    public function index(): array
    {
        return $this->service->getDataForIndex();
    }

    public function update(FeedBackSettingsRequest $request): JsonResponse
    {
        $this->service->update($request->validated());

        return response()->json(['status' => true]);
    }
}
