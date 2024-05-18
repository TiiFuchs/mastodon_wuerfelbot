<?php

namespace App\Console\Commands;

use App\Facades\MastodonAPI;
use App\Http\Integrations\Mastodon\Data\Notification\Notification;
use App\Jobs\ParseNotification;
use Illuminate\Console\Command;

class MastodonWork extends Command
{
    protected $signature = 'mastodon:work';

    protected $description = 'Daemon that listens to incoming Mastodon notifications';

    protected ?string $eventType = null;

    public function handle(): void
    {
        $response = MastodonApi::streaming()->userNotifications();
        $stream = $response->stream();

        $buffer = '';
        while (! $stream->eof()) {
            $char = $stream->read(1);

            if ($char === "\n") {
                $this->parseLine($buffer);
                $buffer = '';

                continue;
            }

            $buffer .= $char;
        }
    }

    protected function parseLine(string $line)
    {
        if (str_starts_with($line, ':') || $line === '') {
            return;
        }

        if (str_starts_with($line, 'event: ')) {

            $this->eventType = substr($line, 7);

        } elseif ($this->eventType === 'notification' && str_starts_with($line, 'data: ')) {

            $data = json_decode(substr($line, 6), true);
            $notification = Notification::from($data);

            ParseNotification::dispatch($notification);

            $this->eventType = null;

        }
    }
}
