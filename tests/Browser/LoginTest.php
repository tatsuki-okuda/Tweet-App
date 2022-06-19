<?php

namespace Tests\Browser;

use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class LoginTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     *
     * @return void
     */
    public function testSuccessfulLogin()
    {
        $this->browse(function (Browser $browser) {
            // テスト用のユーザーを作成する
            $user = User::factory()->create();

            $browser->visit('/login') // パスを変更する
                // メールアドレスを入力する
                ->type('email', $user->email)
                // パスワードを入力する
                ->type('password', 'password')
                // 「LOG IN」ボタンをクリックする
                ->press('LOG IN')
                // /tweetに遷移したことを確認する
                ->assertPathIs('/tweet')
                // ページ内に「つぶやきアプリ」が表示されていることの確認
                ->assertSee('つぶやきアプリ');
        });
    }
}
