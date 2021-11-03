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
        //
       '/atlet_data',
       '/pelatih_data',
       '/wasit_data',
       '/cabor_data',
       '/event_data',
       '/klub_data',
       '/organisasi_data',
       '/tradisional_data',
       '/sarana_data',
       '/pplp_data',
       '/prestasi_data',
    ];
}
