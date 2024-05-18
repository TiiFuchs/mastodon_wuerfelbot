<?php

namespace App\Http\Integrations\Mastodon\Data\Filter;

enum Context: string
{
    case Home = 'home';

    case Notifications = 'notifcations';

    case Public = 'public';

    case Thread = 'thread';

    case Account = 'account';
}
