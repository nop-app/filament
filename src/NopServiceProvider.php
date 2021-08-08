<?php

namespace Nop\Filament;

use Filament\Filament;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Config;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

class NopServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        $package
            ->name('nop')
            ->hasAssets()
            ->hasConfigFile();
    }

    public function bootingPackage()
    {
        Filament::serving(function () {
            Filament::registerScript($this->package->name, '/vendor/' . $this->package->name . '/app.js');

            $userName = null;

            if (($userNameField = Config::get('nop.user_name_field')) && Auth::check()) {
                $userName = Auth::user()->$userNameField;
            }

            Filament::provideToScript([
                'nop' => Config::get('nop.settings') + [
                    'enabled' => Config::get('nop.enabled', false) && $this->routeEnabled(),
                    'token' => Config::get('nop.token'),
                    'user' => $userName,
                ],
            ]);
        });
    }

    /**
     * Check if the current route is enabled.
     *
     * @return bool
     */
    protected function routeEnabled(): bool
    {
        foreach (Config::get('nop.enabled_routes') as $pattern) {
            if (preg_match('#^' . $pattern . '$#i', request()->path())) {
                return true;
            }
        }

        return false;
    }
}
