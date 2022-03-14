<?php

namespace App\Http\Controllers;

use App\Service\Twitter;
use Illuminate\Http\Request;

class ApiController extends Controller
{

    public function __invoke($username)
    {
        $twitter = new Twitter($username);
        return $twitter->getTweets();
    }
}
