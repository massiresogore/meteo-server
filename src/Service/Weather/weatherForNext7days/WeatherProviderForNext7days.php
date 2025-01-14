<?php

namespace App\Service\Weather\weatherForNext7days;

use ApiPlatform\Metadata\Operation;
use ApiPlatform\State\ProviderInterface;
use App\Service\Weather\WeatherService;

class WeatherProviderForNext7days implements ProviderInterface
{
    private WeatherService $weatherService;

    public function __construct(WeatherService $weatherService)
    {
        $this->weatherService = $weatherService;
    }

    public function provide(Operation $operation, array $uriVariables = [], array $context = []): ?WeatherDtoForNext7days
    {
        $cityId = $uriVariables['cityId'] ?? null;


        if (!$cityId) {
            throw new \InvalidArgumentException('cityId is required.');
        }

        $weatherData = $this->weatherService->getWeatherDataForNext7days($cityId);

        return new WeatherDtoForNext7days(
            $weatherData['cod'],
            $weatherData['cnt'],
            $weatherData['list'],
            $weatherData['city']
        );
    }
}

