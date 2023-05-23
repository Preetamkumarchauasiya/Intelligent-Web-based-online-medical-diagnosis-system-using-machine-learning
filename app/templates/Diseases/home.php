<style type="text/css">
    body{
        background-color:white;
        width:auto;
        height:auto;
        /* margin:30 auto; */
    }
    .intro-page{
    margin-left: 100px;
    margin-right: 150px;
    margin-top:0px;
    }
    .intro-page h2{
    font-size: 32px;
    font-weight: 900;
    color: #10847e;
    }
    .intro-page p
    {
    color: #071c55;
    font-size: 19px;
    font-weight: 500;
    }
    .flex-p {
    display: flex;
    flex-wrap: wrap;
    align-items: center;
    }
    .flex-p .image-p{
        flex-basis: 40%;
        max-width: 40%;
                }
    .flex-p .content-p {
        flex-basis: 60%;
        max-width: 60%;
    }
    #button a{
        background-color:#10847e;
    }

</style>
<div class="container-fluid pt-5" id="backgraund">
    <div class="intro-page"> 
        <div class="flex-p">
            <div class="content-p">
                <h2>Hi There!!!</h2>
                <p>Welcome to Medicine Shoppee, your one-stop solution for detecting diseases based on symptoms!<br><br>
                Feeling under the weather? Not sure what's ailing you? Don't worry, we've got your back! With our state-of-the-art symptom detection system, you can get a quick and suggested diagnosis of your health issues in no time.<br><br>
                No need to wait in long queues or spend hours googling your symptoms anymore! Our easy-to-use platform allows you to simply enter your symptoms and get a list of possible diseases that match them.<br><br>
                And the best part? You can do it all from the comfort of your own home! So, whether you're dealing with a common cold or a more serious ailment, Medicine Shoppee has got you covered.<br><br> 
                So, what are you waiting for? Let's get started!</p>
            </div>  
            <div class="image-p">
                <?= $this->Html->image("Diabetes-rafiki.png", ["class" => "img-fluid", 'width' => '100%', 'height' => '100%']);?>
            </div>
        </div>
        <div class="row">
            <div class="col-6 d-flex justify-content-end" id="button">
                <?php if($this->Identity->get('role') == "a"){ 
                    echo $this->Html->link('Admin', '/admin/users/dashboard', ['class'=>' btn btn-success']); 
                    }?>
            </div>
            <div class="col-6 d-flex justify-content-start" id="button">
                <?= $this->Html->link('Start Checkups', '/diseases/policy', ['class'=>' btn btn-success']); ?>
            </div>
            
        </div>
    </div>
</div>