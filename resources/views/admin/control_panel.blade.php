
<div class="panel m-1 w-100">

    {{-- <div class="message">
        {{ Session::get("error") ?? "Successfully delete"}}
    </div> --}}

    <div class="count">{{ Session::get("count") ?? 0 }}</div>
</div>

@yield("content")