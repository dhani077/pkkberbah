<?php

namespace App\Controllers;

use App\Models\AuthModel;
use App\Models\FlashModel;
use App\Models\VisiMisiModel;


class AuthCon extends BaseController
{
	protected $loginModel;
	protected $visimisiModel;
	protected $flashModel;

	public function __construct()
	{
		$this->authModel = new AuthModel();
		$this->visimisiModel = new VisiMisiModel();
		$this->flashModel = new FlashModel();
	}
	//enkripsi password 'admin'
	// public function test()
	// {
	// 	$options = [
	// 		'cost' => 10,
	// 	];
	// 	echo password_hash('admin123', PASSWORD_BCRYPT, $options);
	// }

	public function index()
	{
		session();
		$data = [
			'validation' => \Config\Services::validation()
		];
		return view('auth/login', $data);
	}

	public function cekLogin()
	{
		$visimisi = $this->visimisiModel->getVisiMisi();
		$flash = $this->flashModel->getFlash();
		$flashNama = $flash['nama'];
		if ($visimisi) {
			foreach ($visimisi as $vm) :
				$visi = $vm['visi'];
				$misi = $vm['misi'];
			endforeach;
		} elseif (empty($visimisi)) {
			$visi = '';
			$misi = '';
		}
		if (!$this->validate([
			'username' => [
				'rules' => 'required[admin.username]',
				'errors' => [
					'required' => 'username tidak boleh kosong'
				]
			],
			'password' => [
				'rules' => 'required[password]',
				'errors' => [
					'required' => 'password tidak boleh kosong'
				]
			]
		])) {
			return redirect()->to('/')->withInput();
		}
		$username = $this->request->getVar('username');
		$password = $this->request->getVar('password');
		$data = [
			'validation' => \Config\Services::validation()
		];
		$user = $this->authModel->cekUsername($username);

		if ($username == null) {
			return view('auth/login', $data);
		} elseif ($user == null) {
			session()->setFlashdata('pesan', 'Username tidak terdaftar!');
			return redirect()->to('/')->withInput();
		} elseif ($user != null) {
			if ($user['is_active'] == 1) {
				if (password_verify($password, $user['password'])) {
					$data = [
						'visi' => $visi,
						'misi' => $misi,
						'flash' => $flashNama,
						'id_admin' => $user['id_admin'],
						'nama' => $user['nama'],
						'email' => $user['email'],
						'level' => $user['level'],
						'logged' => TRUE
					];
					session()->set($data);
					return redirect()->to('/admin/home');
				} else {
					session()->setFlashdata('pesan', 'Password salah!');
					return redirect()->to('/')->withInput();
				}
			} else {
				session()->setFlashdata('pesan', 'Username tidak aktif!');
				return redirect()->to('/')->withInput();
			}
		}
	}

	public function logout()
	{
		$session = session();
		$session->destroy();
		return redirect()->to('/');
	}
}
