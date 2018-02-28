  <footer class="main-footer">
    <div class="pull-right hidden-xs">
     <b>Intell Corporation</b>
    </div>

      {{----model--feedback goes here --}}
      <div id="myModal1" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
           aria-hidden="true">
          <div class="modal-dialog">
              <div class="modal-content">
                  <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                      <h3 id="myModalLabel">Feedback</h3>
                      <p>Please fill the form to make better service.</p>
                  </div>
                  <div class="modal-body">
                      <form class="form-horizontal col-sm-12">

                          <div class="form-group"><label>What score you will give to our service ? </label>
                              <br>
                              <input style="margin-left: 1%; color: red" name="rate" data-trigger="manual" type="radio"> 1 (Not Satisfied)
                              <input style="margin-left: 1%;"  name="rate" data-trigger="manual" type="radio"> 2
                              <input style="margin-left: 1%;"  name="rate" data-trigger="manual" type="radio"> 3
                              <input style="margin-left: 1%;"  name="rate" data-trigger="manual" type="radio"> 4
                              <input style="margin-left: 1%;"  name="rate" data-trigger="manual" type="radio"> 5
                              <input style="margin-left: 1%;"  name="rate" data-trigger="manual" type="radio"> 6
                              <input style="margin-left: 1%;"  name="rate" data-trigger="manual" type="radio"> 7
                              <input style="margin-left: 1%;"  name="rate" data-trigger="manual" type="radio"> 8
                              <input style="margin-left: 1%;"  name="rate" data-trigger="manual" type="radio"> 9
                              <input style="margin-left: 1%;  color: green"  name="rate" data-trigger="manual" type="radio"> 10 (Completely satisfied)
                          </div>

                          <div class="form-group"><label>What dod you like about our service ? </label>
                              <textarea class="form-control" placeholder="Your message here.." data-placement="top"  data-trigger="manual"></textarea>
                          </div>
                          <div class="form-group"><label>What dod you like about our service ? </label>
                              <textarea class="form-control" placeholder="Your message here.." data-placement="top"  data-trigger="manual"></textarea>
                          </div>
                          <div class="form-group">
                              <button type="submit" class="btn btn-success pull-right">Send It!</button>
                              <p class="help-block pull-right  text-danger hide" id="form-error">&nbsp; The form is notvalid. </p>
                          </div>
                      </form>
                  </div>
                  <div class="modal-footer">
                      <button class="btn" data-dismiss="modal" aria-hidden="true">Cancel</button>
                  </div>
              </div>
          </div>
      </div>
      {{----model--feedback End here Now--}}

      <strong>Copyright &copy; 2017-2018<a href="#"></a></strong>
  </footer>