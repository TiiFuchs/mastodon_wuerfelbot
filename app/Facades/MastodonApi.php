<?php

namespace App\Facades;

use Illuminate\Support\Facades\Facade;

class MastodonApi extends Facade
{
    protected static function getFacadeAccessor()
    {
        return \App\Http\Integrations\Mastodon\Mastodon::class;
    }
}
