
<!DOCTYPE html>
<html>
<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= $this->Html->meta('csrfToken', $this->request->getAttribute('csrfToken')); ?>
    <title>
        <?= $cakeDescription = 'MedicineShoppee'; ?>:
        <?= $this->fetch('title') ?>
    </title>
    <?= $this->Html->meta('icon') ?>
    <?= $this->Html->css(['style.css','bootstrap.min.css','font-awesome.min.css','font-awesome.css','fontawesome-free/css/all.min.css', 'adminlte.min.css']) ?>
    <?= $this->Html->script(['bootstrap.min.js', 'jquery-3.2.1.slim.min.js', 'js/adminlte.js','bootstrap/js/bootstrap.bundle.min.js']) ?>
    <?= $this->Html->script('jquery.min') ?>
    <?= $this->Html->script('popper.min') ?>

    <?php // $this->Html->css(['DataTables/datatables.min.css'])?>
    <?= $this->Html->script(['googletagmanager.js', 'modernizr/modernizr.min.js', 'malefemale.min.js', 'main.js']) ?>
    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>

    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-114312764-1"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date()); 
        gtag('config', 'UA-114312764-1');
    </script>
    <!-- Facebook Pixel Code --> 
    <script>
        !function(f,b,e,v,n,t,s)
        {if(f.fbq)return;n=f.fbq=function(){n.callMethod?
        n.callMethod.apply(n,arguments):n.queue.push(arguments)};
        if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
        n.queue=[];t=b.createElement(e);t.async=!0;
        t.src=v;s=b.getElementsByTagName(e)[0];
        s.parentNode.insertBefore(t,s)}(window, document,'script',
        'https://connect.facebook.net/en_US/fbevents.js');
        fbq('init', '221517861789129');
        fbq('track', 'PageView');
    </script>
    <noscript>
      <img height="1" width="1" style="display:none"src="https://www.facebook.com/tr?id=221517861789129&ev=PageView&noscript=1"/>
    </noscript>
    <!-- End Facebook Pixel Code -->

</head>
<body>
<div class="wrapper">
    <!-- Preloader -->
    <div class="preloader flex-column justify-content-center align-items-center" style="background-color:#10847e;">
        <?= $this->Html->image("StartupScreen.jpeg", ["class" => "animation__shake", "height" => "100%", "width" => "100%"]);?>
    </div>
    <div class="navbar navbar-expand-lg navbar-light " id="navbarTop">
        <div class="container-fluid py-3">
            <div class="col-lg-2">
                <div class="row">
                    <div class="col-9 p-0">
                        <?= $this->Html->image("logo.png", ["class" => "img-fluid", 'width'=>'170px', 'height'=>'240px', 'url' => ['controller' => 'Pages', 'action' => 'home']]);?>
                    </div>
                    <div class="col-3 p-4 d-flex justify-content-end">
                        <button class="navbar-toggler me-3" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" >
                            <?= $this->Html->image("hamMenu.svg", ["class" => "img-fluid", 'width'=>'40px', 'height'=>'40px']);?>
                        </button>
                    </div>
                </div>
            </div>
            <div class="col-lg-10">
                <div class="row">
                    <div class="col-lg-10">
                        <?php $templates = ['inputContainer' => '<div class="form-group m-0">{{content}}</div>', 'input' => '<input type="{{type}}" class="form-control" name="{{name}}"{{attrs}}/>'];
                        $this->Form->setTemplates($templates);
                        echo $this->Form->create();?>
                        <div class="row">
                            <div class="col-10 pr-0">
                                <?= $this->Form->control('string', ['Placeholder'=>'Search','type' => 'text', 'label' => false,'required'=>true]);?>
                            </div>
                            <div class="col-2 pl-0">
                                <?= $this->Html->link($this->Html->image("SearchIcon.svg", array('width' => '20px', 'min-height' => '25px')), [], ['type' => 'submit', 'class'=>'form-control btn btn-outline-light', 'escape'=>false]); ?>                            
                            </div>
                        </div>
                        <?= $this->Form->end();?>
                    </div>
                    <div class="col-lg-2 d-flex justify-content-end">
        
                    </div>
                </div>
                <div class="row pt-2 pr-0">
                    <div class="col-8">
                        <div class="collapse navbar-collapse ul-bg" id="navbarNav">
                            <div class="nav navbar-nav" id="navbarItem">
                                <?= $this->Html->link('Disease Detection','/Diseases/home',['class' => 'nav-item nav-link']);?>
                                <?= $this->Html->link('Order Medicines','/Products/index/1',['class' => 'nav-item nav-link']);?>
                                <?= $this->Html->link('Healthcare Products','/Products/index/2',['class' => 'nav-item nav-link']);?>
                                <?= $this->Html->link('Lab Tests','/Products/index/3',['class' => 'nav-item nav-link']);?>
                                <?= $this->Html->link("Doctor's Appointment",'/Products/index/4',['class' => 'nav-item nav-link']);?>
                            </div>
                        </div>
                    </div>
                    <div class="col-4 ">
                        <div class="collapse navbar-collapse ul-bg" id="navbarNav">
                            <div class="navbar-nav dropdown d-flex justify-content-end" id="navbarItem">
                                <?= $this->Html->link('<i class="fa fa-gift"></i> Offers','/Pages/home',['class' => 'nav-item nav-link','escape'=>false]);?>
                                <?php 
                                if ($this->Identity->isLoggedIn()) {
                                    echo $this->Html->link(__('<i class="fa-solid fas fa-user"></i> Hi <b>'.$this->Identity->get('fName').'</b>'),'#',['class' => 'nav-item nav-link', 'data-bs-toggle' => 'dropdown', 'escape'=>false]);?>
                                    <div class="dropdown-menu dropdown-menu-md dropdown-menu-right" id="navDropdown">
                                    <?php if ($this->Identity->get('role')=="a") { ?>
                                        <div class="dropdown-item text-center px-0"><?= $this->Html->link('Admin Panel', '/admin/users/dashboard', ['class' => 'dropdown-item', 'escape'=>false]);?></div>
                                    <?php }else{ ?>
                                        <div class="dropdown-item text-center px-0" style="background-color: #cff0ea;color:#10847e;">My Profile</div>
                                    <?php } ?>
                                        <div class="dropdown-item text-center px-0">
                                            <?= $this->Html->link('My Orders', ['controller'=>'#','action' => '#'], ['class' => 'dropdown-item', 'escape'=>false]);?>
                                        </div>
                                        <div class="dropdown-item text-center px-0">
                                            <?= $this->Html->link('My Refills', ['controller'=>'#','action' => '#'], ['class' => 'dropdown-item', 'escape'=>false]);?>
                                        </div>
                                        <div class="dropdown-item text-center px-0">
                                            <?= $this->Html->link('Medical Records', ['controller'=>'#','action' => '#'], ['class' => 'dropdown-item', 'escape'=>false]);?>
                                        </div>
                                        <div class="dropdown-item text-center px-0">
                                            <?= $this->Html->link('Wallet', ['controller'=>'#','action' => '#'], ['class' => 'dropdown-item', 'escape'=>false]);?>
                                        </div>
                                        <div class="dropdown-item text-center px-0">
                                            <?= $this->Html->link('Refer & Earn', ['controller'=>'#','action' => '#'], ['class' => 'dropdown-item', 'escape'=>false]);?>
                                        </div>
                                        <div class="dropdown-item text-center px-0">
                                            <?= $this->Html->link('Notification', ['controller'=>'#','action' => '#'], ['class' => 'dropdown-item', 'escape'=>false]);?>
                                        </div>
                                        <div class="dropdown-item text-center px-0">
                                        <?= $this->Html->link(__('<i class="fas fa-sign-out-alt fa-lg"></i> Logout'), ['controller'=>'Users','action' => 'logout'], ['class' => 'dropdown-item', 'escape'=>false]);?>
                                            
                                        </div>
                                    </div>
                                <?php
                                }else{
                                    echo $this->Html->link('<i class="fa-solid fas fa-user"></i> Login | Sign Up','/users/login',['class' => 'nav-item nav-link','type'=>'button', 'data-bs-toggle'=>'modal', 'data-bs-target'=>'#login', 'escape'=>false]);
                                    }?>
                                <?= $this->Html->link('<i class="fa fa-cart-plus"></i><span class="badge badge-warning navbar-badge"></span> Cart','/Carts/index',['class' => 'nav-item nav-link', 'escape'=>false]);?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="login" tabindex="-1" role="dialog" aria-labelledby="myModalLabel2">
        <div class="modal-dialog" role="document" style="position: fixed; margin: auto; width: 430px; height: 100%; right: 0px;">
            <div class="modal-content" style="height: 100%;">
                <div class="modal-header" style="background-color: #10847e;">
                    <div class="row">
                        <div class="col-6">
                            <?= $this->Html->image("logo.png", ["class" => "img-fluid", 'width'=>'170px', 'height'=>'240px', 'url' => ['controller' => 'Pages', 'action' => 'home']]);?>
                        </div>
                        <div class="col-6">
                            <?= $this->Html->image("loginlogo.svg", ["class" => "img-fluid", 'width'=>'170px', 'height'=>'240px', 'url' => ['controller' => 'Pages', 'action' => 'home']]);?>
                        </div>
                    </div>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body">
                    <h2 class="text-center">Quick Login</h2>
                    <hr>
                    <div class="container">
                    <?php 
                    $templates = [
                        'inputContainer' => '<div class="form-group p-2">{{content}}</div>',
                        'input' => '<input type="{{type}}" class="form-control" name="{{name}}"{{attrs}}/>'
                    ];
                    $this->Form->setTemplates($templates);
                    echo $this->Form->create(null, ['url' => ['controller' => 'Users','action' => 'login']]);
                    echo '<fieldset>';
                    echo $this->Form->control('email', ['Placeholder'=>'Enter E-mail ID','type' => 'email', 'label' => 'E-mail ID ','required'=>true]);
                    echo $this->Form->control('password', ['Placeholder'=>'Enter Password','type' => 'password', 'label' => 'Password ','required'=>true]);
                    echo '</fieldset>';
                    echo "<div class='text-center'>";
                    echo $this->Form->submit('Submit', ['class'=>'form-control btn btn-outline-primary','style'=>'background-color:#10847e; color:white;']);
                    echo $this->Form->end();
                    echo "<br><p>Don't have an account? ";
                    echo $this->Html->link('<b>Sign Up</b>', ['controller' => 'Users','action' => 'register'],['escape'=>false]);
                    echo '</div>';
                    ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

    
    <main class="main">
        <div class="container-fluid p-0" id="main">
            <?= $this->Flash->render() ?>
            <?= $this->fetch('content') ?>
        </div>
    </main>

    <footer>
        <div class="container-fluid py-5" style="background-color:#f4f7fb;">
        <div class="row" id="footer">
            <div class="col-md-3 pr-3">
                <h4 style="background-color:#10847e;"><?= $this->Html->image("logo.png", ["class" => "img-fluid", 'width'=>'170px', 'height'=>'240px', 'url' => ['controller' => 'Pages', 'action' => 'home']]);?></h4>
                <p class="my-3"><?= $this->Html->link('About Us','#',['class' => 'my-3']);?></p>
                <p class="my-3"><?= $this->Html->link('Blog','#',['class' => 'my-3']);?></p>
                <p class="my-3"><?= $this->Html->link('Partner with Medicine Shoppee','#',['class' => 'my-3']);?></p>
                <p class="my-3"><?= $this->Html->link('Sell at Medicine Shoppee','#',['class' => 'my-3']);?></p>
            </div>
            <div class="col-md-3 px-3" id="">
                <h3 style="background-color:#10847e; color: white; text-align: center;" class="py-3"><b>OUR SERVICES</b></h3>
                <p class="my-3"><?= $this->Html->link('Order Medicine','#',['class' => 'my-3']);?></p>
                <p class="my-3"><?= $this->Html->link('Healthcare Products','#',['class' => 'my-3']);?></p>
                <p class="my-3"><?= $this->Html->link('Lab Tests','#',['class' => 'my-3']);?></p>
                <p class="my-3"><?= $this->Html->link('Find Nearest Collection Centre','#',['class' => 'my-3']);?></p>
                <p class="my-3"><?= $this->Html->link('Doctor Appointment','#',['class' => 'my-3']);?></p> 
            </div>
            <div class="col-md-3 px-3" id="">
                <h3 style="background-color:#10847e; color: white; text-align: center;" class="py-3"><b>POLICY INFO</b></h3>
                <p class="my-3"><?= $this->Html->link('Terms and Conditions','#',['class' => 'my-3']);?></p>
                <p class="my-3"><?= $this->Html->link('Customer Support Policy','#',['class' => 'my-3']);?></p>
                <p class="my-3"><?= $this->Html->link('Return Policy','#',['class' => 'my-3']);?></p>
                <p class="my-3"><?= $this->Html->link('Editorial Policy','#',['class' => 'my-3']);?></p>
                <!-- <p class="my-3"><?= $this->Html->link('Privacy Policy','#',['class' => 'my-3']);?></p> -->
                <p class="my-3"><?= $this->Html->link('Vulnerability Disclosure Policy','#',['class' => 'my-3']);?></p>
            </div>
            <div class="col-md-3 pl-3" id="">
                <h3 style="background-color:#10847e; color: white; text-align: center;" class="py-3"><b>CONTACT US</b></h3>
                <div class="my-4">
                <?= $this->Form->create();?>
                <?php
                $templates = [
                    'inputContainer' => '<div class="form-group">{{content}}</div>',
                    'input' => '<input type="{{type}}" class="form-control" name="{{name}}"{{attrs}}/>'
                ];
                $this->Form->setTemplates($templates);
                echo $this->Form->control('email', ['label' => false, 'Placeholder'=>'Enter User Email Address','required'=>true]);
                echo "<div class='text-center'>";
                echo $this->Form->submit('SEND', ['class'=>'form-control btn btn-warning','style'=>'background-color:#10847e; color:white;']);
                echo '</div>';
                echo $this->Form->end();
                ?>
                </div>
                <div class="d-flex justify-content-center">
                    <?= $this->Html->image("facebook.png", ["class" => "img-fluid", 'width'=>'40px', 'height'=>'40px', 'url' => ['controller' => '#', 'action' => '#']]);?>
                    <?= $this->Html->image("instagram.png", ["class" => "img-fluid", 'width'=>'40px', 'height'=>'40px', 'url' => ['controller' => '#', 'action' => '#']]);?>
                    <?= $this->Html->image("youtube.png", ["class" => "img-fluid", 'width'=>'40px', 'height'=>'40px', 'url' => ['controller' => '#', 'action' => '#']]);?>
                    <?= $this->Html->image("twitter.png", ["class" => "img-fluid", 'width'=>'40px', 'height'=>'40px', 'url' => ['controller' => '#', 'action' => '#']]);?>
                </div>
            </div>
        </div>
        </div>
        <div class="container-fluid" id="footerColor">
            <div class="row">
                <div class="col-md-6 py-3">
                    <p>&copy; <b> 2023 MedicineShoppee. All Rights Reserved.</b></p>
                </div>
                <div class="col-md-6 d-flex justify-content-end py-2">
                    <?= $this->Html->image("googlePay.svg", ["class" => "img-fluid",'url' => ['action' => '#']]);?>
                    <?= $this->Html->image("paytmPay.svg", ["class" => "img-fluid",'url' => ['action' => '#']]);?>
                    <?= $this->Html->image("phonePay.svg", ["class" => "img-fluid",'url' => ['action' => '#']]);?>
                    <?= $this->Html->image("amazonPay.svg", ["class" => "img-fluid",'url' => ['action' => '#']]);?>
                    <?= $this->Html->image("rupayCard.svg", ["class" => "img-fluid",'url' => ['action' => '#']]);?>
                    <?= $this->Html->image("masterCard.svg", ["class" => "img-fluid",'url' => ['action' => '#']]);?>
                    <?= $this->Html->image("visaCard.svg", ["class" => "img-fluid",'url' => ['action' => '#']]);?>
                </div>
            </div>
        </div>
    </footer>
</div>
</body>
</html>
