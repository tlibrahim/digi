
  <input type="hidden" name="company_id" value="{{ $com_id }}">
  <div class="clearfix" style="margin-bottom: 10px"></div>
  <div class="form-group">
      <label class="col-md-3 control-label" for="example-hf-password">Need Type</label>
      <div class="col-md-9">
        <select class="form-control" id="contact1-subject" name="need_type" >
            <option value="Request a call">Request a call</option>
            <option value="Need Support">Need Support</option>
        </select>
      </div>
  </div>
  <div class="clearfix" style="margin-bottom: 10px"></div> 
  <div class="form-group">
      <label class="col-md-3 control-label" for="example-hf-password">Refarrer</label>
      <div class="col-md-9">
        <select class="form-control" name="project_id" id="reffer-projects">
          @foreach($projects as $p)
          <option value="{{ @$p->id }}">{{ @$p->name }}</option>
          @endforeach
        </select>
      </div>
  </div>
  <div class="clearfix" style="margin-bottom: 10px"></div> 
  <div class="form-group">
      <label class="col-md-3 control-label" for="example-hf-password">Source</label>
      <div class="col-md-9">
        <select class="form-control" id="contact1-subject" name="lead_source_id" >
          @foreach($sources as $p)
          <option value="{{ @$p->id }}">{{ @$p->name }}</option>
          @endforeach
        </select>
      </div>
  </div>
  <div class="clearfix" style="margin-bottom: 10px"></div> 
  <div class="form-group">
      <label class="col-md-3 control-label" for="example-hf-email">Name</label>
      <div class="col-md-9">
          <input class="form-control" type="text" id="example-hf-email" name="name" placeholder="">
      </div>
  </div>
  <div class="clearfix" style="margin-bottom: 10px"></div> 
  <div class="form-group">
      <label class="col-md-3 control-label" for="example-hf-email">Phone</label>
      <div class="col-md-9">
          <input class="form-control" type="text" id="example-hf-email" name="phone" placeholder="">
      </div>
  </div>
  <div class="clearfix" style="margin-bottom: 10px"></div> 
  <div class="form-group">
      <label class="col-md-3 control-label" for="example-hf-email">Email</label>
      <div class="col-md-9">
          <input class="form-control" type="email" id="example-hf-email" name="email" placeholder="">
      </div>
  </div>
  <div class="clearfix" style="margin-bottom: 10px"></div> 
  <div class="form-group">
      <label class="col-md-3 control-label" for="example-hf-email">Customer Message</label>
      <div class="col-md-9">
          <input class="form-control" type="text" id="example-hf-email" name="message" placeholder="">
      </div>
  </div>
  <div class="clearfix"></div>
