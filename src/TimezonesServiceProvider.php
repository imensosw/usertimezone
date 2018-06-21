<?php

namespace Imenso\Timezones;
use Illuminate\Support\Facades\Schema ;
use Illuminate\Support\ServiceProvider;

class TimezonesServiceProvider extends ServiceProvider
{
    /**
     * Register bindings in the container teat 11111.
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

        $this->registerPublishables();

    }
    public function registerPublishables()
    {
        $basepath = dirname( __DIR__ );
        $arrPublishable = [
            'migrations' => 
            [
                "$basepath/publishable/database/migrations" => database_path('migrations'),
            ]
        ];
        foreach ($arrPublishable as $group => $paths) {
            $this->publishes( $paths , $group ) ;
        }
    }

    /**
     * Perform post-registration booting of services.  222
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLenght(191);
        
        Blade::directive(
            'displayDate',
            function ($expression) {
                list($DateTime, $Timezone, $format) = explode(',', $expression);

                return  "<?php echo \Timezones::convertToLocal($DateTime, $Timezone, $format); ?>";
            }
        );
        
    }



}
