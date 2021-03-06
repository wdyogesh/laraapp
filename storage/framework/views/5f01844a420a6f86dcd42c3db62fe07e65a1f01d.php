<?php $__env->startSection('title'); ?>
Business Manager-Edit Client Notes Category
<?php $__env->stopSection(); ?>
<?php $__env->startSection('pagelevel-styles'); ?>
<!-- new date picker style start-->
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">

<!-- new date picker style start-->
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<section class="content">
	<div class="row">
		<div class="col-xs-12">

			<!-- /.box -->
			<div class="box">
				<div class="box-header">
					<h3 class="box-title">Edit Category</h3>
				</div>
				<!-- /.box-header -->
				<div class="box-body">
					<?php if(Session::has('fail')): ?>
					<div  align="center" id="successMessage" class="alert alert-danger"><?php echo e(Session::get('fail')); ?>

					</div>
					<?php endif; ?>
					<form action="<?php echo e(url('manager/edit-notes-category')); ?>" class="bootstrap-modal-form form-horizontal" method="post">
						<?php echo e(csrf_field()); ?>

						<div class="modal-body">
							<div class="box-body">
								<div class="form-group" style="font-size: 18px;margin-left:140px; ">
									<label name="login_error"></label>
								</div>

								<div class="form-group">
									<label for="inputEmail3" class="col-sm-2 control-label">Category Name:</label>
									<div class="col-sm-5">
										<input class="form-control" name="category_name" placeholder="Category" value="<?php echo e($notes_category['category_name']); ?>">
										<span class="text-danger"><?php echo e($errors->first('category_name')); ?></span>	
									</div>
								</div>
								<input type="hidden" name="category_id" value="<?php echo e($notes_category['id']); ?>">
								<input type="hidden" name="category_hidden_name" value="<?php echo e($notes_category['category_name']); ?>">

								<div class="form-group" align="center">
									<a href="<?php echo e(url('manager/manage-notes-category')); ?>" class="btn btn-info">
										Go back
									</a>
									<button type="submit" class="btn btn-success">Update</button>
								</div>

							</div>
						</div>

					</form>
				</div>
				<!-- /.box-body -->
			</div>
			<!-- /.box -->
		</div>

		<!-- /.row -->
	</section>

	<?php $__env->stopSection(); ?>
	<?php $__env->startSection('pagelevel-script'); ?>
<script src="<?php echo e(asset('js/login-bootstrap-modal-form.js')); ?>"></script>

	<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.business-manager.layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>