

<div class="f">
    <h3>New Task</h3>
    <form action="/admin/employee/add" method="post" class="border">
        @csrf
        <input 
        type="text" 
        name="title" 
        placeholder="Tittle">

        <input 
        type="submit" 
        name="register">
    </form>
</div>

@include('form_error')
