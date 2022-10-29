<tr>
    @foreach($row->getAttributes() as $col)
            <td>  {{ $col }} </td>
    @endforeach

    <td>
                @php
                    $employee = "employee"
                @endphp
        {{-- {{ dd(url()) }} --}}
    <form action="{{ route('employee.edit', ['model' => $employee, 'id' => $row->id]) }}" method="PUT">
            @method('UPDATE')
            @csrf
            <button>btn</button>
    </form> 
    </td>
    <td>
            <form action="/admin/{{$employee}}/delete/{{$row->id}}" method="POST">
                    @method('DELETE')
                    @csrf
                    <button>btn</button>
            </form> 
    </td>
</tr>