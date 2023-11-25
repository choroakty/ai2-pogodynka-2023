<?php

/**
 * This file has been auto-generated
 * by the Symfony Routing Component.
 */

return [
    false, // $matchHost
    [ // $staticRoutes
        '/_profiler' => [[['_route' => '_profiler_home', '_controller' => 'web_profiler.controller.profiler::homeAction'], null, null, null, true, false, null]],
        '/_profiler/search' => [[['_route' => '_profiler_search', '_controller' => 'web_profiler.controller.profiler::searchAction'], null, null, null, false, false, null]],
        '/_profiler/search_bar' => [[['_route' => '_profiler_search_bar', '_controller' => 'web_profiler.controller.profiler::searchBarAction'], null, null, null, false, false, null]],
        '/_profiler/phpinfo' => [[['_route' => '_profiler_phpinfo', '_controller' => 'web_profiler.controller.profiler::phpinfoAction'], null, null, null, false, false, null]],
        '/_profiler/xdebug' => [[['_route' => '_profiler_xdebug', '_controller' => 'web_profiler.controller.profiler::xdebugAction'], null, null, null, false, false, null]],
        '/_profiler/open' => [[['_route' => '_profiler_open_file', '_controller' => 'web_profiler.controller.profiler::openAction'], null, null, null, false, false, null]],
        '/city' => [[['_route' => 'app_city_index', '_controller' => 'App\\Controller\\CityController::index'], null, ['GET' => 0], null, true, false, null]],
        '/city/new' => [[['_route' => 'app_city_new', '_controller' => 'App\\Controller\\CityController::new'], null, ['GET' => 0, 'POST' => 1], null, false, false, null]],
        '/forecast' => [[['_route' => 'app_forecast_index', '_controller' => 'App\\Controller\\ForecastController::index'], null, ['GET' => 0], null, true, false, null]],
        '/forecast/new' => [[['_route' => 'app_forecast_new', '_controller' => 'App\\Controller\\ForecastController::new'], null, ['GET' => 0, 'POST' => 1], null, false, false, null]],
        '/login' => [[['_route' => 'app_login', '_controller' => 'App\\Controller\\LoginController::index'], null, null, null, false, false, null]],
        '/logout' => [[['_route' => 'app_logout'], null, ['GET' => 0], null, false, false, null]],
    ],
    [ // $regexpList
        0 => '{^(?'
                .'|/_(?'
                    .'|error/(\\d+)(?:\\.([^/]++))?(*:38)'
                    .'|wdt/([^/]++)(*:57)'
                    .'|profiler/([^/]++)(?'
                        .'|/(?'
                            .'|search/results(*:102)'
                            .'|router(*:116)'
                            .'|exception(?'
                                .'|(*:136)'
                                .'|\\.css(*:149)'
                            .')'
                        .')'
                        .'|(*:159)'
                    .')'
                .')'
                .'|/city/([^/]++)(?'
                    .'|(*:186)'
                    .'|/edit(*:199)'
                    .'|(*:207)'
                .')'
                .'|/forecast/([^/]++)(?'
                    .'|(*:237)'
                    .'|/edit(*:250)'
                    .'|(*:258)'
                .')'
                .'|/weather/([^/]++)(*:284)'
            .')/?$}sDu',
    ],
    [ // $dynamicRoutes
        38 => [[['_route' => '_preview_error', '_controller' => 'error_controller::preview', '_format' => 'html'], ['code', '_format'], null, null, false, true, null]],
        57 => [[['_route' => '_wdt', '_controller' => 'web_profiler.controller.profiler::toolbarAction'], ['token'], null, null, false, true, null]],
        102 => [[['_route' => '_profiler_search_results', '_controller' => 'web_profiler.controller.profiler::searchResultsAction'], ['token'], null, null, false, false, null]],
        116 => [[['_route' => '_profiler_router', '_controller' => 'web_profiler.controller.router::panelAction'], ['token'], null, null, false, false, null]],
        136 => [[['_route' => '_profiler_exception', '_controller' => 'web_profiler.controller.exception_panel::body'], ['token'], null, null, false, false, null]],
        149 => [[['_route' => '_profiler_exception_css', '_controller' => 'web_profiler.controller.exception_panel::stylesheet'], ['token'], null, null, false, false, null]],
        159 => [[['_route' => '_profiler', '_controller' => 'web_profiler.controller.profiler::panelAction'], ['token'], null, null, false, true, null]],
        186 => [[['_route' => 'app_city_show', '_controller' => 'App\\Controller\\CityController::show'], ['id'], ['GET' => 0], null, false, true, null]],
        199 => [[['_route' => 'app_city_edit', '_controller' => 'App\\Controller\\CityController::edit'], ['id'], ['GET' => 0, 'POST' => 1], null, false, false, null]],
        207 => [[['_route' => 'app_city_delete', '_controller' => 'App\\Controller\\CityController::delete'], ['id'], ['POST' => 0], null, false, true, null]],
        237 => [[['_route' => 'app_forecast_show', '_controller' => 'App\\Controller\\ForecastController::show'], ['id'], ['GET' => 0], null, false, true, null]],
        250 => [[['_route' => 'app_forecast_edit', '_controller' => 'App\\Controller\\ForecastController::edit'], ['id'], ['GET' => 0, 'POST' => 1], null, false, false, null]],
        258 => [[['_route' => 'app_forecast_delete', '_controller' => 'App\\Controller\\ForecastController::delete'], ['id'], ['POST' => 0], null, false, true, null]],
        284 => [
            [['_route' => 'app_weather', '_controller' => 'App\\Controller\\WeatherController::city'], ['name'], null, null, false, true, null],
            [null, null, null, null, false, false, 0],
        ],
    ],
    null, // $checkCondition
];