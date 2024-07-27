<?php

namespace App\Http\Controllers\Admin;

use App\Builders\Input;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\copys\Store;
use App\Http\Requests\Admin\copys\Update;
use App\Models\Copy;
use App\Traits\Report;
use Illuminate\Http\Request;

class CopyController extends Controller {
    private function inputs($options = null) {
        return [
            'image'       => Input::imageInput()->build(),
            'name'        => Input::createArEnInput(__('admin.name_ar'), __('admin.name_en'))->build(),
            'price'       => Input::numberInput(__('admin.price'))->build(),
            'message'     => Input::textareaInput(__('admin.message'))->ckEditor()->build(),
            'description' => Input::createArEnTextarea(__('admin.description_ar'), __('admin.description_en'))->build(),
            // 'user_id'     => Input::selectInput(__('admin.users'), $options['users'], 'id', 'name')->build(),
            // 'images'      => Input::filesInput(__('admin.images'), $options['images'] ?? [], 'image')
            //     ->deleteRoute(route('admin.products.deleteImage'))
            //     ->attribute('accept', 'image/png, image/jpg, image/jpeg')
            //     ->build(),
            // 'sizes'       => Input::customInput()->build(),
            // 'anyName'     => Input::seoInputs()->build(), // add (meta_title , meta_description , meta_keywords) inputs in ar ,en
        ];
    }

    public function index($id = null) {
        if (request()->ajax()) {
            $copys = Copy::search(request()->searchArray)->paginate(30);
            $html  = view('admin.copys.table', compact('copys'))->render();
            return response()->json(['html' => $html]);
        }
        return view('admin.copys.index');
    }

    public function create() {
        // $users = User::get();
        return view('admin.copys.create', ['inputs' => $this->inputs([
            // 'users' => $users
        ])]);
    }

    public function store(Store $request) {
        Copy::create($request->validated());
        Report::addToLog('  اضافه arsinglesame');
        return response()->json(['url' => route('admin.copys.index')]);
    }
    public function edit($id) {
        $copy = Copy::findOrFail($id);
        // $files = $copy->files;
        // $users = User::get();
        return view('admin.copys.edit', ['item' => $copy, 'inputs' => $this->inputs([
            // 'users' => $users,
            // 'files' => $files
        ])]);
    }

    public function update(Update $request, $id) {
        $copy = Copy::findOrFail($id)->update($request->validated());
        Report::addToLog('  تعديل arsinglesame');
        return response()->json(['url' => route('admin.copys.index')]);
    }

    public function show($id) {
        $copy = Copy::findOrFail($id);
        // $files = $copy->files;
        // $users = User::get();
        return view('admin.copys.show', ['item' => $copy, 'inputs' => $this->inputs([
            // 'users' => $users,
            // 'files' => $files
        ])]);
    }
    public function destroy($id) {
        $copy = Copy::findOrFail($id)->delete();
        Report::addToLog('  حذف arsinglesame');
        return response()->json(['id' => $id]);
    }

    public function destroyAll(Request $request) {
        $requestIds = json_decode($request->data);

        foreach ($requestIds as $id) {
            $ids[] = $id->id;
        }
        if (Copy::whereIntegerInRaw('id', $ids)->get()->each->delete()) {
            Report::addToLog('  حذف العديد من arpluraleName');
            return response()->json('success');
        } else {
            return response()->json('failed');
        }
    }
}
