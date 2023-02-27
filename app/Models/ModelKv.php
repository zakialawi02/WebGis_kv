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
            // Buat subquery untuk mendapatkan daftar foto kafe
            $foto_kafe_subquery = $this->db->table('tbl_foto_kafe')->select('id_kafe, GROUP_CONCAT(nama_file_foto SEPARATOR ",") as nama_foto')
                ->groupBy('tbl_foto_kafe.id_kafe')
                ->getCompiledSelect();

            // Gunakan subquery di dalam query utama
            $buidler = $this->db->table('tbl_kafe')->select('tbl_kafe.id_kafe, nama_kafe, alamat_kafe, latitude, longitude, fasilitas_kafe, instagram_kafe, tbl_provinsi.id_provinsi as id_provinsi, nama_provinsi, tbl_kabupaten.id_kabupaten as id_kabupaten, nama_kabupaten, tbl_kecamatan.id_kecamatan as id_kecamatan, nama_kecamatan, tbl_kelurahan.id_kelurahan as id_kelurahan, nama_kelurahan, created_at, updated_at, tbl_status_appv.user as user, tbl_status_appv.stat_appv as stat_appv, nama_foto')
                ->join("($foto_kafe_subquery) as tbl_foto_kafe", 'tbl_foto_kafe.id_kafe = tbl_kafe.id_kafe', 'LEFT')
                ->join('tbl_status_appv', 'tbl_status_appv.id_kafe = tbl_kafe.id_kafe')
                ->join('tbl_provinsi', 'tbl_provinsi.id_provinsi = tbl_kafe.id_provinsi')
                ->join('tbl_kabupaten', 'tbl_kabupaten.id_kabupaten = tbl_kafe.id_kabupaten')
                ->join('tbl_kecamatan', 'tbl_kecamatan.id_kecamatan = tbl_kafe.id_kecamatan')
                ->join('tbl_kelurahan', 'tbl_kelurahan.id_kelurahan = tbl_kafe.id_kelurahan')
                ->orderBy('id_kafe', 'DESC');
            $query = $buidler->getWhere(['stat_appv' => '1']);

            // Buat subquery untuk mendapatkan daftar jam operasional
            $jam_operasional_subquery = $this->db->table('tbl_jam_operasional')
                ->select('')
                ->get();
            $jam_operasional = $jam_operasional_subquery->getResult();
            $jamBuka = [];
            foreach ($jam_operasional as $row) {
                $kafe_id = $row->kafe_id;
                $dow = $row->hari;
                $start_time = $row->open_time;
                $end_time = $row->close_time;

                $item = [
                    'open' => $start_time,
                    'close' => $end_time
                ];

                if (!isset($jamBuka[$kafe_id][$dow])) {
                    $jamBuka[$kafe_id][$dow] = [];
                }
                array_push($jamBuka[$kafe_id][$dow], $item);
            }
            $kafe = $query->getResult();
            $result_array = [];
            foreach ($kafe as $row) {
                $id_kafe = $row->id_kafe;
                $business_hours = $jamBuka[$id_kafe];
                $item = (object) [
                    'id_kafe' => $row->id_kafe,
                    'nama_kafe' => $row->nama_kafe,
                    'alamat_kafe' => $row->alamat_kafe,
                    'latitude' => $row->latitude,
                    'longitude' => $row->longitude,
                    'fasilitas_kafe' => $row->fasilitas_kafe,
                    'instagram_kafe' => $row->instagram_kafe,
                    'id_provinsi' => $row->id_provinsi,
                    'nama_provinsi' => $row->nama_provinsi,
                    'id_kabupaten' => $row->id_kabupaten,
                    'nama_kabupaten' => $row->nama_kabupaten,
                    'id_kecamatan' => $row->id_kecamatan,
                    'nama_kecamatan' => $row->nama_kecamatan,
                    'id_kelurahan' => $row->id_kelurahan,
                    'nama_kelurahan' => $row->nama_kelurahan,
                    'created_at' => $row->created_at,
                    'updated_at' => $row->updated_at,
                    'user' => $row->user,
                    'nama_foto' => $row->nama_foto,
                    'business_hours' => $business_hours
                ];

                array_push($result_array, $item);
            }

            return $result_array;
        } else {
            // Buat subquery untuk mendapatkan daftar foto kafe
            $foto_kafe_subquery = $this->db->table('tbl_foto_kafe')->select('id_kafe, GROUP_CONCAT(nama_file_foto SEPARATOR ",") as nama_foto')
                ->groupBy('tbl_foto_kafe.id_kafe')
                ->getCompiledSelect();

            // Gunakan subquery di dalam query utama
            $buidler = $this->db->table('tbl_kafe')->select('tbl_kafe.id_kafe, nama_kafe, alamat_kafe, latitude, longitude, fasilitas_kafe, instagram_kafe, tbl_provinsi.id_provinsi as id_provinsi, nama_provinsi, tbl_kabupaten.id_kabupaten as id_kabupaten, nama_kabupaten, tbl_kecamatan.id_kecamatan as id_kecamatan, nama_kecamatan, tbl_kelurahan.id_kelurahan as id_kelurahan, nama_kelurahan, created_at, updated_at, tbl_status_appv.user as user, tbl_status_appv.stat_appv as stat_appv, nama_foto')
                ->join("($foto_kafe_subquery) as tbl_foto_kafe", 'tbl_foto_kafe.id_kafe = tbl_kafe.id_kafe', 'LEFT')
                ->join('tbl_status_appv', 'tbl_status_appv.id_kafe = tbl_kafe.id_kafe')
                ->join('tbl_provinsi', 'tbl_provinsi.id_provinsi = tbl_kafe.id_provinsi')
                ->join('tbl_kabupaten', 'tbl_kabupaten.id_kabupaten = tbl_kafe.id_kabupaten')
                ->join('tbl_kecamatan', 'tbl_kecamatan.id_kecamatan = tbl_kafe.id_kecamatan')
                ->join('tbl_kelurahan', 'tbl_kelurahan.id_kelurahan = tbl_kafe.id_kelurahan')
                ->Where(['tbl_kafe.id_kafe' => $id_kafe]);
            $query = $buidler->getWhere(['stat_appv' => '1']);

            // Buat subquery untuk mendapatkan daftar jam operasional
            $jam_operasional_subquery = $this->db->table('tbl_jam_operasional')
                ->select('')
                ->Where(['tbl_jam_operasional.kafe_id' => $id_kafe])
                ->get();
            $jam_operasional = $jam_operasional_subquery->getResult();
            $jamBuka = [];
            foreach ($jam_operasional as $row) {
                $kafe_id = $row->kafe_id;
                $dow = $row->hari;
                $start_time = $row->open_time;
                $end_time = $row->close_time;

                $item = [
                    'open' => $start_time,
                    'close' => $end_time
                ];

                if (!isset($jamBuka[$kafe_id][$dow])) {
                    $jamBuka[$kafe_id][$dow] = [];
                }
                array_push($jamBuka[$kafe_id][$dow], $item);
            }
            $kafe = $query->getResult();
            foreach ($kafe as $row) {
                $business_hours = $jamBuka[$id_kafe];
                $item = (object) [
                    'id_kafe' => $row->id_kafe,
                    'nama_kafe' => $row->nama_kafe,
                    'alamat_kafe' => $row->alamat_kafe,
                    'latitude' => $row->latitude,
                    'longitude' => $row->longitude,
                    'fasilitas_kafe' => $row->fasilitas_kafe,
                    'instagram_kafe' => $row->instagram_kafe,
                    'id_provinsi' => $row->id_provinsi,
                    'nama_provinsi' => $row->nama_provinsi,
                    'id_kabupaten' => $row->id_kabupaten,
                    'nama_kabupaten' => $row->nama_kabupaten,
                    'id_kecamatan' => $row->id_kecamatan,
                    'nama_kecamatan' => $row->nama_kecamatan,
                    'id_kelurahan' => $row->id_kelurahan,
                    'nama_kelurahan' => $row->nama_kelurahan,
                    'created_at' => $row->created_at,
                    'updated_at' => $row->updated_at,
                    'user' => $row->user,
                    'nama_foto' => $row->nama_foto,
                    'business_hours' => $business_hours
                ];
            }

            return $item;
        }
    }

    function callPendingData($id_kafe = false)
    {
        if ($id_kafe === false) {
            // Buat subquery untuk mendapatkan daftar foto kafe
            $foto_kafe_subquery = $this->db->table('tbl_foto_kafe')->select('id_kafe, GROUP_CONCAT(nama_file_foto SEPARATOR ",") as nama_foto')
                ->groupBy('tbl_foto_kafe.id_kafe')
                ->getCompiledSelect();

            // Gunakan subquery di dalam query utama
            $buidler = $this->db->table('tbl_kafe')->select('tbl_kafe.id_kafe, nama_kafe, alamat_kafe, latitude, longitude, fasilitas_kafe, instagram_kafe, tbl_provinsi.id_provinsi as id_provinsi, nama_provinsi, tbl_kabupaten.id_kabupaten as id_kabupaten, nama_kabupaten, tbl_kecamatan.id_kecamatan as id_kecamatan, nama_kecamatan, tbl_kelurahan.id_kelurahan as id_kelurahan, nama_kelurahan, created_at, updated_at, tbl_status_appv.user as user, tbl_status_appv.stat_appv as stat_appv, nama_foto')
                ->join("($foto_kafe_subquery) as tbl_foto_kafe", 'tbl_foto_kafe.id_kafe = tbl_kafe.id_kafe', 'LEFT')
                ->join('tbl_status_appv', 'tbl_status_appv.id_kafe = tbl_kafe.id_kafe')
                ->join('tbl_provinsi', 'tbl_provinsi.id_provinsi = tbl_kafe.id_provinsi')
                ->join('tbl_kabupaten', 'tbl_kabupaten.id_kabupaten = tbl_kafe.id_kabupaten')
                ->join('tbl_kecamatan', 'tbl_kecamatan.id_kecamatan = tbl_kafe.id_kecamatan')
                ->join('tbl_kelurahan', 'tbl_kelurahan.id_kelurahan = tbl_kafe.id_kelurahan');
            $query = $buidler->getWhere(['stat_appv' => '0']);

            // Buat subquery untuk mendapatkan daftar jam operasional
            $jam_operasional_subquery = $this->db->table('tbl_jam_operasional')
                ->select('')
                ->get();
            $jam_operasional = $jam_operasional_subquery->getResult();
            $jamBuka = [];
            foreach ($jam_operasional as $row) {
                $kafe_id = $row->kafe_id;
                $dow = $row->hari;
                $start_time = $row->open_time;
                $end_time = $row->close_time;

                $item = [
                    'open' => $start_time,
                    'close' => $end_time
                ];

                if (!isset($jamBuka[$kafe_id][$dow])) {
                    $jamBuka[$kafe_id][$dow] = [];
                }
                array_push($jamBuka[$kafe_id][$dow], $item);
            }
            $kafe = $query->getResult();
            $result_array = [];
            foreach ($kafe as $row) {
                $id_kafe = $row->id_kafe;
                $business_hours = $jamBuka[$id_kafe];
                $item = (object) [
                    'id_kafe' => $row->id_kafe,
                    'nama_kafe' => $row->nama_kafe,
                    'alamat_kafe' => $row->alamat_kafe,
                    'latitude' => $row->latitude,
                    'longitude' => $row->longitude,
                    'fasilitas_kafe' => $row->fasilitas_kafe,
                    'instagram_kafe' => $row->instagram_kafe,
                    'id_provinsi' => $row->id_provinsi,
                    'nama_provinsi' => $row->nama_provinsi,
                    'id_kabupaten' => $row->id_kabupaten,
                    'nama_kabupaten' => $row->nama_kabupaten,
                    'id_kecamatan' => $row->id_kecamatan,
                    'nama_kecamatan' => $row->nama_kecamatan,
                    'id_kelurahan' => $row->id_kelurahan,
                    'nama_kelurahan' => $row->nama_kelurahan,
                    'created_at' => $row->created_at,
                    'updated_at' => $row->updated_at,
                    'user' => $row->user,
                    'nama_foto' => $row->nama_foto,
                    'business_hours' => $business_hours
                ];

                array_push($result_array, $item);
            }

            return $result_array;
        } else {
            return $this->Where(['id_kafe' => $id_kafe])->get();
        }
    }
    function getFiveKafe()
    {
        $buidler = $this->db->table('tbl_kafe')->select('tbl_kafe.id_kafe, nama_kafe, alamat_kafe, latitude, longitude, fasilitas_kafe, instagram_kafe, tbl_provinsi.id_provinsi as id_provinsi, nama_provinsi, tbl_kabupaten.id_kabupaten as id_kabupaten, nama_kabupaten, tbl_kecamatan.id_kecamatan as id_kecamatan, nama_kecamatan, tbl_kelurahan.id_kelurahan as id_kelurahan, nama_kelurahan, tbl_kafe.created_at, tbl_kafe.updated_at, tbl_status_appv.stat_appv as stat_appv, tbl_status_appv.user as user, users.username as username')
            ->join('tbl_provinsi', 'tbl_provinsi.id_provinsi = tbl_kafe.id_provinsi')
            ->join('tbl_kabupaten', 'tbl_kabupaten.id_kabupaten = tbl_kafe.id_kabupaten')
            ->join('tbl_kecamatan', 'tbl_kecamatan.id_kecamatan = tbl_kafe.id_kecamatan')
            ->join('tbl_kelurahan', 'tbl_kelurahan.id_kelurahan = tbl_kafe.id_kelurahan')
            ->join('tbl_status_appv', 'tbl_status_appv.id_kafe = tbl_kafe.id_kafe')
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
