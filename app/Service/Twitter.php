<?php

namespace App\Service;

use Illuminate\Support\Facades\Http;

class Twitter
{
    public $isValid = false;
    public $response;

    public function getProfile($username)
    {
        $response = Http::withToken(env('TWITTER_API_TOKEN'))
            ->get(
                'https://api.twitter.com/2/users/by',
                [
                    'usernames' => $username,
                    'user.fields' => 'profile_image_url,protected'
                ]
            );
        if (isset($response->object()->errors)) {
            return;
        }
        $this->isValid = true;
        $this->response = $response->object()->data[0];
        return;
    }

    public function getTweets($id)
    {
        $response = Http::withToken(env('TWITTER_API_TOKEN'))
            ->get(
                "https://api.twitter.com/2/users/$id/tweets",
                [
                    'max_results' => 20
                ]
            );
        dd($response->object());
        if (isset($response->object()->errors)) {
            return;
        }
        $this->isValid = true;
        $this->response = $response->object()->data;
        return;
    }
}
