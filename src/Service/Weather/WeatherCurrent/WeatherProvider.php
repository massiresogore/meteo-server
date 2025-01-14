<?php

namespace App\Service\Weather\WeatherCurrent;

use ApiPlatform\Metadata\Operation;
use ApiPlatform\State\ProviderInterface;
use App\Service\Weather\WeatherService;
use App\Service\Weather\WeatherCurrent\WeatherDto;

class WeatherProvider implements ProviderInterface
{
    private WeatherService $weatherService;

    public function __construct(WeatherService $weatherService)
    {
        $this->weatherService = $weatherService;
    }

    public function provide(Operation $operation, array $uriVariables = [], array $context = []): ?WeatherDto
    {
        $city = $uriVariables['city'] ?? null;



        if (!$city) {
            throw new \InvalidArgumentException('City is required.');
        }

        $weatherData = $this->weatherService->getWeatherData($city);

        return new WeatherDto(
            $weatherData['wind']['speed'],
            $weatherData['main']['temp'],
            $weatherData['name'],
            $weatherData['weather'][0]['icon'],
            $weatherData['weather'][0]['description']
        );
    }
}

