<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Summary Details</h1>
            </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><?= $this->Html->link('Home',['action' => 'index']);?></li>
            <li class="breadcrumb-item">Summary</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>

<section class="content">
  <div class="container-fluid">
    <div class="card card-primary">
      <div class="card-header">
        <h3 class="card-title">User List</h3>
        <?= $this->Html->link(__('Add User'), ['action' => 'index'], ['class' => 'btn btn-secondary float-right btn-sm']) ?>
      </div>              
      <div class="card-body">
        <table class="table table-bordered">
          <thead>
            <tr>
              <th>#</th>
              <th>Name</th>
              <th>Email-id</th>
              <th>Mobile Number</th>
              <th class="actions text-sm-center"><?= __('Actions') ?></th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($user as $users): ?>
            <tr>
                <td><?= h($users->id); ?></td>
                <td><?= h($users->fName); ?> <?= h($users->lName); ?></td>
                <td><?= h($users->email); ?></td>
                <td><?= h($users->mobile); ?></td>
                <td class="actions text-sm-center text-nowrap"><?= $this->Html->link('<i class="fas fa-edit" aria-hidden="true"></i>',['controller' => 'users', 'action' => 'index', $users->id], ['escape' =>false]);?>
                <?= $this->Html->link('<i class="fas fa-trash-alt"></i>',['controller' => 'users', 'action' => 'summery', 'admin',$users->id], ["class"=>"btn-sm text-danger",'escape' =>false]);?></td>
            </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
      </div>
      <div class="card-footer clearfix">
        <ul class="pagination pagination-sm m-0 float-right">
          <li class="page-item"><a class="page-link" href="#">&laquo;</a></li>
          <li class="page-item"><a class="page-link" href="#">1</a></li>
          <li class="page-item"><a class="page-link" href="#">2</a></li>
          <li class="page-item"><a class="page-link" href="#">3</a></li>
          <li class="page-item"><a class="page-link" href="#">&raquo;</a></li>
        </ul>
      </div>
    </div>
  </div><!-- /.container-fluid -->
</section>