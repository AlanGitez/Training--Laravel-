
<div class="panel m-1 w-100">
    <a href="admin/add" class="btn">New</a>

    <div class="message">
        {{session("success") ?? ""}}
    </div>

    <div class="count">0</div>
</div>

@yield("content")