$(document).ready(function() {
	loadCompanies()
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
			loadCompanies()
		} else {
			loadSignedContracts()
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
        	loadCompanies()
	    } else {
	    	loadSignedContracts()
		}
      })
})

function loadEdit(url) {
	$.ajax({
		dataType:'json',
		type:'GET',
		url:url,
		success:function(rData) {
			$('#pop-up-modal .modal-content').html(rData.code)
			$('#pop-up-modal').modal('toggle')
		}
	})
}

function loadSignedContracts() {
	$.ajax({
		dataType:'json',
		type:'GET',
		url:'{{ url("contracts-signed") }}',
		success:function(rData){
			console.log(rData)
			$('#tab02').html(rData.code)
			dTables = $('table').DataTable()
		}
	})
}

function loadCompanies() {
	$.ajax({
		dataType:'json',
		type:'GET',
		url:'{{ url("contracts-quot") }}',
		success:function(rData){
			console.log(rData)
			$('#tab01').html(rData.code)
			dTables = $('table').DataTable()
		}
	})
}

function signContract(id ,domId) {
	$.ajax({
		type:'GET',
		dataType:'json',
		url:'{{ url("contracts-sign") }}/'+id,
		success:function(rData) {
			swal(rData.msg ,{icon:rData.icon})
			if (rData.sign == 1) {
				dTables.row('#'+domId).remove().draw(false)
			}
		}
	})
}