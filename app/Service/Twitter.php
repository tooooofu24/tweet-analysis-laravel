<?php

namespace App\Service;

use Illuminate\Support\Facades\Http;

class Twitter
{
    protected $userData;
    protected $tweets = [];
    protected $username;

    function __construct($username)
    {
        $this->username = $username;
    }

    public function getTweets()
    {
        $this->searchUserData();
        $this->searchTweets();
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
            abort(404);
        }
        $this->userData = $response->object()->data[0];
    }

    protected function searchTweets()
    {
        $response = Http::withToken(env('TWITTER_API_TOKEN'))
            ->get(
                "https://api.twitter.com/2/users/{$this->userData->id}/tweets",
                [
                    'max_results' => 20
                ]
            );
        if (isset($response->object()->errors)) {
            abort(404);
        }
        $this->tweets = $response->object()->data;
    }
}
