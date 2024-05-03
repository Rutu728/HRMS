<?php $this->load->view('backend/header'); ?>
<?php $this->load->view('backend/sidebar'); ?>
<div class="message"></div>
<div class="page-wrapper">
	<?php
	$allemployees = $this->employee_model->GetAllEmployee();
	?>
	<div class="row page-titles">
		<div class="col-md-5 align-self-center">
			<h3 class="text-themecolor"><i class="fa fa-compass" style="color:#1976d2"></i> Offboarding </h3>
		</div>
		<div class="col-md-7 align-self-center">
			<ol class="breadcrumb">
				<li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
				<li class="breadcrumb-item active"> Offboarding </li>
			</ol>
		</div>
	</div>
	<!-- Container fluid  -->
	<!-- ============================================================== -->
	<div class="container-fluid">

		<div class="row m-b-10">
			<div class="col-12">
				<button type="button" class="btn btn-info"><i class="fa fa-plus"></i><a data-toggle="modal" data-target="#exampleModal" data-whatever="@getbootstrap" class="text-white"><i class="" aria-hidden="true"></i> Add Offboarding </a></button>
				<button type="button" class="btn btn-primary"><i class="fa fa-bars"></i><a href="<?php echo base_url(); ?>organization/Offboarding" class="text-white"><i class="" aria-hidden="true"></i> Employee List</a></button>
			</div>
		</div>
		<div class="row">
			<div class="col-12">
				<div class="card card-outline-info">
					<div class="card-header">
						<h4 class="m-b-0 text-white"> Offboarding List</h4>
					</div>
					<div class="card-body">
						<div class="table-responsive ">
							<table id="example23" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
								<thead>
									<tr>
										<th>Employee Name</th>
										<th>Department</th>
										<th>Designation</th>
										<th>Joining Date</th>
										<th>Termination Date</th>
										<th>Termination Reason</th>
										<th>Action</th>
									</tr>
								</thead>

								<tbody>
									<?php foreach ($offboarding as $value) : ?>
										<tr>
											<td><?php echo $value->first_name . ' ' . $value->last_name; ?></td>

											<td><?php echo $value->dep_name; ?></td>
											<td><?php echo $value->des_name; ?></td>
											<td><?php echo date('d-m-Y', strtotime($value->em_joining_date)); ?></td>

											<td><?php echo date('d-m-Y', strtotime($value->date_of_termination)); ?></td>
											<td><?php echo  $value->termination_reason; ?></td>

											<td class="jsgrid-align-center">
												<a href="#" title="Edit" class="btn btn-sm btn-primary waves-effect waves-light offboarding" data-id="<?php echo $value->id; ?>">
													<i class="fa fa-pencil-square-o"></i>
												</a>
												<a href="#" onclick="return confirmDelete('<?php echo $value->id; ?>')" title="Delete" class="btn btn-sm btn-danger waves-effect waves-light">
													<i class="fa fa-trash-o"></i>
												</a>
											</td>

										</tr>
									<?php endforeach; ?>
								</tbody>
							</table>
							<!-- sample modal content -->
							<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel1">
								<div class="modal-dialog" role="document">
									<div class="modal-content ">
										<div class="modal-header">
											<h4 class="modal-title" id="exampleModalLabel1">Offboarding</h4>
											<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
										</div>
										<form method="post" action="add_Offboarding" id="btnSubmit" enctype="multipart/form-data">
											<div class="modal-body">

												<div class="form-group">
													<label class="control-label">Employee Name</label>

													<select class="form-control custom-select" name="emid" data-placeholder="Choose a Category" tabindex="1" value="" required>
														<option value="">Select an Employee</option>
														<?php foreach ($allemployees as $value) : ?>
															<option value="<?php echo $value->em_code ?>"><?php echo $value->first_name . ' ' . $value->last_name ?></option>
														<?php endforeach; ?>
													</select>
												</div>

												<div class="form-group">
													<label>Department</label>
													<input type="text" id="dep_name" class="form-control" readonly>
													<input type="text" id="dep_id" name="dep_id" hidden class="form-control">
												</div>

												<div class="form-group">
													<label>Designation</label>
													<input type="text" id="des_name" class="form-control" readonly>
													<input type="text" id="des_id" name="des_id" hidden class="form-control">
												</div>

												<div class="form-group">
													<label for="em_joining_date" class="control-label">Joining Date</label>
													<input type="date" name="em_joining_date" readonly value="" class="form-control" id="em_joining_date">
												</div>

												<div class="form-group">
													<label for="date_of_termination" class="control-label">Termination Date</label>
													<input type="date" name="date_of_termination" value="" class="form-control" id="date_of_termination">
												</div>

												<div class="form-group">
													<label for="termination_reason" class="control-label">Reason for Termination </label></label>
													<textarea class="form-control" value="" name="termination_reason" id="termination_reason" rows="4"></textarea>
												</div>

											</div>
											<div class="modal-footer">
												<input type="hidden" name="id" value="">
												<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
												<button type="submit" class="btn btn-success">Submit</button>
											</div>
										</form>
									</div>
								</div>
							</div>
							<!-- /.modal -->
						</div>
					</div>
				</div>
			</div>
		</div>
		<script type="text/javascript">
			$(document).ready(function() {
    $(".offboarding").click(function(e) {
        e.preventDefault();
        var iid = $(this).data('id');
        $('#btnSubmit').trigger("reset");
        $('#exampleModal').modal('show');
        $.ajax({
            url: 'OffboardingByID?id=' + iid,
            method: 'GET',
            dataType: 'json',
        }).done(function(response) {
            console.log('Offboarding Response:', response);
            var offboarding = response.offboarding;
            // Populate the form fields with the data returned from server
            $('[name="id"]').val(offboarding.id);
            $('[name="emid"]').val(offboarding.em_id);
            $('[name="dep_id"]').val(offboarding.dep_id);
            $('[name="des_id"]').val(offboarding.des_id);
            $('#termination_reason').val(offboarding.termination_reason);

            // Populate the date of joining
            var joiningDate = new Date(offboarding.em_joining_date);
            $('[name="em_joining_date"]').val(formatDate(joiningDate));

            // Populate the termination date
            var terminationDate = new Date(offboarding.date_of_termination);
            $('[name="date_of_termination"]').val(formatDate(terminationDate));

            // Now fetch department name and designation name
            $.ajax({
                url: 'getEmployeeDetails',
                method: 'GET',
                data: {
                    emid: offboarding.em_id
                },
                dataType: 'json',
                success: function(employeeDetails) {
                    console.log('Employee Details Response:', employeeDetails);
                    // Populate department name and designation name
                    $('#dep_name').val(employeeDetails.dep_name);
                    $('#des_name').val(employeeDetails.des_name);
                },
                error: function(xhr, status, error) {
                    console.log('Error fetching employee details: ' + error);
                }
            });
        }).fail(function(jqXHR, textStatus, errorThrown) {
            console.log('AJAX request failed: ' + textStatus + ', ' + errorThrown);
        });
    });
});

function formatDate(date) {
    var month = (date.getMonth() + 1).toString().padStart(2, '0');
    var day = date.getDate().toString().padStart(2, '0');
    var year = date.getFullYear();
    return year + '-' + month + '-' + day; // Format as YYYY-MM-DD for input[type="date"]
}



		</script>
		<script type="text/javascript">
			function confirmDelete(id) {
				if (confirm('Are you sure to delete this value?')) {
					window.location.href = 'DeleteOffboarding?D=' + id;
				}
				return false; // Prevent default link behavior
			}
		</script>


			<script>
				$(document).ready(function() {
    $('select[name="emid"]').change(function() {
        var emid = $(this).val(); // Get the selected employee ID
        $.ajax({
            url: 'getEmployeeDetails',
            method: 'GET',
            data: { emid: emid },
            dataType: 'json',
            success: function(response) {
				console.log(response)
                // Populate the department, designation, and joining date fields
                $('#dep_name').val(response.dep_name);
                $('#des_name').val(response.des_name);
				$('#dep_id').val(response.dep_id);
                $('#des_id').val(response.des_id);
                $('#em_joining_date').val(response.em_joining_date);
				
            },
            error: function(xhr, status, error) {
                console.log(error);
            }
        });
    });
});


			</script>
		<?php $this->load->view('backend/footer'); ?>
