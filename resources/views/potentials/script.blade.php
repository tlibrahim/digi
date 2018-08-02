  var url = '{{ url("potentials/remove") }}'

  function fireRemove(_url ,event) {
    $.ajax({
      type:'GET',
      url:_url,
      dataType:'json',
      success : function (rData) {
        if (rData.status == 'ok') {
          $(event.target).parent().remove()
        } else {
          swal("Please just click the X button or click F5")
        }
      }
    })
  }

  function deleteRefs(id ,event) {
    var _url = url + '/refs/' + id
    fireRemove(_url ,event)
  }

  function deleteProducts(id ,event) {
    var _url = url + '/prods/' + id
    fireRemove(_url ,event)
  }

  function deleteSites(id ,event) {
    var _url = url + '/sites/' + id
    fireRemove(_url ,event)
  }

  function deleteSocials(id ,event) {
    var _url = url + '/socials/' + id
    fireRemove(_url ,event)
  }

  function editProfiling(event ,profile_id) {
    event.preventDefault()
    $.ajaxSetup({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
    })

    var form = $(event.target) ,url = form.attr('action') ,type = form.attr('method') ,data = form.serialize()
    
    //this area to handle logo upload by ajax request
    var formData = new FormData() ,formDataUrl = '{{ url("potentials/upload-logo") }}/' + profile_id +'/'+ url.split("/")[url.split("/").length - 1]
    var logo = form.find('input[type="file"]:first')[0].files[0]
    if (logo != undefined) {
      if (logo.size > 1024*4*1000) {
        swal("Allowed Size 4MB" ,{icon:'error'})
        return
      }
      if (logo.type != 'image/png' && logo.type != 'image/jpg' && logo.type != 'image/jpeg') {
        console.log(logo.type)
        swal("Allowed Extensions [png ,jpg ,jpeg]" ,{icon:'error'})
        return
      }
      console.log('logo must upload')
      formData.append('logo' ,logo)
      $.ajax({
        url: formDataUrl,
        dataType: 'json',
        data: formData,
        type: 'POST',
        processData: false,
        contentType: false,
        async:false,
        success : function (rData) {
          console.log(rData)
        }
      })
    }

    //this area to handle editing profile data by ajax
    $.ajax({
      dataType:'json',
      url:url,
      type:type,
      data:data,
      success : function (rData) {
        if (rData.status == 'ok') {
          form.html(rData.formBody)
          loadDateTime()
          $('.modal').animate({ scrollTop: 0 }, 'slow');
          var div = $("#prog-perc-"+rData.id)
          div.css('width' ,rData.perc)
          div.text(rData.perc)
          var progress = parseInt(rData.perc)
          changeRowPlace(progress ,rData.id)
        } else {
          swal("Some Error")
        }
      } ,
      error : function (erData) {
        swal('Can`t update this profiling' ,{icon:'error'})
      }
    })

    return false
  }

  function cancelRow(event) {
    $(event.target).parent().remove()
  }

  function renderRow(key ,event) {
    var renderUrl = '{{ url("potentials/render") }}/'+key
    $.ajax({
      dataType:'json',
      type:'GET',
      url:renderUrl,
      success:function(rData){
        $(event.target).parent().append(rData.code)
      }
    })
  }

  function loadFeedbackForm(event ,pot_id){
    var id = $(event.target).val()
    $("#feedback-id-"+pot_id).val(id)
    $.ajax({
      type:'GET',
      dataType:'json',
      url:'{{ url("feedback-forms/render") }}/'+$(event.target).val(),
      success : function (rData) {
        $('.form-loaded-body').html(rData.code)
        loadDateTime()
        $(".date_time").datetimepicker({autoclose: true});
        $(".date").datepicker({format:'dd-mm-yyyy' ,autoclose: true})
      }
    })
    $(event.target).parent().parent().siblings().find('button[type="submit"]').show()
  }

  function viewProfile(profile_id) {
    $.ajax({
      type:'GET',
      dataType:'json',
      url:'{{ url("potentials/profile-view/render") }}/'+profile_id,
      success : function (rData) {
        $('#view-profile-body').html(rData.code)
        loadDateTime()
        $("#view-profiling-modal").modal('toggle')
      }
    })
  }

  function deleteConnection(con_id ,event) {
    swal({
      title: "Are you sure?",
      text: "Once deleted, you will not be able to recover this connection!",
      icon: "warning",
      buttons: true,
      dangerMode: true,
    })
    .then((willDelete) => {
      if (willDelete) {
        $.ajax({
          dataType:'json',
          type:'GET',
          url:'{{ url("potentials/connections/delete") }}/'+con_id,
          success:function(rData){
            swal(rData.msg, {
              icon: "success",
            })
            var div = $("#prog-perc-"+rData.id)
            div.css('width' ,rData.perc)
            div.text(rData.perc)
            var progress = parseInt(rData.perc)
            changeRowPlace(progress ,rData.id)
            $(event.target).parent().parent().parent().remove()
          }
        })
      } else {
        swal("Your connection is safe!");
      }
    });
  }

  function editConnection(event) {
    $.ajax({
      dataType:'json',
      type:'POST',
      data:$(event.target).serialize(),
      url:$(event.target).attr('action'),
      success:function(rData){
        swal(rData.msg, {
          icon: rData.icon,
        })
      }
    })
    return false
  }

  function verified(url) {
    $.ajax({
      dataType:'json',
      url:url,
      type:'GET',
      success:function (rData) {
        swal(rData.msg ,{icon:rData.icon})
      }
    })
  }
  
    function deletePotential(event){
        swal({
          title: "Are you sure?",
          text: "Once deleted, you will not be able to recover this company!",
          icon: "warning",
          buttons: true,
          dangerMode: true,
        })
        .then((willDelete) => {
          if (willDelete) {
              var form = $(event.target) ,data = form.serialize() ,url = form.attr('action') ,type = form.attr('method') ,dType = 'json'
              $.ajax({
                  dataType:dType,
                  url:url,
                  data:data,
                  type:type,
                  success:function(rData) {
                      if (rData.status == 'ok') {
                          var id = url.split("/")
                          id = id[id.length - 1]
                          dTables.row('#potentials-'+id).remove().draw( false )
                          swal({text:rData.msg,icon:rData.icon})
                      } else {
                          swal({text:rData.msg,icon:rData.icon})
                      }
                  }
              })
          } else {
            swal("Company is safe!");
          }
        })
        return false
    }
    
    function loadQuotation(id) {
        $.ajax({
            dataType:'json',
            type:'GET',
            url:'{{ url("potentials-quotation") }}/'+id,
            success:function(rData) {
                $("#pop-up-modal .modal-content").html(rData.code)
                loadDateTime()
                $("#pop-up-modal .modal-dialog").width('50%')
                $("#pop-up-modal").modal('toggle')
                $("#company-id-quotation").val(id)
            }
        })
    }
    
    function cancelService(event ,id) {
        swal({
          title: "Are you sure?",
          text: "Once deleted, you will not be able to recover this service!",
          icon: "warning",
          buttons: true,
          dangerMode: true,
        })
        .then((willDelete) => {
          if (willDelete) {
              if (id != undefined) {
        		$.ajax({
        			dataType:'json',
        			type:'GET',
        			url:'{{ url("potentials-delete-service") }}/'+id,
        			success:function(rData) {
        				if (rData.status == 'ok') {
        				    $(event.target).parent().remove()
        				    swal(rData.msg, {icon: rData.icon})
        			    }
        		    }
        		})
              } else {
        		$(event.target).parent().remove()
        		swal("Your service has been deleted!", {icon: "success"})
        	  }
          } else {
            swal("Your service is safe!");
          }
        })
	}
	
	function addService() {
		$.ajax({
			dataType:'json',
			type:'GET',
			url:'{{ url("plans-render") }}',
			success:function(rData) {
				$("#plan-add-services").append(rData.code)
			}
		})
	}
	
	function addEditQuotation(event) {
	    var form = $(event.target) ,data = form.serialize() ,url = form.attr('action') ,type = form.attr('method') ,dType = 'json'
	    $.ajax({
	        dataType:dType,
	        data:data,
	        type:type,
	        url:url,
	        success:function(rData) {
	            if (rData.status == 'ok') {
	                swal(rData.msg, {icon:rData.icon})
	                $('.close').click()
	                $('.close').click()
	                var div = $("#prog-perc-"+rData.id)
                  div.css('width' ,rData.perc)
                  div.text(rData.perc)
                  var progress = parseInt(rData.perc)
                  changeRowPlace(progress ,rData.id)
	            }
	        }
	    })
	}
	
	function loadDateTime() {
	    $(".date_time").datetimepicker({autoclose: true});
	}
	
	$(document).ready(function() {
      loadPropQuotTabOne()
      var $tabButtonItem = $('#tab-button li'),
      $tabSelect = $('#tab-select'),
      $tabContents = $('.tab-contents'),
      activeClass = 'is-active';

      $tabButtonItem.first().addClass(activeClass);
      $tabContents.not(':first').hide();

      $tabButtonItem.find('a').on('click', function(e) {
        var target = $(this).attr('href');

        $tabButtonItem.removeClass(activeClass);
        $(this).parent().addClass(activeClass);
        $tabSelect.val(target);
        $tabContents.hide();
        $(target).show();
        e.preventDefault();
        $('.dataTables_info').parent().parent().hide()
        $('.dataTables_length').parent().parent().hide()
        $(target).find('.dataTables_length:first').parent().parent().show()
        $(target).find('.dataTables_info:first').parent().parent().show()
        if (target == '#tab01') {
          loadPropQuotTabOne()
        } else if (target == '#tab02') {
          loadPropQuotTabTow()
        } else if (target == '#tab03') {
          loadPropQuotTabThree()
        }
      })

      $tabSelect.on('change', function() {
        var target = $(this).val(),
            targetSelectNum = $(this).prop('selectedIndex');

        $tabButtonItem.removeClass(activeClass);
        $tabButtonItem.eq(targetSelectNum).addClass(activeClass);
        $tabContents.hide();
        $(target).show();
      })
	})

  function loadPropQuotTabOne() {
      $.ajax({
          url:'{{ url("load-potentials/15/46") }}',
          dataType:'json',
          type:'GET',
          success:function(rData) {
              $("#tab01").html(rData.code)
              dTables = $('table').DataTable()
              loadDateTime()
          }
      })
  }

  function loadPropQuotTabTow() {
      $.ajax({
          url:'{{ url("load-potentials/46/86") }}',
          dataType:'json',
          type:'GET',
          async:true,
          success:function(rData) {
              $("#tab02").html(rData.code)
              dTables = $('table').DataTable()
              loadDateTime()
          }
      })
  }

  function loadPropQuotTabThree() {
      $.ajax({
          url:'{{ url("load-potentials/86/101") }}',
          dataType:'json',
          type:'GET',
          async:true,
          success:function(rData) {
              $("#tab03").html(rData.code)
              dTables = $('table').DataTable()
              loadDateTime()
          }
      })
  }
	
	function postProposal(event) {
	    var form = $(event.target) ,data = form.serialize() ,url = form.attr('action') ,type = form.attr('method') ,dType = 'json'
	    $.ajax({
	        type:type,
	        dataType:dType,
	        data:data,
	        url:url,
	        success:function(rData) {
	            if (rData.status == 'ok') {
	                swal(rData.msg, {icon:rData.icon})
	                $('#tasks-td-'+rData.id).html(rData.code)
                  loadDateTime()
    	            var div = $("#prog-perc-"+rData.id)
                  div.css('width' ,rData.perc)
                  div.text(rData.perc)
                  var progress = parseInt(rData.perc)
                  changeRowPlace(progress ,rData.id)
                  $('.modal-backdrop').remove()
	            } else {
	                swal(rData.msg, {icon:rData.icon})
	            }
	        }
	    })
	    return false
	}
	
	function postMeetingFeedback(event) {
	    var form = $(event.target) ,data = form.serialize() ,url = form.attr('action') ,type = form.attr('method') ,dType = 'json'
	    $.ajax({
	        type:type,
	        dataType:dType,
	        data:data,
	        url:url,
	        success:function(rData) {
	            if (rData.status == 'ok') {
	                swal(rData.msg, {icon:rData.icon})
	                $('#tasks-td-'+rData.id).html(rData.code)
                  loadDateTime()
    	            var div = $("#prog-perc-"+rData.id)
                  div.css('width' ,rData.perc)
                  div.text(rData.perc)
                  var progress = parseInt(rData.perc)
                  changeRowPlace(progress ,rData.id)
                  $('.modal-backdrop').remove()
	            } else {
	                swal(rData.msg, {icon:rData.icon})
	            }
	        }
	    })
	    return false
	}
	
	function postEditPotential(event) {
	    var form = $(event.target) ,data = form.serialize() ,url = form.attr('action') ,type = form.attr('method') ,dType = 'json'
	    $.ajax({
	        type:type,
	        dataType:dType,
	        data:data,
	        url:url,
	        success:function(rData) {
	            if (rData.status == 'ok') {
	                swal(rData.msg, {icon:rData.icon}).then((v) => {
	                    $('#potentials-'+rData.id).html(rData.code)
	                    $('body').removeClass('modal-open')
                        $('.modal-backdrop').remove()
	                    loadDateTime()
	                })
	            } else {
	                swal(rData.msg, {icon:rData.icon})
	            }
	        }
	    })
	    return false
	}
	
	function loadPopUp(id ,url) {
	    $.ajax({
	        type:'GET',
	        dataType:'json',
	        url:url,
	        success:function(rData) {
	            if (rData.status == 'ok') {
	                $('#pop-up-modal .modal-content').html(rData.code)
                  loadDateTime()
	                $("#pop-up-modal .modal-dialog").width('40%')
	                $('#pop-up-modal').modal('toggle')
	            } else {
	                swal(rData.msg, {icon:rData.icon})
	            }
	        }
	    })
	}
	
	function postAddConnection(event) {
	    var form = $(event.target) ,data = form.serialize() ,url = form.attr('action') ,type = form.attr('method') ,dType = 'json'
	    $.ajax({
	        type:type,
	        dataType:dType,
	        data:data,
	        url:url,
	        success:function(rData) {
	            swal(rData.msg, {icon:rData.icon})
	            if (rData.msg != 'error') {
    	            var div = $("#prog-perc-"+rData.id)
                  div.css('width' ,rData.perc)
                  div.text(rData.perc)
                  var progress = parseInt(rData.perc)
                  changeRowPlace(progress ,rData.id)
                  $('#add-connection-'+rData.id).modal('toggle')
                  $('body').removeClass('modal-open')
                  $('.modal-backdrop').remove()
	            }
	        }
	    })
	    return false
	}
	
	function postAddFeedback(event) {
	    var form = $(event.target) ,data = form.serialize() ,url = form.attr('action') ,type = form.attr('method') ,dType = 'json'
	    $.ajax({
	        type:type,
	        dataType:dType,
	        data:data,
	        url:url,
	        success:function(rData) {
	            swal(rData.msg, {icon:rData.icon}).then((v) => {
	                if (rData.msg != 'error') {
                        $('#addfeedback-'+rData.id).modal('toggle')
                        var div = $("#prog-perc-"+rData.id)
                        div.css('width' ,rData.perc)
                        div.text(rData.perc)
                        var progress = parseInt(rData.perc)
                        
                        $('body').removeClass('modal-open')
                        $('.modal-backdrop').remove()
                        $('#potentials-'+rData.id).html(rData.code)
    	            }
    	            loadDateTime()
	            })
	        }
	    })
	    return false
	}
	
	function loadProfiling(id) {
	    $.ajax({
	        type:'GET',
	        dataType:'json',
	        url:'{{ url("load-potential-profiling") }}/'+id,
	        success:function(rData) {
	            $("#pop-up-modal .modal-content").html(rData.code)
              loadDateTime()
	            $("#pop-up-modal .modal-dialog").width('75%')
	            $("#pop-up-modal").modal('toggle')
	        }
	    })
	}
	
	function loadFeedbacksForms(id) {
	    $.ajax({
	        type:'GET',
	        dataType:'json',
	        url:'{{ url("load-potential-feedback") }}/'+id,
	        success:function(rData) {
	            $("#pop-up-modal .modal-content").html(rData.code)
              loadDateTime()
	            $("#pop-up-modal .modal-dialog").width('40%')
	            $("#pop-up-modal").modal('toggle')
	        }
	    })
	}

  function changeRowPlace(progress ,id) {
      if (progress >= 46 && progress < 86) {
          dTables.row('#potentials-'+id).remove().draw(false)
      } else if (progress >= 85) {
          dTables.row('#potentials-'+id).remove().draw(false)
      }
  }

