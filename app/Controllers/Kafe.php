<?php

namespace App\Controllers;

use App\Models\ModelGeojson;
use App\Models\ModelKv;
use App\Models\ModelSetting;
use App\Models\ModelFoto;

class Kafe extends BaseController
{
    protected $ModelGeojson;
    protected $ModelKv;
    protected $ModelSetting;
    protected $ModelFoto;
    public function __construct()
    {
        $this->FGeojson = new ModelGeojson();
        $this->kafe = new ModelKv();
        $this->setting = new ModelSetting();
        $this->fotoKafe = new ModelFoto();
    }

    public function index()
    {
        $data = [
            'title' => 'Beranda',
            'tampilData' => $this->setting->tampilData()->getResult(),
            'tampilKafe' => $this->kafe->callKafe()->getResult(),
            'randomFour' => $this->kafe->randomFour()->getResult(),
        ];
        // echo '<pre>';
        // print_r($data['tampilKafe']);
        // die;
        return view('page/indexHome', $data);
    }

    public function detail($id_kafe)
    {
        $todayDate = date("m/d");

        $data = [
            'title' => 'Detail Kafe',
            'tampilKafe' => $this->kafe->callKafe($id_kafe)->getRow(),
        ];
        // echo '<pre>';
        // print_r($data['tampilKafe']);
        // die;
        return view('page/kafeDetail', $data);
    }

    public function sebaran()
    {
        $data = [
            'title' => 'Beranda',
            'tampilData' => $this->setting->tampilData()->getResult(),
            'tampilKafe' => $this->kafe->callKafe()->getResult(),
        ];
        return view('page/persebaran', $data);
    }

    public function cari()
    {
        $data = [
            'title' => 'Cari',
            'tampilData' => $this->setting->tampilData()->getResult(),
            'tampilKafe' => $this->kafe->callKafe()->getResult(),
        ];
        return view('page/cariKafe', $data);
    }

    public function search()
    {
        // Menerima keyword data yang akan dihapus dari permintaan POST
        $keyword = $this->request->getGet('keyword');

        $data = [
            'tampilData' => $this->setting->tampilData()->getResult(),
            'tampilKafe' => $this->kafe->cariKafe($keyword),
        ];
        return view('serverSide/seacrhMap', $data);
    }

    public function near()
    {
        $data = [
            'title' => 'Near',
            'tampilData' => $this->setting->tampilData()->getResult(),
            'tampilKafe' => $this->kafe->callKafe()->getResult(),
        ];
        // echo '<pre>';
        // print_r($data['tampilKafe']);
        // die;
        return view('page/nearby', $data);
    }

    public function noaccess()
    {
        $data = [
            'title' => 'No Access',
            'pesan' => 'Anda Tidak Mempunyai Hak Akses'
        ];
        return view('page/noAccess', $data);
    }

    public function contact()
    {
        $data = [
            'title' => 'CONTACT',
        ];
        return view('page/contact', $data);
    }

    public function about()
    {
        $data = [
            'title' => 'ABOUT',
        ];
        return view('page/about', $data);
    }

    public function pdf()
    {
        $data = [
            'title' => 'Beranda',
            'tampilGeojson' => $this->FGeojson->callGeojson()->getResult(),
            'tampilData' => $this->setting->tampilData()->getResult(),
            'tampilKafe' => $this->kafe->callKafe()->getResult(),
        ];
        return view('page/peta', $data);
    }

    public function map()
    {
        $data = [
            'title' => 'Map',
            'tampilGeojson' => $this->FGeojson->callGeojson()->getResult(),
            'tampilData' => $this->setting->tampilData()->getResult(),
            'tampilKafe' => $this->kafe->callKafe()->getResult(),
        ];
        return view('page/map', $data);
    }
}
