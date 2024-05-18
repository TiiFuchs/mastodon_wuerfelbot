<?php

namespace App\Http\Integrations\Mastodon\Data\Notification;

enum Type: string
{
    case Mention = 'mention';

    case Status = 'status';

    case Reblog = 'reblog';

    case Follow = 'follow';

    case FollowRequest = 'follow_request';

    case Favourite = 'favourite';

    case Poll = 'poll';

    case Update = 'update';

    case AdminSignUp = 'admin.sign_up';

    case AdminReport = 'admin.report';

    case SeveredRelationships = 'severed_relationships';

}
