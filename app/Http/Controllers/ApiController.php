<?php

namespace App\Http\Controllers;

use App\Service\Twitter;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class ApiController extends Controller
{

    public function __invoke($username, Request $request)
    {
        $twitter = new Twitter($username);
        return $twitter->getTweets(
            $request->start_time ? new Carbon($request->start_time) : null,
            $request->end_time ? new Carbon($request->end_time) : null,
        );
    }
}
