<?php

namespace App\Command\Test;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;

use App\SNCF_API\SNCFApi;

class SNCFTestCommand extends Command
{
    protected static $defaultName = 'test:sncf';
    protected static $defaultDescription = 'Command to test sncf service';
    private SNCFApi $api; 

    const API_KEY = '183ac7f9-6aad-4bd1-94f1-affe386719f2';

    public function __construct(SNCFApi $api)
    {
        parent::__construct();

        $this->api = $api;
    }

    protected function configure(): void
    {
        $this
            ->setDescription(self::$defaultDescription)
            ->addArgument('arg1', InputArgument::OPTIONAL, 'Argument description')
            ->addOption('option1', null, InputOption::VALUE_NONE, 'Option description')
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        dd($this->api);

        return 0;
    }
}
