<?php

namespace App\Services;


class MapService
{
    /**
     * @var CacheServiceInterface
     */
    private $cacheService;

    /**
     * MapService constructor.
     * @param CacheServiceInterface $cacheService
     */
    public function __construct(CacheServiceInterface $cacheService)
    {
        $this->cacheService = $cacheService;
    }

    public function addLocation(float $lat, float $lng, string $title, int $timestamp): void
    {
        $entry = [
            'lat' => $lat,
            'lng' => $lng,
            'title' => $title,
            'timestamp' => $timestamp
        ];

        $this->cacheService->addToSet('mapEntries', $entry);
    }

    public function getLocations() :array
    {
        return $this->cacheService->getSet('mapEntries');
    }
}
