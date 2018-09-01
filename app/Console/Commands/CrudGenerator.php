<?php

namespace SCCatalog\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;

class CrudGenerator extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'crud:generate {modelName : Class (singular) for example User} {--namespace=none}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create CRUD operations';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $modelName = $this->argument('modelName');
        $namespace = $this->option('namespace');

        if ($namespace === 'none') {
            $namespace = '';
            $path = '';
        } else {
            // clean and format namespace option with trailing separator
            $namespaces = array_filter(explode('\\', $namespace), 'strlen');
            $namespace = '\\' . implode('\\', $namespaces);
            $path = '/' . implode('/', $namespaces);
        }

        $this->model($modelName, $namespace, $path);
        $this->repository($modelName, $namespace, $path);
        $this->controller($modelName, $namespace, $path);
        $this->request($modelName, $namespace, $path);
        $this->event($modelName, $namespace, $path);
        $this->listener($modelName, $namespace, $path);
        $this->views_create($modelName);
        $this->views_edit($modelName);
        $this->views_index($modelName);
        $this->views_header_buttons($modelName);

        File::append(base_path('routes/web.php'), PHP_EOL . "/* {$modelName} CRUD */" . PHP_EOL);
        File::append(base_path('routes/web.php'), 'Route::resource(\'' . strtolower($modelName) . "', '{$modelName}Controller');" . PHP_EOL);
    }

    protected function getStub($type)
    {
        return file_get_contents(resource_path("stubs/$type.stub"));
    }

    protected function model($modelName, $namespace, $path)
    {
        $modelTemplate = str_replace(
            [
                '{{modelName}}',
                '{{namespace}}',
            ],
            [
                $modelName,
                $namespace,
            ],
            $this->getStub('Model')
        );

        $destination_folder = app_path("Models{$path}");
        if (!is_dir($destination_folder) && !mkdir($destination_folder) && !is_dir($destination_folder)) {
            throw new \RuntimeException(sprintf('Directory "%s" was not created', $destination_folder));
        }

        file_put_contents($destination_folder . "/{$modelName}.php", $modelTemplate);
    }

    protected function repository($modelName, $namespace, $path)
    {
        $repositoryTemplate = str_replace(
            [
                '{{modelName}}',
                '{{namespace}}',
            ],
            [
                $modelName,
                $namespace,
            ],
            $this->getStub('Repository')
        );

        $destination_folder = app_path("Repositories{$path}");
        if (!is_dir($destination_folder) && !mkdir($destination_folder) && !is_dir($destination_folder)) {
            throw new \RuntimeException(sprintf('Directory "%s" was not created', $destination_folder));
        }

        file_put_contents($destination_folder . "/{$modelName}Repository.php", $repositoryTemplate);
    }

    protected function controller($modelName, $namespace, $path)
    {
        $controllerTemplate = str_replace(
            [
                '{{modelName}}',
                '{{modelNamePluralLowerCase}}',
                '{{modelNameSingularLowerCase}}',
                '{{namespace}}',
            ],
            [
                $modelName,
                strtolower(str_plural($modelName)),
                strtolower($modelName),
                $namespace,
            ],
            $this->getStub('Controller')
        );

        $destination_folder = app_path("Http/Controllers{$path}");
        if (!is_dir($destination_folder) && !mkdir($destination_folder) && !is_dir($destination_folder)) {
            throw new \RuntimeException(sprintf('Directory "%s" was not created', $destination_folder));
        }

        file_put_contents($destination_folder . "/{$modelName}Controller.php", $controllerTemplate);
    }

    protected function request($modelName, $namespace, $path)
    {
        $requestTemplate = str_replace(
            [
                '{{modelName}}',
                '{{namespace}}',
            ],
            [
                $modelName,
                $namespace,
            ],
            $this->getStub('Request')
        );

        $destination_folder = app_path("Http/Requests{$path}");
        if (!is_dir($destination_folder) && !mkdir($destination_folder) && !is_dir($destination_folder)) {
            throw new \RuntimeException(sprintf('Directory "%s" was not created', $destination_folder));
        }

        file_put_contents($destination_folder . "/{$modelName}Request.php", $requestTemplate);
    }

    protected function eventCreated($modelName, $namespace, $path)
    {
        $eventTemplate = str_replace(
            [
                '{{modelName}}',
                '{{modelNameSingularLowerCase}}',
                '{{namespace}}',
            ],
            [
                $modelName,
                strtolower($modelName),
                $namespace,
            ],
            $this->getStub('EventCreated')
        );

        $destination_folder = app_path("Events{$path}");
        if (!is_dir($destination_folder) && !mkdir($destination_folder) && !is_dir($destination_folder)) {
            throw new \RuntimeException(sprintf('Directory "%s" was not created', $destination_folder));
        }

        file_put_contents($destination_folder . "/{$modelName}CreatedEvent.php", $eventTemplate);
    }

    protected function eventUpdated($modelName, $namespace, $path)
    {
        $eventTemplate = str_replace(
            [
                '{{modelName}}',
                '{{modelNameSingularLowerCase}}',
                '{{namespace}}',
            ],
            [
                $modelName,
                strtolower($modelName),
                $namespace,
            ],
            $this->getStub('EventUpdated')
        );

        $destination_folder = app_path("Events{$path}");
        if (!is_dir($destination_folder) && !mkdir($destination_folder) && !is_dir($destination_folder)) {
            throw new \RuntimeException(sprintf('Directory "%s" was not created', $destination_folder));
        }

        file_put_contents($destination_folder . "/{$modelName}UpdatedEvent.php", $eventTemplate);
    }

    protected function eventDeleted($modelName, $namespace, $path)
    {
        $eventTemplate = str_replace(
            [
                '{{modelName}}',
                '{{modelNameSingularLowerCase}}',
                '{{namespace}}',
            ],
            [
                $modelName,
                strtolower($modelName),
                $namespace,
            ],
            $this->getStub('EventDeleted')
        );

        $destination_folder = app_path("Events{$path}");
        if (!is_dir($destination_folder) && !mkdir($destination_folder) && !is_dir($destination_folder)) {
            throw new \RuntimeException(sprintf('Directory "%s" was not created', $destination_folder));
        }

        file_put_contents($destination_folder . "/{$modelName}DeletedEvent.php", $eventTemplate);
    }

    protected function listener($modelName, $namespace, $path)
    {
        $listenerTemplate = str_replace(
            [
                '{{modelName}}',
                '{{namespace}}',
            ],
            [
                $modelName,
                $namespace,
            ],
            $this->getStub('Listener')
        );

        $destination_folder = app_path("Listeners{$path}");
        if (!is_dir($destination_folder) && !mkdir($destination_folder) && !is_dir($destination_folder)) {
            throw new \RuntimeException(sprintf('Directory "%s" was not created', $destination_folder));
        }

        file_put_contents($destination_folder . "/{$modelName}Listener.php", $listenerTemplate);
    }

    protected function views_create($modelName)
    {
        $modelName_lcase = strtolower($modelName);
        $viewTemplate = str_replace(
            [
                '{{modelName}}',
                '{{modelNamePluralLowerCase}}',
                '{{modelNameSingularLowerCase}}',
            ],
            [
                $modelName,
                strtolower(str_plural($modelName)),
                strtolower($modelName),
            ],
            $this->getStub('views.create')
        );

        $destination_folder = resource_path("views/{$modelName_lcase}");
        if (!is_dir($destination_folder) && !mkdir($destination_folder) && !is_dir($destination_folder)) {
            throw new \RuntimeException(sprintf('Directory "%s" was not created', $destination_folder));
        }

        file_put_contents($destination_folder . '/create.blade.php', $viewTemplate);
    }

    protected function views_edit($modelName)
    {
        $modelName_lcase = strtolower($modelName);
        $viewTemplate = str_replace(
            [
                '{{modelName}}',
                '{{modelNamePluralLowerCase}}',
                '{{modelNameSingularLowerCase}}',
            ],
            [
                $modelName,
                strtolower(str_plural($modelName)),
                strtolower($modelName),
            ],
            $this->getStub('views.edit')
        );

        $destination_folder = resource_path("views/{$modelName_lcase}");

        file_put_contents($destination_folder . '/edit.blade.php', $viewTemplate);
    }

    protected function views_index($modelName)
    {
        $modelName_lcase = strtolower($modelName);
        $viewTemplate = str_replace(
            [
                '{{modelName}}',
                '{{modelNamePluralLowerCase}}',
                '{{modelNameSingularLowerCase}}',
            ],
            [
                $modelName,
                strtolower(str_plural($modelName)),
                strtolower($modelName),
            ],
            $this->getStub('views.index')
        );

        $destination_folder = resource_path("views/{$modelName_lcase}");

        file_put_contents($destination_folder . '/index.blade.php', $viewTemplate);
    }

    protected function views_header_buttons($modelName)
    {
        $modelName_lcase = strtolower($modelName);
        $viewTemplate = str_replace(
            [
                '{{modelName}}',
                '{{modelNamePluralLowerCase}}',
                '{{modelNameSingularLowerCase}}',
            ],
            [
                $modelName,
                strtolower(str_plural($modelName)),
                strtolower($modelName),
            ],
            $this->getStub('views.include.header-buttons')
        );

        $destination_folder = resource_path("views/{$modelName_lcase}/include");
        if (!is_dir($destination_folder) && !mkdir($destination_folder) && !is_dir($destination_folder)) {
            throw new \RuntimeException(sprintf('Directory "%s" was not created', $destination_folder));
        }

        file_put_contents($destination_folder . '/header-buttons.blade.php', $viewTemplate);
    }

}
