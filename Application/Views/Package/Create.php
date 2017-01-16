<h1>Create Package</h1>

<div class="row">
    <div class="col-lg-4">
        <?php echo $this->Form->Start('Package');?>
        <div class="form-group">
            <label>Package name</label>
            <?php echo $this->Form->Input('Name', array('attributes' => array('class' => 'form-control')));?>
        </div>
        <div class="form-group">
            <label>Short description</label>
            <?php echo $this->Form->Area('Description', array('attributes' => array('class' => 'form-control')));?>
        </div>
        <?php echo $this->Form->Submit('Create', array('attributes' => array('class' => 'btn btn-md btn-primary')));?>
        <?php echo $this->Form->End();?>
    </div>
</div>

<div class="row">
    <div class="col-lg-4">
        <a href="/Package/">Back</a>
    </div>
</div>