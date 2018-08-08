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

                                @if( in_array('add_proposal' ,$myPermissions) && $p->quotations()->where('is_collected' ,0)->first() )
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