@if(isset($post))
	<div class="form-group">
		<label for="title">Title:</label>
		<input class="form-control" name="title" type="text" value="{!! old('', $post->title) !!}" id="title">
	</div>


	<div class="form-group">
		<label for="body">Body:</label>
		<textarea class="form-control" name="body" cols="50" rows="10" id="body"> {!! old('', $post->body) !!} </textarea>
	</div>
@else
	<div class="form-group">
		<label for="title">Title:</label>
		<input class="form-control" name="title" type="text" id="title">
	</div>


	<div class="form-group">
		<label for="body">Body:</label>
		<textarea class="form-control" name="body" cols="50" rows="10" id="body"></textarea>
	</div>
@endif

<input class="btn btn-primary" type="submit" value="Submit">