<?php $this->load->view('backend/header'); ?>
<?php $this->load->view('backend/sidebar'); ?>
<div class="page-wrapper">
	<div class="message"></div>
	<div class="row page-titles">
		<div class="col-md-5 align-self-center">
			<h3 class="text-themecolor"><i class="" style="color:#1976d2"></i>&nbsp; Dashboard</h3>
		</div>
		<div class="col-md-7 align-self-center">
			<ol class="breadcrumb">
				<li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
				<li class="breadcrumb-item active">Dashboard</li>
			</ol>
		</div>
	</div>
	<!-- Container fluid  -->
	<!-- ============================================================== -->
	<div class="container-fluid">
		<!-- ============================================================== -->
		<!-- Row -->
		<div class="row">
			<!-- Column -->
			<div class="col-lg-3 col-md-6">
				<div class="card">
					<div class="card-body">
						<div class="d-flex flex-row">
							<div class="round align-self-center round-primary"><i class="ti-user"></i></div>
							<div class="m-l-10 align-self-center">
								<h3 class="m-b-0">
									<?php
									$this->db->where('status', 'ACTIVE');
									$this->db->from("employee");
									echo $this->db->count_all_results();
									?> Employees</h3>
								<a href="<?php echo base_url(); ?>employee/Employees" class="text-muted m-b-0">View Details</a>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- Column -->
			<!-- Column -->
			<div class="col-lg-3 col-md-6">
				<div class="card">
					<div class="card-body">
						<div class="d-flex flex-row">
							<div class="round align-self-center round-info"><i class="ti-file"></i></div>
							<div class="m-l-10 align-self-center">
								<h3 class="m-b-0">
									<?php
									$this->db->where('leave_status', 'Approve');
									$this->db->from("emp_leave");
									echo $this->db->count_all_results();
									?> Leaves
								</h3>
								<a href="<?php echo base_url(); ?>leave/Application" class="text-muted m-b-0">View Details</a>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- Column -->
			<!-- Column -->
			<div class="col-lg-3 col-md-6">
				<div class="card">
					<div class="card-body">
						<div class="d-flex flex-row">
							<div class="round align-self-center round-danger"><i class="ti-calendar"></i></div>
							<div class="m-l-10 align-self-center">
								<h3 class="m-b-0">
									<?php
									$this->db->where('pro_status', 'running');
									$this->db->from("project");
									echo $this->db->count_all_results();
									?> Projects
								</h3>
								<a href="<?php echo base_url(); ?>Projects/All_Projects" class="text-muted m-b-0">View Details</a>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-md-6 col-lg-3 col-xlg-3">
				<div class="card card-inverse" style="padding: 5px 0px; background: radial-gradient(590px at 8.2% 13.8%, rgb(18, 35, 60) 0%, rgb(187, 187, 187) 90%);">
					<div class="box text-center">
					<h1 class="font-light text-white">
						<?php
							// Get today's date
							$today = date('Y-m-d');

							// Query upcoming birthdays
							$this->db->select('first_name, last_name, CONCAT(MONTHNAME(em_birthday), " ", DAY(em_birthday)) AS birthday_month_day');
							$this->db->from('employee');
							// Filter by upcoming birthdays (within next 40 days)
							$this->db->where("DATE_FORMAT(em_birthday,'%m-%d') BETWEEN DATE_FORMAT(NOW(),'%m-%d') AND DATE_FORMAT(DATE_ADD(NOW(), INTERVAL 40 DAY),'%m-%d')");
							$query = $this->db->get();
							$upcoming_birthdays = $query->result();

							// Output the number of upcoming birthdays
						

							// Display upcoming birthdays
							foreach ($upcoming_birthdays as $birthday) {
								echo "<h4 class='font-light text-white'>{$birthday->first_name} {$birthday->last_name} - {$birthday->birthday_month_day}</h4>"; 
							}
						?>

						</h1>
						<h6 class="text-white">Upcoming Birthdays</h6>
					</div>
				</div>
			</div>
			<!-- Column -->
			<!-- Column -->
			<!-- <div class="col-lg-3 col-md-6">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex flex-row">
                                    <div class="round align-self-center round-success"><i class="ti-money"></i></div>
                                    <div class="m-l-10 align-self-center">
                                        <h3 class="m-b-0">
                                         <?php
											$this->db->where('status', 'Granted');
											$this->db->from("loan");
											echo $this->db->count_all_results();
											?> Loan 
                                        </h3>
                                        <a href="<?php echo base_url(); ?>Loan/View" class="text-muted m-b-0">View Details</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> -->
			<!-- Column -->
		</div>
		<!-- Row -->
		<!-- Row -->

		<div class="row ">
			<div class="col-md-6 col-lg-3 col-xlg-3">
				<div class="card card-inverse" style="background: linear-gradient(108.3deg, rgb(202, 73, 118) 15.2%, rgb(255, 84, 84) 99.3%);">
					<div class="box  text-center">
						<h1 class="font-light text-white">
							<?php
							$this->db->where('status', 'INACTIVE');
							$this->db->from("employee");
							echo $this->db->count_all_results();
							?>
						</h1>
						<h6 class="text-white">Former Employees</h6>
					</div>
				</div>
			</div>
			<!-- Column -->
			<div class="col-md-6 col-lg-3 col-xlg-3">
				<div class="card card-info card-inverse" style="background: linear-gradient(89deg, rgb(21, 74, 189) 0.1%, rgb(26, 138, 211) 51.5%, rgb(72, 177, 234) 100.2%);">
					<div class="box text-center">
						<h1 class="font-light text-white">
							<?php
							$this->db->where('leave_status', 'Not Approve');
							$this->db->from("emp_leave");
							echo $this->db->count_all_results();
							?>
						</h1>
						<h6 class="text-white">Pending Leave Application</h6>
					</div>
				</div>
			</div>
			<!-- Column -->
			<div class="col-md-6 col-lg-3 col-xlg-3">
				<div class="card card-inverse" style="background: linear-gradient(to right, rgb(52, 232, 158), rgb(15, 52, 67));">
					<div class="box text-center">
						<h1 class="font-light text-white">
							<?php
							$this->db->where('pro_status', 'upcoming');
							$this->db->from("project");
							echo $this->db->count_all_results();
							?>
						</h1>
						<h6 class="text-white">Upcoming Project</h6>
					</div>
				</div>
			</div>
			<!-- Column -->

			<div class="col-md-6 col-lg-3 col-xlg-3">
				<div class="card card-inverse card-primary" style="background: linear-gradient(109.6deg, rgb(247, 108, 243) 11.2%, rgb(173, 64, 254) 100.2%);">
					<div class="box text-center">
						
						<h1 class="font-light text-white">
						<?php
							// Get today's date
							$today = date('Y-m-d');

							// Query to count the number of employees present today
							$this->db->select('COUNT(*) as total_present');
							$this->db->from('attendance');
							$this->db->where('atten_date', $today);
							$query = $this->db->get();
							$result = $query->row();

							// Output the total number of employees present today
							$total_present = $result->total_present ?? 0;
							echo $total_present;
						?>


						</h1>
						<h6 class='font-strong text-white'>Today's Total Present Employees</h6>
					</div>
				</div>
			</div>
			
		<!-- Column -->
	</div>
	<!-- ============================================================== -->
</div>
<div class="container-fluid">
	<?php $notice = $this->notice_model->GetNoticelimit();
	$running = $this->dashboard_model->GetRunningProject();
	$userid = $this->session->userdata('user_login_id');
	$todolist = $this->dashboard_model->GettodoInfo($userid);
	$holiday = $this->dashboard_model->GetHolidayInfo();
	?>
	<!-- Row -->
	<div class="row">

		<div class="col-md-8">
			<div class="card">
				<div class="card-body">
					<h4 class="card-title">Running Projects</h4>
				</div>
				<div class="card-body">
					<div class="table-responsive" style="height:600px;overflow-y:scroll">
						<table class="table table-bordered table-hover earning-box">
							<thead>
								<tr style="background-color:#e3f0f7">
									<th>Title</th>
									<th>Start Date</th>
									<th>End Date</th>
								</tr>
							</thead>
							<tbody>
								<?php foreach ($running as $value) : ?>
									<tr style="vertical-align:top;">
										<td><a href="<?php echo base_url(); ?>Projects/view?P=<?php echo base64_encode($value->id); ?>"><?php echo substr("$value->pro_name", 0, 25) . '...'; ?></a></td>
										<td><?php echo $value->pro_start_date; ?></td>
										<td><?php echo $value->pro_end_date; ?></td>
									</tr>
								<?php endforeach; ?>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
		<!-- Column -->
		<div class="col-lg-4">
			<div class="card">
				<div class="card-body">
					<h4 class="card-title">To Do list</h4>
					<h6 class="card-subtitle">List of your next task to complete</h6>
					<div class="to-do-widget m-t-20" style="height:550px;overflow-y:scroll">
						<ul class="list-task todo-list list-group m-b-0" data-role="tasklist">
							<?php foreach ($todolist as $value) : ?>
								<li class="list-group-item" data-role="task">
									<?php if ($value->value == '1') { ?>
										<div class="checkbox checkbox-info">
											<input class="to-do" data-id="<?php echo $value->id ?>" data-value="0" type="checkbox" id="<?php echo $value->id ?>">
											<label for="<?php echo $value->id ?>"><span><?php echo $value->to_dodata; ?></span></label>
										</div>
									<?php } else { ?>
										<div class="checkbox checkbox-info">
											<input class="to-do" data-id="<?php echo $value->id ?>" data-value="1" type="checkbox" id="<?php echo $value->id ?>" checked>
											<label class="task-done" for="<?php echo $value->id ?>"><span><?php echo $value->to_dodata; ?></span></label>
										</div>
									<?php } ?>
								</li>

							<?php endforeach; ?>
						</ul>
					</div>
					<div class="new-todo">
						<form method="post" action="add_todo" enctype="multipart/form-data" id="add_todo">
							<div class="input-group">
								<input type="text" name="todo_data" class="form-control" style="border: 1px solid #fff !IMPORTANT;" placeholder="Enter New Task...">
								<span class="input-group-btn">
									<input type="hidden" name="userid" value="<?php echo $this->session->userdata('user_login_id'); ?>">
									<button type="submit" class="btn btn-success todo-submit"><i class="fa fa-plus"></i></button>
								</span>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- Row -->
	<div class="row">
		<div class="col-lg-8">
			<div class="card">
				<div class="card-body">
					<h4 class="card-title">Notice Board</h4>
				</div>
				<div class="card-body">
					<div class="table-responsive slimScrollDiv" style="height:600px;overflow-y:scroll">
						<table class="table table-hover table-bordered earning-box ">
							<thead>
								<tr style="background-color:#e3f0f7">
									<th>Title</th>
									<th>File</th>
									<th>Date</th>
								</tr>
							</thead>
							<tbody>
								<?php foreach ($notice as $value) : ?>
									<tr class="scrollbar" style="vertical-align:top">
										<td><?php echo $value->title ?></td>
										<td><mark><a href="<?php echo base_url(); ?>assets/images/notice/<?php echo $value->file_url ?>" target="_blank"><?php echo $value->file_url ?></a></mark>
										</td>
										<td style="width:110px;"><?php echo date('d-m-Y', strtotime($value->date)); ?></td>
									</tr>
								<?php endforeach; ?>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
		<div class="col-md-4">
			<div class="card">
				<div class="card-body">
					<h4 class="card-title">
						Holidays
					</h4>
				</div>
				<div class="card-body">
					<div class="table-responsive" style="height:600px;overflow-y:scroll">
						<table class="table table-hover table-bordered earning-box">
							<thead>
								<tr style="background-color:#e3f0f7">
									<th>Holiday Name</th>
									<th>Date</th>
								</tr>
							</thead>
							<tbody>
								<?php foreach ($holiday as $value) : ?>
									<tr>
										<td><?php echo $value->holiday_name ?></td>
										<td style="width:110px;"><?php echo date('d-m-Y', strtotime($value->from_date)); ?></td>
										
									</tr>
								<?php endforeach ?>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
	<script>
		$(".to-do").on("click", function() {
			//console.log($(this).attr('data-value'));
			$.ajax({
				url: "Update_Todo",
				type: "POST",
				data: {
					'toid': $(this).attr('data-id'),
					'tovalue': $(this).attr('data-value'),
				},
				success: function(response) {
					location.reload();
				},
				error: function(response) {
					console.error();
				}
			});
		});
	</script>
	<?php $this->load->view('backend/footer'); ?>
