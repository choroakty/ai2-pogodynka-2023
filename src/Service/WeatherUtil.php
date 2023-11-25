<?php
declare(strict_types=1);

namespace App\Service;

use App\Entity\City;
use App\Entity\Forecast;
use App\Repository\CityRepository;
use App\Repository\ForecastRepository;

class WeatherUtil
{
    public function __construct(
        private readonly CityRepository $cityRepository,
        private readonly ForecastRepository $forecastRepository,
    )
    {
    }
    /**
     * @return Forecast[]
     */
    public function getWeatherForCity(City $city): array
    {
        $forecasts = $this->forecastRepository->findByLocation($city);
        return $forecasts;
    }

    /**
     * @return Forecast[]
     */
    public function getWeatherForCountryAndCity(string $countryCode, string $name): array
    {
        $city = $this->cityRepository->findOneBy([
            'country_code' => $countryCode,
            'name' => $name,
        ]);

        $forecasts = $this->getWeatherForCity($city);

        return $forecasts;
    }
}