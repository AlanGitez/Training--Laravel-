@extends("employee.index")

@section("content")

<div class="f">
    <h3>Login</h3>
    <form action="{{ route('employee.login')}}" method="post" class="border">
        @csrf
        <input 
        type="email" 
        name="email"
        placeholder="Email">
        <input 
        type="password" 
        name="password"
        placeholder="Password">
        <input 
        type="submit" 
        name="register">
    </form>
</div>

@include('form_error')
@endsection
