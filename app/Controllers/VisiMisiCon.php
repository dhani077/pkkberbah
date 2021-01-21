<?php

namespace App\Controllers;

use App\Models\VisiMisiModel;

class VisiMisiCon extends BaseController
{
    protected $visimisiModel;

    public function __construct()
    {
        $this->visimisiModel = new VisiMisiModel();
    }

    public function index()
    {
        $data = [
            'tittle' => 'Visi Misi',
            'PagesAdmin' => 'non',
            'getvisimisi' => $this->visimisiModel->getVisiMisi(),
            'visimisi' => $this->visimisiModel->getTampil()
        ];
        return view('visimisi/index', $data);
    }

    public function create()
    {
        session();
        $data = [
            'tittle' => 'Visi Misi',
            'PagesAdmin' => 'non',
            'visimisi' => $this->visimisiModel->getTampil(),
            'validation' => \Config\Services::validation()
        ];
        return view('visimisi/create', $data);
    }

    public function save()
    {
        $btn = $this->request->getVar('aksi');
        if ($btn == "tambah") {
            //validation input
            if (!$this->validate([
                'visi' => [
                    'rules' => 'required[visimisi.visi]',
                    'errors' => [
                        'required' => 'Visi harus diisi'
                    ]
                ],
                'misi' => [
                    'rules' => 'required[visimisi.misi]',
                    'errors' => [
                        'required' => 'Misi harus diisi'
                    ]
                ]
            ])) {
                return redirect()->to('/visimisi/create')->withInput();
            }
            $data = [
                'visi' => $this->request->getVar('visi'),
                'misi' => $this->request->getVar('misi')
            ];
            $this->visimisiModel->save($data);
            $visimisi = $this->visimisiModel->getTampil();
            $vm = [
                'visi' => $visimisi['visi'],
                'misi' => $visimisi['misi']
            ];
            session()->set($vm);
            session()->setFlashdata('pesan', 'Data berhasil ditambahkan.');
            return redirect()->to('/visimisi');
        } elseif ($btn == "batal") {
            return redirect()->to('/visimisi');
        }
    }

    public function edit($id)
    {
        $data = [
            'tittle' => 'Visi Misi',
            'visimisi' => $this->visimisiModel->getTampil(),
            'PagesAdmin' => 'non',
            'validation' => \Config\Services::validation(),
            'getvisimisi' => $this->visimisiModel->getVisiMisi($id)
        ];
        return view('visimisi/edit', $data);
    }

    public function update($id)
    {
        $btn = $this->request->getVar('aksi');
        if ($btn == "tambah") {
            if (!$this->validate([
                'visi' => [
                    'rules' => 'required[visimisi.visi]',
                    'errors' => [
                        'required' => 'Visi harus diisi'
                    ]
                ],
                'misi' => [
                    'rules' => 'required[visimisi.misi]',
                    'errors' => [
                        'required' => 'Misi harus diisi'
                    ]
                ]
            ])) {
                return redirect()->to("/visimisi/edit/$id")->withInput();
            }
            $data = [
                'visi' => $this->request->getVar('visi'),
                'misi' => $this->request->getVar('misi')
            ];
            $this->visimisiModel->where('id', $id)->set($data)->update();
            $visimisi = $this->visimisiModel->getTampil();
            $vm = [
                'visi' => $visimisi['visi'],
                'misi' => $visimisi['misi']
            ];
            session()->set($vm);
            session()->setFlashdata('pesan', 'Data berhasil diubah.');
            return redirect()->to('/visimisi');
        } elseif ($btn == "batal") {
            return redirect()->to('/visimisi');
        }
    }
}
