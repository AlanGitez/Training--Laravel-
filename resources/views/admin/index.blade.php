@extends("app")

@section("index")
<div class="container mt-5 flex-column w-75" id="root">
    @include("admin.control_panel") 
    @include('admin.users_table')   
</div>
@endsection