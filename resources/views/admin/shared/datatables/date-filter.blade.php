<table border="0" cellspacing="5" cellpadding="5" style="margin: 10px ;   display: flex; justify-content: flex-end;">
    <tbody>
    <tr>
        <td>{{__('site.Minimum date')}} : </td>
        <td><input name="min" autocomplete="off"  class="minFilter" type="text" ></td>
    </tr>
    <tr>
        <td>{{__('site.Maximum date')}}:</td>
        <td><input name="max" autocomplete="off" class="maxFilter"  type="text" ></td>
    </tr>
    <tr>
        <td></td>
        <td><button id="doDateSearch" class="btn btn-success w-100" >{{__('admin.search')}}</button></td>
    </tr>
    </tbody>
</table>