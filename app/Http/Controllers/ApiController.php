<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ApiController extends Controller
{
    public function getProfile($username)
    {
        return env('TWITTER_API_TOKEN');
    }

    public function getTweets($id)
    {
        return "a";
    }
}
