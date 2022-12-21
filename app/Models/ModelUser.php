<?php

namespace App\Models;

use CodeIgniter\Model;


class ModelUser extends Model
{
    protected $table      = 'users';
    protected $primaryKey = 'id';


    protected $allowFields = ['full_name', 'user_image', 'email', 'user_about', 'password_hash', 'active'];

    function __construct()
    {
        $this->db = db_connect();
    }

    function getUsers()
    {
        $db      = \Config\Database::connect();
        $builder = $db->table('users');
        $builder->select('users.id as userid, username, email, group_id, name, created_at,  full_name');
        $builder->join('auth_groups_users', 'auth_groups_users.user_id = users.id');
        $builder->join('auth_groups', 'auth_groups.id = auth_groups_users.group_id');
        $query = $builder->orderBy('group_id', 'ASC')->get();
        return $query;
    }

    function addUser($addUser)
    {
        return $this->db->table('users')->insert($addUser);
    }

    function insertUser($insertUser)
    {
        return $this->db->table('auth_groups_users')->insert($insertUser);
    }

    public function updateUser($data, $userid)
    {
        return $this->db->table('users')->update($data, ['id' => $userid]);
    }

    public function updateRole($dataA, $userid)
    {
        return $this->db->table('auth_groups_users')->update($dataA, ['user_id' => $userid]);
    }






    public function chck_appv($data, $id_kafe)
    {
        return $this->db->table('tbl_kafe')->update($data, ['id_kafe' => $id_kafe]);
    }

    public function getLastID()
    {
        return $this->orderBy('id_kafe', 'desc')->get()->getFirstRow('array');
    }





    // SCRAPING DATA FROM DATABASE FOR SELECT FORM MENU

    // AUTH GROUP
    public function allGroup()
    {
        return $this->db->table('auth_groups')->orderBy('id', 'ASC')->get()->getResultArray();
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
