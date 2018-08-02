<table class="table table-striped">
	<thead>
    	<tr>
        	<th class="text-center">ID</th>
            <th>Company Name</th>
            <th>Qutation Total</th>
            <th width="45%">Qutation Services</th>
            <th>View</th>
        </tr>
    </thead>
    <tbody>
    	@if(count($contracts) > 0)
        	@foreach($contracts as $p)
            	<tr>
                	<td class="text-center">{{ @$p->id }}</td>
                    <td>{{ @$p->quotation->company->name }}</td>
                    <td>{{ @$p->quotation->total }}</td>
                    <td>
                    	@foreach(@$p->quotation->services as $s)
                        	<span class="label label-success">({{ @$s->quantity }}) {{ @$s->service->name }}</span>
                        @endforeach
                    </td>
                    <td>
                    	<a target="_blank" href="{{ url('storage/contracts/'.@$p->pdf) }}" class="btn btn-default pull-left" title="View Contract">
                        	<i class="si si-eye"></i>
                        </a>
                    </td>
                </tr>
            @endforeach
        @else
        	<tr>
            	<td>#</td>
                <td>----</td>
                <td>----</td>
                <td>----</td>
                <td>----</td>
            </tr>
        @endif  
    </tbody>
</table>