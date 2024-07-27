<td>
    @if($row->active)
        <span class="btn btn-sm round btn-outline-success">
                                    {{__('admin.activate')}}  <i class="la la-close font-medium-2"></i>
         </span>
    @else
        <span class="btn btn-sm round btn-outline-danger">
                                    {{__('admin.dis_activate')}}  <i class="la la-check font-medium-2"></i>
         </span>
    @endif
</td>