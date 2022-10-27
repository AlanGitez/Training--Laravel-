

<div class="container border shadow ">

    <div class="my-table">
    <table class="table" >
    <thead>
        <tr>                        
        @if (!count($data))
                <th colspan="empty">Array is empty</th>
        @else
                @foreach($data[0]->getAttributes() as $key => $value)
                        <th> {{ $key }} </th> 
                @endforeach 
                <th>EDIT</th>
                <th>DELETE</th>
        @endif
        </tr>
    </thead>
    <tbody>
        @each('commons.row', $data ,'row')
    </tbody>
    </table>
    </div>

</div>

