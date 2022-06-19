<?php

namespace App\Http\Controllers\Tweet;

use App\Exceptions\Handler;
use App\Http\Controllers\Controller;
use App\Models\Tweet;
use App\Services\TweetService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use Illuminate\View\Factory;

class IndexController extends Controller
{
    /**
     * Handle the incoming request.
     * 
     * TweetService $tweetService　は依存性の注入
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request, Factory $factory, TweetService $tweetService)
    {
        // $tweets = Tweet::orderBy('created_at', 'DESC')->get();

        //TweetServiceのインスタンス化
        // もしくは引数として受け取ることで依存性の注入ができる
        // $tweetService = new TweetService();
        $tweets = $tweetService->getTweets();

        //デバッグ
        // dump($tweets);
        // app(Handler::class)->render(request(), throw new \Error('dump report.'));

        // return view('tweet.index')->with('name', 'laravel');
        //ファザーどで呼び出す
        // return View::make('tweet.index', ['name' => 'laravel']);
        //factoryをインジェクションして呼び出す
        return $factory->make('tweet.index', ['tweets' => $tweets]);


        
    }
}
