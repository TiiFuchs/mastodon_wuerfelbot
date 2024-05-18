<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\InteractsWithTime;

class MastodonRestart extends Command
{
    use InteractsWithTime;

    protected $signature = 'mastodon:restart';

    protected $description = 'Restarts the worker';

    public function handle(): void
    {
        Cache::forever('mastodon:worker:restart', $this->currentTime());

        $this->info('Broadcasting Mastodon restart signal.');

    }
}
