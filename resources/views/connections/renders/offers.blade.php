<div class="form-group">
	<label>Offers</label>
	<select class="form-control select2" name="related_type_id">
		@foreach($offers as $p)
			<option {{ @$con->related_type_id == @$p->id ? 'selected' : '' }} value="{{ @$p->id }}">{{ @$p->name }}</option>
		@endforeach
	</select>
</div>