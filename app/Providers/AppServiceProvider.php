<?php

namespace App\Providers;

use App\Helpers\CacheHelper;
use App\Helpers\ResponseHelper;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->bind('ps_cache', function () {
            return new CacheHelper();
        });

        $this->app->singleton('ps_response', function () {
            return new ResponseHelper();
        });
    }

    public function boot(): void
    {
        Model::preventLazyLoading(! app()->isProduction());
        Paginator::useBootstrapFive();
        JsonResource::withoutWrapping();
        Schema::defaultStringLength(191);

        Blueprint::macro('statusColumn', function () {
            $this->boolean('status')->default(true)->comment('0=inactive, 1=active');
        });

        Blueprint::macro('booleanColumn', function ($name, $default = false) {
            $this->boolean($name)->default($default)->comment('0=no, 1=yes');
        });

        $this->loadSmtpSettingsFromDatabase();
    }

    protected function loadSmtpSettingsFromDatabase()
    {
        if (! app()->isProduction()) {
            return;
        }

        try {
            config([
                'mail.mailers.smtp.host' => setting()->get('smtp_host'),
                'mail.mailers.smtp.username' => setting()->get('smtp_username'),
                'mail.mailers.smtp.password' => setting()->get('smtp_password'),
                'mail.mailers.smtp.port' => setting()->get('smtp_port'),
                'mail.mailers.smtp.encryption' => setting()->get('smtp_encryption'),
                'mail.from.address' => setting()->get('smtp_from_email'),
            ]);
        } catch (\Throwable $th) {
            Log::emergency($th->getMessage());
        }
    }
}
