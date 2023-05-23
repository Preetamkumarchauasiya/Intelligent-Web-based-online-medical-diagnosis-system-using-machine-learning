<div class="container-fluid pt-5">
    <div class="container">
        <hr>
            <h2 class="my-2">Carts COLLECTIONS</h2>
        <hr>
        <div class="pt-4">
        <table class="table table-bordered table-hover">
            <thead>
                <?= $this->Html->tableHeaders(['Image', 'Name', 'Price', 'Quantity', 'Remove']);?>
            </thead>
        <?php foreach ($cart as $cart1): ?>
            <?php $products = $cart1->product?>
            <?php 
            // echo "<pre>";print_r($cart1->product->toArray());die();
            ?>
            <tr>
                <td><?= $this->Html->image($products['pImg'], array('width' => '40%', 'height' => '30%'));?></td>
                <td><?= h($products['pName']); ?></td>
                <td><?= h($cart1->itemPrice); ?></td>
                <td><?= h($cart1->numItem); ?></td>
                <td>

                    <?= $this->Html->link(
                    $this->Form->submit('Remove', ['class'=>'form-control btn btn-danger','type' => 'button']), ['controller' => 'Carts', 'action' => 'delete', $cart1->id], ['escape' => false, 'block' => true, 'confirm' => __('Are you sure you want to delete # {0}?', $cart1->id)]);?>
                </td>
            </tr>
        <?php endforeach; ?>
        </table>
        </div>     
        <div class="row">
            <div class="col-9"></div>
            <div class="col-3 px-2">
                <?= $this->Html->link(
                $this->Form->submit('Buy Now', ['class'=>'form-control btn btn-success','type' => 'button',  'style'=>'background-color:#10847e']), ['controller' => 'Masters', 'action' => 'index'], ['escape' => false]);?>        
            </div>
        </div>
        
    </div>        
</div>