@foreach ($mainCategories as $cat)
	{{-- @if ($category->id != $cat->id) --}}
		<ul>
			<li id="{{$cat->id}}" data-jstree='{"opened":true @if (isset($category) && $category->parent_id == $cat->id),"selected":true @endif }'>
				{{$cat->name}}
				@if($cat->subChildes->count() > 0)
						@include('admin.categories.edit_tree',['mainCategories' => $cat->subChildes])
				@endif
			</li>
		</ul>
	{{-- @endif --}}
@endforeach
