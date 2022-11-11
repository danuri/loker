<?php

namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;
use App\Models\AppsModel;

class Files extends ResourceController
{
    protected $modelName = 'App\Models\AppsModel';
    protected $format    = 'json';

    public function index()
    {
      $data = array(
                  'status' => 'success',
                );
      return $this->respond($data);
    }

    public function create()
    {
      $request = \Config\Services::request();

      if ($request->hasHeader('loker-key')) {
        // $apps = new AppsModel;
        // $apps->where(['key'=>''])

          if($request->header('loker-key') == 'Loker-Key: ropegropeg'){

            $validationRule = [
                  'attachment' => [
                      'label' => 'Attachment',
                      'rules' => 'uploaded[attachment]'
                  ],
              ];

            $file = $this->request->getFile('attachment');
            $name = $this->request->getVar('filename');
            $file->move('attachment/sso', $name, true);

            $data = array(
                        'status' => 'success',
                      );
            return $this->respond($data);
          }else{
            echo 'Salah';
          }
      }else{
        echo 'Gak ada';
      }
    }

}
