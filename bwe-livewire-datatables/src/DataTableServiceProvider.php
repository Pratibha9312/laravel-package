<?php

namespace BweLivewireDatatables;

use Illuminate\Support\ServiceProvider;
use Livewire\Livewire;
use BweLivewireDatatables\Components\DataTable;

class DataTableServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->mergeConfigFrom(
            __DIR__ . '/../config/datatable.php',
            'datatable'
        );
    }

    public function boot(): void
    {
        $this->loadViewsFrom(
            __DIR__ . '/../resources/views',
            'datatable'
        );

        $this->publishes([
            __DIR__ . '/../config/datatable.php' =>
                config_path('datatable.php'),
        ], 'datatable-config');

        Livewire::component('data-table', DataTable::class);
    }
}