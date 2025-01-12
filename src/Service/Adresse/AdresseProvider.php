<?php

namespace App\Service\Adresse;

use ApiPlatform\Metadata\Operation;
use ApiPlatform\State\ProviderInterface;
use App\Service\Adresse\AdresseService;
use App\Service\Adresse\AdresseDto;

//https://api-adresse.data.gouv.fr/search/?q=6%20rue%20collette%20charleville&lat=48.789&lon=2.789
class AdresseProvider implements ProviderInterface
{
    private AdresseService $adresseService;

    public function __construct(AdresseService $adresseService)
    {
        $this->adresseService = $adresseService;
    }

    public function provide(Operation $operation, array $uriVariables = [], array $context = []): ?AdresseDto
    {
        $adresse = $uriVariables['adresse'] ?? null;

        if (!$adresse) {
            throw new \InvalidArgumentException('Adresse is required.');
        }

     
        $adresseData = $this->adresseService->getAdresseData($adresse);

        return new AdresseDto(
            $adresseData["features"][0]["properties"]["city"],//Ce quon veut Récupérer
            $adresseData["features"][0]["properties"]["label"],
            $adresseData["features"][0]["properties"]["postcode"],
            $adresseData["features"][0]["properties"]["street"],
            $adresseData["features"][0]["properties"]["housenumber"],
            $adresseData["features"][0]["properties"]["context"],
            $adresseData["features"][0]["properties"]["distance"],
        );
    }
}

/*****
 * {
  "type": "FeatureCollection",
  "version": "draft",
  "features": [
    {
      "type": "Feature",
      "geometry": {
        "type": "Point",
        "coordinates": [
          4.719863,
          49.762892
        ]
      },
      "properties": {
        "label": "6 Rue Colette 08000 Charleville-Mézières",
        "score": 0.5841742647058823,
        "housenumber": "6",
        "id": "08105_0830_00006",
        "banId": "6a51bd20-3597-43df-8916-b9cd8b355388",
        "name": "6 Rue Colette",
        "postcode": "08000",
        "citycode": "08105",
        "x": 823987.03,
        "y": 6964011.3,
        "city": "Charleville-Mézières",
        "context": "08, Ardennes, Grand Est",
        "type": "housenumber",
        "importance": 0.65715,
        "street": "Rue Colette",
        "distance": 176933
      }
    }
  ],
  "attribution": "BAN",
  "licence": "ETALAB-2.0",
  "query": "6 rue collette charleville",
  "center": [
    2.789,
    48.789
  ],
  "limit": 5
}
*/
