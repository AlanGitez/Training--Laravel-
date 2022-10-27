

<div class="f">
    <h3>Register</h3>
    <form action="{{ route('employee.add')}}" method="post" class="border">
        @csrf
        <input 
        type="text" 
        name="name" 
        placeholder="Name">
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
