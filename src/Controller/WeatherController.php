<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\City;
use App\Service\WeatherUtil;
use Symfony\Bridge\Doctrine\Attribute\MapEntity;

class WeatherController extends AbstractController
{
    #[Route('/weather/{countryCode}/{name}', name: 'app_weather', requirements: ['id' => '\d+'])]
    public function city(
        #[MapEntity(mapping: ['countryCode' => 'countryCode', 'name' => 'name'])]
        City $city,
        WeatherUtil $util,
    ): Response
    {
        $forecasts = $util->getWeatherForCity($city);
    
        return $this->render('weather/city.html.twig', [
            'city' => $city,
            'forecasts' => $forecasts,
    ]);
}
}
