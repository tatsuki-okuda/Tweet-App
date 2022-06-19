<?php

namespace App\Http\Controllers\Tweet;

use App\Http\Controllers\Controller;
use App\Http\Requests\Tweet\CreateRequest;
use App\Models\Tweet;
use App\Services\TweetService;
use Illuminate\Http\Request;

class CreateController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(CreateRequest $request, TweetService $tweetService)
    {
        //tweetモデルを新規でインスタンス化
        // $tweet = new Tweet();
        // $tweet->user_id = $request->userId();
        // $tweet->content = $request->tweet();
        // $tweet->save();

        $tweetService->saveTweet(
            $request->userId(),
            $request->tweet(),
            $request->images(),
        );

        return redirect()->route('tweet.index');
    }
}
