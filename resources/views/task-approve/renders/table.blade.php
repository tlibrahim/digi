<table class="table table-striped">
    <thead>
        <tr>
            <th class="text-center">ID</th>
            <th>Company Name</th>
            <th>Qutation Services</th>
        	<th>Actions</th>
    	</tr>
    </thead>
    <tbody>
        @foreach($quots as $quot)
            <tr>
	            <td class="text-center">{{ @$quot->company->id }}</td>
	            <td>{{ @$quot->company->name }}</td>
	           	<td>
	                @foreach(@$quot->services as $s)
	                	<span class="label label-success">({{ @$s->quantity }}) {{ @$s->service->name }}</span>
	            	@endforeach
	            </td>
	            <td>
	                <button onclick="loadPopUp('{{ url('tasks-approve-load-tasks/'.@$quot->id) }}')" class="btn btn-info">
	                	Manage Completed Tasks
	            	</button>
	        	</td>
        	</tr>
    	@endforeach
	</tbody>
</table>