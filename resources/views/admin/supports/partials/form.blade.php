@csrf
<input type="text" name="subject" placeholder="Doubt's title" value="{{ $support->subject ?? old('subject')}}">
<textarea name="content_body" cols="30" rows="5" placeholder="Doubt's description"> {{ $support->content_body ?? old('content_body')}}</textarea>
<button type="submit">Submit</button>
