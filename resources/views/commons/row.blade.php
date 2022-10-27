<tr>
    @foreach($row->getAttributes() as $col)
            <td>  {{ $col }} </td>
    @endforeach

    <td>
    <form action="{{ route("employee.edit", [$row->id]) }}" method="PUT">
            @method('UPDATE')
            @csrf
            <button>btn</button>
    </form> 
    </td>
    <td>
            <form action="{{ route('employee.delete', [$row->id]) }}" method="POST">
                    @method('DELETE')
                    @csrf
                    <button>btn</button>
            </form> 
    </td>
</tr>