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
    font-weight: 800;
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
    .label-text {
        cursor: pointer;
    }
    input.larger { 
        width: 20px;
        height: 20px;
    }

</style>
<div class="container-fluid pt-5" id="backgraund">
    <div class="intro-page"> 
        <div class="flex-p">
            <div class="content-p">
                <h2> Terms & Policy </h2>
                <p>Before using the checkup, please read Terms of Service. Remember that : </p>
                <ul> 
                    <li>Checkup is not a diagnosis. Checkup is for informational purposes and is not a qualified medical opinion.</li>
                    <li>Do not use in emergencies. In case of health emergency, call your local emergency number immediately.</li>
                    <li>Your data is safe. Information that you provide is anonymous and not shared with anyone.</li>
                </ul>
                <label class="label-text">
                    <input type="checkbox" id="myCheck" class="larger margin-right-20"> I read and accept Terms of Service and Privacy Policy. 
                </label>

            </div>  
            <div class="image-p">
                <?= $this->Html->image("Terms & Policy.png", ["class" => "img-fluid", 'width' => '100%', 'height' => '100%']);?>
            </div>
        </div>
        <div class="row">
            <div class="col-6 d-flex justify-content-end" id="button">
                <?= $this->Html->link('<<', '/diseases/home', ['class'=>' btn btn-success']); ?>
            </div>
            <div class="col-6 d-flex justify-content-start" id="button">
                <?= $this->Html->link('NEXT','http://localhost/MedicineShoppee/DiseasePrediction/teerms.php', ['target' => '_blank', '_full' => true, 'class'=>' btn btn-success','id'=>'text','style'=>'display:none']) ?>
                <?php // $this->Html->link('NEXT','/diseases/teerms', ['class'=>' btn btn-success','id'=>'text','style'=>'display:none']); ?>
            </div>
            
        </div>
    </div>
</div>

<script>
    $(function($) {
        $("#myCheck").on('click', function(){
            $("#text").slideToggle();
        });
    });
        
    function myFunction() {
        var checkBox = document.getElementById("myCheck");
        var text = document.getElementById("text");
        if (checkBox.checked == true){
            text.style.display = "block";
        } else {
            text.style.display = "none";
        }
    }
</script>