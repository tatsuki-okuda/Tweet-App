@component('mail::message')

# 新しいユーザーが追加されました！

{{ $toUser->name }}さんこんにちは！<br>
新しく{{ $newUser->name }}さんが参加しました！

@endcomponent