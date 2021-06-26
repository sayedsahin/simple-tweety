<?php

namespace App\Http\Controllers;

use App\Models\Tweet;

class TweetLikeController extends Controller
{
    public function store(Tweet $tweet)
    {
    	$tweet->like(current_user());
    	return back();
    }
    public function distroy(Tweet $tweet)
    {
    	$tweet->dislike(current_user());
    	return back();
    }
}
