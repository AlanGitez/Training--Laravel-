@extends('app')

@section("index")
@includeWhen(Session::get("error"), "commons.error_alert")

<div class="container w-25 mt-5 border shadow" id="root">
    @include("admin.register_task.form")
</div>
@endsection