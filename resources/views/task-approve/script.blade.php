<script>
	
	$(document).ready(function() {
      	loadProgressTasks()
      	var $tabButtonItem = $('#tab-button li'),
      		$tabSelect = $('#tab-select'),
      		$tabContents = $('.tab-contents'),
      		activeClass = 'is-active'

      	$tabButtonItem.first().addClass(activeClass)
      	$tabContents.not(':first').hide()

      	$tabButtonItem.find('a').on('click', function(e) {
	        var target = $(this).attr('href')
	        $tabButtonItem.removeClass(activeClass)
	        $(this).parent().addClass(activeClass)
	        $tabSelect.val(target)
	        $tabContents.hide()
	        $(target).show()
	        e.preventDefault()
	        $('.dataTables_info').parent().parent().hide()
	        $('.dataTables_length').parent().parent().hide()
	        $(target).find('.dataTables_length:first').parent().parent().show()
	        $(target).find('.dataTables_info:first').parent().parent().show()
	        if (target == '#tab01') {
	          	loadProgressTasks()
	        } else if (target == '#tab02') {
	          	loadDeclinedTasks()
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

	function loadProgressTasks() {
      	$.ajax({
          	url:'{{ url("task-approve-load-quots/0") }}',
          	dataType:'json',
          	type:'GET',
          	success:function(rData) {
              	$("#tab01").html(rData.code)
              	dTables = $('table').DataTable()
          	}
      	})
  	}

  	function loadDeclinedTasks() {
      	$.ajax({
          	url:'{{ url("task-approve-load-quots/1") }}',
          	dataType:'json',
          	type:'GET',
          	async:true,
          	success:function(rData) {
              	$("#tab02").html(rData.code)
              	dTables = $('table').DataTable()
        	}
      	})
  	}

  	function loadPopUp(url) {
		$.ajax({
			url:url,
			dataType:'json',
			type:'GET',
			success:function(rData) {
				if (rData.status == 'ok') {
					$("#pop-up-modal .modal-content").html(rData.code)
					$("#pop-up-modal").modal('toggle')
				} else {
					swal(rData.msg ,{icon:'error'})
				}
			}
		})
  	}

	function loadGallery(url) {
		$.ajax({
			url:url,
			dataType:'json',
			type:'GET',
			success:function(rData) {
				if (rData.status == 'ok') {
					$("#gallery-pop-up-modal .modal-content").html(rData.code)
					$("#gallery-pop-up-modal").modal('toggle')
				} else {
					swal('Sorry We Can`t Load Gallery' ,{icon:'error'})
				}
			}
		})
	}

	function loadComments(url) {
		$.ajax({
			url:url,
			dataType:'json',
			type:'GET',
			success:function(rData) {
				if (rData.status == 'ok') {
					$("#comments-pop-up-modal .modal-content").html(rData.code)
					$("#comments-pop-up-modal").modal('toggle')
				} else {
					swal('Sorry We Can`t Load Comments' ,{icon:'error'})
				}
			}
		})
	}

	function visitLink(link) {
		window.open(link)
	}

	function approveTask(url ,decCheck) {
		var quest = !decCheck ? 'Why This Task Declined ?' : 'Are This Task Approved ?'
		swal({
		  	title: quest,
		  	icon: "warning",
		  	buttons: true,
		  	dangerMode: true,
		})
		.then((willDelete) => {
		  	if (willDelete) {
		  		if (!decCheck) {
					swal({
						text: 'Why this task was declined ?!!',
						content: "input",
						button: {
					    	text: "Submit!",
					    	closeModal: false,
					  	},
					})
					.then(name => {
						if (name) {
							runAppDecTask(url ,{comment:name,_token:'{{ csrf_token() }}'} ,decCheck)
						} else {
							swal('Please answer the question' ,{icon:'error'})
						}
					})
				} else {
					runAppDecTask(url ,{_token:'{{ csrf_token() }}'} ,decCheck)
				}
		  	} else {
		    	swal("Operation cancel!" ,{icon:'warning'});
		  	}
		})
	}

	function runAppDecTask(url ,data ,decCheck) {
		$.ajax({
		  	dataType:'json',
		  	type:'POST',
		  	data:data,
		  	url:url,
		  	success:function(rData) {
		  		if (rData.status == 'ok') {
		  			swal(rData.msg, {icon: rData.icon}).then((v)=>{
		  				$('#approve-task-'+rData.id).text(rData.text)
		  				$('#approve-task-'+rData.id).removeClass(rData._class)
		  				$('#approve-task-'+rData.id).addClass(rData.class)
		  				if (!decCheck) {
		  					$('#task-container-'+rData.id).remove()
		  				} else {
		  					$('#task-container-'+rData.id+' span').text( "(Status :'APPROVED')" )
		  				}
		  			})
		  		} else {
		  			swal("Sorry we can`t handle this operation!", {icon: "error"})
		  		}
			}
		})
	}

</script>