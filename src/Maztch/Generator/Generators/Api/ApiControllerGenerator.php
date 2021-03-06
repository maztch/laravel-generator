<?php

namespace Maztch\Generator\Generators\API;

use Config;
use Maztch\Generator\CommandData;
use Maztch\Generator\Generators\GeneratorProvider;
use Maztch\Generator\Utils\GeneratorUtils;

class ApiControllerGenerator implements GeneratorProvider
{
    /** @var  CommandData */
    private $commandData;

    /** @var string  */
    private $path;

    public function __construct($commandData)
    {
        $this->commandData = $commandData;
        $this->path = Config::get('generator.path_api_controller', app_path('Http/Controllers/Api/'));
    }

    public function generate()
    {
        $templateData = $this->commandData->templatesHelper->getTemplate('Controller', 'api');

        $templateData = GeneratorUtils::fillTemplate($this->commandData->dynamicVars, $templateData);

        $fileName = $this->commandData->modelName.'ApiController.php';

        if (!file_exists($this->path)) {
            mkdir($this->path, 0755, true);
        }

        $path = $this->path.$fileName;

        $this->commandData->fileHelper->writeFile($path, $templateData);
        $this->commandData->commandObj->comment("\nAPI Controller created: ");
        $this->commandData->commandObj->info($fileName);
    }
}
