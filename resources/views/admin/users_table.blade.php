

<div class="container border shadow ">

    <div class="my-table">
    <table class="table" >
    <thead>
        <tr>                        
                @if (!count($employees))
                        <th colspan="empty">Array is empty</th>
                @else
                        @foreach($employees[0]->getAttributes() as $key => $value)
                        
                                <th> {{ $key }} </th> 
                        @endforeach 
                        <th>EDIT</th>
                        <th>DELETE</th>
                @endif
        </tr>
    </thead>
    <tbody>
            @foreach($employees as $employee) 
                
                <tr>
                        @foreach($employee->getAttributes() as $col)
                                <td>  {{ $col }} </td>
                        @endforeach
                   
                        <td>
                        <form action="{{ route("employee.edit", [$employee->id]) }}" method="PUT">
                                @method('UPDATE')
                                @csrf
                                <button>btn</button>
                        </form> 
                        </td>
                        <td>
                                <form action="{{ route('employee.delete', [$employee->id]) }}" method="POST">
                                        @method('DELETE')
                                        @csrf
                                        <button>btn</button>
                                </form> 
                        </td>
                </tr>
                
            @endforeach            
        
    </tbody>
    </table>
    </div>

    <div>
        
       soy yo
       
        {{ var_dump(session("c_t"))}}
    

    </div>

</div>

