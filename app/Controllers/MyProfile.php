<?php

namespace App\Controllers;

use App\Models\ModelSetting;
use Myth\Auth\Password;

class MyProfile extends BaseController
{
    protected $ModelSetting;
    public function __construct()
    {
        $this->setting = new ModelSetting();
    }

    public function index()
    {
        $data = [
            'title' => 'My Profile',
        ];
        $db      = \Config\Database::connect();
        $builder = $db->table('users');
        $builder->select('users.id as userid, username, email, name');
        $builder->join('auth_groups_users', 'auth_groups_users.user_id = users.id');
        $builder->join('auth_groups', 'auth_groups.id = auth_groups_users.group_id');
        $query = $builder->get();

        $data['users'] = $query->getResult();
        // $data['validation'] = \Config\Services::validation();;
        return view('page/myProfile', $data);
    }


    public function UpdateMyData()
    {
        // dd($this->request->getVar());
        $id = $this->request->getPost('id');
        $data = [
            'full_name' => $this->request->getVar('full_name'),
            'user_about' => $this->request->getPost('user_about'),
        ];

        $this->setting->updateMyData($data, $id);
        // session()->setFlashdata('alert', 'Data Berhasil disimpan.');
        return $this->response->redirect(site_url('/MyProfile'));
    }

    public function UpdatePassword()
    {
        // validation
        $validate = $this->validate([
            'currentPassword' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'wajib di isi',
                ],
            ],
            'newpassword' => [
                'rules' => 'required|min_length[4]',
                'errors' => [
                    'required' => 'wajib di isi',
                    'min_length' => 'Min. 4 karakter'
                ],
            ],
            'renewpassword' => [
                'rules' => 'required|matches[newpassword]',
                'errors' => [
                    'required' => 'wajib di isi',
                    'matches' => 'konfirmasi password baru tidak sama',
                ],
            ],
        ]);
        if (!$validate) {
            return redirect()->to('/MyProfile')->withInput();
        }

        // dd($this->request->getVar());
        $id = $this->request->getPost('id');
        $data = [
            'password_hash' => Password::hash($this->request->getVar('newpassword')),
            'updated_at' => date('Y-m-d H:i:s'),
        ];

        $this->setting->UpdatePassword($data, $id);
        // session()->setFlashdata('alert', 'Data Berhasil disimpan.');
        return redirect()->to('/MyProfile');
    }
}
