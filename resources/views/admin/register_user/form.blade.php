
<div class="f">
    <h3>Register</h3>
    <form method="post" class="border">
        @csrf
        <input 
        type="text" 
        name="name" 
        placeholder="Name">
        <input 
        type="text" 
        name="lastname"
        placeholder="Lastname">
        <input 
        type="email" 
        name="mail"
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