<?php

namespace App\Weather;

use Symfony\Contracts\HttpClient\HttpClientInterface;

class WeatherService
{
  
    public function __construct(
        private  HttpClientInterface $httpClient
    ) {
    }
    

    public function getWeatherData(string $city): array
    {
        $url = 'https://api.openweathermap.org/data/2.5/weather';
        $key= '598376d6b5b90d5d074809b11a251ed2';
        $response = $this->httpClient->request('GET', $url, [
            'query' => [
                'q' => $city,
                'appid' => $key,
                'units' => 'metric',
            ],
        ]);


        if ($response->getStatusCode() !== 200) {
            throw new \RuntimeException('Failed to fetch weather data.');
        }

        return $response->toArray();
    }

    
    
}
