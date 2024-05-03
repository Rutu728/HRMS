<?php $this->load->view('backend/header'); ?>
<?php $this->load->view('backend/sidebar'); ?> 
        <div class="message"></div>
         <div class="page-wrapper">
                <?php 
                $allemployees = $this->employee_model->GetAllEmployee(); 
                ?> 
            <div class="row page-titles">
                <div class="col-md-5 align-self-center">
                    <h3 class="text-themecolor"><i class="fa fa-compass" style="color:#1976d2"></i> Resignation</h3>
                </div>
                <div class="col-md-7 align-self-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                        <li class="breadcrumb-item active">Resignation</li>
                    </ol>
                </div>
            </div>
            <!-- Container fluid  -->
            <!-- ============================================================== -->
            <div class="container-fluid">

                <div class="row m-b-10"> 
                    <div class="col-12">
                        <button type="button" class="btn btn-info"><i class="fa fa-plus"></i><a data-toggle="modal" data-target="#exampleModal" data-whatever="@getbootstrap"  class="text-white"><i class="" aria-hidden="true"></i> Add Resignation </a></button>
                        <button type="button" class="btn btn-primary"><i class="fa fa-bars"></i><a href="<?php echo base_url(); ?>employee/Employees" class="text-white"><i class="" aria-hidden="true"></i>  Employee List</a></button>
                    </div>
                </div>         
                <div class="row">
                    <div class="col-12">
                        <div class="card card-outline-info">
                            <div class="card-header">
                                <h4 class="m-b-0 text-white"> Resignation List</h4>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive ">
                                    <table id="example23" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                                        <thead>
                                            <tr>
                                                <th>Employee Name</th>
                                                <th>Resignation Date</th>
                                                <th>Notice Period </th>
                                                <th>Reason Of Resignation</th>
                        
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
                                           <?php foreach($resignation as $value): ?>
                                            <tr>
                                                <td ><?php echo $value->first_name.' '.$value->last_name; ?></td>
                                                
                                                <td ><?php echo  $value->resignation_date; ?></td>
												<td ><?php echo  $value->notice_period; ?></td>
												<td ><?php echo  $value->resign_reason; ?></td>

                                                <td class="jsgrid-align-center">
													<a href="#" title="Edit" class="btn btn-sm btn-primary waves-effect waves-light resignation" data-id="<?php echo $value->id; ?>">
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
                                                    <h4 class="modal-title" id="exampleModalLabel1">Resignation</h4>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                </div>
                                                <form method="post" action="add_Resignation" id="btnSubmit" enctype="multipart/form-data">
                                                <div class="modal-body">
                                                    
                                                        <div class="form-group">
                                                            <label class="control-label">Employee Name</label>
															
                                                            <select class="form-control custom-select" name="emid" data-placeholder="Choose a Category" tabindex="1" value="" required>
                                                            <option value="">Select an Employee</option>   
															<?php foreach($allemployees as $value): ?>
                                                                <option value="<?php echo $value->em_code ?>"><?php echo $value->first_name.' '.$value->last_name ?></option>
                                                                <?php endforeach; ?>
                                                            </select>
                                                        </div>
                                    
                                                        <div class="form-group">
                                                            <label for="resignation_date" class="control-label">Resgination Date</label>
                                                            <input type="date" name="resignation_date" value="" class="form-control" id="resignation_date">
                                                        </div>

														<div class="form-group">
                                                            <label for="notice_period" class="control-label">Notice Period</label>
                                                            <input type="text" name="notice_period" value="" class="form-control" id="notice_period">
                                                        </div>

                                                        <div class="form-group">
                                                            <label for="resign_reason" class="control-label">Reason for Resgination</label></label>
                                                            <textarea class="form-control" value="" name="resign_reason" id="resign_reason" rows="4"></textarea>
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
                                        $(document).ready(function () {
                                            $(".resignation").click(function (e) {
                                                e.preventDefault(e);
                                                // Get the record's ID via attribute  
                                                var iid = $(this).attr('data-id');
                                                $('#btnSubmit').trigger("reset");
                                                $('#exampleModal').modal('show');
                                                $.ajax({
                                                    url: 'ResignationByID?id=' + iid,
                                                    method: 'GET',
                                                    data: '',
                                                    dataType: 'json',
                                                }).done(function (response) {
                                                    console.log(response);
                                                    // Populate the form fields with the data returned from server
													$('#btnSubmit').find('[name="id"]').val(response.resignation.id).end();
                                                    $('#btnSubmit').find('[name="emid"]').val(response.resignation.em_id).end();
                                                    $('#btnSubmit').find('[name="resignation_date"]').val(formatDate(response.resignation.resignation_date)).end();
                                                    $('#btnSubmit').find('[name="notice_period"]').val(response.resignation.notice_period).end();
                                                    $('#btnSubmit').find('[name="resign_reason"]').val(response.resignation.resign_reason).end();
												});
                                            });
                                        });
</script>
<script type="text/javascript">
    function confirmDelete(id) {
        if (confirm('Are you sure to delete this value?')) {
            window.location.href = 'DeletResignation?D=' + id;
        }
        return false; // Prevent default link behavior
    }


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

    <?php $this->load->view('backend/footer'); ?>
