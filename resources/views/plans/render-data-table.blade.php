					<table id="example1" class="table table-bordered table-striped">
		                <thead>
		                <tr>
		                  <th width="30%">Title</th>
		                  <th>Price</th>
		                  <th>Services</th>
		                  <th>Actions</th>
		                </tr>
		                </thead>
		                <tbody>
		                	@foreach($plans as $p)
		                	<tr>
		                		<td>{{ @$p->title }}</td>
		                		<td>{{ @$p->price }}</td>
		                		<td>
		                			@foreach(@$p->services as $s)
		                			<span class="label label-success">{{ @$s->service->name }}</span>
		                			@endforeach
		                		</td>
		                		<td>
		                		    @if ( \App\Http\Controllers\UsersController::myPermitedTrigger('plans' ,'edit') == 1 )
							        <button onclick="loadPlan({{ @$p->id }})" class="btn btn-info">Edit</button>
							        @endif
							        @if ( \App\Http\Controllers\UsersController::myPermitedTrigger('plans' ,'delete') == 1 )
		                			<button onclick="deletePlan({{ @$p->id }})" class="btn btn-danger">Delete</button>
		                			@endif
		                		</td>
		                	</tr>
		                	@endforeach
		                </tbody>
	              	</table>