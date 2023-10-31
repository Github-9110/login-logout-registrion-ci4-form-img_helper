<?php
namespace App\Controllers;
use CodeIgniter\Controller;
use App\Models\UsersModel;
class PdfController extends BaseController
{

    function pfdload(){
        $model = new usersModel();
        $data['records'] = $model->findAll();

        $dompdf = new \Dompdf\Dompdf();

        $dompdf->loadHtml(view('welcome_message',$data));
        $dompdf->setPaper('A4','landscape'); 
        $dompdf->render();
        $dompdf->stream();
    }
}