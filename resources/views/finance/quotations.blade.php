						<table class="table table-striped">
                          <thead>
                              <tr>
                                  <th class="text-center">ID</th>
                                    <th>Company</th>
                                    <th>Quotation</th>
                                    <th>Discount</th>
                                    <th>Total</th>
                                    <th width="25%">Qutation Services</th>
                                    <th>Date</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                              @if(count($quotations) > 0)
                                  @foreach($quotations as $q)
                                      <tr id="quot-{{ @$q->id }}">
                                          <td class="text-center">{{ @$q->id }}</td>
                                            <td>{{ @$q->company->name }}</td>
                                            <td id="quot-total-{{ @$q->id }}">{{ @$q->total }}</td>
                                            <td id="quot-discount-{{ @$q->id }}">{{ @$q->total_offer }}%</td>
                                            <td id="quot-total-disc-{{ @$q->id }}">
                                            	{{ @$q->total_offer > 0 ? @$q->total - (@$q->total * @$q->total_offer)/100 : @$q->total }}
                                            </td>
                                            <td id="quot-service-{{ @$q->id }}">
                                              @foreach(@$q->services as $s)
                                                <span class="label label-success">({{ @$s->quantity }}) {{ @$s->service->name }}</span>
                                              @endforeach
                                            </td>
                                            <td id="quot-collect-date-{{ @$q->id }}">{{ @$q->collect_date }}</td>
                                            <td>
                                              @if( $collect )
                                              	@if ($key == 'quotation')
	                                              <button class="btn btn-default pull-left" title="Edit Contract" id="btn-quot-{{ @$q->id }}"
	                                                {{ @$q->is_collected == 1 ? 'disabled' : '' }}
	                                                onclick="loadQuot('{{ url('finance-'.$key.'/'.@$q->company->id) }}')">
	                                                <i class="si si-pencil"></i>
	                                              </button>
	                                            @endif
	                                            <button class="btn btn-default pull-left" title="View Contract"
	                                                onclick="loadQuot('{{ url('finance-collect/'.@$q->company->id) }}')">
	                                                <i class="si si-eye"></i>
	                                            </button>
                                              @endif
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