<div class="container-fluid pt-5">
    <div class="container">
        <hr>
            <h2 class="my-2">Order Details</h2>
        <hr>
        <div class="row py-3">
            <div class="col-md-9">
                <div class="row">
                    <div class="col-9">
                    <?php 
                    foreach ($address as $addresses): ?>
                        <h3>Delivery Address</h3>
                        <p>Name: <?= h($addresses->fullName); ?></p>
                        <p>Mobile: <?= h($addresses->mobile); ?></p>
                        <p>Address: <?php 
                            echo h($addresses->address); echo ', ';
                            echo h($addresses->city); echo ', ';
                            echo h($addresses->state); echo ', ';
                            echo h($addresses->pin); ?>
                        </p>
                        <p>Delivery Type: <?= h($addresses->type); ?></p>
                        <?php $addressId = $addresses->id;?>
                    <?php endforeach; ?>
                    </div>
                    <div class="col-3">
                    <?= $this->Html->link(
                        $this->Form->submit('Add New Address', ['value' => '','class'=>'form-control btn btn-primary','type' => 'submit']), ['action' => 'address'], ['escape' => false]);?>
                        <p><?= $this->Html->link(
                            $this->Form->submit('Edit', ['value' => '','class'=>'btn btn-primary','type' => 'submit']), ['action' => 'address', $addressId], ['escape' => false]);?>
                        </p>
                    </div>
                    
                </div>
                <hr>
                <table class="table table-bordered table-hover">
                    <thead>
                        <?= $this->Html->tableHeaders(['Image', 'Name', 'Price', 'Quantity']);?>
                    </thead>
                <?php $add='0';
                    foreach ($cart as $cart1): 
                        $cartId = $cart1->id;
                        $add = $add+$cart1->itemPrice;
                        $productId = $cart1->product_id;
                        $numItem = $cart1->numItem;
                        $itemPrice = $cart1->itemPrice;
                    ?>
                    <?php $products = $cart1->product?>
                    <tr>
                        <td><?= $this->Html->image($products['pImg'], array('width' => '10%', 'height' => '10%'));?></td>
                        <td><?= h($products['pName']); ?></td>
                        <td><?= h($itemPrice); ?></td>
                        <td><?= h($numItem); ?></td>
                    </tr>

                <?php endforeach; ?>
                </table>
            </div>
            <div class="col-md-3">
                <h3>Price Details</h3>
                <hr>
                <div class="row py-3">
                    <div class="col-6">Price Item:</div>
                    <div class="col-6 d-flex justify-content-end"> ₹<?= h($add); ?></div>
                </div>
                <div class="row py-3">
                    <div class="col-6">Discount:</div>
                    <div class="col-6 d-flex justify-content-end">-₹10</div>
                </div>
                <div class="row py-3">
                    <div class="col-6">Delivery Charges:</div>
                    <div class="col-6 d-flex justify-content-end"> ₹40</div>
                </div>
                <hr>
                <div class="row py-3">
                    <div class="col-6"><h4>Total Amount</h4></div>
                    <div class="col-6 d-flex justify-content-end"><h4>₹<?= h($add+'30'); ?></h4></div>
                </div>
                <hr>
                <div class="pt-3">
                <?php 
                echo $this->Form->create(null, ['url' => ['controller' => 'Orders','action' => 'index']]);
                echo $this->Form->hidden('master_id', ['value'=>$addressId]);
                echo $this->Form->hidden('product_id', ['value'=>$productId]);
                echo $this->Form->hidden('numItem', ['value'=>$numItem]);
                echo $this->Form->hidden('itemPrice', ['value'=>$itemPrice]);
                echo $this->Form->hidden('payStatus', ['value'=>'1']);
                // echo $this->Form->hidden('user_id', ['value'=>'']);
                echo $this->Html->link(
                    $this->Form->submit('Place Order', ['class'=>'form-control btn btn-success','type' => 'submit',  'style'=>'background-color:#10847e']), ['controller' => 'Carts', 'action' => 'delete', $cartId], ['escape' => false]);
                echo $this->Form->end();
                    ?>

                </div>
            </div>

        </div>        
    </div>        
</div>