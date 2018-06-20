<?php

namespace Imenso\Timezones;

use Illuminate\Support\ServiceProvider;

class TimezonesServiceProvider extends ServiceProvider
{
    /**
     * Register bindings in the container teat 1.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(
            'Imenso\Timezones\Timezones',
            function ($app) {
                return new \Imenso\Timezones\Timezones;
            }
        );
    }

    /**
     * Perform post-registration booting of services.
     *
     * @return void
     */
    public function boot()
    {
        Blade::directive(
            'displayDate',
            function ($expression) {
                list($DateTime, $Timezone, $format) = explode(',', $expression);

                return  "<?php echo \Timezones::convertToLocal($DateTime, $Timezone, $format); ?>";
            }
        );
    }
}
