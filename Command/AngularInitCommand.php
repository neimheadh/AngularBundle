<?php

namespace Neimheadh\Bundle\AngularBundle\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\Filesystem\Exception\FileNotFoundException;

/**
 * Angular application creation command.
 */
class AngularInitCommand extends Command
{
    /**
     * {@inheritdoc}
     *
     * @see Command::$defaultName
     */
    protected static $defaultName = 'angular:init';

    /**
     * {@inheritdoc}
     *
     * @see Command::$defaultDescription
     */
    protected static $defaultDescription = 'Create the angular application';

    /**
     * The application container.
     *
     * @var ContainerInterface
     */
    private $container;

    /**
     * Constructor.
     *
     * @param ContainerInterface $container The application container.
     */
    public function __construct(ContainerInterface $container)
    {
        $this->container = $container;
        parent::__construct();
    }

    /**
     * Get the first author mentionned in the composer parameters.
     *
     * @param  array  $composer The decoded composer.json.
     *
     * @return string|NULL
     */
    private function _getComposerFirstAuthor(array $composer): ?string
    {
        $author = null;
        if (isset($composer['authors']) && count($composer['authors'])) {
            $author = isset($composer['authors'][0]['name'])
                ? $composer['authors'][0]['name']
                : null;

            if (isset($composer['authors'][0]['email'])) {
                $author .= $author ? ' ' : '';
                $author .= '<' . $composer['authors'][0]['email'] . '>';
            }
        }

        return $author;
    }

    /**
     * Get the composer.json file content.
     *
     * @return array
     */
    private function _getComposerJson(): array
    {
        $composerFile = $this->container->getParameter('kernel.project_dir') .
            DIRECTORY_SEPARATOR . 'composer.json';

        if (!file_exists($composerFile)) {
            throw new FileNotFoundException(null, 0, null, $composerFile);
        }

        return json_decode(file_get_contents($composerFile), true);
    }

    /**
     * {@inheritdoc}
     *
     * @see Command::configure()
     */
    protected function configure()
    {
        $composer = $this->_getComposerJson();

        $this
            ->setDescription(self::$defaultDescription)
            ->addOption(
                'app-version',
                null,
                InputOption::VALUE_REQUIRED,
                'The angular application version.',
                isset($composer['version']) ? $composer['version'] : '1.0.0'
            )
            ->addOption(
                'description',
                null,
                InputOption::VALUE_REQUIRED,
                'The angular application description.',
                isset($composer['description'])
                    ? $composer['description']
                    : null
            )
            ->addOption(
                'project-name',
                'p',
                InputOption::VALUE_REQUIRED,
                'The angular application and Symfony application name.',
                isset($composer['name']) ? $composer['name'] : null
            )
            ->addOption(
                'angular-project-name',
                null,
                InputOption::VALUE_REQUIRED,
                'The angular application name.'
            )
            ->addOption(
                'git-repository',
                null,
                InputOption::VALUE_REQUIRED,
                'The angular application git repository.'
            )
            ->addOption(
                'keywork',
                'k',
                InputOption::VALUE_REQUIRED | InputOption::VALUE_IS_ARRAY,
                'The angular application keywords.',
                isset($composer['keywords']) ? $composer['keywords'] : []
            )
            ->addOption(
                'author',
                null,
                InputOption::VALUE_REQUIRED,
                'The angular application author.',
                $this->_getComposerFirstAuthor($composer)
            )
            ->addOption(
                'license',
                null,
                InputOption::VALUE_REQUIRED,
                'The angular application license.',
                isset($composer['license']) ? $composer['license'] : null
            )
            ->addOption(
                'directory',
                'd',
                InputOption::VALUE_REQUIRED,
                'The angular application directory.',
                'app'
            )
        ;
    }

    /**
     * {@inheritdoc}
     *
     * @see Command::execute()
     */
    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $io = new SymfonyStyle($input, $output);
        $arg1 = $input->getArgument('arg1');

        if ($arg1) {
            $io->note(sprintf('You passed an argument: %s', $arg1));
        }

        if ($input->getOption('option1')) {
            // ...
        }

        $io->success('You have a new command! Now make it your own! Pass --help to see your options.');

        return Command::SUCCESS;
    }
}
