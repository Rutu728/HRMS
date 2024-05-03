<?php $this->load->view('backend/header'); ?>
<?php $this->load->view('backend/sidebar'); ?> 
        <div class="message"></div>
         <div class="page-wrapper">
                <?php 
                $allemployees = $this->employee_model->GetAllEmployee(); 
                ?> 
            <div class="row page-titles">
                <div class="col-md-5 align-self-center">
                    <h3 class="text-themecolor"><i class="fa fa-compass" style="color:#1976d2"></i> Performance</h3>
                </div>
                <div class="col-md-7 align-self-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                        <li class="breadcrumb-item active">Performance</li>
                    </ol>
                </div>
            </div>
            <!-- Container fluid  -->
            <!-- ============================================================== -->
            <div class="container-fluid">

                <div class="row m-b-10"> 
                    <div class="col-12">
                        <button type="button" class="btn btn-info"><i class="fa fa-plus"></i><a data-toggle="modal" data-target="#exampleModal" data-whatever="@getbootstrap"  class="text-white"><i class="" aria-hidden="true"></i> Add Performance </a></button>
                        <button type="button" class="btn btn-primary"><i class="fa fa-bars"></i><a href="<?php echo base_url(); ?>employee/Employees" class="text-white"><i class="" aria-hidden="true"></i>  Employee List</a></button>
                    </div>
                </div>         
                <div class="row">
                    <div class="col-12">
                        <div class="card card-outline-info">
                            <div class="card-header">
                                <h4 class="m-b-0 text-white"> Performance List</h4>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive ">
                                    <table id="example23" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                                        <thead>
                                            <tr>
                                                <th>Employee Name</th>
                                                <th>Attendance (%)</th>
                                                <th>Quality (%)</th>
                                                <th>Productivity (%)</th>
                                                <th>behaviour (%)</th>
                                                <th>Total Score (%)</th>
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
                                           <?php foreach($performance as $value): ?>
                                            <tr>
                                                <td ><?php echo $value->first_name.' '.$value->last_name; ?></td>
                                                <td ><?php echo $value->attendance; ?></td>
                                                <td ><?php echo $value->quality; ?></td>
                                                <td ><?php echo $value->productivity; ?></td>
                                                <td ><?php echo $value->behaviour; ?></td>
                                                <td ><?php echo $value->total_score; ?></td>
                                                
                                                
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
                                                    <h4 class="modal-title" id="exampleModalLabel1">Performance</h4>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                </div>
                                                <form method="post" action="Add_Performance" id="btnSubmit" enctype="multipart/form-data">
                                                <div class="modal-body">
                                                    
                                                        <div class="form-group">
                                                            <label class="control-label">Employee Name</label>
															
                                                            <select class="form-control custom-select" name="emid" data-placeholder="Choose a Category" tabindex="1" value="" required>
															<option value="">Select an Employee</option>
                                                               <?php foreach($allemployees as $value): ?>
                                                                <option value="<?php echo $value->em_id ?>"><?php echo $value->first_name.' '.$value->last_name ?></option>
                                                                <?php endforeach; ?>
                                                            </select>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="control-label">Attendance (%):</label>
                                                            <input type="number" name="attendance" value="" class="form-control" id="attendance">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="recipient-name" class="control-label">Quality (%):</label>
                                                            <input type="number" name="quality" value="" class="form-control" id="quality">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="message-text" class="control-label">Productivity (%):</label>
                                                            <input type="number" name="productivity" value="" class="form-control" id="productivity">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="message-text" class="control-label" style = "width:100%">Behavior (%):</label>
                                                            <input type="number" name="behaviour" value="" class="form-control" id="behaviour">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="message-text" class="control-label" >Result (%):</label>
                                                            <input type="text" name="total_score" id="result" class="form-control" readonly>
                                                        </div>


                                                        
                                                </div>
                                                <div class="modal-footer">
                                                   <input type="hidden" name="id" value="">
                                                   <button id="calculateButton" type="button" class="btn btn-primary" style="position: absolute; bottom: 15px; left: 10px;">Calculate</button>

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
                                        $(document).ready(function () {
                                            $(".disiplinary").click(function (e) {
                                                e.preventDefault(e);
                                                // Get the record's ID via attribute  
                                                var iid = $(this).attr('data-id');
                                                $('#btnSubmit').trigger("reset");
                                                $('#exampleModal').modal('show');
                                                $.ajax({
                                                    url: 'PerformanceByID?id=' + iid,
                                                    method: 'GET',
                                                    data: '',
                                                    dataType: 'json',
                                                }).done(function (response) {
                                                    console.log(response);
                                                    // Populate the form fields with the data returned from server
													$('#btnSubmit').find('[name="id"]').val(response.performance.id).end();
                                                    $('#btnSubmit').find('[name="emid"]').val(response.performance.em_id).end();
                                                    $('#btnSubmit').find('[name="attendance"]').val(response.performance.attendance).end();
                                                    $('#btnSubmit').find('[name="quality"]').val(response.performance.quality).end();
                                                    $('#btnSubmit').find('[name="productivity"]').val(response.performance.productivity).end();
                                                    $('#btnSubmit').find('[name="behaviour"]').val(response.performance.behaviour).end();
                                                    $('#btnSubmit').find('[name="total_score"]').val(response.performance.total_score).end();
												});
                                            });
                                        });
</script>
<script>
    // Add event listener to the button
document.addEventListener('DOMContentLoaded', function() {
    // Add event listener for calculate button
    const calculateButton = document.querySelector('#calculateButton');
    calculateButton.addEventListener('click', calculateWeightedScore);


// Add event listener for report button
const generateReportButton = document.querySelector('#generateReportButton');
generateReportButton.addEventListener('click', generatePerformanceReport);
});

function calculateWeightedScore() {
    const attendance = parseFloat(document.getElementById('attendance').value);
    const quality = parseFloat(document.getElementById('quality').value);
    const productivity = parseFloat(document.getElementById('productivity').value);
    const behavior = parseFloat(document.getElementById('behaviour').value);

    if (isNaN(attendance) || isNaN(quality) || isNaN(productivity) || isNaN(behavior)) {
        //document.getElementById('result').value = 'Please enter valid percentages for all fields.';
        alert('Please enter valid percentages for all fields.');
        return;
    }

    // Check for fatal parameter (Productivity < 85%)
    if (productivity < 85) {
        document.getElementById('result').value = '0';
        return;
    }

    const weightage = 100;
    const achievedAttendance = (attendance >= 85) ? 25 : (attendance / 85) * 25;
    const achievedQuality = (quality >= 85) ? 25 : (quality / 85) * 25;
    const achievedProductivity = (productivity >= 85) ? 25 : (productivity / 85) * 25;
    const achievedBehavior = (behavior >= 100) ? 25 : (behavior / 100) * 25;

    const totalAchieved = achievedAttendance + achievedQuality + achievedProductivity + achievedBehavior;
    const weightedScore = (totalAchieved / weightage) * 100;

    document.getElementById('result').value = `${weightedScore.toFixed(2)}`;
}



// Add event listener to the button



function generatePerformanceReport() {
    const attendance = parseFloat(document.getElementById('attendance').value);
    const quality = parseFloat(document.getElementById('quality').value);
    const productivity = parseFloat(document.getElementById('productivity').value);
    const behavior = parseFloat(document.getElementById('behaviour').value);

    if (isNaN(attendance) || isNaN(quality) || isNaN(productivity) || isNaN(behavior)) {
        alert('Please enter valid percentages for all fields.');
        return;
    }

    const reportContent = `
        Performance Report
        ------------------
        Attendance: ${attendance}%
        Quality: ${quality}%
        Productivity: ${productivity}%
        Behavior: ${behavior}%

    `;

    const encodedReportContent = encodeURIComponent(reportContent);

    window.location.href = `report.html?report=${encodedReportContent}`;


	
}

function confirmDelete(id) {
				if (confirm('Are you sure to delete this value?')) {
					window.location.href = 'DeletPerformance?D=' + id;
				}
				return false; // Prevent default link behavior
			}
</script>
    <?php $this->load->view('backend/footer'); ?>
