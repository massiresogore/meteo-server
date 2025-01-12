<?php
namespace App\Weather;

use ApiPlatform\Metadata\ApiResource;
use ApiPlatform\Metadata\Get;

#[ApiResource(
    uriTemplate: '/weather/{city}',
    operations: [new Get()],
    provider: WeatherProvider::class,

)]

class WeatherDto
{
    public function __construct(
          private string $windSpeed,
          private string $temperature,
          private string $city,
          private string $icon,
          private string $description,
    ){
    }

    public function getWindSpeed(): string
    {
        return $this->windSpeed;
    }

    public function getTemperature(): string
    {
        return $this->temperature;
    }

    public function getCity(): string
    {
        return $this->city;
    }

    public function getIcon(): string
    {
        return $this->icon;
    }

    public function getDescription(): string
    {
        return $this->description;
    }
}