$(document).ready(function() {
	loadQuots()
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
		if (target == '#tab01') {
			loadQuots()
		} else {
			loadCollectedQuots()
		}
		e.preventDefault();
    })

    $tabSelect.on('change', function() {
        var target = $(this).val(),
		targetSelectNum = $(this).prop('selectedIndex');
        $tabButtonItem.removeClass(activeClass);
        $tabButtonItem.eq(targetSelectNum).addClass(activeClass);
        $tabContents.hide();
        $(target).show();
        if (target == '#tab01') {
        	loadQuots()
	    } else {
	    	loadCollectedQuots()
		}
      })
})

function loadQuots() {
	$.ajax({
		dataType:'json',
		type:'GET',
		url:'{{ url("finance-quots/quotation") }}',
		success:function(rData){
			$('#tab01').html(rData.code)
			dTables = $('.dTable').DataTable()
		}
	})
}

function loadCollectedQuots() {
	$.ajax({
		dataType:'json',
		type:'GET',
		url:'{{ url("finance-quots/collect") }}',
		success:function(rData){
			$('#tab02').html(rData.code)
			dTables = $('.dTable').DataTable()
		}
	})
}

function loadQuot(url) {
	$.ajax({
		type:'GET',
		dataType:'json',
		url:url,
		success:function(rData) {
			$('#pop-up-modal .modal-content').html(rData.code)
			$('#pop-up-modal').modal('toggle')
			$('.date').datepicker({format:'yyyy-mm-dd' ,autoclose:true})
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
	    		$('.close').click()
	            $('.close').click()
	            if (rData.is_collected == 1) {
		            dTables.row('#quot-'+rData.quot_id).remove().draw(false)
		        }
		        $('#quot-service-'+rData.quot_id).html(rData.services)
		        $('#quot-total-'+rData.quot_id).html(rData.total)
		        $('#quot-total-disc-'+rData.quot_id).html(rData.total_disc)
		        $('#quot-discount-'+rData.quot_id).html(rData.disc)
		        $('#quot-collect-date-'+rData.quot_id).html(rData.collect_date)
	        	swal(rData.msg, {icon:rData.icon})
	        }
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
        				    $('#quot-service-'+rData.quot_id).html(rData.services)
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

