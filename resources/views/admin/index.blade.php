@extends("app")

<div class="container mt-5 flex-column" id="root">
    @include("admin.control_panel") 
    @include('admin.users_table')   
</div>