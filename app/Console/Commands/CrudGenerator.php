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
    protected $signature = 'crud:generate {modelName : Class (singular) for example User} {--namespace=}';

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
        $namespace = $this->argument('namespace');

        // clean and format namespace option with trailing separator
        $namespaces = array_filter(explode('\\', $namespace), 'strlen');
        $namespace = '\\' . implode('\\', $namespaces);
        $path = '/' . implode('/', $namespaces);

        $this->controller($modelName, $namespace, $path);
        $this->model($modelName, $namespace, $path);
        $this->repository($modelName, $namespace, $path);
        $this->request($modelName, $namespace, $path);
        $this->views_create($modelName, $namespace, $path);
        $this->views_edit($modelName, $namespace, $path);
        $this->views_index($modelName, $namespace, $path);
        $this->views_header_buttons($modelName, $namespace, $path);

        File::append(base_path('routes/web.php'), PHP_EOL . "/* {$modelName} CRUD */" . PHP_EOL);
        File::append(base_path('routes/web.php'), 'Route::resource(' . strtolower($path . $modelName) . "', '{$modelName}Controller');" . PHP_EOL);
    }

    protected function getStub($type)
    {
        return file_get_contents(resource_path("stubs/$type.stub"));
    }

    protected function model($modelName, $path)
    {
        $modelTemplate = str_replace(
            '{{modelName}}',
            $modelName,
            $this->getStub('Model')
        );

        file_put_contents(app_path("/Models{$path}/{$modelName}.php"), $modelTemplate);
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

        file_put_contents(app_path("/Repositories{$path}/{$modelName}Repository.php"), $repositoryTemplate);
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

        file_put_contents(app_path("/Http/Controllers{$path}/{$modelName}Controller.php"), $controllerTemplate);
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

        if (!file_exists($filepath = app_path('/Http/Requests'))) {
            if (!mkdir($filepath, 0777, true) && !is_dir($filepath)) {
                throw new \RuntimeException(sprintf('Directory "%s" was not created', $filepath));
            }
        }

        file_put_contents(app_path("/Http/Requests{$path}/{$modelName}Request.php"), $requestTemplate);
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

        $destination_folder = resource_path("/views/{$modelName_lcase}");
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

        $destination_folder = resource_path("/views/{$modelName_lcase}");

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

        $destination_folder = resource_path("/views/{$modelName_lcase}");

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

        $destination_folder = resource_path("/views/{$modelName_lcase}/include");
        if (!is_dir($destination_folder) && !mkdir($destination_folder) && !is_dir($destination_folder)) {
            throw new \RuntimeException(sprintf('Directory "%s" was not created', $destination_folder));
        }

        file_put_contents($destination_folder . '/header-buttons.blade.php', $viewTemplate);
    }

}
