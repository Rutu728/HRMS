<?php $this->load->view('backend/header'); ?>
<?php $this->load->view('backend/sidebar'); ?>
<div class="page-wrapper">
	<!-- ============================================================== -->
	<!-- Bread crumb and right sidebar toggle -->
	<!-- ============================================================== -->
	<div class="row page-titles">
		<!-- Breadcrumb and page title here -->
	</div>
	<div class="message"></div>
	<?php $enamevalue = $this->incident_model->getename(); ?>
	<div class="container-fluid">
		<div class="row m-b-10">
			<!-- Buttons for navigating to other pages -->
		</div>
		<div class="row">
			<div class="col-12">
				<div class="card card-outline-info">
					<div class="card-header">
						<!-- Card header title here -->
					</div>
					<div class="card-body">
						<?php echo validation_errors(); ?>
						<?php echo $this->upload->display_errors(); ?>
						<?php echo $this->session->flashdata('formdata'); ?>
						<?php echo $this->session->flashdata('feedback'); ?>
						<form class="row" method="post" action="add_Incident" enctype="multipart/form-data">

							<div class="form-group col-md-3 m-t-20">
								<label>Employee Name</label>
								<select id="employeeSelect" name="ename" class="form-control custom-select" required>
									<option value="">Select Employee Name</option>
									<?php foreach ($enamevalue as $value) : ?>
										<option value="<?php echo $value->first_name ?>" data-id="<?php echo $value->em_code ?>"><?php echo $value->first_name.' '.$value->last_name ?></option>
									<?php endforeach; ?>
								</select>
							</div>
							<div class="form-group col-md-3 m-t-20">
								<label>Employee Id</label>
								<input type="text" id="em_id" name="em_id" readonly class="form-control form-control-line" placeholder="Employee's Id" minlength="2" required>
							</div>

							<div class="form-group col-md-3 m-t-20">
								<label>Reporting Manager</label>
								<input type="text" id="reporting_manager" name="reporting_manager" r class="form-control form-control-line" placeholder="Reporting Manager" minlength="2" required>
							</div>

							<div class="form-group col-md-3 m-t-20">
								<label for="incident_date"> Incident Date</label>
								<input type="date" id="incident_date" name="incident_date" class="form-control form-control-line" placeholder="Select Date" required>
							</div>

							<div class="form-group col-md-3 m-t-20">
								<label for="reporting_date"> Reporting Date</label>
								<input type="date" id="reporting_date" name="reporting_date" class="form-control form-control-line" placeholder="Select Date" required>
							</div>

							<div class="form-group col-md-3 m-t-20">
								<label> Incident Type </label>
								<select name="incident_type" class="form-control custom-select" required>
									<option>Select Type</option>
									<option value="Data Security"> Data Security </option>
									<option value="Behavioural Issue"> Behavioural Issue </option>
									<option value="Other"> Other </option>
								
								</select>
							</div>

							<div class="form-group col-md-3 m-t-20">
								<label>Incident Description</label>
								<!-- <input type="text" id="incident_description" name="incident_description" class="form-control form-control-line" placeholder="Incident Description" minlength="2" required> -->
								<textarea class="form-control" value="" name="incident_description" id="incident_description" rows="5"></textarea>
							</div>
							
							<!-- Other form fields -->
							<div class="form-actions col-md-12">
								<button type="submit" class="btn btn-success"> <i class="fa fa-check"></i> Save</button>
								<button type="button" class="btn btn-danger">Cancel</button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
	$(document).ready(function() {
		$('#employeeSelect').change(function() {
			var employeeName = $(this).val();
			var employeeId = $(this).find('option[value="' + employeeName + '"]').data('id');
			$('#em_id').val(employeeId);
		});
	});
</script>

<?php $this->load->view('backend/footer'); ?>
