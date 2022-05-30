<?php

namespace Quarterloop\w3cValidatorTile;

use Illuminate\Support\ServiceProvider;
use Livewire\Livewire;
use Quarterloop\w3cValidatorTile\Commands\Fetchw3cValidatorCommand;

class w3cValidatorTileServiceProvider extends ServiceProvider
{
    public function boot()
    {
        if ($this->app->runningInConsole()) {
            $this->commands([
                Fetchw3cValidatorCommand::class,
            ]);
        }

        $this->publishes([
            __DIR__ . '/../resources/views' => resource_path('views/vendor/dashboard-w3c-validator-tile'),
        ], 'dashboard-w3c-validator-views');

        $this->loadViewsFrom(__DIR__ . '/../resources/views', 'dashboard-w3c-validator-tile');

        Livewire::component('w3c-validator-tile', w3cValidatorTileComponent::class);
    }
}
