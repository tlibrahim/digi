<table class="table table-striped">
    <thead>
        <tr>
        	<th>ID</th>
            <th>Company Name</th>
            <th>Qutation Services</th>
        	<th>Qunatity #</th>
        	<th>Declined Service</th>
        	<th>Comments</th>
    	</tr>
    </thead>
    <tbody>
        @foreach($qqs as $quot)
            <tr>
            	<td>{{ @$quot->id }}</td>
	            <td>{{ @$quot->quotation->company->name }}</td>
	           	<td>
	                @foreach(@$quot->quotation->services as $s)
	                	<span class="label label-success">({{ @$s->quantity }}) {{ @$s->service->name }}</span>
	            	@endforeach
	            </td>
	            <td>{{ @$quot->qnt_lvl + 1 }}</td>
	            <td>{{ @$quot->service->name }}</td>
	            <td>
	                <button onclick="loadPopUp('{{ url('director-tasks-approve-load-qqs-comments/'.@$quot->id) }}')" class="btn btn-default">
	                	<i class="fa fa-comments"></i>
	            	</button>
	        	</td>
        	</tr>
    	@endforeach
	</tbody>
</table>