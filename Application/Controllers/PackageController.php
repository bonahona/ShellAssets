<?php

class PackageController extends Controller
{
    public function Index()
    {
        $this->Title = 'Packages';

        $packages = $this->Models->Package->All()->OrderBy('Name');
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

        $this->Set('Package', $package);
        return $this->View();
    }

    public function Create()
    {
        $this->Title = 'Create Package';

        if($this->IsPost() && !$this->Data->IsEmpty()){
            $package = $this->Data->Parse('Package', $this->Models->Package);
            $package->Save();

            return $this->Redirect('/Package');
        }else{
            $package = $this->Models->Package->Create();
            $this->Set('Package', $package);
            return $this->View();
        }
    }
}