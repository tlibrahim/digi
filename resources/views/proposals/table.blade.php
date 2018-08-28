<table class="table table-striped">
  <thead>
    <tr>
      <th>ID</th>
      <th>Company Name</th>
      <th>Quotation Services</th>
      <th>Proposal</th>
    </tr>
  </thead>
  <tbody>
    @foreach($quots as $q)
      <tr>
        <td>{{ @$q->id }}</td>
        <td>{{ @$q->quotation->company->name }}</td>
        <td>
          @foreach(@$q->quotation->services as $s)
            <span class="label label-success">({{ @$s->quantity }}) {{ @$s->service->name }}</span>
          @endforeach
        </td>
        <td>
          <button class="btn btn-default" onclick="loadPopUp('{{ url('complete-proposals/load-proposal/'.@$q->id) }}')">
            <i class="si si-note"></i>
          </button>
        </td>
      </tr>
    @endforeach
  </tbody>
</table>