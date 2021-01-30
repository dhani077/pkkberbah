<?php

namespace App\Controllers;

use App\Models\AdminModel;
use App\Models\AuthModel;

class AdminCon extends BaseController
{
    protected $adminModel;
    protected $authModel;

    public function __construct()
    {
        $this->adminModel = new AdminModel();
        $this->authModel = new AuthModel();
    }
    public function index()
    {
        $data = [
            'PagesAdmin' => '',
            'tittle' => 'Daftar Admin',
            'admin' => $this->adminModel->getDataadmin()
        ];
        return view('admin/index', $data);
    }

    public function create()
    {
        session();
        $data = [
            'PagesAdmin' => '',
            'tittle' => 'Form Tambah Daftar Admin',
            'validation' => \Config\Services::validation()
        ];
        return view('admin/create', $data);
    }

    public function save()
    {
        $btn = $this->request->getVar('aksi');
        if ($btn == "tambah") {
            //validation input
            if (!$this->validate([
                'nama' => [
                    'rules' => 'required[admin.nama]',
                    'errors' => [
                        'required' => 'Nama harus diisi'
                    ]
                ],
                'email' => [
                    'rules' => 'required[admin.email]',
                    'errors' => [
                        'required' => 'Email harus diisi'
                    ]
                ],
                'no_hp' => [
                    'rules' => 'required[admin.no_hp]',
                    'errors' => [
                        'required' => 'No HP harus diisi'
                    ]
                ],
                'is_active' => [
                    'rules' => 'required[admin.is_active]',
                    'errors' => [
                        'required' => 'Status aktif harus diisi'
                    ]
                ],
                'username' => [
                    'rules' => 'required[admin.username]',
                    'errors' => [
                        'required' => 'Username harus diisi'
                    ]
                ],
                'passwordA' => [
                    'rules' => 'required[admin.password]',
                    'errors' => [
                        'required' => 'Password harus diisi'
                    ]
                ],
                'passwordB' => [
                    'rules' => 'required[admin.password]',
                    'errors' => [
                        'required' => 'Konfirmasi password harus diisi'
                    ]
                ],
            ])) {
                return redirect()->to('/admin/create')->withInput();
            }
            $passwordA = $this->request->getVar('passwordA');
            $passwordB = $this->request->getVar('passwordB');
            if ($passwordA != $passwordB) {
                session()->setFlashdata('gagal', 'Konfirmasi password harus sama dengan password!');
                return redirect()->to('/admin/create')->withInput();
            } else {
                $options = [
                    'cost' => 10,
                ];
                $pass = password_hash($passwordA, PASSWORD_BCRYPT, $options);
            }

            $data = [
                'nama' => $this->request->getVar('nama'),
                'email' => $this->request->getVar('email'),
                'no_hp' => $this->request->getVar('no_hp'),
                'username' => $this->request->getVar('username'),
                'password' => $pass,
                'is_active' => $this->request->getVar('is_active'),
                'level' => $this->request->getVar('level')
            ];
            $this->adminModel->save($data);
            session()->setFlashdata('pesan', 'Data berhasil ditambahkan.');
            return redirect()->to('/admin');
        } elseif ($btn == "batal") {
            return redirect()->to('/admin');
        }
    }

    public function delete($id)
    {
        $this->adminModel->where('id_admin', $id)->delete();
        session()->setFlashdata('hapus', "Admin berhasil dihapus.");
        return redirect()->to('/admin');
    }

    public function edit($id)
    {
        $data = [
            'tittle' => 'Form Ubah Data Admin',
            'PagesAdmin' => '',
            'validation' => \Config\Services::validation(),
            'admin' => $this->adminModel->getDataadmin($id)
        ];
        return view('admin/edit', $data);
    }

    public function update($id)
    {
        $btn = $this->request->getVar('aksi');
        if ($btn == "tambah") {
            if (!$this->validate([
                'nama' => [
                    'rules' => 'required[admin.nama]',
                    'errors' => [
                        'required' => 'Nama harus diisi'
                    ]
                ],
                'email' => [
                    'rules' => 'required[admin.email]',
                    'errors' => [
                        'required' => 'Email harus diisi'
                    ]
                ],
                'no_hp' => [
                    'rules' => 'required[admin.no_hp]',
                    'errors' => [
                        'required' => 'No HP harus diisi'
                    ]
                ],
                'is_active' => [
                    'rules' => 'required[admin.is_active]',
                    'errors' => [
                        'required' => 'Status aktif harus diisi'
                    ]
                ],
                'username' => [
                    'rules' => 'required[admin.username]',
                    'errors' => [
                        'required' => 'Username harus diisi'
                    ]
                ],
                // 'passwordA' => [
                //     'rules' => 'required[admin.password]',
                //     'errors' => [
                //         'required' => 'Password harus diisi'
                //     ]
                // ],
                // 'passwordB' => [
                //     'rules' => 'required[admin.password]',
                //     'errors' => [
                //         'required' => 'Konfirmasi password harus diisi'
                //     ]
                // ],
            ])) {
                return redirect()->to("/AdminCon/edit/$id")->withInput();
            }
            $passwordA = $this->request->getVar('passwordA');
            $passwordB = $this->request->getVar('passwordB');
            if (empty($passwordA) && empty($passwordB)) {
                $pass = $this->request->getVar('password');
            } else if ($passwordA != $passwordB) {
                session()->setFlashdata('gagal', 'Password tidak sama!');
                return redirect()->to("/admin/edit/$id")->withInput();
            } else {
                $options = [
                    'cost' => 10,
                ];
                $pass = password_hash($passwordA, PASSWORD_BCRYPT, $options);
            }
            $data = [
                'nama' => $this->request->getVar('nama'),
                'email' => $this->request->getVar('email'),
                'no_hp' => $this->request->getVar('no_hp'),
                'username' => $this->request->getVar('username'),
                'password' => $pass,
                'is_active' => $this->request->getVar('is_active'),
                'level' => $this->request->getVar('level')
            ];
            $this->adminModel->where('id_admin', $id)->set($data)->update();
            session()->setFlashdata('pesan', 'Data berhasil diubah.');
            return redirect()->to('/admin');
        } elseif ($btn == "batal") {
            return redirect()->to('/admin');
        }
    }

    public function ganti($id)
    {
        $data = [
            'tittle' => 'Form Ubah Password',
            'PagesAdmin' => '',
            'validation' => \Config\Services::validation(),
            'admin' => $this->adminModel->getDataadmin($id)
        ];
        return view('admin/gantipassword', $data);
    }
    public function gantiPassword($id)
    {
        $user = $this->authModel->getAdmin($id);
        $btn = $this->request->getVar('aksi');
        if ($btn == "tambah") {
            if (!$this->validate([
                'passwordLama' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Password lama harus diisi'
                    ]
                ],
                'passwordA' => [
                    'rules' => 'required[admin.password]',
                    'errors' => [
                        'required' => 'Password baru harus diisi'
                    ]
                ],
                'passwordB' => [
                    'rules' => 'required[admin.password]',
                    'errors' => [
                        'required' => 'Konfirmasi password harus diisi'
                    ]
                ],
            ])) {
                return redirect()->to("/admin/ganti/$id")->withInput();
            }
            $passwordLama = $this->request->getVar('passwordLama');
            $passwordA = $this->request->getVar('passwordA');
            $passwordB = $this->request->getVar('passwordB');
            if (password_verify($passwordLama, $user['password'])) {
                if ($passwordLama == $passwordB && $passwordA == $passwordLama) {
                    session()->setFlashdata('gagal', 'Password tidak boleh sama dengan yang lama!');
                    return redirect()->to("/admin/ganti/$id");
                } elseif ($passwordA != $passwordB) {
                    session()->setFlashdata('gagal', 'Password baru dengan konfirmasi password tidak sama!');
                    return redirect()->to("/admin/ganti/$id");
                } else {
                    $options = [
                        'cost' => 10,
                    ];
                    $pass = password_hash($passwordA, PASSWORD_BCRYPT, $options);
                }
            } else {
                session()->setFlashdata('gagal', 'Password lama salah!');
                return redirect()->to("/admin/ganti/$id");
            }
            $data = [
                'nama' => $this->request->getVar('nama'),
                'email' => $this->request->getVar('email'),
                'no_hp' => $this->request->getVar('no_hp'),
                'username' => $this->request->getVar('username'),
                'password' => $pass,
                'is_active' => $this->request->getVar('is_active'),
                'level' => $this->request->getVar('level')
            ];
            $this->adminModel->where('id_admin', $id)->set($data)->update();
            session()->setFlashdata('pesan', 'Password berhasil diubah.');
            return redirect()->to('/admin/home');
        } elseif ($btn == "batal") {
            return redirect()->to('/admin/home');
        }
    }
}
