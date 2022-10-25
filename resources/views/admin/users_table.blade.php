

<div class="container border shadow">
   
    <div class="my-table">
    <table class="table" >
    <thead>
        <tr>                        
                @if (!count($employees))
                        <th colspan="empty">Array is empty</th>
                @else
                        @foreach($employees[0] as $key => $value)
                                <th> echo $key; </th> 
                        @endforeach 
                        <th>EDIT</th>
                        <th>DELETE</th>
                @endif
        </tr>
    </thead>
    <tbody>
            @foreach($employees as $employee) 
                
                <tr>
                        @foreach($employee as $col)
                                <td>  echo $col; </td>
                        @endforeach
                  <td>
                        <a 
                        href='#' 
                        class='btn'><img href='/assets/images/trash.png' alt=''></a></td>
                        <td>
                        <a 
                        href='#' 
                        class='btn'><img href='/assets/images/edit.png' alt=''></a></td>
                </tr>
                
            @endforeach            
        
    </tbody>
    </table>
    </div>
</div>

