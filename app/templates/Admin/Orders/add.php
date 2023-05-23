<div class="wrapper">
	<section class="content">
    <div class="container-fluid">
      <?= $this->Flash->render() ?>
    	<div class="row">
    		<div class="col-md-12">
    			<div class="card card-primary text-sm">
		        <div class="card-header">
		          <h3 class="card-title">Update Order</h3>
		        </div>
		        <!-- /.card-header -->
            <?= $this->Form->create(null,['id' => 'addcustomer', 'type' => 'file','inputDefaults' => [ 'label' => false]]) ?>
		        <div class="card-body">
		        	<div class="row">
		              <div class="col-md-12">
                    <h4>Product Details</h4>
                  </div>
                  <div class="col-md-6">
                    <label for=""><b>Product Name: </b></label> <?= $productDetail->pName ?>
                  </div>
                  <div class="col-md-3">
                    <label for=""><b>Category: </b></label> <?= $categoryDetail->cName ?>
                  </div>
                  <div class="col-md-3">
                    <label for=""><b>Price: </b></label> ₹<?= $productDetail->price ?>
                  </div>
                  <div class="col-md-12">
                    <h4>Delivery Address</h4>
                  </div>
                  <div class="col-md-4">
                    <label for=""><b>Name: </b></label> <?= $masterDetail->fullName ?>
                  </div>
                  <div class="col-md-4">
                    <label for=""><b>Mobile Numbar: </b> </label><?= $masterDetail->mobile ?>
                  </div>
                  <div class="col-md-4">
                    <label for=""><b>PIN Code: </b></label> <?= $masterDetail->pin ?>
                  </div>
                  <div class="col-md-9">
                    <label for=""><b>Address: </b></label> <?= $masterDetail->address ?>, <?= $masterDetail->city ?>, <?= $masterDetail->state ?>
                  </div>
                  <div class="col-md-3">
                    <b>Type: </b> <?= $masterDetail->type ?>
                  </div>
                  <div class="col-md-12">
                    <h4>Order Details</h4>
                  </div>
                  <!-- <div class="col-md-4">
                    <b>Transaction Id: </b>
                  </div> -->
                  <div class="col-md-4">
                    <b>Number of Item: </b> <?= $orderDetails->numItem ?>
                  </div>
                  <div class="col-md-4">
                    <b>Order Date: </b> <?= $orderDetails->created ?>
                  </div>

                  <div class="col-md-6 form-group">
                    <label for="">Order Status</label>
                    <?php $orderstatus = ["Dispatch"=>"Dispatch","Proccessing"=>"Proccessing","Delivered"=>"Delivered"];
                    echo $this->Form->input('orderstatus', ['class'=>'form-control form-control-sm','type'=>'select', 'empty'=>' Select ','options' => $orderstatus]); ?>
                  </div>
                  <div class="col-md-6 form-group">
                    <label for="">Status</label>
                    <?php $status = ["1"=>"Active","0"=>"Disable"];
                    echo $this->Form->input('status', ['class'=>'form-control form-control-sm','type'=>'select','options' => $status]); ?>
                  </div>
                </div>
              </div>
              <div class="card-footer d-flex">
              <?= $this->Form->submit('Update', ['class'=>'btn btn-primary']);?>
		          </div>
              <?= $this->Form->end() ?>
		        </div>
    		</div>
    	</div>
	  </div>
  </section>
</div>

<!-- Script -->
<script type="text/javascript">
// Read CSRF Token
var csrfToken = $('meta[name="csrfToken"]').attr('content');
$(document).ready(function(){
    // Country change
    $('#country_id').change(function(){
        var country_id = $('#country_id').val();
        // Empty state and city dropdown
        $('#state_id').find('option').not(':first').remove();
        if(country_id != ''){
            // AJAX request
            $.ajax({
              url: "<?= $this->Url->build(['controller' => 'Courses','action' => 'getCountryStates']) ?>",
              type: 'post',
              data: {country_id: country_id},
              dataType: 'json',
              headers:{'X-CSRF-Token': csrfToken},
              success: function(response){
                var len = response.length;
                // Add response data to state dropdown
                for( var i = 0; i<len; i++){
                  var id = response[i]['id'];
                  var name = response[i]['name'];
                  $("#state_id").append("<option value='"+id+"'>"+name+"</option>");
                }
              },
            });
        }
        
    });
    // State change
    $('#state_id').change(function(){
        var state_id = $('#state_id').val();
        // Empty city dropdown
        $('#city_id').find('option').not(':first').remove();
        if(state_id != ''){
          // AJAX request
          $.ajax({
            url: "<?= $this->Url->build(['controller' => 'Courses','action' => 'getStateCities']) ?>",
            type: 'post',
            data: {state_id: state_id},
            dataType: 'json',
            headers:{'X-CSRF-Token': csrfToken},
            success: function(response){
              var len = response.length;
              // Add response data to city dropdown
              for( var i = 0; i<len; i++){
                var id = response[i]['id'];
                var name = response[i]['name'];
                $("#city_id").append("<option value='"+id+"'>"+name+"</option>");
              }
            },
          });
        }
    });
});
</script>