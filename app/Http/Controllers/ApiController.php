<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ApiController extends Controller
{
    public function getProfile($username)
    {
        return $username;
    }

    public function getTweets($id)
    {
        return "a";
    }
}
