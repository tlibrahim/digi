<script>
	$(document).ready(function() {
		@if(session()->has('page_number'))
		$('.pagination li a').each(function(i ,e){
			if ($(e).text() == {{ session('page_number') + 1 }}) {
				console.log
				$(e).click()
			}
		})
		@endif
	})

	function loadPopUp(url ,found) {
		$.ajax({
			url:url,
			dataType:'json',
			type:'GET',
			success:function(rData) {
				if (rData.status == 'ok') {
					$("#pop-up-modal .modal-content").html(rData.code)
					$("#pop-up-modal").modal('toggle')
					$('.date').datepicker({autoclose:true});
					$('.date-range').daterangepicker({autoclose:true});
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

	function taskConfirm(event ,url) {
		swal({
		  	title: "Is Task Done?",
		  	icon: "warning",
		  	buttons: true,
		  	dangerMode: true,
		})
		.then((willDelete) => {
		  	if (willDelete) {
		  		$.ajax({
		  			dataType:'json',
		  			type:'GET',
		  			url:url,
		  			success:function(rData) {
		  				if (rData.status == 'ok') {
		  					swal("Your task has been confirmed!", {icon: "success"})
		  					dTables.row('#task-tr-'+rData.id).remove().draw( false )
		  				} else if (rData.status == 'confirm') {
		  					swal("Please fill all data in this task to confirm it!", {icon: "warning"})
		  				} else {
		  					swal("Sorry we can`t handle this operation!", {icon: "error"})
		  				}
		  			}
		  		})
		  	} else {
		    	swal("Task Unconfirmed!" ,{icon:'warning'});
		  	}
		})
	}

	function taskExecute(event) {
		$(event.target).prepend('<input type="hidden" name="page_number" value="'+dTables.page.info().page+'"/>')
		return true
	}

	function deleteFile(event ,id ,file) {
		swal({
		  	title: "Are you sure?",
		  	text: "Once deleted, you will not be able to recover this imaginary file!",
		  	icon: "warning",
		  	buttons: true,
		  	dangerMode: true,
		})
		.then((willDelete) => {
		  	if (willDelete) {
		  		$.ajax({
		  			type:'POST',
		  			data:{id:id,file:file,_token:'{{ csrf_token() }}'},
		  			url:'{{ url("task-manager-delete-file") }}',
		  			dataType:'json',
		  			success:function(rData){
		  				if (rData.status == 'ok') {
		  					swal("Poof! Your imaginary file has been deleted!", {icon: "success"}).then((v)=>{$(event.target).parent().parent().remove()})
		  				} else {
		  					swal("Sorry Can`t Delete This File Now!", {icon: "error"})
		  				}
		  			}
		  		})
		  	} else {
		    	swal("Your imaginary file is safe!");
		  	}
		})
	}

	function visitLink(link) {
		window.open(link)
	}

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
	          	loadCompletedTask()
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
          	url:'{{ url("task-manager-load-tasks/0") }}',
          	dataType:'json',
          	type:'GET',
          	success:function(rData) {
              	$("#tab01").html(rData.code)
              	dTables = $('table').DataTable()
          	}
      	})
  	}

  	function loadCompletedTask() {
      	$.ajax({
          	url:'{{ url("task-manager-load-tasks/1") }}',
          	dataType:'json',
          	type:'GET',
          	async:true,
          	success:function(rData) {
              	$("#tab02").html(rData.code)
              	dTables = $('table').DataTable()
        	}
      	})
  	}
</script>