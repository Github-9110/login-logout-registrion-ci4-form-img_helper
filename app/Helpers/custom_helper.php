<?php
use App\Models\UsersModel;
 function isLogged($email,$password){
         $model = new UsersModel();
         $data = $model->where('email',$email)->where('password',$password)->find()[0];
         
         if(isset($data)){
            return [
                'id' => $data['id'],
                'email' => $data['email'],
                'is_loggedin' => true
            ];
         }
}

?>