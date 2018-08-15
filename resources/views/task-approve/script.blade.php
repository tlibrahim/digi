<script>
	
	$(document).ready(function() {
      	loadProgressQuots()
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
	          	loadProgressQuots()
	        } else if (target == '#tab02') {
	          	loadCompletedQuots()
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

	function loadProgressQuots() {
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

  	function loadCompletedQuots() {
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

	function visitLink(link) {
		window.open(link)
	}

	function approveTask(url) {
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
		  					swal(rData.msg, {icon: rData.icon}).then((v)=>{
		  						$('#approve-task-'+rData.id).text(rData.text)
		  						$('#approve-task-'+rData.id).removeClass(rData._class)
		  						$('#approve-task-'+rData.id).addClass(rData.class)
		  					})
		  				} else {
		  					swal("Sorry we can`t handle this operation!", {icon: "error"})
		  				}
		  			}
		  		})
		  	} else {
		    	swal("Operation cancel!" ,{icon:'warning'});
		  	}
		})
	}

</script>