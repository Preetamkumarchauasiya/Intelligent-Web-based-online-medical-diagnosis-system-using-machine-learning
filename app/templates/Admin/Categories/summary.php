<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Category Summary Details</h1>
            </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><?= $this->Html->link('Home',['action' => 'index']);?></li>
            <li class="breadcrumb-item">Category Summary</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>

<section class="content">
  <div class="container-fluid">
    <div class="card card-primary">
      <div class="card-header">
        <h3 class="card-title">Category Summary Table</h3>
        <!-- <div class="dropdown"> -->
          <?= $this->Form->button('Program', ['type' => 'button', 'class'=>'btn btn-secondary float-right btn-sm dropdown-toggle','data-bs-toggle'=>'dropdown']);?>
          <ul class="dropdown-menu" style="background-color: #cff0ea;color:#10847e;">
            <li><?= $this->Html->link(__('Add Course'), ['action' => 'add'], ['class' => 'dropdown-item','style'=>'color:#10847e;']) ?></li>
            <li><?= $this->Html->link(__('Import'), [], ['class' => 'dropdown-item','type' => 'button','aria-hidden'=>'true', 'data-bs-toggle' => 'modal', 'data-bs-target'=>'#import', 'escape'=>false, 'style'=>'color:#10847e;']); ?></li>
            <li><?= $this->Html->link(__('Export'), ['action' => 'export'], ['class' => 'dropdown-item','style'=>'color:#10847e;']) ?></li>
            <li><?= $this->Html->link(__('Download Sample'), ['action' => 'sample'], ['class' => 'dropdown-item', 'style'=>'color:#10847e;']) ?></li>
          </ul>

        <!-- </div> -->
      </div>              
      <div class="card-body">
        <table class="table table-bordered">
          <thead>
            <tr>
              <th>#</th>
              <th>Name</th>
              <th>Parent-Id</th>
              <th>Show Home</th>
              <th class="actions text-sm-center"><?= __('Actions') ?></th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($category as $categors): ?>
            <tr>
                <td><?= h($categors->id); ?></td>
                <td><?= h($categors->cName); ?></td>
                <td><?= h($categors->parentId); ?></td>
                <td><?= h($categors->showHome); ?></td>
                <td class="actions text-sm-center text-nowrap"><?= $this->Html->link('<i class="fas fa-edit" aria-hidden="true"></i>',['controller' => 'categories', 'action' => 'add', $categors->id], ['escape' =>false]);?>
                <?= $this->Form->postLink('<i class="fas fa-trash-alt"></i>',['controller' => 'categories', 'action' => 'delete', $categors->id], ["class"=>"btn-sm text-danger",'escape' =>false, 'confirm' => __('Are you sure you want to delete # {0}?', $categors->id)]);?></td>
            </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
      </div>
      <!-- /.card-body -->
      <div class="card-footer clearfix ">
        <ul class="pagination pagination-sm m-0 float-right">
            <li class="page-item"><?= $this->Paginator->prev("<<", ['class'=>'page-link']) ?></li>
            <li class="page-item"><?= $this->Paginator->numbers(['class'=>'page-link']) ?></li>
            <li class="page-item"><?= $this->Paginator->next(">>", ['class'=>'page-link']) ?></li>
        </ul>
      </div>
    </div>
  </div><!-- /.container-fluid -->
</section>
