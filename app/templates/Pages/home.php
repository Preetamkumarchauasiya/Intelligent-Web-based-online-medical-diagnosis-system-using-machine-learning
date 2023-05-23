<div class="content p-0">
    <div class="px-3" style="background-color: #10847e;">
        <div id="carouselExampleIndicators" class="carousel slide">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <?= $this->Html->image("Ad1.png", ["class" => "d-block w-100", "alt" => "First slide"]);?>
                </div>
                <div class="carousel-item">
                    <?= $this->Html->image("Ad2.png", ["class" => "d-block w-100", "alt" => "Second slide"]);?>
                </div>
                <div class="carousel-item">
                    <?= $this->Html->image("Ad3.png", ["class" => "d-block w-100", "alt" => "Third slide"]);?>
                </div>
                <div class="carousel-item">
                    <?= $this->Html->image("Ad4.png", ["class" => "d-block w-100", "alt" => "Third slide"]);?>
                </div>
            </div>
            <?= $this->Html->link('<span class="carousel-control-prev-icon" aria-hidden="true"></span>',[],['class' => 'carousel-control-prev', 'type'=>'button','data-bs-target'=>'#carouselExampleIndicators', 'data-bs-slide'=>'prev', 'escape' => false,]); ?>
            <?= $this->Html->link('<span class="carousel-control-next-icon" aria-hidden="true"></span>',[],['class' => 'carousel-control-next', 'type'=>'button','data-bs-target'=>'#carouselExampleIndicators', 'data-bs-slide'=>'next', 'escape' => false,]); ?>
        </div>
    </div>

    <div class="container pb-1">
        <div class="row">
        <?php foreach ($category as $category1): ?>
            <div class="col-md-3 p-3">
                <div class="row" style="background-color: <?= h($category1->color); ?>;" id="cartImgs">
                    <div class="col-6 pt-5" id="cateName"><?= $this->Html->link('<b>'.$category1['cName'].'</b>', '/Products/index/'.$category1->id, ['alt'=>'Snow','escape' => false]);?></div>
                    <div class="col-6 pl-0 pb-2"><?= $this->Html->link($this->Html->image($category1->img, array('width' => '100%', 'min-height' => '100%')), ['controller' => 'Products', 'action' => 'index', $category1->id], ['alt'=>'Snow','escape' => false]); ?></div>
                </div>
            </div>
        <?php endforeach; ?>
        </div>
    </div>
    <div class="container-fluid">
        <?php foreach ($category as $category1): ?>
        <div class="container">
            <hr>
            <h2 class="my-2" style="color: #10847e;"><?= h($category1->cName); ?></h2>
            <hr>
            <div id="carouselExampleIndicators1" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner py-3">
                <div class="carousel-item active">
                    <div class="row">
                    <?php foreach ($category1['products'] as $product): ?>
                        <div class="col-md-3 py-2">
                            <div class="p-2" id="productsName">
                                <?= $this->Html->link(
                                    $this->Html->image($product->pImg, ["class"=>"rounded mx-auto d-block","width" => "100px", "height" => "120px"]), ['controller' => 'Products', 'action' => 'view', $product->id], ['alt'=>'Snow','escape' => false]);?>
                                <?= $this->Html->link('<p class="text-center pt-3" id="cartName">'.$product['pName'].'</p>', '/Products/view/'.$product->id, ['alt'=>'Snow','escape' => false]);?>
                                <p class="text-center">Price At <b>Rs.<?= h($product->price); ?></b></p>
                                <div class="row">
                                    <div class="col-6">
                                    <?php 
                                        echo $this->Form->create(null, ['url' => ['controller' => 'Carts','action' => 'index']]);
                                        echo $this->Form->hidden('product_id', ['value'=>$product->id,'label' => false]);
                                        echo $this->Form->hidden('numItem', ['value'=>'1','label' => false]);
                                        echo $this->Form->hidden('itemPrice', ['value'=>$product->price,'label' => false]);
                                        echo $this->Form->submit('Add To Cart', ['class'=>'form-control btn btn-light', 'style'=>'border-color: #10847e']);
                                        echo $this->Form->end(); ?>
                                    </div>
                                    <div class="col-6">
                                        <?= $this->Html->link(
                                            $this->Form->submit('Buy Now', ['class'=>'form-control btn btn-success','type' => 'button', 'style'=>'background-color:#10847e']), ['controller' => 'Products', 'action' => 'view', $product->id], ['escape' => false]);?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                    </div>
                </div>
            </div>
                <?= $this->Html->link('<span class="carousel-control-prev-icon" aria-hidden="true"></span>',[],['class' => 'carousel-control-prev', 'type'=>'button','data-bs-target'=>'#carouselExampleIndicators1', 'data-bs-slide'=>'prev', 'escape' => false,]); ?>
                <?= $this->Html->link('<span class="carousel-control-next-icon" aria-hidden="true"></span>',[],['class' => 'carousel-control-next', 'type'=>'button','data-bs-target'=>'#carouselExampleIndicators1', 'data-bs-slide'=>'next', 'escape' => false,]); ?>
            </div>
        </div>
        <?php endforeach; ?>
        
        <div class="container pb-5">
            <hr>
            <h2 class="my-2" style="color: #10847e;">Why Choose Us?</h2>
            <hr>
            <div class="row pt-5" style="color: #10847e;">
                <div class="col-md-3">
                    <?= $this->Html->image("whyChooseUs1.svg", ["class" => "img-fluid", 'width' => '100%', 'height' => '100%','url' => ['action' => '#']]);?>
                    <h4 class="py-2 pt-3 m-0">Easly accesses and Register users</h4>
                </div>
                <div class="col-md-3">
                    <?= $this->Html->image("whyChooseUs2.svg", ["class" => "img-fluid", 'width' => '100%', 'height' => '100%','url' => ['action' => '#']]);?>
                    <h4 class="py-2 pt-3 m-0">Fast delivery Orders</h4>
                </div>
                <div class="col-md-3">
                    <?= $this->Html->image("whyChooseUs3.svg", ["class" => "img-fluid", 'width' => '100%', 'height' => '100%','url' => ['action' => '#']]);?>
                    <h4 class="py-2 pt-3 m-0">Unique items</h4>
                </div>
                <div class="col-md-3">
                    <?= $this->Html->image("whyChooseUs4.svg", ["class" => "img-fluid", 'width' => '100%', 'height' => '100%','url' => ['action' => '#']]);?>
                    <h4 class="py-2 pt-3 m-0">Pin codes services</h4>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid" style="background-color: #f4f7fb;">
        <div class="container">
            <div class="row">
                <div class="col-md-6 pt-5">
                    <h1 class="pt-5" style="color: #10847e;"><b>We Believe in ‘Simplifying Healthcare, Impacting Lives!</b></h1>
                </div>
                <div class="col-md-6">
                    <?= $this->Html->image("Ad5.png", ["class" => "img-fluid", 'width' => '100%', 'min-height' => '80%']);?>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid py-3" style="color: #10847e;">
        <p><b>Simplifying Healthcare, Impacting Lives</b><br>Accu-Chek Active - 100 Strips Supradyn Multivitamin Tablets DR Morepen BG 03 - 50 Strips Dettol Antiseptic Liquid Ensure Diabetes Care Vanilla Sugar Free Jar Dettol Instant Hand Sanitizer Everherb Shilajit Softovac SF Powder Pediasure Premium Chocolate Refill.</p>
        <p><b>Selling Medicines:</b> Dolovera Gel Neurobion Forte Chymoral Forte Crocin Advance Soframycin Dexorange Becadexamin Folvite Livogen Becosules Fourderm Nurokind Plus Burnol Crocin 650 Mintop 5 Thrombophob Evion 600.</p>
        <p><b>COVID-19 Preventatives: </b>N95 Masks Hand Sanitizers Hand Gloves, Disinfectants, Thermometers & more!</p>
        <b>Your One-Step Online Pharmacy - MedicineShoppee</b>
        <b>We've got India Covered soon..!</b>
        <p>We now deliver in 1000+ cities and towns across 22000+ pin codes. We thereby cover every nook and corner of the country! The major cities in which we deliver include Mumbai, Kolkata, Delhi, Bengaluru, Ahmedabad, Hyderabad, Chennai, Thane, Howrah, Pune, Gurgaon, Navi Mumbai, Jaipur, Noida, Lucknow, Ghaziabad & Vadodara.</p>
        <p><b>Say Goodbye to All Your Healthcare Worries With MedicineShoppe!</b><br>
        MedicineShoppe is here to help you take it easy! We are amongst one of India's top online pharmacy and medical care platforms. It enables you to order pharmaceutical and healthcare products online by connecting you to registered retail pharmacies and get them delivered to your home. We are an online medical store, making your purchase easy, simple, and affordable!</p>

        <p><b>How Are We Making Lives Simpler With Our Online Medical Store?</b><br>
        Our doorstep delivery service is available in PAN-India across top cities like Bangalore, Delhi, Mumbai, Kolkata, Hyderabad, Gurgaon, Noida, Pune, etc. Our online medical store also allows you to choose from 1 lakh+ products incl. OTC products and medical equipment. PharmEasy is a one-stop online medical platform where you can also book diagnostic tests including blood tests, full-body checkups, and other preventive health check-ups at an affordable cost, right from the comfort of your home. We have partnered with trusted & certified labs that arrange for a sample pick-up from the convenience of your home. They also provide you with timely reports.</p>

        <p><b>Why Are We are Achiving soon.. The Most Preferred Online Pharmacy?</b><br>
        Lucrative offers on our platform allow you to make payment online and via various payment wallets at a discounted price. Alternatively, you can also choose to pay cash on delivery as we deliver the products at your doorstep. We cater to all your pharmaceutical needs and also make ordering medicines online a hassle-free experience for you. We connect you only with registered retail pharmacies & certified diagnostic labs. We ensure that healthcare is affordable to all and make the process of ordering online simple.</p>

        <p><b>Sit Back & Relax While You Get Your Essentials Delivered Every Month!</b><br>
        It’s tough to remember to refill every month, especially in the case of chronic diseases. PharmEasy’s subscription service not only ensures that you are reminded of your refills but also makes sure that you are never out on your medical essentials. You will get a reminder every month and your order will be delivered at your convenience!</p>

        <p><b>Access medical and health information:</b><br>
        PharmEasy delivers reliable and accurate medical information that has been carefully written, vetted and validated by our health experts. Our specialists curate high-quality and most reliable literature about medicines, illnesses, lab tests, Ayurvedic and over the counter health products.</p>
    </div>
</div>



