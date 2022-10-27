

@if ($errors->any() || Session::get("error"))

    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all()  as $error)
                <li>{{ $error }}</li>
            @endforeach
            <li>{{ Session::get("error") }}</li>

        </ul>
    </div>
@endif