<?php

namespace App\Tests\Entity;

use PHPUnit\Framework\TestCase;
use App\Entity\Forecast;

class ForecastTest extends TestCase
{
    public function dataGetFahrenheit(): array
    {
    return [
            ['0', 32],
            ['-100', -148],
            ['100', 212],
            ['27', 80.6],
            ['-6', 21.2],
            ['94', 201.2],
            ['-21', -5.8],
            ['37', 98.6],
            ['41.5', 106.7],
            ['88.8', 191.84],
        ];
    }

    /**
     * @dataProvider dataGetFahrenheit
     */
    public function testGetFahrenheit($celsius, $expectedFahrenheit): void
    {
        $forecast = new Forecast();

        //$forecasts->setCelsius('0');
        //$this->assertEquals(32, $forecasts->getFahrenheit());
        //$forecasts->setCelsius('-100');
        //$this->assertEquals(-148, $forecasts->getFahrenheit());
        //$forecasts->setCelsius('100');
        //$this->assertEquals(212, $forecasts->getFahrenheit());
    
        $forecast->setCelsius($celsius);
        $this->assertEquals($expectedFahrenheit, $forecast->getFahrenheit(), "Expected $expectedFahrenheit Fahrenheit for $celsius Celsius, got {$forecast->getFahrenheit()}");
    }
    
    
    
}
