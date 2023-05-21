<?php

namespace App\Models;

use CodeIgniter\Model;


class ModelKv extends Model
{
    protected $table      = 'tbl_kafe';
    protected $primaryKey = 'id_kafe';
    protected $returnType     = 'array';

    protected $allowedFields = ['nama_kafe', 'alamat_kafe', 'longitude', 'latitude', 'foto_kafe', 'id_provinsi', 'id_kabkot', 'id_kecamatan', 'id_kelurahan', 'stat_appv'];

    function __construct()
    {
        $this->db = db_connect();
    }

    function callKafe($id_kafe = false)
    {
        if ($id_kafe === false) {

            return $this->db->table('tbl_kafe')->select('tbl_kafe.id_kafe, nama_kafe, alamat_kafe, latitude, longitude, instagram_kafe, tbl_provinsi.id_provinsi as id_provinsi, nama_provinsi, tbl_kabupaten.id_kabupaten as id_kabupaten, nama_kabupaten, tbl_kecamatan.id_kecamatan as id_kecamatan, nama_kecamatan, tbl_kelurahan.id_kelurahan as id_kelurahan, nama_kelurahan, created_at, updated_at, tbl_status_appv.user as user, tbl_status_appv.stat_appv as stat_appv, GROUP_CONCAT(DISTINCT nama_file_foto SEPARATOR ",") as nama_foto, GROUP_CONCAT(DISTINCT JSON_OBJECT("hari", tjo.hari, "open_time", tjo.open_time, "close_time", tjo.close_time) ORDER BY FIELD(tjo.hari, "Senin", "Selasa", "Rabu", "Kamis", "Jumat", "Sabtu", "Minggu")) AS jam_oprasional')
                ->join('tbl_foto_kafe tfk', 'tfk.id_kafe = tbl_kafe.id_kafe', 'LEFT')
                ->join('tbl_jam_operasional  tjo', 'tjo.kafe_id = tbl_kafe.id_kafe', 'LEFT')
                ->join('tbl_status_appv', 'tbl_status_appv.id_kafe = tbl_kafe.id_kafe', 'LEFT')
                ->join('tbl_provinsi', 'tbl_provinsi.id_provinsi = tbl_kafe.id_provinsi', 'LEFT')
                ->join('tbl_kabupaten', 'tbl_kabupaten.id_kabupaten = tbl_kafe.id_kabupaten', 'LEFT')
                ->join('tbl_kecamatan', 'tbl_kecamatan.id_kecamatan = tbl_kafe.id_kecamatan', 'LEFT')
                ->join('tbl_kelurahan', 'tbl_kelurahan.id_kelurahan = tbl_kafe.id_kelurahan', 'LEFT')
                ->groupBy('id_kafe, tjo.kafe_id')
                ->orderBy('id_kafe', 'DESC')
                ->getWhere(['stat_appv' => '1']);
        } else {
            return $this->db->table('tbl_kafe')->select('tbl_kafe.id_kafe, nama_kafe, alamat_kafe, latitude, longitude, instagram_kafe, tbl_provinsi.id_provinsi as id_provinsi, nama_provinsi, tbl_kabupaten.id_kabupaten as id_kabupaten, nama_kabupaten, tbl_kecamatan.id_kecamatan as id_kecamatan, nama_kecamatan, tbl_kelurahan.id_kelurahan as id_kelurahan, nama_kelurahan, created_at, updated_at, tbl_status_appv.user as user, tbl_status_appv.stat_appv as stat_appv, GROUP_CONCAT(DISTINCT nama_file_foto SEPARATOR ",") as nama_foto, GROUP_CONCAT(DISTINCT JSON_OBJECT("hari", tjo.hari, "open_time", tjo.open_time, "close_time", tjo.close_time) ORDER BY FIELD(tjo.hari, "Senin", "Selasa", "Rabu", "Kamis", "Jumat", "Sabtu", "Minggu")) AS jam_oprasional')
                ->join('tbl_foto_kafe tfk', 'tfk.id_kafe = tbl_kafe.id_kafe', 'LEFT')
                ->join('tbl_jam_operasional  tjo', 'tjo.kafe_id = tbl_kafe.id_kafe', 'LEFT')
                ->join('tbl_status_appv', 'tbl_status_appv.id_kafe = tbl_kafe.id_kafe', 'LEFT')
                ->join('tbl_provinsi', 'tbl_provinsi.id_provinsi = tbl_kafe.id_provinsi', 'LEFT')
                ->join('tbl_kabupaten', 'tbl_kabupaten.id_kabupaten = tbl_kafe.id_kabupaten', 'LEFT')
                ->join('tbl_kecamatan', 'tbl_kecamatan.id_kecamatan = tbl_kafe.id_kecamatan', 'LEFT')
                ->join('tbl_kelurahan', 'tbl_kelurahan.id_kelurahan = tbl_kafe.id_kelurahan', 'LEFT')
                ->groupBy('id_kafe, tjo.kafe_id')
                ->Where(['tbl_kafe.id_kafe' => $id_kafe])
                ->getWhere(['stat_appv' => '1']);
        }
    }

    function callPendingData($id_kafe = false)
    {
        if ($id_kafe === false) {
            return $this->db->table('tbl_kafe')->select('tbl_kafe.id_kafe, nama_kafe, alamat_kafe, latitude, longitude, instagram_kafe, tbl_provinsi.id_provinsi as id_provinsi, nama_provinsi, tbl_kabupaten.id_kabupaten as id_kabupaten, nama_kabupaten, tbl_kecamatan.id_kecamatan as id_kecamatan, nama_kecamatan, tbl_kelurahan.id_kelurahan as id_kelurahan, nama_kelurahan, tbl_kafe.created_at, tbl_kafe.updated_at, tbl_status_appv.user as user, tbl_status_appv.stat_appv as stat_appv, GROUP_CONCAT(DISTINCT nama_file_foto SEPARATOR ",") as nama_foto, GROUP_CONCAT(DISTINCT JSON_OBJECT("hari", tjo.hari, "open_time", tjo.open_time, "close_time", tjo.close_time)) AS jam_oprasional, users.username as username')
                ->join('tbl_foto_kafe tfk', 'tfk.id_kafe = tbl_kafe.id_kafe', 'LEFT')
                ->join('tbl_jam_operasional  tjo', 'tjo.kafe_id = tbl_kafe.id_kafe', 'LEFT')
                ->join('tbl_status_appv', 'tbl_status_appv.id_kafe = tbl_kafe.id_kafe', 'LEFT')
                ->join('tbl_provinsi', 'tbl_provinsi.id_provinsi = tbl_kafe.id_provinsi', 'LEFT')
                ->join('tbl_kabupaten', 'tbl_kabupaten.id_kabupaten = tbl_kafe.id_kabupaten', 'LEFT')
                ->join('tbl_kecamatan', 'tbl_kecamatan.id_kecamatan = tbl_kafe.id_kecamatan', 'LEFT')
                ->join('tbl_kelurahan', 'tbl_kelurahan.id_kelurahan = tbl_kafe.id_kelurahan', 'LEFT')
                ->join('users', 'users.id = tbl_status_appv.user', 'LEFT')
                ->groupBy('id_kafe, tjo.kafe_id')
                ->orderBy('id_kafe', 'DESC')
                ->getWhere(['stat_appv' => '0']);
        } else {
            return $this->Where(['id_kafe' => $id_kafe])->get();
        }
    }

    function pendingKafe($userid)
    {
        return $this->db->table('tbl_kafe')->select('tbl_kafe.id_kafe, nama_kafe, alamat_kafe, latitude, longitude, instagram_kafe, tbl_provinsi.id_provinsi as id_provinsi, nama_provinsi, tbl_kabupaten.id_kabupaten as id_kabupaten, nama_kabupaten, tbl_kecamatan.id_kecamatan as id_kecamatan, nama_kecamatan, tbl_kelurahan.id_kelurahan as id_kelurahan, nama_kelurahan, created_at, updated_at, tbl_status_appv.user as user, tbl_status_appv.stat_appv as stat_appv, tbl_status_appv.date_updated,  GROUP_CONCAT(DISTINCT nama_file_foto SEPARATOR ",") as nama_foto, GROUP_CONCAT(DISTINCT JSON_OBJECT("hari", tjo.hari, "open_time", tjo.open_time, "close_time", tjo.close_time)) AS jam_oprasional')
            ->join('tbl_foto_kafe tfk', 'tfk.id_kafe = tbl_kafe.id_kafe', 'LEFT')
            ->join('tbl_jam_operasional  tjo', 'tjo.kafe_id = tbl_kafe.id_kafe', 'LEFT')
            ->join('tbl_status_appv', 'tbl_status_appv.id_kafe = tbl_kafe.id_kafe', 'LEFT')
            ->join('tbl_provinsi', 'tbl_provinsi.id_provinsi = tbl_kafe.id_provinsi', 'LEFT')
            ->join('tbl_kabupaten', 'tbl_kabupaten.id_kabupaten = tbl_kafe.id_kabupaten', 'LEFT')
            ->join('tbl_kecamatan', 'tbl_kecamatan.id_kecamatan = tbl_kafe.id_kecamatan', 'LEFT')
            ->join('tbl_kelurahan', 'tbl_kelurahan.id_kelurahan = tbl_kafe.id_kelurahan', 'LEFT')
            ->groupBy('id_kafe, tjo.kafe_id')
            ->orderBy('id_kafe', 'DESC')
            ->getWhere(['user' => $userid, 'stat_appv' => '0']);
    }

    function terimaKafe($userid)
    {
        return $this->db->table('tbl_kafe')->select('tbl_kafe.id_kafe, nama_kafe, alamat_kafe, latitude, longitude, instagram_kafe, tbl_provinsi.id_provinsi as id_provinsi, nama_provinsi, tbl_kabupaten.id_kabupaten as id_kabupaten, nama_kabupaten, tbl_kecamatan.id_kecamatan as id_kecamatan, nama_kecamatan, tbl_kelurahan.id_kelurahan as id_kelurahan, nama_kelurahan, created_at, updated_at, tbl_status_appv.user as user, tbl_status_appv.stat_appv as stat_appv, tbl_status_appv.date_updated, GROUP_CONCAT(DISTINCT nama_file_foto SEPARATOR ",") as nama_foto, GROUP_CONCAT(DISTINCT JSON_OBJECT("hari", tjo.hari, "open_time", tjo.open_time, "close_time", tjo.close_time)) AS jam_oprasional')
            ->join('tbl_foto_kafe tfk', 'tfk.id_kafe = tbl_kafe.id_kafe', 'LEFT')
            ->join('tbl_jam_operasional  tjo', 'tjo.kafe_id = tbl_kafe.id_kafe', 'LEFT')
            ->join('tbl_status_appv', 'tbl_status_appv.id_kafe = tbl_kafe.id_kafe', 'LEFT')
            ->join('tbl_provinsi', 'tbl_provinsi.id_provinsi = tbl_kafe.id_provinsi', 'LEFT')
            ->join('tbl_kabupaten', 'tbl_kabupaten.id_kabupaten = tbl_kafe.id_kabupaten', 'LEFT')
            ->join('tbl_kecamatan', 'tbl_kecamatan.id_kecamatan = tbl_kafe.id_kecamatan', 'LEFT')
            ->join('tbl_kelurahan', 'tbl_kelurahan.id_kelurahan = tbl_kafe.id_kelurahan', 'LEFT')
            ->groupBy('id_kafe, tjo.kafe_id')
            ->orderBy('id_kafe', 'DESC')
            ->getWhere(['user' => $userid, 'stat_appv' => '1']);
    }

    function tolakKafe($userid)
    {
        return $this->db->table('tbl_kafe')->select('tbl_kafe.id_kafe, nama_kafe, alamat_kafe, latitude, longitude, instagram_kafe, tbl_provinsi.id_provinsi as id_provinsi, nama_provinsi, tbl_kabupaten.id_kabupaten as id_kabupaten, nama_kabupaten, tbl_kecamatan.id_kecamatan as id_kecamatan, nama_kecamatan, tbl_kelurahan.id_kelurahan as id_kelurahan, nama_kelurahan, created_at, updated_at, tbl_status_appv.user as user, tbl_status_appv.stat_appv as stat_appv, tbl_status_appv.date_updated,  GROUP_CONCAT(DISTINCT nama_file_foto SEPARATOR ",") as nama_foto, GROUP_CONCAT(DISTINCT JSON_OBJECT("hari", tjo.hari, "open_time", tjo.open_time, "close_time", tjo.close_time)) AS jam_oprasional')
            ->join('tbl_foto_kafe tfk', 'tfk.id_kafe = tbl_kafe.id_kafe', 'LEFT')
            ->join('tbl_jam_operasional  tjo', 'tjo.kafe_id = tbl_kafe.id_kafe', 'LEFT')
            ->join('tbl_status_appv', 'tbl_status_appv.id_kafe = tbl_kafe.id_kafe', 'LEFT')
            ->join('tbl_provinsi', 'tbl_provinsi.id_provinsi = tbl_kafe.id_provinsi', 'LEFT')
            ->join('tbl_kabupaten', 'tbl_kabupaten.id_kabupaten = tbl_kafe.id_kabupaten', 'LEFT')
            ->join('tbl_kecamatan', 'tbl_kecamatan.id_kecamatan = tbl_kafe.id_kecamatan', 'LEFT')
            ->join('tbl_kelurahan', 'tbl_kelurahan.id_kelurahan = tbl_kafe.id_kelurahan', 'LEFT')
            ->groupBy('id_kafe, tjo.kafe_id')
            ->orderBy('id_kafe', 'DESC')
            ->getWhere(['user' => $userid, 'stat_appv' => '2']);
    }

    function getFiveKafe()
    {
        $buidler = $this->db->table('tbl_kafe')->select('tbl_kafe.id_kafe, nama_kafe, alamat_kafe, latitude, longitude, instagram_kafe, tbl_provinsi.id_provinsi as id_provinsi, nama_provinsi, tbl_kabupaten.id_kabupaten as id_kabupaten, nama_kabupaten, tbl_kecamatan.id_kecamatan as id_kecamatan, nama_kecamatan, tbl_kelurahan.id_kelurahan as id_kelurahan, nama_kelurahan, tbl_kafe.created_at, tbl_kafe.updated_at, tbl_status_appv.stat_appv as stat_appv, tbl_status_appv.user as user, users.username as username')
            ->join('tbl_provinsi', 'tbl_provinsi.id_provinsi = tbl_kafe.id_provinsi', 'LEFT')
            ->join('tbl_kabupaten', 'tbl_kabupaten.id_kabupaten = tbl_kafe.id_kabupaten', 'LEFT')
            ->join('tbl_kecamatan', 'tbl_kecamatan.id_kecamatan = tbl_kafe.id_kecamatan', 'LEFT')
            ->join('tbl_kelurahan', 'tbl_kelurahan.id_kelurahan = tbl_kafe.id_kelurahan', 'LEFT')
            ->join('tbl_status_appv', 'tbl_status_appv.id_kafe = tbl_kafe.id_kafe', 'LEFT')
            ->join('users', 'users.id = tbl_status_appv.user')
            ->limit(5);
        $query = $buidler->getWhere(['stat_appv' => '1']);
        return $query;
    }

    function cariKafe($keyword)
    {
        return $this->db->table('tbl_kafe')
            ->join('tbl_status_appv', 'tbl_status_appv.id_kafe = tbl_kafe.id_kafe')
            ->Where(['stat_appv' => '1'])
            ->like('nama_kafe', $keyword)
            ->get()
            ->getResult();
    }

    function randomFour()
    {
        return $this->db->table('tbl_kafe')
            ->join('tbl_status_appv', 'tbl_status_appv.id_kafe = tbl_kafe.id_kafe')
            ->orderBy('RAND()')->limit(4)->getWhere(['stat_appv' => '1']);
    }

    function countAllKafe()
    {
        return $this->db->table('tbl_kafe')
            ->join('tbl_status_appv', 'tbl_status_appv.id_kafe = tbl_kafe.id_kafe')
            ->Where(['stat_appv' => '1'])->countAllResults();
    }

    function countAllPending()
    {
        return $this->db->table('tbl_kafe')
            ->join('tbl_status_appv', 'tbl_status_appv.id_kafe = tbl_kafe.id_kafe')
            ->Where(['stat_appv' => '0'])->countAllResults();
    }

    function addKafe($addKafe)
    {
        return  $this->db->table('tbl_kafe')->insert($addKafe);
    }

    public function updateKafe($data, $id_kafe)
    {
        return $this->db->table('tbl_kafe')->update($data, ['id_kafe' => $id_kafe]);
    }

    function addStatus($addStatus)
    {
        return $this->db->table('tbl_status_appv')->insert($addStatus);
    }
    public function chck_appv($data, $id_kafe)
    {
        return $this->db->table('tbl_status_appv')->update($data, ['id_kafe' => $id_kafe]);
    }

    function addTime($addTime)
    {
        return $this->db->table('tbl_jam_operasional')->insertBatch($addTime);
    }
    public function updateTime($data, $kafe_id, $hari)
    {
        return $this->db->table('tbl_jam_operasional')->update($data, ['kafe_id' => $kafe_id, 'hari' => $hari]);
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
    function tes()
    {
        return $this->db->table('test')->get();
    }
}
