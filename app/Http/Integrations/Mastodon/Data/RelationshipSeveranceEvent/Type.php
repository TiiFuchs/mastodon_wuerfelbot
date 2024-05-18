<?php

namespace App\Http\Integrations\Mastodon\Data\RelationshipSeveranceEvent;

enum Type: string
{
    case DomainBlock = 'domain_block';

    case UserDomainBlock = 'user_domain_block';

    case AccountSuspension = 'account_suspension';
}
