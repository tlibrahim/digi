<h3 class="block-title">Add Company</h3>

  <form  action="base_forms_elements.html" method="post" onsubmit="return false;">
      <div class="form-group">
          <label class="col-md-3 control-label" for="example-hf-email">Company Name</label>
          <div class="col-md-7">
              <input class="form-control" type="text" id="example-hf-email" name="example-hf-email" placeholder="">
          </div>
      </div>
      <div class="form-group">
          <label class="col-md-3 control-label" for="example-hf-password">Industry</label>
          <div class="col-md-7">
            <select class="form-control" id="contact1-subject" name="contact1-subject" >
                <option value="1">Support</option>
                <option value="2">Billing</option>
                <option value="3">Management</option>
                <option value="4">Feature Request</option>
            </select>
          </div>
      </div>
      <div class="form-group">
          <div class="col-md-9 col-md-offset-3">
              <button class="btn btn-sm btn-primary" type="submit">Add</button>
          </div>
      </div>
  </form>
