
<div class="alert alert-{{ Session::get("error") ? 'danger' : 'success' }} m-3" role="alert">
      {{ Session::get("error") }}
</div>