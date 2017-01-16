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
}