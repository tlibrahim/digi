<div class="form-group">
	<label>Plans</label>
	<select class="form-control select2" name="related_type_id">
		@foreach($plans as $p)
			<option {{ @$con->related_type_id == @$p->id ? 'selected' : '' }} value="{{ @$p->id }}">{{ @$p->title }}</option>
		@endforeach
	</select>
</div>