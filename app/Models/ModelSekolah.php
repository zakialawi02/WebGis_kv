<?php

namespace App\Models;

use CodeIgniter\Model;


class ModelSekolah extends Model
{
    protected $table      = 'tbl_kafe';
    protected $primaryKey = 'id_kafe';


    protected $allowFields = ['id_jenjang', 'stat_appv', 'nama_kafe', 'alamat_kafe', 'id_akreditasi', 'status', 'coordinate', 'foto_kafe', 'id_provinsi', 'id_kabkot', 'id_kecamatan'];

    function __construct()
    {
        $this->db = db_connect();
    }

    function callSekolah($id_kafe = false)
    {
        if ($id_kafe === false) {
            // return $this->db->table('tbl_kafe')
            //     ->join('tbl_jenjang', 'tbl_jenjang.id_jenjang = tbl_kafe.id_jenjang')
            //     ->join('tbl_akreditasi', 'tbl_akreditasi.id_akreditasi = tbl_kafe.id_akreditasi')
            //     ->join('tbl_provinsi', 'tbl_provinsi.id_provinsi = tbl_kafe.id_provinsi')
            //     ->join('tbl_kabupaten', 'tbl_kabupaten.id_kabupaten = tbl_kafe.id_kabupaten')
            //     ->join('tbl_kecamatan', 'tbl_kecamatan.id_kecamatan = tbl_kafe.id_kecamatan')
            //     ->join('tbl_kelurahan', 'tbl_kelurahan.id_kelurahan = tbl_kafe.id_kelurahan')
            //     ->get(); //select all data

            return $this->db->table('tbl_kafe')
                ->join('tbl_jenjang', 'tbl_jenjang.id_jenjang = tbl_kafe.id_jenjang')
                ->join('tbl_akreditasi', 'tbl_akreditasi.id_akreditasi = tbl_kafe.id_akreditasi')
                ->join('tbl_provinsi', 'tbl_provinsi.id_provinsi = tbl_kafe.id_provinsi')
                ->join('tbl_kabupaten', 'tbl_kabupaten.id_kabupaten = tbl_kafe.id_kabupaten')
                ->join('tbl_kecamatan', 'tbl_kecamatan.id_kecamatan = tbl_kafe.id_kecamatan')
                ->join('tbl_kelurahan', 'tbl_kelurahan.id_kelurahan = tbl_kafe.id_kelurahan')
                ->getWhere(['stat_appv' => '1']); //select data of stat_appv=>1

            // return $this->db->table('tbl_kafe')->get();
        } else {
            return $this->Where(['id_kafe' => $id_kafe])->get();
        }
    }
    function callSekolahPend($id_kafe = false)
    {
        if ($id_kafe === false) {
            return $this->db->table('tbl_kafe')
                ->join('tbl_jenjang', 'tbl_jenjang.id_jenjang = tbl_kafe.id_jenjang')
                ->join('tbl_akreditasi', 'tbl_akreditasi.id_akreditasi = tbl_kafe.id_akreditasi')
                ->join('tbl_provinsi', 'tbl_provinsi.id_provinsi = tbl_kafe.id_provinsi')
                ->join('tbl_kabupaten', 'tbl_kabupaten.id_kabupaten = tbl_kafe.id_kabupaten')
                ->join('tbl_kecamatan', 'tbl_kecamatan.id_kecamatan = tbl_kafe.id_kecamatan')
                ->join('tbl_kelurahan', 'tbl_kelurahan.id_kelurahan = tbl_kafe.id_kelurahan')
                ->getWhere(['stat_appv' => '0']); //select data of stat_appv=>0

            // return $this->db->table('tbl_kafe')->get();
        } else {
            return $this->Where(['id_kafe' => $id_kafe])->get();
        }
    }

    function addSekolah($addSekolah)
    {
        return $this->db->table('tbl_kafe')->insert($addSekolah);
    }

    public function updateSekolah($data, $id_kafe)
    {
        return $this->db->table('tbl_kafe')->update($data, ['id_kafe' => $id_kafe]);
    }

    public function chck_appv($data, $id_kafe)
    {
        return $this->db->table('tbl_kafe')->update($data, ['id_kafe' => $id_kafe]);
    }




    // Jenjang
    public function allJenjang()
    {
        return $this->db->table('tbl_jenjang')->orderBy('id_jenjang', 'ASC')->get()->getResultArray();
    }
    // Akreditasi
    public function allAkreditasi()
    {
        return $this->db->table('tbl_akreditasi')->orderBy('id_akreditasi', 'ASC')->get()->getResultArray();
    }

    // PROVINSI
    public function allProvinsi()
    {
        return $this->db->table('tbl_provinsi')->orderBy('id_provinsi', 'ASC')->get()->getResultArray();
    }
    // KABUPATEN/KOTA
    public function allKabupaten($id_provinsi)
    {
        return $this->db->table('tbl_kabupaten')->where('id_provinsi', $id_provinsi)->get()->getResultArray();
    }
    // KECAMATAN
    public function allKecamatan($id_kecamatan)
    {
        return $this->db->table('tbl_kecamatan')->where('id_kabupaten', $id_kecamatan)->get()->getResultArray();
    }
    // KELURAHAN
    public function allKelurahan($id_kelurahan)
    {
        return $this->db->table('tbl_kelurahan')->where('id_kecamatan', $id_kelurahan)->get()->getResultArray();
    }
}
