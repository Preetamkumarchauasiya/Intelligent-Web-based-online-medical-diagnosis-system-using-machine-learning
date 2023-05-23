<div class="container-fluid pt-5">
    <div class="container">
        <div class="row">
            <div class="col-md-7 p-5">
                <h2 class="my-2 pt-5" style="color:#10847e;"><b>Your order has been placed.</b></h2>
                <br>
                <div class="">
                    <p> Here is your Order ID: <a href="#"><b>#23<?= h($order->itemPrice);?><?= h($order->numItem); ?><?= h($order->id); ?></b></a>.<br>This order will be delivered in 2-3 business days.
                </div>
            </div>
            <div class="col-md-5">
                <?= $this->Html->image("orderIcons.png", ["class" => "img-fluid", 'width' => '100%', 'height' => '100%']);?>
            </div>
        </div>
    </div>
</div>