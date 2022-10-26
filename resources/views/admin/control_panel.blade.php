
<div class="panel m-1">
    <a href="admin/add" class="btn">New</a>

    <div class="message">
        {{session("status") ? session("status")["response"] :  ""}}
    </div>

    <div class="count">{{ session("status") ? session("status")["count"] : 0 }}</div>
</div>

@yield("content")