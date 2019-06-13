<?php

namespace App\Listeners;

use Laravel\Passport\Events\AccessTokenCreated;
use Laravel\Passport\Client;
use DB;

class PruneOldTokens
{
  
  public function __construct()
  {
    //
  }

  public function handle(AccessTokenCreated $event)
  {
    DB::table('oauth_refresh_tokens')
      ->where('id', '<>', $event->refreshTokenId)
      ->where('access_token_id', '<>', $event->accessTokenId)
      ->update(['revoked' => true]);
  }

}
