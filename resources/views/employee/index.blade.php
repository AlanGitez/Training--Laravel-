@extends("app")

@section("index")

<div class="container w-50 mt-5 border shadow">
    @if(session("id") != null)
    {{-- @auth --}}
        @include("employee.billboard")
    {{-- @endauth --}}
    @else
    {{-- @guest --}}
        @yield("content")
    {{-- @endguest  --}}
    @endif
</div>

@endsection