<h1>Package <?php echo $Package->Name;?></h1>

<div class="row">
    <div class="col-lg-12">
        <?php echo $Package->Description;?>
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
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                <?php endforeach;?>
            </tbody>
        </table>
    </div>
</div>