
<div class="panel m-1 w-100">
    <a href="admin/add" class="btn">New</a>

    <div class="message">
        {{session("status") ? session("status")["success"] :  ""}}
    </div>

    <div class="count">{{ session("status") ? session("status")["count"] : 0 }}</div>
</div>

@yield("content")