<?php

namespace Maztch\Generator\Commands;

use Maztch\Generator\CommandData;
use Maztch\Generator\Generators\Api\ApiControllerGenerator;
use Maztch\Generator\Generators\Common\MigrationGenerator;
use Maztch\Generator\Generators\Common\ModelGenerator;
use Maztch\Generator\Generators\Common\RoutesGenerator;

class ApiGeneratorCommand extends BaseCommand
{
    /**
     * The console command name.
     *
     * @var string
     */
    protected $name = 'maztch.generator:api';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a full CRUD API for given model';

    /**
     * Create a new command instance.
     */
    public function __construct()
    {
        parent::__construct();

        $this->commandData = new CommandData($this, CommandData::$COMMAND_TYPE_API);
    }

    /**
     * Execute the command.
     *
     * @return void
     */
    public function handle()
    {
        parent::handle();

        if (!$this->commandData->skipMigration) {
            $migrationGenerator = new MigrationGenerator($this->commandData);
            $migrationGenerator->generate();
        }

        $modelGenerator = new ModelGenerator($this->commandData);
        $modelGenerator->generate();

        $repoControllerGenerator = new APIControllerGenerator($this->commandData);
        $repoControllerGenerator->generate();

        $routeGenerator = new RoutesGenerator($this->commandData);
        $routeGenerator->generate();

        if ($this->confirm("\nDo you want to migrate database? [y|N]", false)) {
            $this->call('migrate');
        }
    }

    /**
     * Get the console command arguments.
     *
     * @return array
     */
    protected function getArguments()
    {
        return array_merge(parent::getArguments(), []);
    }

    /**
     * Get the console command options.
     *
     * @return array
     */
    public function getOptions()
    {
        return array_merge(parent::getOptions(), []);
    }
}
