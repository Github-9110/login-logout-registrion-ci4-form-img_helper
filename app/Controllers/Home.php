<?php

namespace App\Controllers;
use App\Models\UsersModel;

class Home extends BaseController
{
    public function index()
    {
        $model = new usersModel();
        $data['records'] = $model->where('is_deleted',0)->findAll();
        return view('welcome_message',$data);
        
    }

    public function form(){
        $session = session();
        if (null ===$session->get('is_loggedin')) { 
            
            return view('form');
            }
         if (null !==$session->get('is_loggedin')) { 
            
                return redirect()->to(base_url('userdata'));
          }
    }

    public function savedata(){
        $session = session();
        $rules = [
            'name' => 'required|max_length[30]',
            'email'    => 'required|max_length[254]|valid_email',
            'phone' => 'required|numeric|max_length[10]',
            'password' =>'required',
            'file' => [
                'uploaded[file]',
                'mime_in[file,image/jpg,image/jpeg,image/png,image/gif]',
                'max_size[file,4096]',
            ]
        ];

        if(!$this->validate($rules)){
            $data['validation'] = $this->validator;
            return view('form', $data);
        }else{ 
         $email = $this->request->getPost('email');
        $model = new usersModel();
        $data = $model->where('is_deleted',0)->where('email',$email)->findAll();
        if(!empty($data)){
            session()->setFlashdata('exist','Email already exist.............');
            return redirect()->to(base_url('/form'));

        }else{
           
            $name = $this->request->getPost('name');
            $phone = $this->request->getPost('phone');
            $password = $this->request->getPost('password');
            $file = $this->request->getFile('file');
            $fname = $file->getName();
        
            $file->move("../public/assets/uploads");
            chmod("../public/assets/uploads/".$fname,0777);
    
            $data = array(
                'name' => $name,
                'email' => $email,
                'mobile' => $phone,
                'password' => $password,
                'img_name' => $fname
            );
            $model = new UsersModel();
            $save = $model->insert($data);
    
            if(isset($save)){
    
                session()->setFlashdata('added','Record added successfully. Please Login.....');
             return redirect()->to(base_url('/form'));
            }
        }

    
    }
       
    }


    public function Edit($id=null){
         $model = new usersModel();

         $data['data'] = $model->where('id',$id)->where('is_deleted',0)->findAll()[0];
        return view('editform',$data);
    }

    public function updatedata($id=null){
        $session = session();
                $model = new usersModel();
                
                $rules = [
                    'name' => 'required|max_length[30]',
                    'email'    => 'required|max_length[254]|valid_email',
                    'phone' => 'required|numeric|max_length[10]',
                    'password' => 'required',
                    'file' => [
                        'uploaded[file]',
                        'mime_in[file,image/jpg,image/jpeg,image/png,image/gif]',
                        'max_size[file,4096]',
                    ]
                ];
                
                if(!$this->validate($rules)){
                    $data['validation'] = $this->validator;
                    $model = new usersModel();
                    $data['data'] = $model->where('id',$id)->where('is_deleted',0)->findAll()[0];
                    return view('editform', $data);
                }else{

                $model = new usersModel();
                $email = $this->request->getPost('email');
                $data = $model->where('id !=',$id)->where('is_deleted',0)->where('email',$email)->findAll()[0];
                
                if(!empty($data)){
                    session()->setFlashdata('exist','Email already exist.............');
                    return redirect()->to(base_url('/edit/'.$id));
                }else{
                    $name = $this->request->getPost('name');
                    $phone = $this->request->getPost('phone');
                    $password = $this->request->getPost('password');
                    $file = $this->request->getFile('file');
                    $filename = $file->getName($file);
    
                    $file->move("../public/assets/uploads");
                    chmod('../public/assets/uploads/'.$filename,0777);
                     $data = array(
                        'id' => $id,
                        'name' => $name,
                        'email' => $email,
                        'mobile' => $phone,
                        'password' => $password,
                        'img_name' => $filename
                        
                     );
                     
                     $resonse = $model->where('is_deleted',0)->update($id,$data);
                     
                     if($resonse){
                         session()->setFlashdata('update','Record updated successfully..!');
                         return redirect()->to(base_url('edit/'.$id));
                     }else{
                        session()->setFlashdata('missing','Record is Missing..!');
                         return redirect()->to(base_url('edit/'.$id));
                     }
                }
              
                }
                 
    }

   public function remove($id=null){

           $data = array(
            'id' => $id,
            'is_deleted' => 1
           );

           $model = new usersModel();
           $resonse =  $model->where('is_deleted',0)->update($id,$data);

           if($resonse){
            session()->setFlashdata('deleted','Record Deleted successfully..!');
            return redirect()->to(base_url('/'));
           }
   }







}
