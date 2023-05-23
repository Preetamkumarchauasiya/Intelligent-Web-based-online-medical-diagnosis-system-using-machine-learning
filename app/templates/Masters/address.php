<div class="container-fluid pt-5">
    <div class="container">
        <hr>
        <h2 class="heading my-2">Add New Address</h2>
        <hr>
        <div class="px-5">
    <?= $this->Form->create($master);?>
    <?php
        $inputs = [
            'inputContainer' => '<div class="form-group m-0">{{content}}</div>',
            'input' => '<input type="{{type}}" class="form-control" name="{{name}}"{{attrs}}/>'
        ];
        $this->Form->setTemplates($inputs); ?>
        <div class="row py-2">
            <div class="col-sm-3">
                <label class="m-0 py-1"><b>Full Name: </b></label>
            </div>
            <div class="col-sm-9">
                <?= $this->Form->control('fullName', ['Placeholder'=>'Enter Your Full Name','label' => false,'required'=>true]);?>
            </div>
        </div>
        <div class="row py-2">
            <div class="col-md-6">
            <div class="row">
                <div class="col-sm-6">
                    <label class="m-0 py-1"><b>Mobile: </b></label>
                </div>
                <div class="col-sm-6">
                    <?= $this->Form->control('mobile', ['Placeholder'=>'Enter Your Mobile Number','label' => false,'required'=>true]);?>
                </div>
            </div>
            </div>
            <div class="col-md-6">
            <div class="row">
                <div class="col-sm-6">
                    <label class="m-0 py-1"><b>PIN: </b></label>
                </div>
                <div class="col-sm-6">
                    <?= $this->Form->control('pin', ['Placeholder'=>'Enter 6 Digit PIN','label' => false,'required'=>true]);?>
                </div>
            </div>
            </div>
        </div>
        <div class="row py-2">
            <div class="col-sm-3">
                <label class="m-0 py-1"><b>Address: </b></label>
            </div>
            <div class="col-sm-9">
                <?= $this->Form->control('address', ['Placeholder'=>'Enter Your Address','label' => false,'required'=>true]);?>
            </div>
        </div>
        <div class="row py-2">
            <div class="col-md-6">
            <div class="row">
                <div class="col-sm-6">
                    <label class="m-0 py-1"><b>City: </b></label>
                </div>
                <div class="col-sm-6">
                    <?= $this->Form->control('city', ['Placeholder'=>'Enter Your City','label' => false,'required'=>true]);?>
                </div>
            </div>
            </div>
            <div class="col-md-6">
            <div class="row">
                <div class="col-sm-6">
                    <label class="m-0 py-1"><b>State: </b></label>
                </div>
                <div class="col-sm-6">
                    <?= $this->Form->control('state', ['Placeholder'=>'Enter Your State','label' => false,'required'=>true]);?>
                </div>
            </div>
            </div>
        </div>
        <div class="row py-2">
            <div class="col-sm-3">
                <label class="m-0 py-1"><b>Delivery Type: </b></label>
            </div>
            <div class="col-sm-9">
                <?php $options = ['' => 'Choose Us','Home' => 'Home', 'Office' => 'Office'];
                    echo $this->Form->select('type', $options, ['class'=>'form-control','empty' => true,'required'=>true]);?>
            </div>
        </div>
        <?php
        echo "<div class='text-center'>";
        echo $this->Form->submit('Submit', ['class'=>'btn btn-outline-primary']);
        echo '</div>';
        echo $this->Form->end();
    ?>
        </div>
    </div>
</div>
