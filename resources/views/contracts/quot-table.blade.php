							<table class="table table-striped">
                              <thead>
                                <tr>
                                  <th class="text-center">ID</th>
                                  <th>Company Name</th>
                                  <th>Qutation Total</th>
                                  <th>Qutation Services</th>
                                  <th>Actions</th>
                                </tr>
                              </thead>
                              <tbody>
                                @if(count($companies) > 0)
                                  @foreach($companies as $p)
                                    @php
                                      if (@$p->quotation->contract) {
                                        if (@$p->quotation->contract->is_signed == 1) {
                                          continue;
                                        }
                                      }
                                    @endphp
                                  <tr id="company-{{ @$p->id }}">
                                    <td class="text-center">{{ @$p->id }}</td>
                                    <td>{{ @$p->name }}</td>
                                    <td>{{ @$p->quotation->total }}</td>
                                    <td>
                                      @foreach(@$p->quotation->services as $s)
                                        <span class="label label-success">({{ @$s->quantity }}) {{ @$s->service->name }}</span>
                                      @endforeach
                                    </td>
                                    <td>
                                      @if( in_array('add_contract' ,$myPermissions) && !@$p->quotation->contract )
                                        <a class="btn btn-default pull-left" title="Add Contract" style="margin-left: 5px"
                                          onclick="loadEdit('{{ url("contracts-load-add-pop-up/".@$p->quotation->id) }}')">
                                          <i class="si si-plus"></i>
                                        </a>
                                      @endif
                                      @if( in_array('edit_contract' ,$myPermissions) && @$p->quotation->contract )
                                        <a class="btn btn-default pull-left" title="Edit Contract" style="margin-left: 5px" 
                                          onclick="loadEdit('{{ url("contracts-load-edit-pop-up/".@$p->quotation->contract->id) }}')">
                                          <i class="si si-pencil"></i>
                                        </a>
                                      @endif
                                      @if( (in_array('add_contract' ,$myPermissions) || in_array('edit_contract' ,$myPermissions)) && @$p->quotation->contract )
                                        <a class="btn btn-default pull-left" title="Sign Contract" style="margin-left: 5px" 
                                          onclick="signContract({{ @$p->quotation->contract->id }} ,'company-{{ @$p->id }}')">
                                          <i class="si si-check"></i>
                                        </a>
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