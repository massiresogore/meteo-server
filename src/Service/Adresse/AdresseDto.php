<?php
namespace App\Service\Adresse;

use ApiPlatform\Metadata\ApiResource;
use ApiPlatform\Metadata\Get;
use PhpParser\Node\Name;

//https://api-adresse.data.gouv.fr/search/?q=6%20rue%20collette%20charleville&lat=48.789&lon=2.789
#[ApiResource(
    shortName: "AdresseApi",
    uriTemplate: '/search/{adresse}',
    operations: [new Get()],
    provider: AdresseProvider::class,

)]

// $data["features"][0]["properties"]["city"]
// $data["features"][0]["properties"]["label"]
// $data["features"][0]["properties"]["postcode"]
// $data["features"][0]["properties"]["street"]
// $data["features"][0]["properties"]["housenumber"]
// $data["features"][0]["properties"]["context"]
// $data["features"][0]["properties"]["distance"]
class AdresseDto
{
    public function __construct(
          private string $city,
          private string $label,
          private string $postcode,
          private string $street,
          private string $housenumber,
          private string $context,
          private string $distance
    ){
    }

    public function getCity(): string
    {
        return $this->city;
    }

    public function setCity(string $city): void
    {
        $this->city = $city;
    }

    public function getLabel(): string
    {
        return $this->label;
    }

    public function setLabel(string $label): void
    {
        $this->label = $label;
    }

    public function getPostcode(): string
    {
        return $this->postcode;
    }

    public function setPostcode(string $postcode): void
    {
        $this->postcode = $postcode;
    }

    public function getStreet(): string
    {
        return $this->street;
    }

    public function setStreet(string $street): void
    {
        $this->street = $street;
    }

    public function getHousenumber(): string
    {
        return $this->housenumber;
    }

    public function setHousenumber(string $housenumber): void
    {
        $this->housenumber = $housenumber;
    }

    public function getContext(): string
    {
        return $this->context;
    }

    public function setContext(string $context): void
    {
        $this->context = $context;
    }

    public function getDistance(): string
    {
        return $this->distance;
    }

    public function setDistance(string $distance): void
    {
        $this->distance = $distance;
    }

   
}