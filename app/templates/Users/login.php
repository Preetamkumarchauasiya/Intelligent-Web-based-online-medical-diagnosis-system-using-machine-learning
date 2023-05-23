<div class="container-fluid pt-5">
    <div class="container">
        <hr>
        <h2 class="my-2">User Login</h2>
        <hr>
        <div class="container py-3 px-5">
        <?php 
        $templates = [
            'inputContainer' => '<div class="form-group p-2">{{content}}</div>',
            'input' => '<input type="{{type}}" class="form-control" name="{{name}}"{{attrs}}/>'
        ];
        $this->Form->setTemplates($templates);
        echo $this->Form->create();
        echo '<fieldset>';
        echo $this->Form->control('email', ['Placeholder'=>'Enter E-mail ID','type' => 'email', 'label' => 'E-mail ID ','required'=>true]);
        echo $this->Form->control('password', ['Placeholder'=>'Enter Password','type' => 'password', 'label' => 'Password: ','required'=>true]);
        echo '</fieldset>';
        echo "<div class='text-center'>";
        echo $this->Form->submit('Log In', ['class'=>'btn btn-outline-primary','style'=>'background-color:#10847e; color:white;']);
        echo $this->Form->end();
        echo "<br><p>Don't have an account? ";
        echo $this->Html->link('<b>Sign Up</b>', ['controller' => 'Users','action' => 'register'],['escape'=>false]);
        echo '</div>';
        ?>
        </div>
    </div>
</div>