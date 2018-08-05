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
                                @if(count($quots) > 0)
                                  @foreach($quots as $quot)
                                    @php
                                      if (@$quot->contract) {
                                        if (@$quot->contract->is_signed == 1) {
                                          continue;
                                        }
                                      }
                                    @endphp
                                  <tr id="company-{{ @$quot->company->id }}">
                                    <td class="text-center">{{ @$quot->company->id }}</td>
                                    <td>{{ @$quot->company->name }}</td>
                                    <td>{{ @$quot->total }}</td>
                                    <td>
                                        @foreach(@$quot->services as $s)
                                          <span class="label label-success">({{ @$s->quantity }}) {{ @$s->service->name }}</span>
                                        @endforeach
                                    </td>
                                    <td>
                                      @if( in_array('add_contract' ,$myPermissions) && !@$quot->contract )
                                        <a class="btn btn-default pull-left" title="Add Contract" style="margin-left: 5px"
                                          onclick="loadEdit('{{ url("contracts-load-add-pop-up/".@$quot->id) }}')">
                                          <i class="si si-plus"></i>
                                        </a>
                                      @endif
                                      @if( in_array('edit_contract' ,$myPermissions) && @$quot->contract )
                                        <a class="btn btn-default pull-left" title="Edit Contract" style="margin-left: 5px" 
                                          onclick="loadEdit('{{ url("contracts-load-edit-pop-up/".@$quot->contract->id) }}')">
                                          <i class="si si-pencil"></i>
                                        </a>
                                      @endif
                                      @if( (in_array('add_contract' ,$myPermissions) || in_array('edit_contract' ,$myPermissions)) && @$quot->contract )
                                        <a class="btn btn-default pull-left" title="Sign Contract" style="margin-left: 5px" 
                                          onclick="signContract({{ @$quot->contract->id }} ,'company-{{ @$quot->company->id }}')">
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