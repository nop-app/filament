<?php

namespace Nop\Filament;

use Filament\PluginServiceProvider;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Config;

class NopServiceProvider extends PluginServiceProvider
{
    public static string $name = 'nop';

    protected array $scripts = [
        'nop-scripts' => __DIR__ . '/../resources/dist/app.js',
    ];

    /**
     * Provide data to the page scripts.
     *
     * @return array
     */
    protected function getScriptData(): array
    {
        $userName = null;

        if (($userNameField = Config::get('nop.user_name_field')) && Auth::check()) {
            $userName = Auth::user()->$userNameField;
        }

        return [
            'nop' => Config::get('nop.settings') + [
                'enabled' => Config::get('nop.enabled', false) && $this->isRouteEnabled(),
                'token' => Config::get('nop.token'),
                'user' => $userName,
            ],
        ];
    }

    /**
     * Check if the current route is enabled.
     *
     * @return bool
     */
    protected function isRouteEnabled(): bool
    {
        /** @var \Illuminate\Http\Request $request */
        $request = App::make('request');

        foreach (Config::get('nop.enabled_routes') as $pattern) {
            if (preg_match('#^' . $pattern . '$#i', $request->path())) {
                return true;
            }
        }

        return false;
    }
}
