<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ModelSetting;
use App\Models\ModelAdministrasi;
use App\Models\ModelGeojson;
use App\Models\ModelKv;
use App\Models\ModelFoto;
use App\Models\ModelUser;
use Faker\Extension\Helper;

class Api extends BaseController
{
    protected $ModelSetting;
    protected $ModelUser;
    protected $ModelAdministrasi;
    protected $ModelGeojson;
    protected $ModelKv;
    protected $ModelFoto;
    public function __construct()
    {
        $this->setting = new ModelSetting();
        $this->user = new ModelUser();
        $this->Administrasi = new ModelAdministrasi();
        $this->FGeojson = new ModelGeojson();
        $this->kafe = new ModelKv();
        $this->fotoKafe = new ModelFoto();
    }

    public function index()
    {
        $data = [

            'tampilKafe' => $this->kafe->callKafe(),
        ];
        echo '<pre>';
        print_r($data['tampilKafe']);
        die;
    }
}
