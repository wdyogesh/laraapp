<?php $__env->startSection('title'); ?>
Business Manager-Client Details
<?php $__env->stopSection(); ?>
<?php $__env->startSection('pagelevel-styles'); ?>
<style type="text/css">
.manager-content-wrapper{margin-left: 0;}
</style>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper manager-content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
       Mr <?php echo e($client_record['name']); ?> <?php echo e($client_record['surname']); ?> / Client details
      </h1>
         
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-3">
         <!--  <a href="<?php echo e(url('manager/compose-message')); ?>" class="btn btn-primary btn-block margin-bottom">Compose</a>
 -->
          <div class="box box-solid">
            <div class="box-header with-border">
             <!--  <h3 class="box-title">Folders</h3> -->

              <div class="box-tools">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
              </div>
            </div>
          <?php echo $__env->make('frontend.business-manager.client-management.client-details-sidebar', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
          </div>
        
        </div>
    
        <div class="col-md-9">
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Contact information</h3>

            </div>
            <!-- /.box-header -->
           
      	<form action="<?php echo e(url('manager/update-employee')); ?>" class="bootstrap-modal-form form-horizontal" method="post">
						<?php echo e(csrf_field()); ?>

						<div class="modal-body">
							<div class="box-body">
                              <div class="form-group">
									<label for="inputEmail3" class="col-sm-2 control-label"> Name:</label>
									<div class="col-sm-5">
										<input type="text" class="form-control" id="inputEmail3" placeholder="Enter Employee Name" name="employee_name" value="<?php echo e($managers_client_record['name']); ?> <?php echo e($managers_client_record['surname']); ?>" readonly>
									</div>
								</div>

								 <div class="form-group">
									<label for="inputEmail3" class="col-sm-2 control-label"> Email:</label>
									<div class="col-sm-5">
										<input type="text" class="form-control" id="inputEmail3" placeholder="Enter Employee Name" name="employee_name" value="<?php echo e($managers_client_record['email']); ?>" readonly>
									</div>
								</div>

								<div class="form-group">
									<label for="inputEmail3" class="col-sm-2 control-label"> Country:</label>
									<div class="col-sm-5">
										<input type="text" class="form-control" id="inputEmail3" placeholder="Enter Employee Name" name="employee_name" value="<?php echo e($managers_client_record['country']); ?>" readonly>
									</div>
								</div>

								<div class="form-group">
									<label for="inputEmail3" class="col-sm-2 control-label"> State:</label>
									<div class="col-sm-5">
										<input type="text" class="form-control" id="inputEmail3" placeholder="Enter Employee Name" name="employee_name" value="<?php echo e($managers_client_record['state']); ?>" readonly>
									</div>
								</div>
								<div class="form-group">
									<label for="inputEmail3" class="col-sm-2 control-label"> City:</label>
									<div class="col-sm-5">
										<input type="text" class="form-control" id="inputEmail3" placeholder="Enter Employee Name" name="employee_name" value="<?php echo e($managers_client_record['city']); ?>" readonly>
									</div>
								</div>
								<div class="form-group">
									<label for="inputEmail3" class="col-sm-2 control-label"> Phone Number:</label>
									<div class="col-sm-5">
										<input type="text" class="form-control" id="inputEmail3" placeholder="Enter Employee Name" name="employee_name" value="<?php echo e($managers_client_record['country_code']); ?><?php echo e($managers_client_record['phone_number']); ?>" readonly>
									</div>
								</div>
								<div class="form-group">
									<label for="inputEmail3" class="col-sm-2 control-label"> Date of birth:</label>
									<div class="col-sm-5">
										<input type="text" class="form-control" id="inputEmail3" placeholder="Enter Employee Name" name="employee_name" value="<?php echo e($managers_client_record['dateof_birth']); ?>" readonly>
									</div>
								</div>
               <a href="<?php echo e(url('manager/edit-client/'.Hashids::encode($client_record['id']))); ?>" class="btn btn-info pull-right">
           Edit
         </a>

								</div>
							</div>
							
						</form>
           
          </div>
          <!-- /. box -->
        </div>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
<?php $__env->stopSection(); ?>
<?php $__env->startSection('pagelevel-script'); ?>
<script src="<?php echo e(asset('js/login-bootstrap-modal-form.js')); ?>"></script>
<!-- email template script for checkbox start-->
<script>
  $(function () {
    //Enable iCheck plugin for checkboxes
    //iCheck for checkbox and radio inputs
    $('.mailbox-messages input[type="checkbox"]').iCheck({
      checkboxClass: 'icheckbox_flat-blue',
      radioClass: 'iradio_flat-blue'
    });

    //Enable check and uncheck all functionality
    $(".checkbox-toggle").click(function () {
      var clicks = $(this).data('clicks');
      if (clicks) {
        //Uncheck all checkboxes
        $(".mailbox-messages input[type='checkbox']").iCheck("uncheck");
        $(".fa", this).removeClass("fa-check-square-o").addClass('fa-square-o');
      } else {
        //Check all checkboxes
        $(".mailbox-messages input[type='checkbox']").iCheck("check");
        $(".fa", this).removeClass("fa-square-o").addClass('fa-check-square-o');
      }
      $(this).data("clicks", !clicks);
    });

    //Handle starring for glyphicon and font awesome
    $(".mailbox-star").click(function (e) {
      e.preventDefault();
      //detect type
      var $this = $(this).find("a > i");
      var glyph = $this.hasClass("glyphicon");
      var fa = $this.hasClass("fa");

      //Switch states
      if (glyph) {
        $this.toggleClass("glyphicon-star");
        $this.toggleClass("glyphicon-star-empty");
      }

      if (fa) {
        $this.toggleClass("fa-star");
        $this.toggleClass("fa-star-o");
      }
    });
  });
</script>
<!-- email template script for checkbox end-->
<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.business-manager.layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>