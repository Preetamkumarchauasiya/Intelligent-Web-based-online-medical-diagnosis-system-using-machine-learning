<div class="container-fluid pt-5">
    <div class="container">
        <hr>
        <h2 class="my-2">CATEGORIES</h2>
        <hr>
        <div class="row py-3">
        <?php foreach ($category as $category1): ?>
            <div class="col-md-4 p-3" id="cartImgs">
            <?= $this->Html->link(
                $this->Html->image($category1->img, array('width' => '100%', 'height' => '100%')). ' ' . __('<h2><b>').$category1->cName.('</b></h2>'), ['controller' => 'Products', 'action' => 'index', $category1->id], ['alt'=>'Snow','escape' => false]); ?>
            </div>
        <?php endforeach; ?>
        </div>
        <ul class="pagination justify-content-center">
            <?= $this->Paginator->prev("<<") ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(">>") ?>
        </ul>
    </div>
</div>