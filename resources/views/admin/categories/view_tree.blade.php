@foreach ($mainCategories as $category)
<ul>
		<li id="{{$category->id}}" data-jstree='{"opened":true}'>
				{{$category->name}}
				@if($category->subChildes->count() > 0)
						@include('admin.categories.view_tree',['mainCategories' => $category->subChildes])
				@endif
		</li>
</ul>
@endforeach
