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
    protected $signature = 'crud:generator {name : Class (singular) for example User}';

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
        $name = $this->argument('name');

        $this->controller($name);
        $this->model($name);
        $this->repository($name);
        $this->request($name);
        $this->views_create($name);
        $this->views_edit($name);
        $this->views_index($name);
        $this->views_header_buttons($name);

        File::append(base_path('routes/web.php'), '/* Project CRUD */');
        File::append(base_path('routes/web.php'), 'Route::resource(\'' . strtolower($name) . "', '{$name}Controller');");
    }

    protected function getStub($type)
    {
        return file_get_contents(resource_path("stubs/$type.stub"));
    }

    protected function model($name)
    {
        $modelTemplate = str_replace(
            ['{{modelName}}'],
            [$name],
            $this->getStub('Model')
        );

        file_put_contents(app_path("/Models/{$name}.php"), $modelTemplate);
    }

    protected function repository($name)
    {
        $repositoryTemplate = str_replace(
            ['{{modelName}}'],
            [$name],
            $this->getStub('Repository')
        );

        file_put_contents(app_path("/Repositories/{$name}Repository.php"), $repositoryTemplate);
    }

    protected function controller($name)
    {
        $controllerTemplate = str_replace(
            [
                '{{modelName}}',
                '{{modelNamePluralLowerCase}}',
                '{{modelNameSingularLowerCase}}'
            ],
            [
                $name,
                strtolower(str_plural($name)),
                strtolower($name)
            ],
            $this->getStub('Controller')
        );

        file_put_contents(app_path("/Http/Controllers/{$name}Controller.php"), $controllerTemplate);
    }

    protected function request($name)
    {
        $requestTemplate = str_replace(
            ['{{modelName}}'],
            [$name],
            $this->getStub('Request')
        );

        if (!file_exists($path = app_path('/Http/Requests'))) {
            if ( !mkdir( $path, 0777, true ) && !is_dir( $path ) ) {
                throw new \RuntimeException( sprintf( 'Directory "%s" was not created', $path ) );
            }
        }

        file_put_contents(app_path("/Http/Requests/{$name}Request.php"), $requestTemplate);
    }

    protected function views_create($name)
    {
        $name_lcase = strtolower($name);
        $viewTemplate = str_replace(
            [
                '{{modelName}}',
                '{{modelNamePluralLowerCase}}',
                '{{modelNameSingularLowerCase}}'
            ],
            [
                $name,
                strtolower(str_plural($name)),
                strtolower($name)
            ],
            $this->getStub('views.create')
        );

        $destination_folder = resource_path("/views/{$name_lcase}");
        if (!mkdir($destination_folder) && !is_dir($destination_folder)) {
            throw new \RuntimeException(sprintf('Directory "%s" was not created', $destination_folder));
        }

        file_put_contents($destination_folder . '/create.blade.php', $viewTemplate);
    }

    protected function views_edit($name)
    {
        $name_lcase = strtolower($name);
        $viewTemplate = str_replace(
            [
                '{{modelName}}',
                '{{modelNamePluralLowerCase}}',
                '{{modelNameSingularLowerCase}}'
            ],
            [
                $name,
                strtolower(str_plural($name)),
                strtolower($name)
            ],
            $this->getStub('views.edit')
        );

        $destination_folder = resource_path("/views/{$name_lcase}");

        file_put_contents($destination_folder . '/edit.blade.php', $viewTemplate);
    }

    protected function views_index($name)
    {
        $name_lcase = strtolower($name);
        $viewTemplate = str_replace(
            [
                '{{modelName}}',
                '{{modelNamePluralLowerCase}}',
                '{{modelNameSingularLowerCase}}'
            ],
            [
                $name,
                strtolower(str_plural($name)),
                strtolower($name)
            ],
            $this->getStub('views.index')
        );

        $destination_folder = resource_path("/views/{$name_lcase}");

        file_put_contents($destination_folder . '/index.blade.php', $viewTemplate);
    }

    protected function views_header_buttons($name)
    {
        $name_lcase = strtolower($name);
        $viewTemplate = str_replace(
            [
                '{{modelName}}',
                '{{modelNamePluralLowerCase}}',
                '{{modelNameSingularLowerCase}}'
            ],
            [
                $name,
                strtolower(str_plural($name)),
                strtolower($name)
            ],
            $this->getStub('views.include.header-buttons')
        );

        $destination_folder = resource_path("/views/{$name_lcase}/include");
        if (!mkdir($destination_folder) && !is_dir($destination_folder)) {
            throw new \RuntimeException(sprintf('Directory "%s" was not created', $destination_folder));
        }

        file_put_contents($destination_folder . '/header-buttons.blade.php', $viewTemplate);
    }

}
