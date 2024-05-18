<?php

namespace App\Jobs;

use App\Facades\MastodonApi;
use App\Http\Integrations\Mastodon\Data\Notification\Notification;
use App\Http\Integrations\Mastodon\Forms\StatusForm;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;

class ParseNotification implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public function __construct(protected Notification $notification)
    {
    }

    public function handle(): void
    {
        $status = $this->notification->status;
        $text = strip_tags($status->content);

        if (! str_contains($text, '@wuerfelbot')) {
            Log::debug('Got a notification without mention', [
                'content' => $status->content,
            ]);
        }

        $numMatches = preg_match_all('/(\d*)W(\d+)/i', $text, $matches, PREG_SET_ORDER);

        if ($numMatches === 0) {
            $text = 'Ich habe keine Würfelangaben in deinem Post gefunden. Bitte nutze 2W20 oder W6 als Angabe.';
            ray($text);

            MastodonApi::statuses()->post(new StatusForm(
                status: $text,
                inReplyToId: $status->id,
                visibility: $status->visibility,
            ));

            return;
        }

        $dice = [];
        foreach ($matches as $match) {
            $quantity = $match[1] ?: 1;
            $sides = $match[2];

            for ($throw = 0; $throw < $quantity; $throw++) {
                $dice[$sides][] = rand(1, $sides);
            }
        }

        $text = "@{$status->account->acct} Deine Würfelergebnisse:\n\n".
            collect($dice)
                ->map(function ($item, $key) {
                    return 'W'.$key.': '.collect($item)->join(', ', ' und ');
                })
                ->implode("\n");

        MastodonApi::statuses()->post(new StatusForm(
            status: $text,
            inReplyToId: $status->id,
            visibility: $status->visibility,
        ));

    }
}
