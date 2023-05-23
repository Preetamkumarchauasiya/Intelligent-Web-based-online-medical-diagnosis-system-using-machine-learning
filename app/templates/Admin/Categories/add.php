<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Add Category Details</h1>
            </div><!-- /.col -->
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><?= $this->Html->link('Category',['action' => 'index']);?></li>
                <li class="breadcrumb-item">Add Category</li>
            </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<section class="content">
    <div class="container px-5">
    <!-- general form elements -->
    <div class="card card-primary">
        <div class="card-header d-flex justify-content-center">
            <h3 class="card-title">Add Category Data</h3>
        </div><!-- /.card-header -->
        <!-- form start -->
        <?php //if($category)?>
        <?= $this->Form->create(null, ['type' => 'file']);?>
        <div class="card-body">
            <div class="input-group mb-3">
                <div class="input-group-prepend"></div>
                <?php
                    $templates = [
                    // 'inputContainer' => '<div class="form-group p-2">{{content}}</div>',
                    'input' => '<input type="{{type}}" class="form-control" name="{{name}}"{{attrs}}/>'];
                    $this->Form->setTemplates($templates);
                    echo $this->Form->hidden('id');?>
            </div>
            <div class="input-group">
                <label><strong>Category Name: </strong></label>
            </div>
            <div class="input-group mb-3">
                <div class="input-group-prepend"></div>
                <?= $this->Form->text('cName', ['Placeholder'=>'Enter Category Name','label' => false ,'required'=>true]);?>
            </div>
            <div class="input-group">
                <label><strong>Category Image: </strong></label>
            </div>
            <div class="input-group">
                <b><?php //h($category->img); ?></b>
            </div>
            <div class="input-group mb-3">
                <div class="input-group-prepend"></div>
                <?= $this->Form->text('img', ['type' => 'file', 'class'=>'form-control', 'label' => false ,'required'=>true]);?>
            </div>
            <div class="input-group">
                <label><strong>Sub-Category Type: </strong></label>
            </div>
            <div class="input-group mb-3">
                <?php 
                $options = ['0' => 'Parent', '1' => 'Sub-Category'];
                echo $this->Form->select('parentId', $options, ['class'=>'form-control','empty' => ' Choose Category ','required'=>true]); ?>
            </div>
            <div class="input-group">
                <label><strong>Show Home Page Type: </strong></label>
            </div>
            <div class="input-group mb-3">
                <?php 
                $options = ['1' => 'Yes', '0' => 'No'];
                echo $this->Form->select('showHome', $options, ['class'=>'form-control','empty' => ' Choose Show Home ','required'=>true]); ?>
            </div>
        </div><!-- /.card-body -->
        <div class="card-footer d-grid d-flex justify-content-center">
          <?=$this->Form->button('Save', ['type' => 'submit', 'class'=>'btn btn-outline-primary']);?>
        </div>
        <?= $this->Form->end();?>
    </div><!-- /.card -->
  </div><!-- /.container-fluid -->
</section>