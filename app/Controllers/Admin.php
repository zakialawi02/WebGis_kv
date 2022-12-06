<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ModelSetting;
use App\Models\ModelGeojson;
use App\Models\ModelKv;

class Admin extends BaseController
{
    protected $ModelSetting;
    protected $ModelGeojson;
    protected $ModelKv;
    public function __construct()
    {
        $this->setting = new ModelSetting();
        $this->FGeojson = new ModelGeojson();
        $this->kafe = new ModelKv();
    }
    public function index()
    {
        $data = [
            'title' => 'JUDUL',
        ];

        return view('admin/tempp', $data);
    }


    public function pending()
    {
        $data = [
            'title' => 'PENDING LIST',
            'tampilKafe' => $this->kafe->callPendingData()->getResult(),
        ];


        return view('admin/pendingList', $data);
    }


    // SETTING MAP VIEW  ===================================================================================


    public function Setting()
    {
        $data = [
            'title' => 'Setting Map View',
            'tampilData' => $this->setting->tampilData()->getResult(),
            'tampilGeojson' => $this->FGeojson->callGeojson()->getResult(),
        ];

        return view('admin/settingMapView', $data);
    }

    public function UpdateSetting()
    {
        // dd($this->request->getVar());
        $data = [
            'id' => 1,
            'nama_web' => $this->request->getPost('nama_web'),
            'coordinat_wilayah' => $this->request->getPost('coordinat_wilayah'),
            'zoom_view' => $this->request->getPost('zoom_view'),
        ];
        $this->setting->updateData($data);
        session()->setFlashdata('alert', 'Data Berhasil disimpan.');
        return $this->response->redirect(site_url('admin/setting'));
    }




    public function table()
    {
        $data = [
            'title' => 'TABLE',
        ];

        return view('admin/table', $data);
    }


    // GEOJSONDATA =======================================================================================


    public function geojson()
    {
        $data = [
            'title' => 'DATA GEOJSON',
            'tampilData' => $this->setting->tampilData()->getResult(),
            'tampilGeojson' => $this->FGeojson->callGeojson()->getResult(),
            'updateGeojson' => $this->FGeojson->callGeojson()->getRow(),
        ];

        return view('admin/geojsonData', $data);
    }

    public function editGeojson($id)
    {
        $data = [
            'title' => 'DATA GEOJSON',
            'updateGeojson' => $this->FGeojson->callGeojson($id)->getRow(),
        ];

        return view('admin/updateGeojson', $data);
    }

    public function tambahGeojson()
    {
        $data = [
            'title' => 'DATA GEOJSON',
        ];

        return view('admin/tambahGeojson', $data);
    }

    // insert data
    public function tambah_Geojson()
    {
        // dd($this->request->getVar());

        // ambil file
        $fileGeojson = $this->request->getFile('Fjson');
        //generate random file name
        $randomName = $fileGeojson->getRandomName();
        $explode = explode('.', $randomName);
        array_pop($explode);
        $randomName = implode('.', $explode);
        $randomName = $randomName . ".geo" . $fileGeojson->getExtension();
        // pindah file to hosting
        $fileGeojson->move(ROOTPATH . 'public/geojson/', $randomName);


        $data = [
            'kode_wilayah' => $this->request->getVar('kodeG'),
            'nama_wilayah'  => $this->request->getVar('Nkec'),
            'geojson'  => $randomName,
            'warna'  => $this->request->getVar('Kwarna'),
        ];

        $addGeojson = $this->FGeojson->addGeojson($data);

        if ($addGeojson) {
            session()->setFlashdata('alert', 'Data Anda Berhasil Ditambahkan.');
            return $this->response->redirect(site_url('/admin/data/geojson'));
        }
    }

    // update data
    public function update_Geojson()
    {

        // dd($this->request->getVar());

        // ambil file name
        $fileGeojson = $this->request->getFile('Fjson');
        // cek file input
        if ($fileGeojson->getError() !== 4) {
            // Jika ada file baru

            // hapus file lama
            $file = $this->request->getVar('jsonLama');
            unlink("geojson/" . $file);
            // ambil file name
            $fileGeojson = $this->request->getFile('Fjson');
            //generate random file name
            $fileGeojsonBaru = $fileGeojson->getRandomName();
            $explode = explode('.', $fileGeojsonBaru);
            array_pop($explode);
            $fileGeojsonBaru = implode('.', $explode);
            $fileGeojsonBaru = $fileGeojsonBaru . ".geojson";
            // pindah file to hosting
            $fileGeojson->move('geojson', $fileGeojsonBaru);
        } else {
            //    Jika tidak ada file baru
            $fileGeojsonBaru = $this->request->getPost('jsonLama');
        }

        $id = $this->request->getVar('id');
        $data = [
            'kode_wilayah' => $this->request->getVar('kodeG'),
            'nama_wilayah'  => $this->request->getVar('Nkec'),
            'warna'  => $this->request->getVar('Kwarna'),
            'geojson'  => $fileGeojsonBaru,
        ];

        $this->FGeojson->updateGeojson($data, $id);
        session()->setFlashdata('alert', 'Data Berhasil Diubah.');
        return $this->response->redirect(site_url('/admin/data/geojson'));
    }

    // delete data
    public function delete_Geojson($id)
    {

        $data = $this->FGeojson->callGeojson($id)->getRow();
        $file = $data->geojson;
        unlink("geojson/" . $file);

        $this->FGeojson->delete(['id' => $id]);
        session()->setFlashdata('alert', "Data Berhasil dihapus.");
        return $this->response->redirect(site_url('/admin/data/geojson'));
    }



    //  FASILITAS KV  ====================================================================================

    public function fasilitas()
    {
        $data = [
            'title' => 'DATA KV',
            'tampilData' => $this->setting->tampilData()->getResult(),
        ];

        return view('admin/fasilitasList', $data);
    }




    //  KV  ====================================================================================

    public function Kafe()
    {
        $data = [
            'title' => 'DATA KV',
            'tampilData' => $this->setting->tampilData()->getResult(),
            'tampilGeojson' => $this->FGeojson->callGeojson()->getResult(),
            'updateGeojson' => $this->FGeojson->callGeojson()->getRow(),
            'tampilKafe' => $this->kafe->callKafe()->getResult(),
        ];

        return view('admin/KafeData', $data);
    }

    public function tambahKafe()
    {

        $data = [
            'title' => 'DATA KV',
            'tampilData' => $this->setting->tampilData()->getResult(),
            'tampilGeojson' => $this->FGeojson->callGeojson()->getResult(),
            'tampilKafe' => $this->kafe->callKafe()->getResult(),
            'provinsi' => $this->kafe->allProvinsi(),
        ];

        return view('admin/tambahKafe', $data);
    }

    public function editKafe($id_kafe)
    {
        $data = [
            'title' => 'DATA KV',
            'tampilData' => $this->setting->tampilData()->getResult(), //ambil settingan mapView
            'tampilGeojson' => $this->FGeojson->callGeojson()->getResult(), //ambil data geojson
            'tampilKafe' => $this->kafe->callKafe($id_kafe)->getRow(),
            'provinsi' => $this->kafe->allProvinsi(),
        ];

        return view('admin/updateKafe', $data);
    }

    // insert data
    public function tambah_Kafe()
    {
        // dd($this->request->getVar());

        // ambil file
        $fileFotoSekolah = $this->request->getFile('foto_kafe');
        //generate random file name
        $randomName = $fileFotoSekolah->getRandomName();
        // pindah file to hosting
        $fileFotoSekolah->move(ROOTPATH . 'public/img/kafe/', $randomName);

        $user = user()->username;
        $data = [
            'user' => $user,
            'stat_appv' => $this->request->getVar('stat_appv'),
            'nama_kafe' => $this->request->getVar('nama_kafe'),
            'alamat_kafe'  => $this->request->getVar('alamat_kafe'),
            'coordinate'  => $this->request->getVar('coordinate'),
            'id_provinsi'  => $this->request->getVar('id_provinsi'),
            'id_kabupaten'  => $this->request->getVar('id_kabupaten'),
            'id_kecamatan'  => $this->request->getVar('id_kecamatan'),
            'id_kelurahan'  => $this->request->getVar('id_kelurahan'),
            'foto_kafe'  => $randomName,
            'created_at' => date('Y-m-d H:i:s'),
        ];

        $addKafe = $this->kafe->addKafe($data);

        if ($addKafe) {
            session()->setFlashdata('alert', 'Data Anda Berhasil Ditambahkan.');
            return $this->response->redirect(site_url('/admin/data/kafe'));
        }
    }

    // update data
    public function update_Kafe()
    {
        // dd($this->request->getVar());

        // ambil file
        $fileFotoSekolah = $this->request->getFile('foto_kafe');
        //generate random file name
        $randomName = $fileFotoSekolah->getRandomName();
        // pindah file to hosting
        $fileFotoSekolah->move(ROOTPATH . 'public/img/kafe/', $randomName);

        $id = $this->request->getVar('id');
        $data = [
            'nama_kafe' => $this->request->getVar('nama_kafe'),
            'alamat_kafe'  => $this->request->getVar('alamat_kafe'),
            'coordinate'  => $this->request->getVar('coordinate'),
            // 'id_provinsi'  => $this->request->getVar('id_provinsi'),
            // 'id_kabupaten'  => $this->request->getVar('id_kabupaten'),
            // 'id_kecamatan'  => $this->request->getVar('id_kecamatan'),
            // 'id_kelurahan'  => $this->request->getVar('id_kelurahan'),
            // 'foto_kafe'  => $randomName,
            'created_at' => date('Y-m-d H:i:s'),
        ];

        $addKafe = $this->kafe->addKafe($data, $id);

        if ($addKafe) {
            session()->setFlashdata('alert', 'Data Anda Berhasil Ditambahkan.');
            return $this->response->redirect(site_url('/admin/data/kafe'));
        }
    }


    // approve data
    public function approveKafe($id_kafe)
    {
        // dd($this->request->getVar());

        $data = [
            'stat_appv' => '1',
        ];

        $this->kafe->chck_appv($data, $id_kafe);
        session()->setFlashdata('alert', 'Data Approved.');
        return $this->response->redirect(site_url('/admin/pending'));
    }

    public function rejectKafe($id_kafe)
    {

        $data = $this->kafe->callKafe($id_kafe)->getRow();
        $file = $data->foto_kafe;
        unlink("img/sekolah/" . $file);

        $this->kafe->delete(['id_kafe' => $id_kafe]);
        session()->setFlashdata('alert', "Data Berhasil dihapus.");
        return $this->response->redirect(site_url('/admin/data/kafe'));
    }

    public function delete_Kafe($id_kafe)
    {

        $data = $this->kafe->callKafe($id_kafe)->getRow();
        $file = $data->foto_kafe;
        unlink("img/sekolah/" . $file);

        $this->kafe->delete(['id_kafe' => $id_kafe]);
        session()->setFlashdata('alert', "Data Berhasil dihapus.");
        return $this->response->redirect(site_url('/admin/data/kafe'));
    }




    //  SCRAP KAB/KOT, KECAMATAN, KELURAHAN
    public function kabupaten()
    {
        $id_provinsi = $this->request->getPost('id_provinsi');
        $kab = $this->kafe->allKabupaten($id_provinsi);
        echo '<option value="">--Pilih Kab/Kota</option>';
        foreach ($kab as $key => $value) {
            echo '<option value=' . $value['id_kabupaten'] . '>' . $value['nama_kabupaten'] . '</option>';
        }
    }
    public function kecamatan()
    {
        $id_kabupaten = $this->request->getPost('id_kabupaten');
        $kec = $this->kafe->allKecamatan($id_kabupaten);
        echo '<option value="">--Pilih Kecamatan</option>';
        foreach ($kec as $key => $value) {
            echo '<option value=' . $value['id_kecamatan'] . '>' . $value['nama_kecamatan'] . '</option>';
        }
    }
    public function kelurahan()
    {
        $id_kecamatan = $this->request->getPost('id_kecamatan');
        $kel = $this->kafe->allKelurahan($id_kecamatan);
        echo '<option value="">--Pilih Desa/Kelurahan</option>';
        foreach ($kel as $key => $value) {
            echo '<option value=' . $value['id_kelurahan'] . '>' . $value['nama_kelurahan'] . '</option>';
        }
    }
}
