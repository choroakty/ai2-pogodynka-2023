<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpKernel\Attribute\MapQueryParameter;
use App\Service\WeatherUtil;
use App\Entity\Forecast;

class WeatherApiController extends AbstractController
{
    #[Route('/api/v1/weather', name: 'app_weather_api')]
    public function index(
        WeatherUtil $util,
        #[MapQueryParameter('countryCode')] string $countryCode,
        #[MapQueryParameter('name')] string $name,
        #[MapQueryParameter('format')] string $format,
        #[MapQueryParameter('twig')] bool $twig = false,
    ): Response
    {
        $forecasts = $util->getWeatherForCountryAndCity($countryCode, $name);

        if ($format === 'json'){
            if($twig){
                return $this->render('weather_api/index.json.twig', [
                    'name' => $name,
                    'countryCode' => $countryCode,
                    'forecasts' => $forecasts,
                ]);
            }else{
                return $this->json([
                    'name' => $name,
                    'countryCode' => $countryCode,
                    'forecasts' => array_map(fn(Forecast $f) => [
                        'date' => $f->getDate()->format('Y-m-d'),
                        'celsius' => $f->getCelsius(),
                        'fahrenheit' => $f->getFahrenheit(),
                    ], $forecasts),
                ]);
            }
        }

        if($twig){
            return $this->render('weather_api/index.csv.twig', [
                'name' => $name,
                'countryCode' => $countryCode,
                'forecasts' => $forecasts,
            ]);
        }else{
            $csv = "name,countryCode,date,celsius,fahrenheit\n";
                $csv .= implode(
                    "\n",
                    array_map(fn(Forecast $f) => sprintf(
                        '%s,%s,%s,%s,%s',
                        $name,
                        $countryCode,
                        $f->getDate()->format('Y-m-d'),
                        $f->getCelsius(),
                        $f->getFahrenheit(),
                    ), $forecasts)
                );
                return new Response($csv, 200, [
            ]);
        }
        
    }
}
