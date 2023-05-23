<?php 
$this->Paginator->options([
    'url' => [
        'lang' => 'en',
        '?' => $filtercondition,
    ]
]);
?>
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
          <h1 class="m-0 mr-2 d-inline-block">Order List</h1>
          <span data-toggle="collapse" data-target="#filter_div" ><i class="fa fa-filter"></i></span>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="<?= $this->Url->build('/') ?>">Dashboard</a></li>
            <li class="breadcrumb-item active">Order List</li>
          </ol>
        </div>
      </div>
    </div>
  </div>

  <section class="content collapse" id="filter_div">
    <div class="container-fluid mb-3">
      <?= $this->Form->create(null, ['id' => 'filterform']) ?>
      <div class="card card-default text-sm">
        <div class="card-header">
          <h3 class="card-title mt-1">Filters</h3>
          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse">
              <i class="fas fa-minus"></i>
            </button>
            <button type="button" class="btn btn-tool" data-target="#filter_div" data-toggle="collapse">
              <i class="fas fa-times"></i>
            </button>
          </div>
        </div>
        <div class="card-body">
          <div class="row">
            <div class="col-md-3">Transactio Id
              <?= $this->Form->input('transaction_id', ['class'=>'form-control form-control-sm',"placeholder"=>"Enter Transactio Id","value"=>$filtercondition['transaction_id']]) ?>
            </div>
            <div class="col-md-3">Order Status
              <?= $this->Form->input('orderstatus',['class' => 'form-control form-control-sm',"placeholder"=>"Enter Order Status","value"=>$filtercondition['orderstatus']]) ?>
            </div>
            <div class="col-md-3">Price
              <?= $this->Form->input('itemPrice', ['class'=>'form-control form-control-sm',"placeholder"=>"Enter Price","value"=>$filtercondition['itemPrice']]) ?>
            </div>
            <div class="col-md-3">Status
              <?php $status = ["1"=>"Active","0"=>"Disable"];
                    echo $this->Form->input('status', ['class'=>'form-control form-control-sm','type'=>'select','options' => $status,"value"=>$filtercondition['status']]); ?>
            </div>
          </div>
        </div>
        <div class="card-footer text-sm-center">
          <?= $this->Form->submit('Filter', ['class' => 'btn btn-info']) ?>
        </div>
      </div>
      <?= $this->Form->end() ?>
    </div>
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid mb-3">
      <!-- form section 1 -->
      <div class="card card-primary text-sm">
        <!-- card-header -->
        <div class="card-header py-2">
          <h3 class="card-title mt-1 text-white">List</h3>
          <?php // $this->Html->link(__('Add School'), ['action' => 'add'], ['class' => 'btn btn-secondary float-right btn-sm']) ?>
        </div>
        <div class="card-body pt-2">
          <div class="table-responsive custom-table-responsive">
            <table class="table table-bordered" id="tableone">
              <thead class="thead">
                <tr class="border">
                  <th>S.no</th>
                  <th class="text-left">Product Id</th>
                  <th class="text-left">Order Status</th>
                  <th class="text-sm-center">Item Price</th>
                  <th class="text-left">Number of Item</th>
                  <th class="text-left"><?= $this->Paginator->sort('Orders.created','Ordered') ?></th>
                  <th class="actions text-sm-center"><?= __('Status') ?></th>
                  <th class="actions text-sm-center"><?= __('Actions') ?></th>
                </tr>
              </thead>
              <tbody>
                <?php if(!empty($orders[0])){ 
                if($this->request->getQuery('limit')){$limit = $this->request->getQuery('limit');}
                if($this->request->getQuery('page')){
                     $page = $this->request->getQuery('page');
                } else {
                     $page = 1;
                }
                $i = ($page * $limit) - $limit + 1;
                // echo "<pre>"; print_r($orders); echo "</pre>";
                foreach ($orders as $value): ?>
                <?php //echo "<pre>"; print_r($value['students']); die(); ?>
                <tr class="border">
                  <td><?= $i++; ?></td>
                  <td class="text-left"><?= $value->product_id ?></td>
                  <td class="text-left">
                  <?php $output = $value['orderstatus'];
                      if($output) { echo '<span class="text-success"> '.$output.'</span>' ; } else { echo '<span class="text-danger">Update Soon</span'; } ?>
                    </td>
                  <td class="text-sm-center"><?= $value['itemPrice'] ?></td>
                  <td class="text-left"><?= $value['numItem'] ?></td>
                  <td class="text-left"><?= $value['created']!=""?$value['created']->format("M d, Y"):"" ?></td>
                  <td class="text-center">
                    <div class="custom-control custom-switch">
                      <?php 
                      $checked ="";
                      if ($value['status']) $checked = "checked";
                      echo $this->Form->checkbox('status['.$value['id'].']',["class"=>"custom-control-input",'id'=>'status_'.$value['id'],$checked,"onchange"=>"changeStatus(this,'".$value['id']."')"]);?>
                      <label class="custom-control-label" for="status_<?=$value['id']?>"></label>
                    </div>
                  </td>
                  <td class="actions text-sm-center text-nowrap">
                    <?= $this->Html->link($this->Html->tag('i',' ',["class"=>"fas fa-edit"]),["action"=>"add",$value['id']],["class"=>"btn-sm text-cyan" ,'escape' => false]); ?>

                    <?= $this->Form->postLink(__($this->Html->tag('i','',["class"=>"fas fa-trash-alt"])), ['action' => 'delete', $value['id']] ,['escape' => false,"class"=>"btn-sm text-danger",'confirm' => __('Are you sure want to delete this School?')]) ?>
                  </td>
                </tr>
                <?php endforeach; 
                } else { ?>
                  <tr class="border">
                    <td class="text-sm-center" colspan="11">No Records Found</td>
                  </tr>
                <?php  } ?>
              </tbody>
            </table>            
          </div>
        </div>
          <!-- pagination start -->
        <div class="card-footer clearfix">
            <div class="paginator">
                <ul class="pagination pagination-sm m-0 float-right">
                    <li class="page-item page-link"><?php echo $this->Paginator->first('<< ' . __('first')) ?></li>
                    <li class="page-item page-link"><?php echo $this->Paginator->prev('< ' . __('previous')) ?></li>
                    <li class="page-item page-link"><?php echo $this->Paginator->numbers() ?></li>
                    <li class="page-item page-link"><?php echo $this->Paginator->next(__('next') . ' >') ?></li>
                    <li class="page-item page-link"><?php echo $this->Paginator->last(__('last') . ' >>') ?></li>
                </ul>
                <p><?php echo $this->Paginator->counter(__('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')) ?></p>
            </div>
        </div>
          <!--/.pagination end -->
      </div>
    </div>
  </section>
</div>

<script type="text/javascript">
  function changeStatus(fld,id) {
    if (fld.checked) status = 1; else status = 0;
    $.ajax({
      url:"<?= $this->Url->build(['action' => 'changeStatus']) ?>",
      type:"POST",
      data:{'id':id,'status':status},
      dataType:"json",
      headers:{
        "X-CSRF-Token" : $('[name="_csrfToken"]').val()
      },
      success:function(response){
        // if (response) {
          console.log("Data updated successfully");
        // }
      }
    });
  }
</script>