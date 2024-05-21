<?php

namespace App\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as Middleware;

class VerifyCsrfToken extends Middleware
{
    /**
     * The URIs that should be excluded from CSRF verification.
     *
     * @var array
     */
    protected $except = [
        'https://vast-everglades-89224-1913d086a2cc.herokuapp.com/',
        'http://vast-everglades-89224-1913d086a2cc.herokuapp.com/search',
        '/',
        '/search'
    ];
}
