<?php

namespace App\Controllers;

use App\Models\FlashModel;
use App\Models\VisiMisiModel;

class FlashCon extends BaseController
{
    protected $flashModel;
    protected $visimisiModel;

    public function __construct()
    {
        $this->flashModel = new FlashModel();
        $this->visimisiModel = new VisiMisiModel();
    }

    public function index()
    {
        session();
        $data = [
            'tittle' => 'Flash',
            'PagesAdmin' => 'non',
            'validation' => \Config\Services::validation(),
            'visimisi' => $this->visimisiModel->getTampil(),
            'flash' => $this->flashModel->getFlash()
        ];
        return view('flash/index', $data);
    }

    public function save()
    {
        $btn = $this->request->getVar('aksi');
        if ($btn == "ubah") {
            $fileFlash = $this->request->getFile('nama');
            if ($fileFlash->getError() == 4) {
                session()->setFlashdata('gagal', 'Tampilan flash tidak berhasil diubah karena tidak ada file yang dipilih.');
                return redirect()->to('/FlashCon');
            }
            //validation input
            if (!$this->validate([
                'nama' => [
                    'rules' => 'max_size[nama,15024]|is_image[nama]|mime_in[nama,image/jpg,image/jpeg,image/png]',
                    'errors' => [
                        'max_size' => 'Ukuran gambar terlalu besar.',
                        'is_image' => 'Yang anda pilih bukan gambar.',
                        'mime_in' => 'Yang anda pilih bukan gambar'
                    ]
                ]
            ])) {
                return redirect()->to('/flash/index')->withInput();
            }
            $flashLama = $this->flashModel->getFlash();
            //ambil gambar
            //generate nama random
            $namaFlash = $fileFlash->getRandomName();
            //pindahkan file ke folder img
            $fileFlash->move('flash', $namaFlash);
            if ($flashLama != null) {
                unlink('flash/' . $flashLama['nama']);
                $this->flashModel->where('nama', $flashLama['nama'])->delete();
            }
            $data = [
                'nama' => $namaFlash
            ];
            $this->flashModel->save($data);
            session()->setFlashdata('pesan', 'Tampilan flash berhasil diubah.');
            $flash = [
                'flash' => $namaFlash
            ];
            session()->set($flash);
            return redirect()->to('/flash/index');
        } elseif ($btn == "batal") {
            return redirect()->to('/');
        }
    }
}
