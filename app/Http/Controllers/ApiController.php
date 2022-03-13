<?php

namespace App\Http\Controllers;

use App\Service\Twitter;
use Illuminate\Http\Request;

class ApiController extends Controller
{
    public function getProfile($username)
    {
        $twitter = new Twitter;
        $twitter->getProfile($username);
        if (!$twitter->isValid) {
            abort(404);
        }
        return $twitter->response;
    }

    public function getTweets($id)
    {
        $twitter = new Twitter;
        $twitter->getTweets($id);
        if (!$twitter->isValid) {
            abort(404);
        }
        return $twitter->response;
    }
}
