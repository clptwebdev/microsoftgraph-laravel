<?php

namespace Clpt\MicrosoftGraph;

use Illuminate\Support\ServiceProvider;

class MicrosoftGraphServiceProvider extends ServiceProvider {

    public function boot()
    {
        $this->publishes([
            __DIR__ . '/../config/microsoftgraph.php' => config_path('microsoftgraph.php')
        ]);
    }

    public function register()
    {
        //ensure one instance is up at a time
        $this->app->singleton(MicrosoftGraph::class, function() {
            return new MicrosoftGraph();
        });
    }

}
