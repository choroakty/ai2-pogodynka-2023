<?php

namespace App\Command;

use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;
use App\Repository\CityRepository;
use App\Service\WeatherUtil;

#[AsCommand(
    name: 'weather:cityLocation',
    description: 'Displays forecasts for city in country',
)]
class WeatherCityLocationCommand extends Command
{
    public function __construct(
        private readonly CityRepository $cityRepository,
        private readonly WeatherUtil $weatherUtil,
        string $name = null,
    )
    {
        parent::__construct($name);
    }

    protected function configure(): void
    {
        $this
            ->addArgument('id', InputArgument::REQUIRED, 'ID [eg. 1]')
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $io = new SymfonyStyle($input, $output);
        $cityId = $input->getArgument('id');
        $city = $this->cityRepository->find($cityId);

        $forecasts = $this->weatherUtil->getWeatherForCity($city);
        $io->writeln(sprintf('City: %s', $city->getName()));
        foreach ($forecasts as $forecast) {
            $io->writeln(sprintf("\t%s: %s",
                $forecast->getDate()->format('Y-m-d'),
                $forecast->getCelsius()
            ));
        }
        return Command::SUCCESS;
    }
}
