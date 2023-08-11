@csrf
<label for="subject">
    Subject
    <input type="text" name="subject" placeholder="Doubt's title" value="{{ $support->subject ?? old('subject')}}">
</label>
<label for="content_body">
    Content Support
    <textarea name="content_body" cols="30" rows="5" placeholder="Doubt's description"> {{ $support->content_body ?? old('content_body')}}</textarea>
</label>
<button type="submit">Submit</button>
