<?php require_once 'php_action/db_connect.php' ?>
<?php require_once 'includes/header.php'; ?>

<div class="row">
	<div class="col-md-12">

		<ol class="breadcrumb">
		  <li><a href="dashboard.php">Home</a></li>		  
		  <li class="active">Stock</li>
		</ol>

		<div class="panel panel-default">
			<div class="panel-heading">
				<div class="page-heading"> <i class="glyphicon glyphicon-edit"></i> Manage Stock</div>
			</div> <!-- /panel-heading -->
			<div class="panel-body">

				<div class="remove-messages"></div>

				<div class="div-action pull pull-right" style="padding-bottom:20px;">
					<button class="btn btn-default button1" data-toggle="modal" id="addStockModalBtn" data-target="#addProductModal"> <i class="glyphicon glyphicon-plus-sign"></i> Add Stock </button>
				</div> <!-- /div-action -->				
				
				<table class="table" id="manageStockTable">
					<thead>
						<tr>
							<th>Stock Name</th>
							<th>Quantity</th>							
							<th>Unit</th>
							<th>Threshold</th>
							<th>Status</th>
							<th style="width:15%;">Options</th>
						</tr>
					</thead>
				</table>
				<!-- /table -->

			</div> <!-- /panel-body -->
		</div> <!-- /panel -->		
	</div> <!-- /col-md-12 -->
</div> <!-- /row -->


<!-- add product -->
<div class="modal fade" id="addProductModal" tabindex="-1" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">

    	<form class="form-horizontal" id="submitStockForm" action="php_action/createStock.php" method="POST" enctype="multipart/form-data">
	      <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	        <h4 class="modal-title"><i class="fa fa-plus"></i> Add Stock</h4>
	      </div>

	      <div class="modal-body" style="max-height:450px; overflow:auto;">

	      	<div id="add-product-messages"></div>	     	           	       

	        <div class="form-group">
	        	<label for="productName" class="col-sm-3 control-label">Stock Name: </label>
	        	<label class="col-sm-1 control-label">: </label>
				    <div class="col-sm-8">
				      <input type="text" class="form-control" id="stockName" placeholder="Stock Name" name="stockName" autocomplete="off">
				    </div>
	        </div> <!-- /form-group-->	    

	        <div class="form-group">
	        	<label for="quantity" class="col-sm-3 control-label">Quantity: </label>
	        	<label class="col-sm-1 control-label">: </label>
				    <div class="col-sm-8">
				      <input type="text" class="form-control" id="quantity" placeholder="Quantity" name="quantity" autocomplete="off">
				    </div>
	        </div> <!-- /form-group-->	        	 

	        <div class="form-group">
	        	<label for="rate" class="col-sm-3 control-label">Unit: </label>
	        	<label class="col-sm-1 control-label">: </label>
				    <div class="col-sm-8">
                    <select class="form-control" id="unit" name="unit">
						      	<option value="">~~SELECT~~</option>
						      	<?php 
						      	$units = array('Kg','Liter','Unit');
										foreach ($units as $unit) {
                                            echo "<option value='".$unit."'>".$unit."</option>";
                                        }
						      	?>
						      </select>
				    </div>
	        </div> <!-- /form-group-->	     	        

	        <div class="form-group">
	        	<label for="brandName" class="col-sm-3 control-label">Threshold: </label>
	        	<label class="col-sm-1 control-label">: </label>
				    <div class="col-sm-8">
                        <input type="text" class="form-control" id="threshold" placeholder="Threshold" name="threshold" autocomplete="off">
				    </div>
	        </div> <!-- /form-group-->	

	                	        
	      </div> <!-- /modal-body -->
	      
	      <div class="modal-footer">
	        <button type="button" class="btn btn-default" data-dismiss="modal"> <i class="glyphicon glyphicon-remove-sign"></i> Close</button>
	        
	        <button type="submit" class="btn btn-primary" id="createStockBtn" data-loading-text="Loading..." autocomplete="off"> <i class="glyphicon glyphicon-ok-sign"></i> Save Changes</button>
	      </div> <!-- /modal-footer -->	      
     	</form> <!-- /.form -->	     
    </div> <!-- /modal-content -->    
  </div> <!-- /modal-dailog -->
</div> 
<!-- /add categories -->


<!-- edit categories brand -->
<div class="modal fade" id="editStockModal" tabindex="-1" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
    	    	
	      <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	        <h4 class="modal-title"><i class="fa fa-edit"></i> Edit Stock</h4>
	      </div>
	      <div class="modal-body" style="max-height:450px; overflow:auto;">

	      	<div class="div-loading">
	      		<i class="fa fa-spinner fa-pulse fa-3x fa-fw"></i>
						<span class="sr-only">Loading...</span>
	      	</div>

	      	<div class="div-result">

				  <!-- Nav tabs -->
			
				    
				    	<form class="form-horizontal" id="editProductForm" action="php_action/editStock.php" method="POST">				    
				    	<br />

				    	<div id="edit-product-messages"></div>

				    	<div class="form-group">
			        	<label for="editStockName" class="col-sm-3 control-label">Stock Name: </label>
			        	<label class="col-sm-1 control-label">: </label>
						    <div class="col-sm-8">
						      <input type="text" class="form-control" id="editStockName" placeholder="Stock Name" name="editProductName" autocomplete="off">
						    </div>
			        </div> <!-- /form-group-->	    

			        <div class="form-group">
			        	<label for="editQuantity" class="col-sm-3 control-label">Quantity: </label>
			        	<label class="col-sm-1 control-label">: </label>
						    <div class="col-sm-8">
						      <input type="number" class="form-control" id="editQuantity" placeholder="Quantity" name="editQuantity" autocomplete="off">
						    </div>
			        </div> <!-- /form-group-->	

                    <div class="form-group">
			        	<label for="editThreshold" class="col-sm-3 control-label">Threshold: </label>
			        	<label class="col-sm-1 control-label">: </label>
						    <div class="col-sm-8">
						      <input type="number" class="form-control" id="editThreshold" placeholder="Threshold" name="editThreshold" autocomplete="off">
						    </div>
			        </div> <!-- /form-group-->	     

                    <div class="form-group">
			        	<label for="editQuantity" class="col-sm-3 control-label">Unit: </label>
			        	<label class="col-sm-1 control-label">: </label>
						    <div class="col-sm-8">
                            <select class="form-control" id="editUnit" name="editUnit">
						      	<option value="">~~SELECT~~</option>
						      	<?php 
						      	$units = array('Kg','Liter','Unit');
										foreach ($units as $unit) {
                                            echo "<option value='".$unit."'>".$unit."</option>";
                                        }
						      	?>
						      </select>
						    </div>
			        </div> <!-- /form-group-->	        	     	        
			        <div class="modal-footer editStockFooter">
				        <button type="button" class="btn btn-default" data-dismiss="modal"> <i class="glyphicon glyphicon-remove-sign"></i> Close</button>
				        
				        <button type="submit" class="btn btn-success" id="editStockBtn" data-loading-text="Loading..."> <i class="glyphicon glyphicon-ok-sign"></i> Save Changes</button>
				      </div> <!-- /modal-footer -->				     
			        </form> <!-- /.form -->				     	
				       
				    <!-- /product info -->
				  </div>

				</div>
	      	
	      </div> <!-- /modal-body -->
	      	      
     	
    </div>
    <!-- /modal-content -->
  </div>
  <!-- /modal-dailog -->
</div>
<!-- /categories brand -->

<!-- categories brand -->
<div class="modal fade" tabindex="-1" role="dialog" id="removeStockModal">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title"><i class="glyphicon glyphicon-trash"></i> Remove Product</h4>
      </div>
      <div class="modal-body">

      	<div class="removeProductMessages"></div>

        <p>Do you really want to remove ?</p>
      </div>
      <div class="modal-footer removeProductFooter">
        <button type="button" class="btn btn-default" data-dismiss="modal"> <i class="glyphicon glyphicon-remove-sign"></i> Close</button>
        <button type="button" class="btn btn-primary" id="removeProductBtn" data-loading-text="Loading..."> <i class="glyphicon glyphicon-ok-sign"></i> Delete</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<!-- /categories brand -->


<script src="custom/js/stock.js"></script>

<?php require_once 'includes/footer.php'; ?>