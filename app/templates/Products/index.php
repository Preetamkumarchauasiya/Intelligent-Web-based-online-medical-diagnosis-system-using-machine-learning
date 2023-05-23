<div class="container-fluid">
    <div class="container">
        <div class="pb-2" >
            <div id="carouselExampleIndicators" class="carousel slide">
                <div class="carousel-inner">
                <?php foreach ($banner as $banners): ?>
                <?php if($banners->imgs == 'm1.jpg' || $banners->imgs == 'H1.jpg' || $banners->imgs == 'L1.jpg' || $banners->imgs == 'D1.jpg'){ $active = 'active'; }else{ $active=""; } ?>
                    <div class="carousel-item <?= $active; ?>">
                        <?= $this->Html->image($banners->imgs, ["class" => "d-block", "alt" => "First slide", "width"=>"100%", "height"=>"320px"]);?>
                    </div>
                <?php endforeach; ?>
                </div>
                <?= $this->Html->link('<span class="carousel-control-prev-icon" aria-hidden="true"></span>',[],['class' => 'carousel-control-prev', 'type'=>'button','data-bs-target'=>'#carouselExampleIndicators', 'data-bs-slide'=>'prev', 'escape' => false,]); ?>
                <?= $this->Html->link('<span class="carousel-control-next-icon" aria-hidden="true"></span>',[],['class' => 'carousel-control-next', 'type'=>'button','data-bs-target'=>'#carouselExampleIndicators', 'data-bs-slide'=>'next', 'escape' => false,]); ?>
            </div>
        </div>
        <hr>
        <?php foreach ($category as $category1): ?>
            <h2 class="my-2" style="color: #10847e;"><?= h($category1->cName); ?> COLLECTIONS</h2>
        <?php endforeach; ?>
        <hr>
        <div class="row pt-3">
        <?php foreach ($product as $product1): ?>
            <div class="col-md-3">
            <div class="p-2" id="productsName">
                <?= $this->Html->link(
                    $this->Html->image($product1->pImg, ["class"=>"rounded mx-auto d-block","width" => "100px", "height" => "120px"]), ['controller' => 'Products', 'action' => 'view', $product1->id], ['alt'=>'Snow','escape' => false]);?>
                <?= $this->Html->link('<p class="text-center pt-3" id="cartName">'.$product1['pName'].'</p>', '/Products/view/'.$product1->id, ['alt'=>'Snow','escape' => false]);?>
                <?php if($product1->category_id == '4'){ ?>
                    <p class="text-center">Fee <b>Rs.<?= h($product1->price); ?></b></p>
                <?php }else{ ?>
                <p class="text-center">Price At <b>Rs.<?= h($product1->price); ?></b></p>
            <?php } ?>
                <div class="row">
                    <div class="col-6">
                        <?php echo $this->Form->create(null, ['url' => ['controller' => 'Carts','action' => 'index']]);
                            echo $this->Form->hidden('product_id', ['value'=>$product1->id,'label' => false]);
                            echo $this->Form->hidden('numItem', ['value'=>'1','label' => false]);
                            echo $this->Form->hidden('itemPrice', ['value'=>$product1->price,'label' => false]);
                            echo $this->Form->submit('Add To Cart', ['class'=>'form-control btn btn-light','style'=>'border-color: #10847e']);
                            echo $this->Form->end();?>
                    </div>
                    <div class="col-6">
                        <?= $this->Html->link(
                            $this->Form->submit('Buy Now', ['class'=>'form-control btn btn-success','type' => 'button', 'style'=>'background-color:#10847e']), ['controller' => 'Products', 'action' => 'view', $product1->id], ['escape' => false]);?>
                    </div>
                </div>
            </div>
            </div>
            
        <?php endforeach; ?>
        </div>
    </div>        
</div>