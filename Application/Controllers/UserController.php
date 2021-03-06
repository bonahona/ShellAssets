<?php
class UserController extends Controller
{
    public function Index()
    {

    }

    public function Login($ref = null)
    {
        $this->Title = 'Login';
        $this->Layout = 'Login';
        if($this->IsPost()) {
            $user = $this->Data->RawParse('User');

            $response = $this->Helpers->ShellAuth->Login($user['Username'], $user['Password']);

            if($response['Error'] != 0){
                foreach($response['ErrorList'] as $error){
                    $this->ModelValidation->AddError('User', 'Password', $error);
                }
            }

            if($this->ModelValidation->Valid()) {
                if($ref == null || $ref == ""){
                    return $this->Redirect('/');
                }else{
                    $this->Redirect($ref);
                }
            }

            $this->Set('User', $user);
            return $this->View();
        }else{

            if($this->IsLoggedIn()){
                if($ref == null || $ref == ""){
                    return $this->Redirect('/');
                }else{
                    $this->Redirect($ref);
                }
            }

            return $this->View();
        }
    }

    public function Logout()
    {
        $this->Helpers->ShellAuth->Logout();
        return $this->Redirect('/');
    }
}