<header class="bg-{{ $user ? 'success' : 'warning' }}">


    <ul class="list-group list-group-horizontal nav-index" >
        <a href="{{ route('admin.index') }}" class="">
            <li class="list-group-item mr-5">Home</li>
        </a> 

        <a href="/admin/employee/add" class="">
            <li class="list-group-item">New employee</li>
        </a> 
        
        <a href="/admin/task/add" class="">
            <li class="list-group-item">New Task</li>
        </a> 
      </ul>

    <form action="{{ $user 
                    ? route('employee.logout') 
                    : route('employee.login')   }}" method="POST">
        @csrf
        @if ($user)
            @method("POST")
        @else
            @method("GET")
        @endif
        <button class="btn btn-{{ $user ? 'warning' : 'success'}}">{{ $user ? "logout" : "login" }}</button>
    </form>
    
  </header>