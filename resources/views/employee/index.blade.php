@extends("app")

@section("index")

<div class="container w-50 mt-5 border shadow">
    @if(session("id") != null)
        <h1>Ya estoy logueado</h1>
        @include("employee.billboard")
    @else
        @yield("content")
    @endif
</div>

@endsection