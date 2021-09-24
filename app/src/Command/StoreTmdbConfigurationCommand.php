<?php

namespace App\Command;

use App\Entity\Configuration;
use App\Service\Repository\TmdbRepository;
use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;
use Symfony\Component\Serializer\SerializerInterface;

#[AsCommand(
    name: 'tmdb:configuration',
    description: 'Loads Tmdb configuration. Must be executed everyday',
)]
class StoreTmdbConfigurationCommand extends Command
{
    public function __construct(private TmdbRepository $tmdbRepository, private SerializerInterface $serializer)
    {
        parent::__construct();
    }

    protected function configure(): void
    {
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        try {
            $io = new SymfonyStyle($input, $output);
            $configuration = $this->tmdbRepository->getConfiguration();
            $data = $this->serializer->serialize($configuration, 'json');
            $filename = __dir__ . '/../../var/cache/' . getenv('APP_ENV') . '/tmdb.json';
            if (!file_put_contents($filename, $data)) {
                throw new \Exception('Could not write TMDB configuration file');
            }
            $io->success('Tmdb configuration has been successfuly loaded.');

            return Command::SUCCESS;
        } catch (\Exception $e) {
            $io->error('Could not load Tmdb configuration.');
            $io->error((string) $e);
            return Command::FAILURE;
        }
    }
}
