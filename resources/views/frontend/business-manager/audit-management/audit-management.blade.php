@extends('frontend.business-manager.layouts.master')
@section('title')
Business Manager-Audit Management
@endsection
@section('pagelevel-styles')
<style>
.modal-body {
  overflow-x: auto;
}
</style>
@endsection
@section('content')

	<section class="content">
	<div class="row">
		<div class="col-xs-12">
		 
			<!-- /.box -->
			<div class="box">
				<div class="box-header">
					<h3 class="box-title">Audit Management</h3>
			 </div>
			<!-- /.box-header -->
			 <div class="box-body">
				<table id="example1" class="table table-bordered table-striped">
					<thead>
						<tr>
							<th>Id</th>
							<th>Changed By</th>
							<th>Role</th>
							<th>Effect Table Name</th>
							<th>Event Name-Date</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
					<?php $i=1;?>
					@if(isset($main))
						@foreach($main as $key => $m)
						<tr>
							<td>{{$i++}}</td>
							<td>{{$m['changed_by']}}</td>
							<td>{{$m['role']}}</td>
							<td>{{$m['effect_table_name']}}</td>
							<td><p style="color:green">{{$m['event']}}</p>
							[{{$m['date']}}]</td>
							<td>
							 <button type="button" class="btn btn-info btn-detail open_modal" value="{{$m['audit_id']}}">
								 Details
							 </button>
						     </td>
					    </tr>
					  @endforeach
					@endif
				</tbody>
				
			</table>
		</div>
		<!-- /.box-body -->
	</div>
	<!-- /.box -->	
</div>
<!-- /.col -->
</div>
<!-- /.row -->
</section>

<div id="classModal" class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="classInfo" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
          ×
        </button>        
      </div>
      <div class="modal-body" id="data_load">
     
      
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-dismiss="modal">
          Close
        </button>
      </div>
    </div>
  </div>
</div>

 
@endsection
@section('pagelevel-script')
<script src="{{asset('js/login-bootstrap-modal-form.js')}}"></script>
<script>
var url_audit_full_details = "{{url('manager/audit-details')}}";
$(document).on('click','.open_modal',function(){
	/*alert('hai');*/
        var audit_id = $(this).val();
      /* alert(empoyee_id);*/
        $.get(url_audit_full_details + '/' + audit_id, function(data){
            //success data
            console.log(data);
            /*console.log(data);*/
            $('#classModal').modal('show');
            $('#data_load').html(data);            
            
        }); 
    });
	</script>
	
@endsection
