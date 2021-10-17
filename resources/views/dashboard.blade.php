dashboard page {{auth()->user()->name}} level {{auth()->user()->level}}
<p>
    <form action="/logout" method="post">
        @csrf
        <button type="submit">logout</button>
    </form>
</p>
