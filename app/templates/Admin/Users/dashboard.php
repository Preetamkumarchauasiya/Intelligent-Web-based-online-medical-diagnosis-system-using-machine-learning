
<style type="text/css">
  .info-table tbody td:nth-of-type(odd){
    background: rgba(0,0,0,.05);
  }
</style>
<div class="wrapper">
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 mr-2 d-inline-block">Dashboard</h1>
            <!-- <p class="pt-2">Welcome to My Program Finder portal.</p> -->
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?= $this->Url->build('/') ?>">Dashboard</a></li>
              <!-- <li class="breadcrumb-item active"></li> -->
            </ol>
          </div>
        </div>
      </div>
    </div>

    <section class="content">
        <div class="container-fluid mb-3">
            <!-- Small boxes (Stat box) -->
            <div class="row">
              <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-info">
                  <div class="inner">
                    <h3><?= $totalNewOrder ?></h3>
                    <p>New Orders</p>
                  </div>
                  <div class="icon">
                    <i class="fa fa-id-badge" aria-hidden="true"></i>
                  </div>
                  
                  <?= $this->Html->link('More info  <i class="fas fa-arrow-circle-right"></i>','/admin/orders/summary',["class"=>"btn-sm text-cyan small-box-footer" ,'escape' => false]); ?>
                  </div>
              </div>
              <!-- ./col -->
              <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-success">
                  <div class="inner">
                    <h3>0</h3>
                    <p>Offers</p>
                  </div>
                  <div class="icon">
                    <i class="fa fa-gift" aria-hidden="true"></i>
                  </div>
                  <?= $this->Html->link('More info  <i class="fas fa-arrow-circle-right"></i>',[],["class"=>"btn-sm text-cyan small-box-footer" ,'escape' => false]); ?>
                </div>
              </div>
              <!-- ./col -->
              <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-warning">
                  <div class="inner">
                    <h3><?= $totalOrder ?></h3>
                    <p>Payments Done</p>
                  </div>
                  <div class="icon">
                    <i class='fas fa-rupee-sign'></i>
                  </div>
                  <?= $this->Html->link('More info  <i class="fas fa-arrow-circle-right"></i>','/admin/orders/summary',["class"=>"btn-sm text-cyan small-box-footer" ,'escape' => false]); ?>
                </div>
              </div>
              <!-- ./col -->
              <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-danger">
                  <div class="inner">
                    <h3><?= $totalUser ?></h3>
                    <p>Total Users</p>
                  </div>
                  <div class="icon">
                    <i class="fas fa-users"></i>
                  </div>
                  <?= $this->Html->link('More info  <i class="fas fa-arrow-circle-right"></i>',['Controller'=>'users','action' => 'summary'],["class"=>"btn-sm text-cyan small-box-footer" ,'escape' => false]); ?>
                </div>
              </div><!-- ./col -->
            </div><!-- /.row -->
        </div>
    </section>
    <section class="content">
        <div class="container-fluid mb-3">
            
        </div>
    </section>
    <section class="content">
    <div class="container-fluid mb-3">
        <div class="row">
            <div class="col-md-6">
                <div class="card card-default text-sm">
                    <div class="card-header">
                      <h3 class="card-title mt-1">New Order List</h3>
                    </div>
                    <div class="card-body p-0">
                    <div class="table-responsive custom-table-responsive">
                      <table class="table table-bordered" id="tableone">
                        <thead class="thead">
                          <tr class="border">
                            <th>S.no</th>
                            <th class="text-left">Order Id</th>
                            <th class="text-left">Product Id</th>
                            <th class="text-sm-center">Price</th>
                            <th class="text-left">Quantity</th>
                            <th class="text-left">Order On</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php $i=1;
                          // echo "<pre>"; print_r($studentCreated); echo "</pre>";
                          foreach ($NewOrder as $value): 
                            ?>
                          <?php //echo "<pre>"; print_r($value['students']); die(); ?>
                          <tr class="border">
                            <td><?= $i++; ?></td>
                            <td class="text-left"><?= $value->id ?></td>
                            <td class="text-left"><?= $value['product_id'] ?></td>
                            <td class="text-sm-center"><?= $value['itemPrice'] ?></td>
                            <td class="text-left"><?= $value['numItem'] ?></td>        
                            <td class="text-left"><?= $value['created']!=""?$value['created']->format("M d, Y"):"" ?></td>
                          </tr>
                          <?php endforeach; ?>
                        </tbody>
                      </table>            
                    </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card card-default text-sm">
                    <div class="card-header">
                      <h3 class="card-title mt-1">Dispatch Order List</h3>
                    </div>
                    <div class="card-body p-0">
                    <div class="table-responsive custom-table-responsive">
                      <table class="table table-bordered" id="tableone">
                        <thead class="thead">
                          <tr class="border">
                            <th>S.no</th>
                            <th class="text-left">Order Id</th>
                            <th class="text-left">Product Id</th>
                            <th class="text-sm-center">Price</th>
                            <th class="text-left">Quantity</th>
                            <th class="text-left">Dispatch On</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php $i=1;
                          // echo "<pre>"; print_r($students); echo "</pre>";
                          foreach ($DispatchOrder as $value): ?>
                          <?php //echo "<pre>"; print_r($value['students']); die(); ?>
                          <tr class="border">
                            <td><?= $i++; ?></td>
                            <td class="text-left"><?= $value->id ?></td>
                            <td class="text-left"><?= $value['product_id'] ?></td>
                            <td class="text-sm-center"><?= $value['itemPrice'] ?></td>
                            <td class="text-left"><?= $value['numItem'] ?></td>      
                            <td class="text-left"><?= $value['modified']!=""?$value['modified']->format("M d, Y"):"" ?></td>
                              <!-- <tr class="spacer d-md-block d-none">
                                <td colspan="100"></td>
                              </tr> -->
                          </tr>
                          <?php endforeach; ?>
                            
                        </tbody>
                      </table>            
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </section>
</div>

<script type="text/javascript">
  new SlimSelect({
    select: '#selectElement'
  })
  new SlimSelect({
    select: '#selectCountry'
  })
</script>
