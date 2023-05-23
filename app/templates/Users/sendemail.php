<div class="container-fluid pt-5">
    <div class="container">
        <hr>
        <h2 class="my-2">User E-mail ID Verification</h2>
        <hr>
        <div class="container py-3 px-5">
        <?php 
        $templates = [
            'inputContainer' => '<div class="form-group p-2">{{content}}</div>',
            'input' => '<input type="{{type}}" class="form-control" name="{{name}}"{{attrs}}/>'
        ];
        $this->Form->setTemplates($templates);
        echo $this->Form->create(null, ['enctype' => 'multipart/form-data', 'id'=>'myForm']);
        //echo $this->Form->create();
        echo '<fieldset>';
        echo $this->Form->control('email', ['id'=>'email','Placeholder'=>'Your E-mail ID','type' => 'email', 'label' => 'E-mail ID ','required'=>true]);
        //echo $this->Form->control('password', ['Placeholder'=>'Enter OTP','type' => 'password', 'label' => 'OTP ','required'=>true]);
        echo '</fieldset>';
        echo "<div class='text-center'>";
        echo $this->Form->button('Send OTP', ['type' => 'button', 'class'=>'btn btn-outline-primary','style'=>'background-color:#10847e; color:white;']);
        echo "</div>";
        echo $this->Form->end();
        ?>
        </div>
    </div>
</div>

<script>
    var csrfToken = $('meta[name="csrfToken"]').attr('content');
  $(document).ready(function(){
    $("#email").click(function(){
      $("#email").blur(function(){
        var email = document.getElementById("email").value;
        $.ajax({
           type: "POST",
           url: "/users/sendotp",
           data: {email:email},
           success: function(data){
                result = jQuery.parseJSON(data);
                if(result.status == 'ok'){
                 document.getElementById("myForm").submit();
                }else{
                  alert('Email already exists');
                }
           
         }
       });
       return false;
     });
   });
 });
</script>
<script type="text/javascript">
    // function sendOTP(){
    //     var email = $('#email').val();
    //     $.ajax({
    //         url:"<?= $this->Url->build(['action' => 'sendotp']) ?>",
    //         type:'POST',
    //         data:{'email':email},
    //         success:function(result){

    //         }
    //     });
    // }
</script>