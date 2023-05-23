<div class="wrapper">
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 mr-2 d-inline-block">Product List</h1>
          <span data-toggle="collapse" data-target="#filter_div" ><i class="fa fa-filter"></i></span>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="<?= $this->Url->build('/') ?>">Dashboard</a></li>
            <li class="breadcrumb-item active">Product List</li>
          </ol>
        </div>
      </div>
    </div>
  </div>

  <section class="content">
    <div class="container-fluid">
      <div class="card card-primary">
        <div class="card-header">
          <h3 class="card-title">Product Summary Table</h3>
        </div>              
        <div class="card-body">
          <table class="table table-bordered">
            <thead>
              <tr>
                <th>#</th>
                <th>Name</th>
                <th>Category-Id</th>
                <th>Price</th>
                <th class="actions text-sm-center"><?= __('Actions') ?></th>
              </tr>
            </thead>
            <tbody>
              <?php foreach ($product as $products): ?>
              <tr>
                  <td><?= h($products->id); ?></td>
                  <td><?= h($products->pName); ?></td>
                  <td><?= h($products->category_id); ?></td>
                  <td><?= h($products->price); ?></td>
                  <td class="actions text-sm-center text-nowrap"><?= $this->Html->link('<i class="fas fa-edit" aria-hidden="true"></i>',['controller' => 'products', 'action' => 'add',$products->id], ['escape' =>false]);?>
                      <?= $this->Form->postLink('<i class="fas fa-trash-alt"></i>',['controller' => 'products', 'action' => 'delete', $products->id], ["class"=>"btn-sm text-danger",'escape' =>false, 'confirm' => __('Are you sure you want to delete # {0}?', $products->id)]);?></td>
              </tr>
              <?php endforeach; ?>
            </tbody>
          </table>
        </div>
        <!-- /.card-body -->
        <div class="card-footer clearfix ">
          <ul class="pagination pagination-sm m-0 float-right">
              <?= $this->Paginator->prev('<<', array('class' => 'page-link'), null, array('class' => 'prev disabled page-item')); ?>
              <li class="page-item"><?= $this->Paginator->numbers(['class'=>'page-link']) ?></li>
              <?= $this->Paginator->next('>>', array('class' => 'page-link'), null, array('class' => 'prev disabled page-item')); ?>
          </ul>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>
</div>

