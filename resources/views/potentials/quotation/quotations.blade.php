				<div class="modal-header">
	        		<button type="button" class="close" data-dismiss="modal">&times;</button>
	        		<h4 class="modal-title">Quotation History</h4>
	      		</div>
	      		<div class="modal-body" style="max-height: 750px;overflow-y: scroll;">
	      			@foreach($quotations as $quot)
					<div>
					    @if(@$quot->services)
		        			<div class="col-md-12">
		        				<label>Services Information :</label>
		        			</div>
		        			<div class="col-md-12">
			        			<table class="table table-striped table-bordered">
									<tr>
										<td>Quantity</td>
										<td>Service</td>
									</tr>
							        @foreach(@$quot->services as $s)
									<tr>
										<td>{{ @$s->quantity }}</td>
										<td>{{ @$s->service->name }}</td>
									</tr>
							        @endforeach
								</table>
							</div>
					    @endif
					</div>
        			<div class="col-md-12">
        				<label>Collect Information :</label>
        			</div>
					<div class="col-md-12">
						@if(@$quot->is_collected == 1)
						<table class="table table-striped table-bordered">
							<tr>
								<td>Collected</td>
								<td>{{ @$quot->collect_date }}</td>
							</tr>
						</table>
						@else
						<table class="table table-striped table-bordered">
							<tr>
								<td>Not Collected</td>
							</tr>
						</table>
						@endif
					</div>
        			<div class="col-md-12">
        				<label>Money Information :</label>
        			</div>
					<div class="col-md-12">
						<table class="table table-striped table-bordered">
							<tr>
								<td>Total Price</td>
								<td>{{ @$quot->total }}</td>
							</tr>
							<tr>
								<td>Total Offer</td>
								<td>{{ @$quot->total_offer }}%</td>
							</tr>
							<tr>
								<td>Total </td>
								<td>@if(@$quot->total_offer > 0){{ @$quot->total - (@$quot->total * @$quot->total_offer) / 100 }}@else {{ @$quot->total }} @endif</td>
							</tr>
						</table>
					</div>
					@if(!$loop->last)
						<div class="col-md-12">
							<div class="hr-line"></div>
						</div>
					@endif
					@endforeach
					<div class="clearfix"></div>
					<div class="col-md-12">
						<div class="clearfix"></div>
						<div class="modal-footer" style="padding: 15px 0">
							<div class="col-md-12">
					        	<button type="button" class="btn btn-default pull-left" data-dismiss="modal" style="width: 100%">Close</button>
					        </div>
						</div>
					</div>
				</div>