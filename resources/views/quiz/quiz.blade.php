create question child of quiz {{$quiz->id}}
<form action="{{route('storeQuestion',['quizid' => $quiz->id])}}" method="post">
    {{-- <form action="/question/{{$quiz->id}}/create" method="post"> --}}
    @csrf
    <input type="text" name="question" id="">
    <button type="submit">submit</button>
</form>

<div style="color: rgb(4, 201, 4)">
    @if($message = Session::get('success'))
    {{$message}}
    @endif
</div>

@foreach ($listquestion as $itemquestion)
<li>
    {{$itemquestion->question}}
</li>
@endforeach
