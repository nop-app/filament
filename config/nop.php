<?php

return [
    /*
    |--------------------------------------------------------------------------
    | Enabled
    |--------------------------------------------------------------------------
    |
    | Define if Nop should be enabled or not.
    |
    */
    'enabled' => env('NOP_ENABLED', true),

    /*
    |--------------------------------------------------------------------------
    | Nop token
    |--------------------------------------------------------------------------
    |
    | Token of the Nop project.
    | If you don't have a project yet, create one for free at
    | https://nop.is/account/projects/create.
    |
    */

    'token' => env('NOP_TOKEN'),

    /*
    |--------------------------------------------------------------------------
    | Enabled routes
    |--------------------------------------------------------------------------
    |
    | Routes where Nop should be enabled.
    |
    */
    'enabled_routes' => [
        // This route enables all resources of your admin
        // E.g. /admin/<resource name>/<id or uuid>/edit
        'admin/[a-z-_]+/[0-9a-z-]+/edit',
    ],


    /*
    |--------------------------------------------------------------------------
    | User name field
    |--------------------------------------------------------------------------
    |
    | Choose the user name field shown in the Nop modals.
    | E.g. "name" will be fetched as Auth::user()->name.
    | Set this to `null` to disable it.
    |
    */
    'user_name_field' => 'name',

    'settings' => [

        /*
        |--------------------------------------------------------------------------
        | Nop locale
        |--------------------------------------------------------------------------
        |
        | Set the locale for Nop. Can be a locale or an array of translations.
        | See more: https://docs.nop.is/usage/settings.html#locale
        |
        */
        'locale' => 'en-US',

        /*
        |--------------------------------------------------------------------------
        | Redirect on cancel
        |--------------------------------------------------------------------------
        |
        | The URL in which the guest will be redirected when
        | canceling an access request.
        | See more: https://docs.nop.is/usage/settings.html#redirectoncancel
        */
        'redirectOnCancel' => '/',

        /*
        |--------------------------------------------------------------------------
        | Redirect on reject
        |--------------------------------------------------------------------------
        |
        | The URL in which the guest will be redirected when
        | his access request has been rejected.
        | See more: https://docs.nop.is/usage/settings.html#redirectonreject
        */
        'redirectOnReject' => '/',

        /*
        |--------------------------------------------------------------------------
        | Redirect on reject
        |--------------------------------------------------------------------------
        |
        | The URL in which the owner will be redirected when accepting
        | an access request and, therefore, his session has been closed.
        | See more: https://docs.nop.is/usage/settings.html#redirectonapprove
        */
        'redirectOnApprove' => '/',

        /*
        |--------------------------------------------------------------------------
        | Redirect on forced
        |--------------------------------------------------------------------------
        |
        | The URL in which the owner will be redirected whenan access request
        | has been forced from a guest and, therefore, his session has been closed.
        | See more: https://docs.nop.is/usage/settings.html#redirectonforced
        */
        'redirectOnForced' => '/',

    ],

];
