<x-mail::message>
# You received a new reply

{{ $reply->user['name'] }} answered a question you posted.

<x-mail::button :url="route('replies.replies', $reply->id)">
    Read now
</x-mail::button>

Thanks,<br>
{{ config('app.name') }}
</x-mail::message>
