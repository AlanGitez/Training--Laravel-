@extends("app")

@section("index")

<div class="container w-50 mt-5 border shadow">

        @includeWhen(Session::has("user"), "employee.billboard")
 
        @yield("content")
    
</div>

@endsection