<header class="bg-{{ $user ? 'success' : 'warning' }}">

    <form action="{{ $user 
                    ? route('employee.logout') 
                    : route('employee.login')   }}" method="POST">
        @csrf
        @if ($user)
            @method("POST")
        @else
            @method("GET")
        @endif
        <button>{{ $user ? "logout" : "login" }}</button>
    </form>
    
  </header>