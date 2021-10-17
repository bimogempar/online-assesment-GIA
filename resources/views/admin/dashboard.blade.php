dashboard page {{auth()->user()->name}} level {{auth()->user()->level}}

<p>
<form action="/logout" method="post">
    @csrf
    <button type="submit">logout</button>
</form>
</p>

create quiz
<form action="{{route('storeQuiz')}}" method="post">
    @csrf
    <input type="text" name="quiz_name" id="">
    <button type="submit">submit</button>
</form>

<div style="color: rgb(4, 201, 4)">
    @if($message = Session::get('success'))
    {{$message}}
    @endif
</div>

list quiz
@foreach ($listquiz as $itemquiz)
<li>
    <a href="{{route('showQuiz', ['id' => $itemquiz->id])}}">
        {{$itemquiz->quiz_name}}
    </a>
</li>
@endforeach
