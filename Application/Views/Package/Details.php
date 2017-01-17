<h1>Package <?php echo $Package->Name;?></h1>
<h2>
    <a href="<?php echo '/Package/File/' . $Package->Name;?>"></span>Download latest <span class="glyphicon glyphicon-download-alt"></a>
</h2>
<div class="row">
    <div class="col-lg-12">
        <?php echo $Package->Description;?>
    </div>
</div>

<div class="row">
    <div class="col-lg-6">
        <h3>Tags</h3>
        <?php if($this->IsLoggedIn()):?>
            <div class="row">
                <?php echo $this->Form->Start('Tag', array('location' => '/Package/CreateTag'));?>
                <?php echo $this->Form->Hidden('PackageId', array('value' => $Package->Id));?>
                <div class="form-group">
                    <div class="col-lg-6">
                        <?php echo $this->Form->Input('Name', array('attributes' => array('class' => 'form-control', 'placeholder' => 'Enter tag name')));?>
                    </div>
                    <div class="col-lg-1">
                        <?php echo $this->Form->Submit('Add', array('attributes' => array('class' => 'btn btn-md btn-primary')));?>
                    </div>
                    <?php echo $this->Form->End();?>
                </div>
            </div>
        <?php endif;?>
        <div class="row top-padding-1">
            <div class="col-lg-12">
                <?php foreach($Package->Tags as $tag):?>
                    <span class="label label-primary label-md tag"><?php echo $tag->Name;?>
                        <?php if($this->IsLoggedIn()):?>
                            <a href="<?php echo '/Package/RemoveTag/' . $tag->Id;?>">
                                <i class="remove glyphicon glyphicon-remove glyphicon-white"></i>
                            </a>
                        <?php endif;?>
                    </span>
                <?php endforeach;?>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-lg-8">
        <h3>Earlier Versions</h3>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th class="col-lg-5">Uploaded date</th>
                    <th class="col-lg-1">&nbsp;</th>
                    <th class="col-lg-6">Uploaded by</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($Package->UploadedFiles as $uploadedFile):?>
                    <tr>
                        <td><?php echo $uploadedFile->CreateDate;?></td>
                        <td>&nbsp;</td>
                        <td><?php echo $uploadedFile->UserName;?></td>
                    </tr>
                <?php endforeach;?>
            </tbody>
        </table>
    </div>
</div>

<?php if($this->IsLoggedIn()):?>
    <div class="row">
        <div class="col-lg-8">
            <a href="<?php echo '/Package/Upload/' . $Package->Id;?>">
                <span class="btn btn-md btn-primary col-lg-2">Upload new file</span>
            </a>
        </div>
    </div>
<?php endif;?>
<?php if($this->IsLoggedIn()):?>
    <div class="row top-padding-1">
        <div class="col-lg-8">
            <a href="<?php echo '/Package/Edit/' . $Package->Id;?>">
                <span class="btn btn-md btn-default col-lg-2">Edit</span>
            </a>
        </div>
    </div>
<?php endif;?>
<div class="row top-padding-1">
    <div class="col-lg-8">
        <a href="/Package/">
            <span class="btn btn-md btn-default col-lg-2">Back</span>
        </a>
    </div>
</div>
