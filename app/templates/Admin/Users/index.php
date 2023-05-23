<div class="content-header">
	<div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0">User's Permission</h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><?= $this->Html->link('Home','#');?></li>
          <li class="breadcrumb-item">User Permission</li>
        </ol>
      </div><!-- /.col -->
	  </div><!-- /.row -->
	</div><!-- /.container-fluid -->
</div>
<section class="content">
  <div class="container px-5">
    <div class="card card-primary">
      <div class="card-header d-flex justify-content-center">
        <h2 class="card-title">Sub-Admin Permission Panel</h2>
	    </div>
      <?= $this->Form->create($staff);?>
        <div class="row p-3">
          <div class="col-md-6">
            <label for="">First Name</label>
            <?php echo $this->Form->input('fName', ['class'=>'form-control form-control-sm','type'=>'text','placeholder'=>'Enter First Name','required'=>true]); ?>
          </div>
          <div class="col-md-6">
            <label for="">Last Name</label>
            <?php echo $this->Form->input('lName', ['class'=>'form-control form-control-sm','type'=>'text','placeholder'=>'Enter Last Name','required'=>true]); ?>
          </div>
          <div class="col-md-6">
            <label for="">Mobile Number</label>
            <?php echo $this->Form->input('mobile', ['class'=>'form-control form-control-sm','type'=>'text','placeholder'=>'Enter Mobile Number','required'=>true]); ?>
          </div>
          <div class="col-md-6">
            <label for="">E-mail ID</label>
            <?php echo $this->Form->input('email', ['class'=>'form-control form-control-sm','type'=>'text','placeholder'=>'Enter E-mail ID','required'=>true]); ?>
          </div>
          <div class="col-md-6">
            <label for="">User Type</label>
            <?php $roles = ['a' => 'Admin','sa' => 'Sub-admin', 'r' => 'Retailer', 'd' => 'Doctor', 'l'=>'laboratory'];
            echo $this->Form->input('role', ['class'=>'form-control form-control-sm','type'=>'select','empty' => ' Select ','options' => $roles]);?>
          </div>
          <div class="col-md-6">
            <label for="">Status</label>
            <?php $status = ["1"=>"Active","0"=>"Disable"];
              echo $this->Form->input('status', ['class'=>'form-control form-control-sm','type'=>'select','empty' => ' Select ','options' => $status]); ?>
          </div>
        </div>
        <div class='text-center pb-2'>
          <?= $this->Form->submit('Submit', ['class'=>'btn btn-outline-primary']);?>
        </div>
      <?= $this->Form->end();?>
    </div><!-- /.card -->
	</div><!-- /.container-fluid -->
</section>