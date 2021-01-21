<?php

namespace App\Controllers;

use App\Models\KegiatanModel;
use App\Models\KejarpaketModel;
use App\Models\KegiatanposyanduBModel;
use App\Models\VisiMisiModel;
use App\Models\FlashModel;

class PagesAdmin extends BaseController
{
    protected $kegiatanModel;
    protected $kejarpaketModel;
    protected $kegiatanposyanduModel;
    protected $visimisiModel;
    protected $flashModel;

    public function __construct()
    {
        $this->kegiatanModel = new KegiatanModel();
        $this->kejarpaketModel = new KejarpaketModel();
        $this->kegiatanposyanduModel = new KegiatanposyanduBModel();
        $this->visimisiModel = new VisiMisiModel();
        $this->flashModel = new FlashModel();
    }

    public function index()
    {
        $data = [
            'tittle' => 'Home | PKK Berbah',
            'kegiatanpkk' => $this->kegiatanModel->getKegiatanLimit(),
            'PagesAdmin' => 'home'
        ];
        $keywords = $this->request->getVar('keywords');
        if ($keywords) {
            return redirect()->to("/pencarian/cari/$keywords");
        }
        return view('pages/admin/home', $data);
    }

    public function laporan()
    {
        $data = [
            'tittle' => 'Monitoring & Laporan',
            'PagesAdmin' => 'laporan'
        ];
        return view('pages/admin/laporan', $data);
    }

    public function pokjai()
    {
        $data = [
            'tittle' => 'POKJA I',
            'PagesAdmin' => 'pokja'
        ];
        return view('pages/admin/pokjai', $data);
    }

    public function pokjaii()
    {
        $data = [
            'tittle' => 'POKJA II',
            'PagesAdmin' => 'pokja'
        ];
        return view('pages/admin/pokjaii', $data);
    }

    public function pokjaiii()
    {
        $data = [
            'tittle' => 'POKJA III',
            'PagesAdmin' => 'pokja'
        ];
        return view('pages/admin/pokjaiii', $data);
    }

    public function pokjaiv()
    {
        $data = [
            'tittle' => 'POKJA IV',
            'PagesAdmin' => 'pokja'
        ];
        return view('pages/admin/pokjaiv', $data);
    }


    public function data()
    {
        $data = [
            'tittle' => 'Data || PKK Berbah',
            'PagesAdmin' => 'pendataan'
        ];
        return view('pages/admin/data', $data);
    }

    public function tentang()
    {
        $data = [
            'tittle' => 'Tentang | PKK Berbah',
            'PagesAdmin' => 'tentang',
            'alamat' => [
                [
                    'kantor' => 'PKK Kecamtan Berbah',
                    'alamat' => 'Berbah, Sleman',
                    'kota' => 'D.I.Yogyakarta'
                ],
            ]
        ];
        return view('pages/tentang', $data);
    }
}
