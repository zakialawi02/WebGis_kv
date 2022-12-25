<?php

namespace App\Models;

use CodeIgniter\Model;


class ModelKv extends Model
{
    protected $table      = 'tbl_kafe';
    protected $primaryKey = 'id_kafe';


    protected $allowFields = ['stat_appv', 'nama_kafe', 'alamat_kafe', 'coordinate', 'foto_kafe', 'id_provinsi', 'id_kabkot', 'id_kecamatan'];

    function __construct()
    {
        $this->db = db_connect();
    }

    function callKafe($id_kafe = false)
    {
        if ($id_kafe === false) {
            return $this->db->table('tbl_kafe')
                ->select('tbl_kafe.id_kafe as id_kafe, nama_kafe, alamat_kafe, coordinate, fasilitas_kafe, instagram_kafe, tbl_provinsi.id_provinsi as id_provinsi, nama_provinsi, tbl_kabupaten.id_kabupaten as id_kabupaten, nama_kabupaten, tbl_kecamatan.id_kecamatan as id_kecamatan, nama_kecamatan, tbl_kelurahan.id_kelurahan as id_kelurahan, nama_kelurahan, created_at, updated_at, user, stat_appv, GROUP_CONCAT(tbl_foto_kafe.nama_file_foto SEPARATOR ",") as nama_foto')
                ->join('tbl_foto_kafe', 'tbl_foto_kafe.id_kafe = tbl_kafe.id_kafe')
                ->groupBy('tbl_kafe.id_kafe')
                ->join('tbl_provinsi', 'tbl_provinsi.id_provinsi = tbl_kafe.id_provinsi')
                ->join('tbl_kabupaten', 'tbl_kabupaten.id_kabupaten = tbl_kafe.id_kabupaten')
                ->join('tbl_kecamatan', 'tbl_kecamatan.id_kecamatan = tbl_kafe.id_kecamatan')
                ->join('tbl_kelurahan', 'tbl_kelurahan.id_kelurahan = tbl_kafe.id_kelurahan')

                ->getWhere(['stat_appv' => '1']); //select data of stat_appv=>1

            // return $this->db->table('tbl_kafe')->get();
        } else {
            return $this->Where(['id_kafe' => $id_kafe])
                ->join('tbl_provinsi', 'tbl_provinsi.id_provinsi = tbl_kafe.id_provinsi')
                ->join('tbl_kabupaten', 'tbl_kabupaten.id_kabupaten = tbl_kafe.id_kabupaten')
                ->join('tbl_kecamatan', 'tbl_kecamatan.id_kecamatan = tbl_kafe.id_kecamatan')
                ->join('tbl_kelurahan', 'tbl_kelurahan.id_kelurahan = tbl_kafe.id_kelurahan')
                ->get();
        }
    }
    function callPendingData($id_kafe = false)
    {
        if ($id_kafe === false) {
            return $this->db->table('tbl_kafe')
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

    function addKafe($addKafe)
    {
        return $this->db->table('tbl_kafe')->insert($addKafe);
    }

    public function updateKafe($data, $id_kafe)
    {
        return $this->db->table('tbl_kafe')->update($data, ['id_kafe' => $id_kafe]);
    }

    public function chck_appv($data, $id_kafe)
    {
        return $this->db->table('tbl_kafe')->update($data, ['id_kafe' => $id_kafe]);
    }

    public function getLastID()
    {
        return $this->orderBy('id_kafe', 'desc')->get()->getFirstRow('array');
    }

    function addTime($addTime)
    {
        return $this->db->table('tbl_jam_operasional')->insertBatch($addTime);;
    }




    // SCRAPING DATA FROM DATABASE FOR SELECT FORM MENU

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
