<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.min.js" integrity="sha384-IDwe1+LCz02ROU9k972gdyvl+AESN10+x7tBKgc9I5HFtuNz0wWnPclzo6p9vxnk" crossorigin="anonymous"></script>

    <link rel="stylesheet" href={{asset('css/app.css')}} type="text/css" />
    <title>{{env("APP_NAME")}}</title>
</head>
<body>

    <header class="bg-{{ session('id') ? 'success' : 'warning' }}">

        <form action="{{ session("id") 
                        ? route('employee.logout') 
                        : route('employee.login')   }}" method="POST">
            @csrf
            @if (session("id") != null)
                @method("POST")
            @else
                @method("GET")
            @endif
            <button>{{ session("id") ? "logout" : "login" }}</button>
        </form>
        
      </header>

    @yield("index")
    
</body>
</html>
    