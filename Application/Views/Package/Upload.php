<h1>Upload File</h1>

<div class="row">
    <div class="col-lg-2">
        <?php echo $this->Form->Start('UploadedFile', array('attributes' => array('enctype' => 'multipart/form-data')));?>
        <?php echo $this->Form->Hidden('PackageId');?>

        <div class="form-group">
            <label>File</label>
            <span class="btn btn-medium btn-primary btn-file form-control">
                Browse
                <?php echo $this->Form->File('UploadedFile');?>
            </span>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <?php echo $this->Form->Submit('Upload', array('attributes' => array('class' => 'btn btn-medium btn-default col-lg-12')));?>
            </div>
        </div>
        <?php echo $this->Form->End();?>
    </div>
</div>

<div class="row top-padding-1">
    <div class="col-lg-12">
        <a href="<?php echo '/Package/Details/' . $UploadedFile->PackageId;?>">
            <span class="btn btn-md btn-default col-lg-2">Back</span>
        </a>
    </div>
</div>