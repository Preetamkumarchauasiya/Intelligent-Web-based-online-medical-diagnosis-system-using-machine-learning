<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Add Product Details</h1>
            </div><!-- /.col -->
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><?= $this->Html->link('Product',['action' => 'index']);?></li>
                <li class="breadcrumb-item">Add Product</li>
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
            <h3 class="card-title">Add Product Data</h3>
        </div><!-- /.card-header -->
        <!-- form start -->
        <?= $this->Form->create($product, ['type' => 'file']);?>
        <div class="card-body">
            <div class="input-group mb-3">
                <div class="input-group-prepend"></div>
                <?php
                    $templates = ['input' => '<input type="{{type}}" class="form-control" name="{{name}}"{{attrs}}/>'];
                    $this->Form->setTemplates($templates);
                    echo $this->Form->hidden('id');?>
            </div>
            <div class="input-group">
                <label><strong>Product Name: </strong></label>
            </div>
            <div class="input-group mb-3">
                <div class="input-group-prepend"></div>
                <?= $this->Form->text('pName', ['Placeholder'=>'Enter Product Name','label' => false ,'required'=>true]);?>
            </div>
            <div class="input-group">
                <label><strong>Product Description: </strong></label>
            </div>
            <div class="input-group mb-3">
                <div class="input-group-prepend"></div>
                <?= $this->Form->textarea('pDescription', ['class'=>'form-control', 'Placeholder'=>'Enter Product Description','label' => false ,'required'=>true]);?>
            </div>
            <div class="input-group">
                <label><strong>Category Name: </strong></label>
            </div>
            <div class="input-group mb-3">
                <div class="input-group-prepend"></div>
                <?= $this->Form->text('category_id', ['Placeholder'=>'Enter Category Name','label' => false ,'required'=>true]);?>
            </div>
            <div class="input-group">
                <label><strong>Product Image: </strong></label>
            </div>
            <div class="input-group">
                <?= $this->Form->label(' ',$product['pImg']);?>
            </div>
            <div class="input-group mb-3">
                <div class="input-group-prepend"></div>
                <?= $this->Form->text('pImg', ['type' => 'file', 'class'=>'form-control', 'label' => false ,'required'=>true]);?>
            </div>
           <div class="input-group">
                <label><strong>Price: </strong></label>
            </div>
            <div class="input-group mb-3">
                <div class="input-group-prepend"></div>
                <?= $this->Form->text('price', ['Placeholder'=>'Enter Price','label' => false ,'required'=>true]);?>
            </div>
        </div><!-- /.card-body -->
        <div class="card-footer d-grid d-flex justify-content-center">
          <?=$this->Form->button('Save', ['type' => 'submit', 'class'=>'btn btn-outline-primary']);?>
        </div>
        <?= $this->Form->end();?>
    </div><!-- /.card -->
  </div><!-- /.container-fluid -->
</section>