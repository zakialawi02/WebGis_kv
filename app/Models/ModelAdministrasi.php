<?php

namespace App\Models;

use CodeIgniter\Model;


class ModelAdministrasi extends Model
{
    protected $table = 'tbl_kelurahan';
    protected $returnType = 'array';

    function __construct()
    {
        $this->db = db_connect();
    }

    // Ajax Remote Wilayah Administrasi
    public function getDataAjaxRemote($search)
    {
        return $this->db->table('tbl_kelurahan')
            ->select('tbl_kelurahan.id_kelurahan as id_kelurahan, nama_kelurahan, tbl_kecamatan.id_kecamatan as id_kecamatan, nama_kecamatan, tbl_kabupaten.id_kabupaten as id_kabupaten, nama_kabupaten, tbl_provinsi.id_provinsi as id_provinsi, nama_provinsi')
            ->join('tbl_kecamatan', 'tbl_kecamatan.id_kecamatan = tbl_kelurahan.id_kecamatan')
            ->join('tbl_kabupaten', 'tbl_kabupaten.id_kabupaten = tbl_kecamatan.id_kabupaten')
            ->join('tbl_provinsi', 'tbl_provinsi.id_provinsi = tbl_kabupaten.id_provinsi')
            ->like('nama_kecamatan', $search)
            ->orLike('nama_kelurahan', $search)
            ->get()->getResultArray();
    }
    // vardump AjaxRemote
    public function Remote()
    {
        return $this->db->table('tbl_kelurahan')
            ->select('tbl_kelurahan.id_kelurahan as id_kelurahan, nama_kelurahan, tbl_kecamatan.id_kecamatan as id_kecamatan, nama_kecamatan, tbl_kabupaten.id_kabupaten as id_kabupaten, nama_kabupaten, tbl_provinsi.id_provinsi as id_provinsi, nama_provinsi')
            ->join('tbl_kecamatan', 'tbl_kecamatan.id_kecamatan = tbl_kelurahan.id_kecamatan')
            ->join('tbl_kabupaten', 'tbl_kabupaten.id_kabupaten = tbl_kecamatan.id_kabupaten')
            ->join('tbl_provinsi', 'tbl_provinsi.id_provinsi = tbl_kabupaten.id_provinsi')
            ->like('nama_kecamatan', 'sukolilo')
            ->orLike('nama_kelurahan', 'sukolilo')
            ->get()->getResultArray();
    }
}
