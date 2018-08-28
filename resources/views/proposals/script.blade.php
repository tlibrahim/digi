<script type="text/javascript">
	$(document).ready(function() {
      loadCurrentProposal()
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
          loadCurrentProposal()
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

  function loadCurrentProposal() {
      $.ajax({
          url:'{{ url("complete-proposals-current") }}',
          dataType:'json',
          type:'GET',
          success:function(rData) {
              $("#tab01").html(rData.code)
              dTables = $('table').DataTable()
          }
      })
  }

  function loadPopUp(link) {
    $.ajax({
      url:link,
      type:'GET',
      dataType:'json',
      success:function(rData) {
        if (rData.status == 'ok') {
          $("#pop-up-modal .modal-content").html(rData.code)
          $("#pop-up-modal").modal('toggle')
        } else {
          swal('Sorry, can`t load this data now!' ,{icon:'error'})
        }
      }
    })
  }
  
</script>