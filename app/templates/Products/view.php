<div class="container-fluid pt-5">
    <div class="container">
        <hr>
        <?php foreach ($product as $product1): ?>
            <h2 class="my-2"><?= h($product1->pName); ?></h2>
        <hr>
        <div class="row pt-5">
            <div class="col-md-3">
                <div>
                    <?= $this->Html->image($product1->pImg, ["class" => "d-block w-100"]);?>
                </div>
            </div>
            <div class="col-md-9">
                <h3>Rating: 0/5</h3>
                <h5>Brand: ARACHITOL</h5>
                <p>Date: <?= h($product1->date); ?></p>
                <h5 class="pb-3">Price: <?= h($product1->price); ?></h5>
                <div class="row pb-3">
                    <div class="col-md-8">
                        <div class="row pb-3">
                            <div class="col-6 py-1">
                                
                            </div>
                            <div class="col-6">
                            <?php echo $this->Form->create(null, ['url' => ['controller' => 'Carts','action' => 'index']]);
                                echo $this->Form->hidden('product_id', ['value'=>$product1->id,'label' => false]);
                                echo $this->Form->hidden('numItem', ['value'=>'1','label' => false]);
                                echo $this->Form->hidden('itemPrice', ['value'=>$product1->price,'label' => false]);
                                echo $this->Form->submit('Add To Cart', ['class'=>'form-control btn btn-light', 'style'=>'border-color: #10847e']);
                                echo $this->Form->end();?>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <?= $this->Html->link(
                            $this->Form->submit('Buy Now', ['class'=>'form-control btn btn-success','type' => 'button', 'style'=>'background-color:#10847e']), ['controller' => 'Masters', 'action' => 'index', $product1->id], ['escape' => false]);?>
                    </div>
                </div>
                <hr>
                <h5 class="pt-3"><b>Description</b></h5>
                <p><?= h($product1->pDescription); ?></p>
            </div>
        </div>
        <?php endforeach; ?>
    </div>        
</div>