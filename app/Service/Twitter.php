<?php

namespace App\Service;

use Carbon\Carbon;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class Twitter
{
    protected $userData;
    protected $tweets = [];
    protected $username;

    function __construct($username)
    {
        $this->username = $username;
    }

    public function getTweets(?Carbon $start_time = null, ?Carbon $end_time = null)
    {
        $this->searchUserData();
        $this->searchTweets($start_time, $end_time);
        return [
            'tweets' => $this->tweets,
            'userData' => $this->userData
        ];
    }

    protected function searchUserData()
    {
        $response = Http::withToken(env('TWITTER_API_TOKEN'))
            ->get(
                'https://api.twitter.com/2/users/by',
                [
                    'usernames' => $this->username,
                    'user.fields' => 'profile_image_url,protected'
                ]
            );
        if (isset($response->object()->errors)) {
            Log::debug($response->object()->errors);
            abort(404);
        }
        $this->userData = $response->object()->data[0];
    }

    protected function searchTweets(?Carbon $start_time = null, ?Carbon $end_time = null)
    {
        $response = Http::withToken(env('TWITTER_API_TOKEN'))
            ->get(
                "https://api.twitter.com/2/users/{$this->userData->id}/tweets",
                [
                    'max_results' => 100,
                    'start_time' => optional($start_time)->toIso8601String(),
                    'end_time' => optional($end_time)->toIso8601String(),
                ]
            );
        if (isset($response->object()->errors)) {
            Log::debug($response->object()->errors);
            abort(404);
        }
        $this->tweets = $response->object()->data;
    }
}
