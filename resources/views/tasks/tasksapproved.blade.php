@extends('layouts.app')

@section('content')
    
<main id="main-container">
	<!-- Page Header -->
	<div class="content bg-gray-lighter">
		<div class="row items-push">
			<div class="col-md-8 col-md-offset-2">
				<div class="row">
					<select class="form-control" id="selectposition">
						<option disabled>Choose Position</option>
						@foreach($positions as $p)
						<option value="{{$p->id}}">{{$p->name}}</option>
						@endforeach
					</select>
				</div><br><br>
				<div class="row" id="task">
					<table id="example1" class="table table-bordered table-striped">
		                <thead>
		                <tr>
		                  <th>ID</th>
		                  <th>Task</th>
		                  <th>Approved</th>
		                </tr>
		                </thead>
		                <tbody class="ttt">
		                </tbody>
	              	</table>
				</div>
			</div>
        </div>
    </div>
</main>

@endsection

@section('scripts')
<script type="text/javascript">
	$(document).ready(function() {
        $("#selectposition").change(function(){
        	$('.ttt').empty();
            $.ajax({
            url: 'gettasks',
            type: 'get',
            data:  {keyname:$('#selectposition option:selected').val()},
            success: function(response) {
            //console.log(response);
             if(response.length>0)
              {
                for (var i = response.length - 1; i >= 0; i--) {
           	 $('.ttt').append('<tr class="all"><td>'+response[i].id+'</td><td>'+response[i].name+'</td><td><input class="app" type="checkbox" name="" id="checkbtn"><input name="id" id="task_id" type="hidden" value="'+response[i].id+'"/></td></tr>');
        	}
        }
           }
        });
        });
    });
    $(document).on('click','.app',function(){
    	var check= $(this).is( ":checked" );
    	var u = 0;
    	if (check == true){u = 1;}
    	else {u = 0;}
    	var pid = $(this).closest(".all").find("input[name='id']").val();
    	console.log(pid);
    	$.ajax({
        url: 'checktask',
        type: 'GET',
        data: { taskid:pid ,checked:u },
        success: function(response) {
     		//console.log(response);
        }
      });
    });
</script>
@endsection