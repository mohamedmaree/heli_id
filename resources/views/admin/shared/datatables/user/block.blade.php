<td>
    @if($row->is_blocked)
        <span class="btn btn-sm round btn-outline-danger">
             {{__('admin.Prohibited')}}  <i class="la la-close font-medium-2"></i>
        </span>
    @else
        <span class="btn btn-sm round btn-outline-success">
              {{__('admin.Unspoken')}}  <i class="la la-check font-medium-2"></i>
        </span>
    @endif
</td>