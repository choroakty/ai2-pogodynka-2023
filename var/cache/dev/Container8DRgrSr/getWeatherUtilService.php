<?php

namespace Container8DRgrSr;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/**
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class getWeatherUtilService extends App_KernelDevDebugContainer
{
    /**
     * Gets the private 'App\Service\WeatherUtil' shared autowired service.
     *
     * @return \App\Service\WeatherUtil
     */
    public static function do($container, $lazyLoad = true)
    {
        include_once \dirname(__DIR__, 4).''.\DIRECTORY_SEPARATOR.'src'.\DIRECTORY_SEPARATOR.'Service'.\DIRECTORY_SEPARATOR.'WeatherUtil.php';

        return $container->privates['App\\Service\\WeatherUtil'] = new \App\Service\WeatherUtil(($container->privates['App\\Repository\\CityRepository'] ?? $container->load('getCityRepositoryService')), ($container->privates['App\\Repository\\ForecastRepository'] ?? $container->load('getForecastRepositoryService')));
    }
}
