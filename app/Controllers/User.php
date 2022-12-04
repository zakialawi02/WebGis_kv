<?php

namespace App\Controllers;

use App\Models\ModelSetting;
use Myth\Auth\Password;

class User extends BaseController
{
    protected $ModelSetting;
    public function __construct()
    {
        $this->setting = new ModelSetting();
    }

    public function manager()
    {
        $data = [
            'title' => 'USER MANAGEMENT',
        ];

        $db      = \Config\Database::connect();
        $builder = $db->table('users');
        $builder->select('users.id as userid, username, email, name');
        $builder->join('auth_groups_users', 'auth_groups_users.user_id = users.id');
        $builder->join('auth_groups', 'auth_groups.id = auth_groups_users.group_id');
        $query = $builder->get();

        $data['users'] = $query->getResult();

        return view('admin/userManagement', $data);
    }

    public function list()
    {
        $data = [
            'title' => 'USER LIST',
        ];

        $db      = \Config\Database::connect();
        $builder = $db->table('users');
        $builder->select('users.id as userid, username, email, name');
        $builder->join('auth_groups_users', 'auth_groups_users.user_id = users.id');
        $builder->join('auth_groups', 'auth_groups.id = auth_groups_users.group_id');
        $query = $builder->get();

        $data['users'] = $query->getResult();

        return view('page/userList', $data);
    }

    public function tambah()
    {
        // validation
        $validate = $this->validate([
            'username' => [
                'rules' => 'required|min_length[4]',
                'errors' => [
                    'required' => 'wajib di isi',
                    'min_length' => 'Min. 4 karakter'
                ],
            ],
            'email' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'wajib di isi',
                ],
            ],
            'password_hash' => [
                'rules' => 'required|min_length[4]',
                'errors' => [
                    'required' => 'wajib di isi',
                    'min_length' => 'Min. 4 karakter'
                ],
            ],
        ]);
        if (!$validate) {
            return redirect()->to('/user/manager')->withInput();
        }

        // dd($this->request->getVar());
        $data = [
            'username' => $this->request->getVar('username'),
            'full_name' => $this->request->getVar('full_name'),
            'email' => $this->request->getVar('email'),
            'password_hash' => Password::hash($this->request->getVar('password_hash')),
            // 'role' => $this->request->getVar('role'),
            'createed_at' => date('Y-m-d H:i:s'),
        ];

        $addUser = $this->setting->addUser($data);

        if ($addUser) {
            session()->setFlashdata('alert', 'Data Anda Berhasil Ditambahkan.');
            return $this->response->redirect(site_url('/user/manager'));
        }
    }
}
