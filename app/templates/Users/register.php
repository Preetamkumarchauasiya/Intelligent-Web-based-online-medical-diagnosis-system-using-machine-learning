<div class="container-fluid pt-5">
    <div class="container">
        <hr>
        <h2 class="my-2">User Registration</h2>
        <hr>
        <div class="container py-3 px-5">
        <?= $this->Form->create();?>
        <?php $templates = ['inputContainer' => '<div class="form-group p-2">{{content}}</div>',
                'input' => '<input type="{{type}}" class="form-control" name="{{name}}"{{attrs}}/>'];
            $this->Form->setTemplates($templates);
            echo $this->Form->control('fName', ['Placeholder'=>'Enter First Name','label' => 'First Name ','required'=>true]);
            echo $this->Form->control('lName', ['Placeholder'=>'Enter Last Name','label' => 'Last Name ','required'=>true]);
            echo $this->Form->control('mobile', ['Placeholder'=>'Enter Mobile Number','label' => 'Mobile Number ','required'=>true]);
            echo $this->Form->control('email', ['Placeholder'=>'Enter Email-ID','type' => 'email', 'label' => 'Email-ID ','required'=>true]);
            echo $this->Form->control('password', ['Placeholder'=>'Enter Password','type' => 'password', 'label' => 'Password ','required'=>true]);
            echo $this->Form->control('dob', ['type' => 'date','label' => 'Date Of Birth ','required'=>true]);
            echo '<div class="form-group p-2">';
            echo $this->Form->label('name', 'Your Gender ');
            $options = ['M' => 'Male', 'F' => 'Female'];
            echo $this->Form->select('gender', $options, ['class'=>'form-control','empty' => 'Choose Gender','required'=>true]);
            echo '</div>';
            echo $this->Form->control('address', ['Placeholder'=>'Enter Full Address','type' => 'textarea', 'class'=>'form-control','rows' => '3', 'cols' => '9', 'label' => 'Address ','required'=>true]);
            echo $this->Form->control('pinCode', ['Placeholder'=>'Enter Your 6 Digit PIN','label' => 'PIN Code ','required'=>true]);
            echo $this->Form->control('city', ['Placeholder'=>'Enter Your City','label' => 'City ','required'=>true]);
            echo $this->Form->control('state', ['Placeholder'=>'Enter Your State','label' => 'State ','required'=>true]);
            echo "<div class='text-center'>";
            echo $this->Form->submit('Sign Up', ['class'=>'btn btn-outline-primary', 'style'=>'background-color:#10847e; color:white;']);
            echo '<br><p>If already have a account? ';
            echo $this->Html->link('Login', ['action' => 'login']);
            echo '</div>';
            echo $this->Form->end();?>
        </div>
    </div>
</div>
