<x-mail::message>
# You received a new reply

Someone answered a question you posted.

<x-mail::button :url="route('replies.replies', $support->id)">
    Read now
</x-mail::button>

Thanks,<br>
{{ config('app.name') }}
</x-mail::message>
