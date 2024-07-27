<?php

namespace App\Traits;
use Illuminate\Support\Facades\Route;
use App\Models\Permission;

trait  Roles
{
    function addRole()
    {

        $routes = Route::getRoutes();
        $routes_data = [];
        $id = 0;
        $html = '' ;
        foreach ($routes as $route)
            if ($route->getName())
                $routes_data['"' . $route->getName() . '"'] = ['title' => isset($route->getAction()['title']) ? $route->getAction()['title'] : null];

        foreach ($routes as $value) {

            if (isset($value->getAction()['title']) && isset($value->getAction()['type']) && $value->getAction()['type'] == 'parent') {


                $parent_class = 'gtx_' . $id++;
                $html .=  '
                        <div class="col-md-4">
                            <div class="card permissionCard package bg-white shadow">
                                <div class="role-title text-white" style="display: flex; justify-content: space-between;">
                                    <div style="display: flex; flex-direction: row; align-items: center">
                                        <div class="icheck-primary d-inline">
                                            <input type="checkbox" name="permissions[]" value="' . $value->getName() . '" id="' . $parent_class . '" class="roles-parent">
                                            <label for="' . $parent_class . '" dir="ltr"></label>
                                        </div>
                                        <p class="text-white selectP" for="' . $parent_class . '">' . __('admin.'.$value->getAction()["title"]) . '</p>
                                        
                                    </div>
                                    <div style="display: flex; flex-direction: row-reverse; align-items: center">
                                        <p class="text-white selectP">'.__('admin.select_all').'</p>
                                        <input type="checkbox" class="checkChilds checkChilds_' . $parent_class . '" data-parent="' . $parent_class . '">
                                    </div>
                                </div>';


                if (isset($value->getAction()['child']) && count($value->getAction()['child'])) {

                    $html .= '<ul class="list-unstyled">';

                    foreach ($value->getAction()['child'] as $key => $child) {


                        $html .= '<li>
                                <div class="form-group clearfix">
                                    <div class="icheck-primary d-inline">
                                        <input type="checkbox"  name="permissions[]" data-parent="' . $parent_class . '" value="admin.' . $child . '"  id="' . $value->getName() . $key . '" class="childs ' . $parent_class . '">
                                        <label  for="' . $value->getName() . $key . '" dir="ltr"></label>
                                    </div>
                                    <label class="title_lable" for="' . $value->getName() . $key . '"> ' . __('admin.'.$routes_data['"admin.' . $child . '"']['title']) . '</label>
                                </div>

                            </li>';
                    }
                    $html .= '</ul>';
                }
                $html .= '</div></div>';
            }
        }
        return $html ;
    }
    

    function editRole($id)
    {

        $routes         = Route::getRoutes();
        $routes_data    = [];
        $my_routes      = Permission::where('role_id', $id)->pluck('permission')->toArray();
        $id = 0;
        $html = '' ;
        foreach ($routes as $route)
            if ($route->getName())
                $routes_data['"' . $route->getName() . '"'] = ['title' => isset($route->getAction()['title']) ? $route->getAction()['title'] : null];

        foreach ($routes as $value) {

            if (isset($value->getAction()['title']) && isset($value->getAction()['type']) && $value->getAction()['type'] == 'parent') {

                $select = in_array($value->getName(), $my_routes)  ? 'checked' : '';
                $parent_class = 'gtx_' . $id++;
                $html .= '


                        <div class="col-md-4">
                            <div class="card permissionCard package bg-white shadow">
                                <div class="role-title text-white" style="display: flex; justify-content: space-between;">
                                    <div style="display: flex; flex-direction: row; align-items: center" >
                                        <div class="icheck-primary d-inline" >
                                                <input type="checkbox" name="permissions[]" value="' . $value->getName() . '" id="' . $parent_class . '" class="roles-parent " ' . $select . '>
                                                <label for="' . $parent_class . '" dir="ltr"></label>
                                        </div>
                                        <p class="text-white selectP" for="' . $parent_class . '">' . __('admin.'.$value->getAction()["title"]) . '</p>
                                    </div>
                                    <div style="display: flex; flex-direction: row-reverse; align-items: center">
                                        <p class="text-white selectP">'.__('admin.select_all').'</p>
                                        <input type="checkbox" class="checkChilds checkChilds_' . $parent_class . '" data-parent="' . $parent_class . '">
                                    </div>
                                </div>';



                if (isset($value->getAction()['child']) && count($value->getAction()['child'])) {

                    $html .=  '<ul class="list-unstyled mt-2">';

                    foreach ($value->getAction()['child'] as $key => $child) {

                        $select = in_array('admin.' . $child, $my_routes)  ? 'checked' : '';
                        $html .=  '<li>
                                <div class="form-group clearfix">
                                    <div class="icheck-primary d-inline">
                                        <input type="checkbox"  name="permissions[]" data-parent="' . $parent_class . '" value="admin.' . $child . '"  id="' . $value->getName() . $key . '" class="childs ' . $parent_class . '" ' . $select . '>
                                        <label for="' . $value->getName() . $key . '" dir="ltr"></label>
                                    </div>
                                    <label for="' . $value->getName() . $key . '"> ' . __('admin.'.$routes_data['"admin.' . $child . '"']['title']) . '</label>
                                </div>

                            </li>';
                    }
                    $html .=  '</ul>';
                }

                $html .=  '</div></div>';
            }
        }
        return $html ;
    }

}