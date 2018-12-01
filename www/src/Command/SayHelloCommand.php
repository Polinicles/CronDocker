<?php

namespace App\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;

class SayHelloCommand extends Command
{

    /**
     * Define the command name, desc. and help
     *
     */
    protected function configure()
    {
        $this
            ->setName('app:say-hello')
            ->setDescription('Greets a user')
            ->setHelp("This command allows you to greet somebody");
        ;
    }

    /**
     * @param InputInterface $input
     * @param OutputInterface $output
     * @return int|null|void
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $io = new SymfonyStyle($input, $output);
        $io->success('Hellouda!');
    }
}