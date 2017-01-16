<h1>Package</h1>

<div class="row">
    <div class="col-lg-2">
        <a href="/Package/Create" class="btn btn-md btn-primary">Create new</a>
    </div>
</div>

<div class="row">
    <div class="col-lg-12">
        <table class="table table-responsive">
            <thead>
                <tr>
                    <th class="col-lg-2">Name</th>
                    <th class="col-lg-4">Description</th>
                    <th class="col-lg-2">Date</th>
                    <th class="col-lg-2">Uploaded by</th>
                    <th class="col-lg-2">&nbsp;</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($Packages as $package):?>
                    <tr>
                        <td><a href="<?php echo '/Package/Details/' . $package->Id;?>"><?php echo $package->Name;?></a></td>
                        <td><?php echo $package->GetShortDescription(50);?></td>
                        <td><?php echo $package->CreateDate;?></td>
                        <td><?php echo $package->UserName;?></td>
                        <td>
                            <a href="<?php echo '/Package/Edit/' . $package->Id;?>" class="btn btn-md btn-default"><span class="glyphicon glyphicon-pencil"></span></a>
                            <a href="<?php echo '/Package/Delete/' . $package->Id;?>" class="btn btn-md btn-default"><span class="glyphicon glyphicon-trash"></span></a>
                        </td>
                    </tr>
                <?php endforeach;?>
            </tbody>
        </table>
    </div>
</div>

<div class="row">
    <div class="col-lg-2">
        <a href="/">Back</a>
    </div>
</div>