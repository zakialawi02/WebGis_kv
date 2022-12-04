<?php

namespace App\Models;

use CodeIgniter\Model;


class ModelSekolah extends Model
{
    protected $table      = 'tbl_sekolah';
    protected $primaryKey = 'id_sekolah';


    protected $allowFields = ['id_jenjang', 'stat_appv', 'nama_sekolah', 'alamat_sekolah', 'id_akreditasi', 'status', 'coordinate', 'foto_sekolah', 'id_provinsi', 'id_kabkot', 'id_kecamatan'];

    function __construct()
    {
        $this->db = db_connect();
    }

    function callSekolah($id_sekolah = false)
    {
        if ($id_sekolah === false) {
            // return $this->db->table('tbl_sekolah')
            //     ->join('tbl_jenjang', 'tbl_jenjang.id_jenjang = tbl_sekolah.id_jenjang')
            //     ->join('tbl_akreditasi', 'tbl_akreditasi.id_akreditasi = tbl_sekolah.id_akreditasi')
            //     ->join('tbl_provinsi', 'tbl_provinsi.id_provinsi = tbl_sekolah.id_provinsi')
            //     ->join('tbl_kabupaten', 'tbl_kabupaten.id_kabupaten = tbl_sekolah.id_kabupaten')
            //     ->join('tbl_kecamatan', 'tbl_kecamatan.id_kecamatan = tbl_sekolah.id_kecamatan')
            //     ->join('tbl_kelurahan', 'tbl_kelurahan.id_kelurahan = tbl_sekolah.id_kelurahan')
            //     ->get(); //select all data

            return $this->db->table('tbl_sekolah')
                ->join('tbl_jenjang', 'tbl_jenjang.id_jenjang = tbl_sekolah.id_jenjang')
                ->join('tbl_akreditasi', 'tbl_akreditasi.id_akreditasi = tbl_sekolah.id_akreditasi')
                ->join('tbl_provinsi', 'tbl_provinsi.id_provinsi = tbl_sekolah.id_provinsi')
                ->join('tbl_kabupaten', 'tbl_kabupaten.id_kabupaten = tbl_sekolah.id_kabupaten')
                ->join('tbl_kecamatan', 'tbl_kecamatan.id_kecamatan = tbl_sekolah.id_kecamatan')
                ->join('tbl_kelurahan', 'tbl_kelurahan.id_kelurahan = tbl_sekolah.id_kelurahan')
                ->getWhere(['stat_appv' => '1']); //select data of stat_appv=>1

            // return $this->db->table('tbl_sekolah')->get();
        } else {
            return $this->Where(['id_sekolah' => $id_sekolah])->get();
        }
    }
    function callSekolahPend($id_sekolah = false)
    {
        if ($id_sekolah === false) {
            return $this->db->table('tbl_sekolah')
                ->join('tbl_jenjang', 'tbl_jenjang.id_jenjang = tbl_sekolah.id_jenjang')
                ->join('tbl_akreditasi', 'tbl_akreditasi.id_akreditasi = tbl_sekolah.id_akreditasi')
                ->join('tbl_provinsi', 'tbl_provinsi.id_provinsi = tbl_sekolah.id_provinsi')
                ->join('tbl_kabupaten', 'tbl_kabupaten.id_kabupaten = tbl_sekolah.id_kabupaten')
                ->join('tbl_kecamatan', 'tbl_kecamatan.id_kecamatan = tbl_sekolah.id_kecamatan')
                ->join('tbl_kelurahan', 'tbl_kelurahan.id_kelurahan = tbl_sekolah.id_kelurahan')
                ->getWhere(['stat_appv' => '0']); //select data of stat_appv=>0

            // return $this->db->table('tbl_sekolah')->get();
        } else {
            return $this->Where(['id_sekolah' => $id_sekolah])->get();
        }
    }

    function addSekolah($addSekolah)
    {
        return $this->db->table('tbl_sekolah')->insert($addSekolah);
    }

    public function updateSekolah($data, $id_sekolah)
    {
        return $this->db->table('tbl_sekolah')->update($data, ['id_sekolah' => $id_sekolah]);
    }

    public function chck_appv($data, $id_sekolah)
    {
        return $this->db->table('tbl_sekolah')->update($data, ['id_sekolah' => $id_sekolah]);
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
