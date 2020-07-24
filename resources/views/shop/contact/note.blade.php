@if(Session::has('error'))
	{{Session::get('error')}}
@endif

<!-- @if (session('status'))
    <div class="alert alert-success">
        {{ session('status') }}
    </div>
@endif -->