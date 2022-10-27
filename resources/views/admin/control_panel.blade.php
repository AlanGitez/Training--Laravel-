
<div class="panel m-1">
    <a href="admin/add" class="btn">New</a>

    <div class="message">
        {{ Session::get("error") ?? "Successfully delete"}}
    </div>

    <div class="count">{{ Session::get("count") ?? 0 }}</div>
</div>

@yield("content")