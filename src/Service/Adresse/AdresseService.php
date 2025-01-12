<?php

namespace App\Service\Adresse;

use Symfony\Contracts\HttpClient\HttpClientInterface;

class AdresseService
{
  
    public function __construct(
        private  HttpClientInterface $httpClient
    ) {
    }
    

    public function getAdresseData(string $adresse): array
    {
        $url = 'https://api-adresse.data.gouv.fr/search';
       // $key= '598376d6b5b90d5d074809b11a251ed2';
        $response = $this->httpClient->request('GET', $url, [
            'query' => [
                'q' => $adresse,
                'lat'=>48.789,
                'lon'=>2.789
            ],
        ]);


        if ($response->getStatusCode() !== 200) {
            throw new \RuntimeException('Failed to fetch weather data.');
        }

        return $response->toArray();
    }

    
    
}
