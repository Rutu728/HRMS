<?php $this->load->view('backend/header'); ?>
<?php $this->load->view('backend/sidebar'); ?> 
        <div class="message"></div>
         <div class="page-wrapper">
                <?php 
                $allemployees = $this->employee_model->GetAllEmployee(); 
                ?> 
            <div class="row page-titles">
                <div class="col-md-5 align-self-center">
                    <h3 class="text-themecolor"><i class="fa fa-compass" style="color:#1976d2"></i> Expense</h3>
                </div>
                <div class="col-md-7 align-self-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                        <li class="breadcrumb-item active">Expense</li>
                    </ol>
                </div>
            </div>
            <!-- Container fluid  -->
            <!-- ============================================================== -->
            <div class="container-fluid">

                <div class="row m-b-10"> 
                    <div class="col-12">
                        <button type="button" class="btn btn-info"><i class="fa fa-plus"></i><a data-toggle="modal" data-target="#exampleModal" data-whatever="@getbootstrap"  class="text-white"><i class="" aria-hidden="true"></i> Add Expense </a></button>
                        <button type="button" class="btn btn-primary"><i class="fa fa-bars"></i><a href="<?php echo base_url(); ?>invoicebill/invoicebill" class="text-white"><i class="" aria-hidden="true"></i> Expense List</a></button>
                    </div>
                </div>         
                <div class="row">
                    <div class="col-12">
                        <div class="card card-outline-info">
                            <div class="card-header">
                                <h4 class="m-b-0 text-white"> Expense List</h4>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive ">
                                    <table id="example23" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                                        <thead>
                                            <tr>
                                                <th>Date</th>
                                                <!-- <th>Customer Name</th> -->
                                                <th>Product Name</th>
                                                <th>Price</th>
                                                <th>Quantity</th>
                                                <th>Tax (18%)</th>
                                                <th>Total</th>
                                                <th>Subtotal</th>
                                                <th>Type</th>
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
                                           <?php foreach($expense as $value): ?>
                                            <tr>

                                                <td><?php echo date('d-m-Y', strtotime($value->date)); ?></td>
                                                
                                                <td ><?php echo $value->item_name; ?></td>
                                                <td ><?php echo $value->price; ?></td>
                                                <td ><?php echo $value->quantity; ?></td>
                                                <td ><?php echo $value->tax; ?></td>
                                                <td ><?php echo $value->total; ?></td>
                                                <td ><?php echo $value->subtotal; ?></td>
                                                <td ><?php echo $value->type; ?></td>
                                                
                                                
                                                <td  class="jsgrid-align-center ">
                                                    <a href="#" title="Edit" class="btn btn-sm btn-primary waves-effect waves-light disiplinary" data-id="<?php echo $value->id; ?>"><i class="fa fa-pencil-square-o"></i></a>
                                                    <a href="#" onclick="return confirmDelete('<?php echo $value->id; ?>')" title="Delete" class="btn btn-sm btn-danger waves-effect waves-light"><i class="fa fa-trash-o"></i></a>
                                                    <i class="fa fa-print btn  btn-success print-invoice" title="Print" data-id="<?php echo $value->id; ?>"></i>
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
                                                    <h4 class="modal-title" id="exampleModalLabel1">Quotation</h4>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                </div>
                                                <form method="post" action="Add_Expense" id="btnSubmit" enctype="multipart/form-data">
                                                <div class="modal-body">


                                                        <div class="form-group">
                                                            <label class="control-label">Date :</label>
															<input type="date" name="date" id="date" class="form-control">
                                                        </div>

                                                        <!-- <div class="form-group">
                                                            <label class="control-label">Customer Name :</label>
															<input type="text" name="cust_name" id="cust_name" class="form-control">
                                                        </div> -->

                                                        <div class="form-group">
                                                            <label class="control-label">Product Name :</label>
															<input type="text" name="item_name" id="item_name" class="form-control">
                                                        </div>

                                                        <div class="form-group">
                                                            <label for="recipient-name" class="control-label">Price :</label>
                                                            <input type="number" name="price" value="" class="form-control" id="price">
                                                        </div>

                                                        <div class="form-group">
                                                            <label class="control-label">Quantity :</label>
                                                            <input type="number" name="quantity" value="" class="form-control" id="quantity">
                                                        </div>
                                                        
                                                        <div class="form-group">
                                                            <label for="message-text" class="control-label">Tax :</label>
                                                            <input type="number" name="tax" value="" class="form-control" id="tax">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="message-text" class="control-label" style = "width:100%">Total :</label>
                                                            <input type="number" name="total" value="" class="form-control" id="total">
                                                        </div>
                                                    
                                                        <div class="form-group">
                                                            <label for="message-text" class="control-label" style = "width:100%">Subtotal :</label>
                                                            <input type="number" name="subtotal" value="" class="form-control" id="subtotal">
                                                        </div>
                                                        <div class="form-group">
                                                                <label for="message-text" class="control-label">Type :</label>
                                                                <select class="form-control custom-select" name="type" id="type">
                                                                    <option value="">Choose Payment Type</option>
                                                                    <option value="Cash">Cash</option>   
                                                                    <option value="Card">Card</option>
                                                                    <option value="UPI">UPI</option>
                                                                </select>
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
                <script>
   $(document).ready(function () {
    $(".print-invoice").click(function (e) {
        e.preventDefault();
        // Get the record's ID via attribute  
        var iid = $(this).attr('data-id');
        // AJAX call to fetch invoice details for the given iid
        $.ajax({
            url: 'ExpenseByID?id=' + iid,
            method: 'GET',
            dataType: 'json',
            success: function (response) {
                console.log(response);
                // Generate HTML for the invoice
                var invoiceHTML = `
    <div style="font-family: Arial, sans-serif; margin: 0 auto; max-width: 700px; height:90vh; padding: 20px; border: 1px solid #ccc; border-radius: 5px; background-color: #f9f9f9;">
    
                <div style="display:flex; align-items:center; justify-content:space-between;"> <h2 style="font-size: 24px;">Expense Details</h2> <img src="<?php echo base_url(); ?>assets/images/mh.png" style="max-width: 150px; margin-top:-25px;"></div>  
        <div style="display:flex; justify-content:space-between; margin-top:20px">
        <div>
            <p><strong>Address: </strong>Gauri Bunglow Colony No. 13,<br> Kaleborate Nagar, Hadapsar, <br>Pune-411028</p>
                
        </div>
        <div>
            <p><strong>Phone:</strong>+919226027587</p>
            <p><strong>Email:</strong>info@mountainhighsolutions.com</p>
        </div> 
        </div>
        
        <div style="display:flex; align-items:center; justify-content:space-between; margin-top:30px;">
        <p ><strong>Expense ID:</strong> ${response.expense.id}</p>
        <p><strong>Date:</strong> <?php echo date('d-m-Y', strtotime($value->date)); ?></p> 
        </div>
        
       
        <table style="width: 100%; margin-top:35px; border-collapse: collapse; border-spacing: 0;">
    <thead>
        <tr>
        
            <th style="border-bottom: 1px solid #ccc; border-top: 1px solid #ccc; border-right: 1px solid #ccc; border-left: 1px solid #ccc; padding: 8px; text-align: center;">Product Name</th>
            <th style="border-bottom: 1px solid #ccc; border-top: 1px solid #ccc; border-right: 1px solid #ccc; padding: 8px; text-align: center;">Price</th>
            <th style="border-bottom: 1px solid #ccc; border-top: 1px solid #ccc; border-right: 1px solid #ccc; padding: 8px; text-align: center;">Quantity</th>
            <th style="border-bottom: 1px solid #ccc; border-top: 1px solid #ccc; border-right: 1px solid #ccc; padding: 8px; text-align: center;">Tax (18%)</th>
            <th style="border-bottom: 1px solid #ccc; border-top: 1px solid #ccc; border-right: 1px solid #ccc; padding: 8px; text-align: center;">Total</th>
            
        </tr>
    </thead>
    <tbody>
        
        <tr>
       
            <td style="border-bottom: 1px solid #ccc; border-right: 1px solid #ccc; border-left: 1px solid #ccc; padding: 8px; text-align: center;">${response.expense.item_name}</td>
            <td style="border-bottom: 1px solid #ccc; border-right: 1px solid #ccc; padding: 8px; text-align: center;">₹ ${response.expense.price}</td>
            <td style="border-bottom: 1px solid #ccc; border-right: 1px solid #ccc; padding: 8px; text-align: center;">${response.expense.quantity}</td>
            <td style="border-bottom: 1px solid #ccc; border-right: 1px solid #ccc; padding: 8px; text-align: center;">₹ ${response.expense.tax}</td>
            <td style="border-bottom: 1px solid #ccc; border-right: 1px solid #ccc; padding: 8px; text-align: center;">₹ ${response.expense.total}</td>
        </tr>
        
    </tbody>
</table>

<p style="text-align:right; margin-top:60px;"><strong>Subtotal :- </strong>₹ ${response.expense.subtotal}</p>
<p style="text-align:right;"><strong>Payment Mode :-</strong> ${response.expense.type}</p>



        
        <!-- Add more details here as needed -->
    </div>
`;

                // Open a new window and print the invoice
                var printWindow = window.open("", "_blank");
                printWindow.document.write(invoiceHTML);
                printWindow.print();
                printWindow.close();
                
            },
            error: function (xhr, status, error) {
                console.error(xhr.responseText);
            }
        });
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
                                                    url: 'ExpenseByID?id=' + iid,
                                                    method: 'GET',
                                                    data: '',
                                                    dataType: 'json',
                                                }).done(function (response) {
                                                    console.log(response);
                                                    // Populate the form fields with the data returned from server
													$('#btnSubmit').find('[name="id"]').val(response.expense.id).end();
                                                    $('#btnSubmit').find('[name="item_name"]').val(response.expense.item_name).end();
                                                    $('#btnSubmit').find('[name="cust_name"]').val(response.expense.cust_name).end();
                                                    $('#btnSubmit').find('[name="quantity"]').val(response.expense.quantity).end();
                                                    $('#btnSubmit').find('[name="price"]').val(response.expense.price).end();
                                                    $('#btnSubmit').find('[name="tax"]').val(response.expense.tax).end();
                                                    $('#btnSubmit').find('[name="total"]').val(response.expense.total).end();
                                                    $('#btnSubmit').find('[name="subtotal"]').val(response.expense.subtotal).end();
                                                    $('#btnSubmit').find('[name="type"]').val(response.expense.type).end();
                                                    $('#btnSubmit').find('[name="date"]').val(formatDate(response.expense.date)).end();
												});
                                            });
                                        });

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
    document.addEventListener('DOMContentLoaded', function() {
        // Get references to the input fields
        var priceInput = document.getElementById('price');
        var quantityInput = document.getElementById('quantity');
        var taxInput = document.getElementById('tax');
        var totalInput = document.getElementById('total');
        var subtotalInput = document.getElementById('subtotal');

        // Add event listeners to the price and quantity input fields
        priceInput.addEventListener('keyup', calculateTaxAndTotal);
        quantityInput.addEventListener('keyup', calculateTaxAndTotal);

        // Function to calculate tax and total
        function calculateTaxAndTotal() {
            // Get values of price and quantity inputs
            var price = parseFloat(priceInput.value);
            var quantity = parseFloat(quantityInput.value);

            // Calculate tax (18%)
            var tax = (price * quantity) * 0.18;

            // Calculate total price (price + tax)
            var total = price * quantity ;

            var subtotal = total + tax;

            taxInput.value = tax.toFixed(2); // toFixed(2) ensures two decimal places
            subtotalInput.value = subtotal.toFixed(2); // toFixed(2) ensures two decimal places
            totalInput.value = total.toFixed(2); // toFixed(2) ensures two decimal places
        }
    });
</script>

<script>
function confirmDelete(id) {
				if (confirm('Are you sure to delete this value?')) {
					window.location.href = 'DeletExpense?D=' + id;
				}
				return false; // Prevent default link behavior
			}
</script>
    <?php $this->load->view('backend/footer'); ?>
