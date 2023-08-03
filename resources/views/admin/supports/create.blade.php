<h1>Register your doubt</h1>

@if ($errors->any())
    @foreach ($errors->all() as $error)
        {{$error}}    
    @endforeach
@endif

<form action="{{ route('supports.store') }}" method="POST">
    @csrf 
    <input type="text" name="subject" placeholder="Doubt's title" value="{{ old('subject')}}">
    <textarea name="content" cols="30" rows="5" placeholder="Doubt's description"> {{ old('content')}}</textarea>
    <button type="submit">Submit</button>
</form>