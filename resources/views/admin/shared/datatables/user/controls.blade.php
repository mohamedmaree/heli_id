<td class="product-action">
    <span class="action-edit text-primary"><a href="{{route('admin.clients.edit' , ['id' => $row->id])}}"><i class="feather icon-edit"></i></a></span>
    <span data-toggle="modal" data-target="#notify" class="text-info notify" data-id="{{$row->id}}" data-url="{{url('admins/clients/notify')}}"><i class="feather icon-bell"></i></span>
    <span data-toggle="modal" data-target="#mail" class="text-info mail" data-id="{{$row->id}}" data-url="{{url('admins/clients/notify')}}"><i class="feather icon-mail"></i></span>
    <span class="delete-row text-danger" data-url="{{url('admin/clients/'.$row->id)}}"><i class="feather icon-trash"></i></span>
</td>