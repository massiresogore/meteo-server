<?php
namespace App\Service\Weather\weatherForNext7days;

use ApiPlatform\Metadata\ApiResource;
use ApiPlatform\Metadata\Get;

#[ApiResource(
    shortName: "MeteoApiForNext7days",
    uriTemplate: '/forecast/{cityId}',
    operations: [new Get()],
    provider: WeatherProviderForNext7days::class,

)]

class WeatherDtoForNext7days
{
    public function __construct(
          private string $cod,
          private string $cnt,
          private array  $list,
          private array $city,
    ){
    }

public function getCod(): string
{
    return $this->cod;
}

public function setCod(string $cod): self
{
    $this->cod = $cod;
    return $this;
}

public function getCnt(): string
{
    return $this->cnt;
}

public function setCnt(string $cnt): self
{
    $this->cnt = $cnt;
    return $this;
}

public function getList(): array
{
    return $this->list;
}

public function setList(array $list): self
{
    $this->list = $list;
    return $this;
}

public function getCity(): array
{
    return $this->city;
}

public function setCity(array $city): self
{
    $this->city = $city;
    return $this;
}
}
/**
 *  <p><strong>{new Date(day.dt * 1000).toLocaleDateString('fr-FR', { weekday: 'long' })}</strong></p>
          * <p>Température max : {data.main.temp_max}°C</p>
          * <p>Température min : {data.main.temp_min}°C</p>
          * <p>Météo : {day.weather[0].description}</p>
 */

/***
 * {
      "dt": 1736823600,
      "main": {
        "temp": -6.12,
        "feels_like": -6.12,
        "temp_min": -6.12,
        "temp_max": -2.55,
        "pressure": 1038,
        "sea_level": 1038,
        "grnd_level": 1019,
        "humidity": 93,
        "temp_kf": -3.57
      },
      "weather": [
        {
          "id": 800,
          "main": "Clear",
          "description": "ciel dégagé",
          "icon": "01n"
        }
      ],
      "clouds": {
        "all": 0
      },
      "wind": {
        "speed": 1.16,
        "deg": 67,
        "gust": 1.05
      },
      "visibility": 10000,
      "pop": 0,
      "sys": {
        "pod": "n"
      },
      "dt_txt": "2025-01-14 03:00:00"
    }
 */