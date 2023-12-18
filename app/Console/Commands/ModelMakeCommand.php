<?php

namespace App\Console\Commands;

use Illuminate\Foundation\Console\ModelMakeCommand as BaseCommand;
use Illuminate\Support\Str;

class ModelMakeCommand extends BaseCommand
{
    /**
     * Override le lien entre les modèles et la bdd pour tout avoir au singulier (préférence personnelle)
     */

    /**
     * @param $name
     * @return string
     */
    protected function buildClass($name): string
    {
        $stub = $this->files->get($this->getStub());

        return $this
            ->replaceNamespace($stub, $name)
            ->replaceTable($stub, $name)
            ->replaceClass($stub, $name);
    }

    /**
     * @return void
     */
    protected function createMigration()
    {
        $table = Str::snake(Str::class_basename($this->argument('name')));

        if ($this->option('pivot')) {
            $table = Str::singular($table);
        }

        $this->call('make:migration', [
            'name' => "create_{$table}_table",
            '--create' => $table,
        ]);
    }

    /**
     * @return string
     */
    protected function getStub(): string
    {
        if ($this->option('pivot')) {
            return parent::getStub();
        }

        if ($this->option('morph-pivot')) {
            return parent::getStub();
        }

        return resource_path('stubs/model.stub');
    }

    /**
     * @param string $stub
     * @param string $name
     * @return $this
     */
    protected function replaceTable(string &$stub, string $name): self
    {
        $table =  Str::snake(class_basename($name));
        $stub = str_replace(['DummyClass', '{{ table }}', '{{table}}'], $table, $stub);

        return $this;
    }
}
