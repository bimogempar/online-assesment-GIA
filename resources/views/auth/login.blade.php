login page

<form action="/login" method="post">
    @csrf
    <div>
        <label for="nopeg">nopeg</label>
        <input type="text" name="nopeg" id="nopeg">
        @error('nopeg') {{ $message }} @enderror
    </div>
    <div>
        <label for="dateofbirth">tgl lahir</label>
        <input type="date" name="dateofbirth" id="nopeg">
        @error('dateofbirth') {{ $message }} @enderror
    </div>
    <div>
        <button type="submit">login</button>
    </div>
    @if($message = Session::get('error'))
    {{$message}}
    @elseif($message = Session::get('success'))
    {{$message}}
    @endif
</form>
