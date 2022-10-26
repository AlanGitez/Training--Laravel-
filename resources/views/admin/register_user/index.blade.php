@extends('app')

@section("index")
<div class="container w-50 mt-5 border shadow" id="root">
    @include("admin.register_user.form")
</div>
@endsection