
                              <tr id="potentials-{{ @$p->id }}">
                                <td class="text-center">{{ @$p->id }}</td>
                                <td>{{ @$p->name }}</td>
                                <td>
                                    <div class="progress-bar-parent">
                                        @php
                                          $perc = @$p->progress.'%';
                                        @endphp
                                      <div class="progress-bar-child" id="prog-perc-{{@$p->id}}" style="width:{{ $perc }}">{{ $perc }}</div>
                                    </div>
                                </td>
                                <td>
                                  @if(in_array('verify_potential' ,$myPermissions) )
                                  <label class="css-input switch switch-sm switch-primary">
                                    <input onclick='verified("{{ url('potentials/active/'.@$p->id) }}")' type="checkbox" id="login2-remember-me" {{ @$p->isverified == 1 ? 'checked' : '' }} name="login2-remember-me"><span></span>
                                  </label>
                                  @endif
                                </td>
                                <td class="" id="tasks-td-{{ @$p->id }}">
                                  @if( in_array('add_connection' ,$myPermissions) )
                                    <a class="btn btn-default" title="Add Connection"
                                      onclick="loadPopUp({{ @$p->id }} ,'{{ url("potentials-load-pop-up/connection/".@$p->id) }}')">
                                      <i class="fa fa-link"></i></i>
                                    </a>
                                  @endif
                                       
                                  @if( in_array('update_profile' ,$myPermissions) )
                                    <a class="btn btn-default" title="Add Profiling" onclick="loadProfiling({{ @$p->id }})">
                                      <i class="fa fa-eye"></i>
                                    </a>
                                  @endif

                                  @if( in_array('add_feedback' ,$myPermissions) )
                                    <a class="btn btn-default" title="Add Call Feedback" onclick="loadFeedbacksForms({{ @$p->id }})">
                                      <i class="si si-call-out"></i>
                                    </a>
                                  @endif

                                  @if( (in_array('add_quotation' ,$myPermissions)) &&
                                        (@$p->feedbacks()->where('values' ,'like' ,'%quotation%')->first() || @$p->meeting()->where('type' ,'Quotation')->first()) )
                                    <a class="btn btn-default" title="Add Quotation" onclick="loadQuotation({{ @$p->id }})">
                                      <i class="si si-doc"></i>
                                    </a>
                                  @endif

                                  @if( (in_array('add_proposal' ,$myPermissions)) &&
                                        ( @$p->feedbacks()->where('values' ,'like' ,'%proposal%')->first() || @$p->meeting()->where('type' ,'Proposal')->first() ) )
                                    <a class="btn btn-default" title="Add Proposal"
                                      onclick="loadPopUp({{ @$p->id }} ,'{{ url("potentials-load-pop-up/proposal/".@$p->id) }}')">
                                      <i class="fa fa-book"></i>
                                    </a>
                                  @endif

                                  @if( (in_array('add_meeting_feedback' ,$myPermissions)) &&
                                      @$p->feedbacks()->where('feedback_form_id' ,$meeting_form_id)->get()->count() > 0 )
                                    <a class="btn btn-default" title="Add Meeting Feedback"
                                      onclick="loadPopUp({{ @$p->id }} ,'{{ url("potentials-load-pop-up/meeting-feedback/".@$p->id) }}')">
                                      <i class="si si-notebook"></i>
                                    </a>
                                  @endif

                                  <!-- <a class="btn btn-default" href="#" title="Add Meeting"><i class="si si-notebook"></i></a> -->

                                </td>
                                <td>
                                  <a class="btn btn-default" title="View Profile" onclick="viewProfile({{ @$p->id }})">
                                    <i class="si si-eye"></i>
                                  </a>
                                                    
                                  <!-- <a class="btn btn-default" href="{{ url('/'.$p->id) }}" title="View Connection"><i class="si si-users"></i></a> -->
                                                    
                                  <a class="btn btn-default" title="Feedback"
                                      onclick="loadPopUp({{ @$p->id }} ,'{{ url("potentials-load-pop-up/feedbacks/".@$p->id) }}')">
                                    <i class="si si-feed"></i>
                                  </a>

                                  <a class="btn btn-default" title="Show Connections"
                                      onclick="loadPopUp({{ @$p->id }} ,'{{ url("potentials-load-pop-up/connections/".@$p->id) }}')">
                                    <i class="fa fa-link"></i>
                                  </a>
                                  
                                  @if(@$p->quotations()->count() > 0)
                                  <a class="btn btn-default" title="Quotations History"
                                    onclick="loadPopUp({{ @$p->id }} ,'{{ url("potentials-load-pop-up/quotations/".@$p->id) }}')">
                                    <i class="si si-docs"></i>
                                  </a>
                                  @endif

                                  @if( in_array('edit_potential' ,$myPermissions) )
                                    <a class="btn btn-default pull-left" title="Edit"
                                      onclick="loadPopUp({{ @$p->id }} ,'{{ url("potentials-load-pop-up/edit-potential/".@$p->id) }}')">
                                      <i class="si si-pencil"></i>
                                    </a>
                                  @endif

                                  @if(in_array('delete_potential' ,$myPermissions) )
                                  <form method="post" action="{{ url('potentials/'.@$p->id) }}" class="pull-left" style="margin-left: 5px" onsubmit="return deletePotential(event)">
                                    @csrf
                                    <input name="_method" type="hidden" value="DELETE">
                                    <button type="submit" class="btn btn-default"><i class="si si-trash"></i></button>
                                  </form>
                                  @endif
                                </td>
                              </tr>