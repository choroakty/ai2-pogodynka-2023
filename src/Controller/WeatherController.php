<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\City;
use App\Repository\ForecastRepository;

class WeatherController extends AbstractController
{
    #[Route('/weather/{name}', name: 'app_weather', requirements: ['id' => '\d+'])]
    public function city(City $city, ForecastRepository $repository): Response
    {
        $forecasts = $repository->findByLocation($city);
    
        return $this->render('weather/city.html.twig', [
            'city' => $city,
            'forecasts' => $forecasts,
    ]);
}
}
