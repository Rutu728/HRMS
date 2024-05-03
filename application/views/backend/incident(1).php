<?php $this->load->view('backend/header'); ?>
<?php $this->load->view('backend/sidebar'); ?> 
        <div class="message"></div>
         <div class="page-wrapper">
                <?php 
                $allemployees = $this->employee_model->GetAllEmployee(); 
                ?> 
            <div class="row page-titles">
                <div class="col-md-5 align-self-center">
                    <h3 class="text-themecolor"><i class="fa fa-compass" style="color:#1976d2"></i> incident</h3>
                </div>
                <div class="col-md-7 align-self-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                        <li class="breadcrumb-item active">incident</li>
                    </ol>
                </div>
            </div>
            <!-- Container fluid  -->
            <!-- ============================================================== -->
            <div class="container-fluid">

                <div class="row m-b-10"> 
                    <div class="col-12">
                        <button type="button" class="btn btn-info"><i class="fa fa-plus"></i><a data-toggle="modal" data-target="#exampleModal" data-whatever="@getbootstrap"  class="text-white"><i class="" aria-hidden="true"></i> Add incident </a></button>
                        <button type="button" class="btn btn-primary"><i class="fa fa-bars"></i><a href="<?php echo base_url(); ?>employee/Employees" class="text-white"><i class="" aria-hidden="true"></i>  Employee List</a></button>
                    </div>
                </div>         
                <div class="row">
                    <div class="col-12">
                        <div class="card card-outline-info">
                            <div class="card-header">
                                <h4 class="m-b-0 text-white"> incident List</h4>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive ">
                                    <table id="example23" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                                         <thead>
                                            <tr>
												<th>Incident Id </th>
                                                <th>Employee Id </th>
                                                <th>Employee Name </th>
                                                <th>Reporting Manager </th>
                                                <th>Incident Date </th>
                                                <th>Reporting Date</th>
                                                <th>Incident Type</th>
                                                <th>Incident Description</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <!-- <tfoot>
                                            <tr>
                                                <th>Employee Name</th>
                                                <th>PIN</th>
                                                <th>Title </th>
                                                <th>Description</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                            </tr>
                                        </tfoot> -->
                                        <tbody>
                                           <?php foreach($incident as $value): ?>
                                            <tr>
												<td><?php echo $value->id; ?></td>
                                                <td><?php echo $value->em_id; ?></td>
                                                <td><?php echo $value->ename; ?></td>
                                                <td><?php echo $value->reporting_manager; ?></td>
                                                <td><?php echo date('d-m-Y', strtotime($value->incident_date)); ?></td>
                                                <td><?php echo date('d-m-Y', strtotime($value->reporting_date)); ?></td>
                                                <td><?php echo $value->incident_type; ?></td>
                                                <td><?php echo $value->incident_description; ?></td>
                                                <td  class="jsgrid-align-center ">
                                                    <a href="#" title="Edit" class="btn btn-sm btn-primary waves-effect waves-light disiplinary" data-id="<?php echo $value->id; ?>"><i class="fa fa-pencil-square-o"></i></a>
                                                    <a href="#" onclick="return confirmDelete('<?php echo $value->id; ?>')" title="Delete" class="btn btn-sm btn-danger waves-effect waves-light"><i class="fa fa-trash-o"></i></a>
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
                                                    <h4 class="modal-title" id="exampleModalLabel1">incident</h4>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                </div>
                                                <form method="post" action="Add_incident" id="btnSubmit" enctype="multipart/form-data">
                                                <div class="modal-body">
                                                    
                                                <div class="form-group  m-t-20">
                                                    <label>Employee Name</label>
                                                    <select id="employeeSelect" name="ename" class="form-control custom-select" required>
                                                        <option value="">Select Employee Name</option>
                                                        <?php foreach ($allemployees as $value) : ?>
                                                            <option value="<?php echo $value->first_name.' '.$value->last_name ?>" data-id="<?php echo $value->em_code ?>"><?php echo $value->first_name.' '.$value->last_name ?></option>
                                                        <?php endforeach; ?>
                                                    </select>
                                                </div>
                                                <div class="form-group m-t-20">
                                                    <label>Employee Id</label>
                                                    <input type="text" id="em_id" name="em_id" readonly class="form-control form-control-line" placeholder="Employee's Id" minlength="2" required>
                                                </div>
                                                <div class="form-group m-t-20">
                                                    <label>Reporting Manager</label>
                                                    <input type="text" id="reporting_manager" name="reporting_manager" r class="form-control form-control-line" placeholder="Reporting Manager" minlength="2" required>
                                                </div>
                                                <div class="form-group m-t-20">
                                                    <label for="incident_date"> Incident Date</label>
                                                    <input type="date" id="incident_date" name="incident_date" class="form-control form-control-line" placeholder="Select Date" required>
                                                </div>
                                                <div class="form-group m-t-20">
                                                    <label for="reporting_date"> Reporting Date</label>
                                                    <input type="date" id="reporting_date" name="reporting_date" class="form-control form-control-line" placeholder="Select Date" required>
                                                </div>
                                                <div class="form-group m-t-20">
                                                    <label> Incident Type </label>
                                                    <select name="incident_type" class="form-control custom-select" required>
                                                        <option>Select Type</option>
                                                        <option value="Data Security"> Data Security </option>
                                                        <option value="Behavioural Issue"> Behavioural Issue </option>
                                                        <option value="Other"> Other </option>
                                                    
                                                    </select>
                                                </div>
                                                
                                                <div class="form-group m-t-20">
                                                    <label>Incident Description</label>
                                                    <!-- <input type="text" id="incident_description" name="incident_description" class="form-control form-control-line" placeholder="Incident Description" minlength="2" required> -->
                                                    <textarea class="form-control" value="" name="incident_description" id="incident_description" rows="5"></textarea>
                                                </div>

                                                        
                                                </div>
                                                <div class="modal-footer">
                                                   <input type="hidden" name="id" value="">
                                                   <button type="submit" class="btn btn-success"> <i class="fa fa-check"></i> Save</button>
								                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                                                    
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
<script type="text/javascript">
                                        $(document).ready(function () {
                                            $(".disiplinary").click(function (e) {
                                                e.preventDefault(e);
                                                // Get the record's ID via attribute  
                                                var iid = $(this).attr('data-id');
                                                $('#btnSubmit').trigger("reset");
                                                $('#exampleModal').modal('show');
                                                $.ajax({
                                                    url: 'IncidentByID?id=' + iid,
                                                    method: 'GET',
                                                    data: '',
                                                    dataType: 'json',
                                                }).done(function (response) {
                                                    console.log(response);
                                                    // Populate the form fields with the data returned from server
													$('#btnSubmit').find('[name="id"]').val(response.incident.id).end();
                                                    $('#btnSubmit').find('[name="em_id"]').val(response.incident.em_id).end();
                                                    $('#btnSubmit').find('[name="ename"]').val(response.incident.ename).end();
                                                    $('#btnSubmit').find('[name="reporting_manager"]').val(response.incident.reporting_manager).end();
                                                    $('#btnSubmit').find('[name="incident_date"]').val(formatDate(response.incident.incident_date)).end();
                                                    $('#btnSubmit').find('[name="reporting_date"]').val(formatDate(response.incident.reporting_date)).end();
                                                    $('#btnSubmit').find('[name="incident_type"]').val(response.incident.incident_type).end();
                                                    $('#btnSubmit').find('[name="incident_description"]').val(response.incident.incident_description).end();
												});
                                            });
                                        });

                                        // Function to format date as YYYY-MM-DD for input type date
function formatDate(dateString) {
    if (!dateString) return ''; // Return empty string if dateString is falsy
    var date = new Date(dateString);
    var month = '' + (date.getMonth() + 1);
    var day = '' + date.getDate();
    var year = date.getFullYear();

    if (month.length < 2) month = '0' + month;
    if (day.length < 2) day = '0' + day;

    return [year, month, day].join('-');
}
</script>
<script>
    
function confirmDelete(id) {
				if (confirm('Are you sure to delete this value?')) {
					window.location.href = 'DeletIncident?D=' + id;
				}
				return false; // Prevent default link behavior
			}
</script>

    <?php $this->load->view('backend/footer'); ?>
