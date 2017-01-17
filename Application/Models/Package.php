<?php
class Package extends Model
{
    public $TableName = 'package';


    public function GetShortDescription($maxLength)
    {
        if(strlen($this->Description) < $maxLength){
            return $this->Description;
        }else{
            $result = substr($this->Description, 0, $maxLength) . '...';
            return $result;
        }
    }

    public function GetLatestFile()
    {
        if(count($this->UploadedFiles) == 0){
            return null;
        }

        return $this->UploadedFiles->OrderBy('CreateDate')->First();
    }
}