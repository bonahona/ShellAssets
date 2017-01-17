<?php

class PackageController extends Controller
{
    public function BeforeAction()
    {
        $allowedPublicActions = array(
            'Index',
            'Details',
            'File'
        );

        if(!in_array($this->Action, $allowedPublicActions)){
            if(!$this->IsLoggedIn()) {
                return $this->Redirect('/Admin');
            }
        }
    }

    public function Index()
    {
        $this->Title = 'Packages';

        $packages = $this->Models->Package->All()->OrderBy('Name');

        foreach($packages as $package){
            $package->UserName = $this->Helpers->ShellAuth->GetUser($package->UploadedById)['Data'][0]['DisplayName'];
        }

        $this->Set('Packages', $packages);

        return $this->View();
    }

    public function Details($id = null)
    {
        $this->Title = 'Package Details';

        if($id == null){
            return $this->HttpNotFound();
        }

        $package = $this->Models->Package->Find($id);
        if($package == null){
            return $this->HttpNotFound();
        }

        foreach($package->UploadedFiles as $uploadedFile){
            $uploadedFile->UserName = $this->Helpers->ShellAuth->GetUser($package->UploadedById)['Data'][0]['DisplayName'];
        }

        $this->Set('Package', $package);
        return $this->View();
    }

    public function File($filename = null)
    {
        if($filename == null || $filename == ''){
            return $this->HttpNotFound();
        }

        $package = $this->Models->Package->Where(array('Name' => $filename))->First();
        if($package == null){
            return $this->HttpNotFound();
        }

        $uploadedFile = $package->GetLatestFile();

        $result = new HttpResult();
        $result->MimeType = $uploadedFile->Result;
        $result->Content = file_get_contents($uploadedFile->LocalFilePath, FILE_USE_INCLUDE_PATH);
        return $result;
    }

    public function Create()
    {
        $this->Title = 'Create Package';

        if($this->IsPost() && !$this->Data->IsEmpty()){
            $package = $this->Data->Parse('Package', $this->Models->Package);
            $package->CreateDate = date('Y-m-d H:i:s');
            $package->AccessMask = 0;
            $package->UploadedById = $this->GetCurrentUser()['Id'];

            $package->Save();

            return $this->Redirect('/Package');
        }else{
            $package = $this->Models->Package->Create();
            $this->Set('Package', $package);
            return $this->View();
        }
    }

    public function CreateTag()
    {
        if(!$this->IsPost()){
            return $this->HttpNotFound();
        }

        $tag = $this->Data->Parse('Tag', $this->Models->Tag);
        $tag->Save();

        return $this->Redirect('/Package/Details/' . $tag->PackageId);
    }

    public function RemoveTag($id = null)
    {
        if($id == null || $id == ''){
            return $this->HttpNotFound();
        }

        $tag = $this->Models->Tag->Find($id);
        if($tag == null){
            return $this->HttpNotFound();
        }

        $tag->Delete();

        return $this->Redirect('/Package/Details/' . $tag->PackageId);
    }

    public function Edit($id)
    {
        $this->Title = 'Edit package';

        if(!$this->Models->Package->Exists($id)){
            return $this->HttpNotFound();
        }

        if($this->IsPost() && !$this->Data->IsEmpty()){
            $package = $this->Data->DbParse('Package', $this->Models->Package);
            $package->Save();

            return $this->Redirect('/Package');
        }else{
            $package = $this->Models->Package->Find($id);

            $this->Set('Package', $package);
            return $this->View();
        }
    }

    public function Upload($packageId = null)
    {
        if($packageId == null || $packageId == ''){
            return $this->HttpNotFound();
        }

        $package = $this->Models->Package->Find($packageId);
        if($package == null){
            return $this->HttpNotFound();
        }

        $this->Title = 'Upload new Package file';

        if($this->IsPost() && !$this->Data->IsEmpty()){
            $uploadedFile = $this->Data->Parse('UploadedFile', $this->Models->UploadedFile);
            $uploadedFile->CreateDate = date('Y-m-d H:i:s');
            $uploadedFile->UploadedById = $this->GetCurrentUser()['Id'];

            $file = $this->Files['UploadedFile'];
            $uploadedFile->MimeType = $file->Type;
            $uploadedFile->FileExtension = $file->GetFileExtension();

            $filename = uniqid();
            $directory = '/Uploads/Files/';
            if(!is_dir($directory)){
                mkdir($directory, 777, true);
            }

            $completePath = $directory . $filename . '.' . $uploadedFile->FileExtension;
            $file->Save($completePath);
            $uploadedFile->LocalFilePath = $completePath;

            $uploadedFile->Save();

            return $this->Redirect('/Package/Details/' . $packageId);
        }else {
            $uploadedFile = $this->Models->UploadedFile->Create(array('PackageId' => $packageId));
            $this->Set('UploadedFile', $uploadedFile);
            return $this->View();
        }
    }
}