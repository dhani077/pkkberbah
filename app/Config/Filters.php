<?php

namespace Config;

use CodeIgniter\Config\BaseConfig;

class Filters extends BaseConfig
{
	// Makes reading things below nicer,
	// and simpler to change out script that's used.
	public $aliases = [
		'csrf'     => \CodeIgniter\Filters\CSRF::class,
		'toolbar'  => \CodeIgniter\Filters\DebugToolbar::class,
		'honeypot' => \CodeIgniter\Filters\Honeypot::class,
		'authFilter' => \App\Filters\AuthFilter::class,
		// 'login'      => \Myth\Auth\Filters\LoginFilter::class,
		// 'role'       => \Myth\Auth\Filters\RoleFilter::class,
		// 'permission' => \Myth\Auth\Filters\PermissionFilter::class,
	];

	// Always applied before every request
	public $globals = [
		'before' => [
			//pengecualian agar tidak terjadi looping terus menerus
			'authFilter' => ['except' => ['/', '/users', '/AuthCon/*', 'UsersCon/', '/UsersCon/*', '/users/*', 'PencarianCon/', '/PencarianCon/*', '/pencarian/*']]
			// 'honeypot',
			// 'login'
			// 'csrf',
		],
		'after'  => [
			'authFilter' => ['except' => [
				'/pagesadmin', '/pagesadmin/*',
				'/PencarianCon', '/PencarianCon/*',
				'/admin', '/visimisi', '/flash', '/pencarian/*',
				'/KejarpaketCon', '/KejarpaketCon/*', '/Kejarpaket/*',
				'BukuinvenCon', '/BukuinvenCon/*', 'bukuinventaris/*',
				'BukukegiatanCon', '/BukukegiatanCon/*', 'bukukegiatan/*',
				'CatatanibuhamilCon', 'CatatanibuhamilCon/*', 'catatanibuhamil/*',
				'CatatanKegwargaCon', 'CatatanKegwargaCon/*', '/catatankegwarga/*',
				'PokjaICon/*', '/pokjaI/*',
				'PokjaIICon/*', '/pokjaII/*',
				'PokjaIIICon/*', '/pokjaIII/*',
				'PokjaIVCon/*', '/pokjaIV/*',
				'DataumumtppkkkecCon', 'DataumumtppkkkecCon/*', 'dataumumtppkkkec/*',
				'DaftaranggotatppkkkaderCon', 'DaftaranggotatppkkkaderCon/*', 'daftaranggotatppkkkader/*',
				'PelatihankaderCon', 'PelatihankaderCon/*', 'pelatihankader/*',
				'DaftartimpkkCon', 'DaftartimpkkCon/*', 'daftartimpkk/*',
				'SuratmasukCon', 'SuratmasukCon/*', 'suratmasuk/*',
				'SuratkeluarCon', 'SuratkeluarCon/*', 'suratkeluar/*',
				'UangmasukCon', 'UangmasukCon/*', 'uangmasuk/*',
				'UangkeluarCon', 'UangkeluarCon/*', 'uangkeluar/*',
				'ManfaattanahCon', 'ManfaattanahCon/*', 'manfaattanah/*',
				'IndustrirtCon', 'IndustrirtCon/*', 'industrirt/*',
				'KoperasiCon', 'KoperasiCon/*', 'koperasi/*',
				'TamanbacaanCon', 'TamanbacaanCon/*', 'tamanbacaan/*',
				'PosyanduCon', 'PosyanduCon/*', 'posyandu/*',
				'DatapengunjungposyanduCon', 'DatapengunjungposyanduCon/*', 'pengunjungposyandu/*',
				'PosyanduCon', 'PosyanduCon/*',
				'KegiatanposyanduCon', 'KegiatanposyanduCon/*', 'kegiatanposyandu/*',
				'SimulasiCon', 'SimulasiCon/*', 'simulasi/*',
				'KegiatanLainCon', 'KegiatanLainCon/*', 'kegiatanlain/*',
				'AdminCon', '/AdminCon/*', 'admin/*',
				'VisiMisiCon', 'VisiMisiCon/*', 'visimisi/*',
				'FlashCon', 'FlashCon/*', 'flash/*'
			]],
			'toolbar',
			//'honeypot'
		],
	];

	// Works on all of a particular HTTP method
	// (GET, POST, etc) as BEFORE filters only
	//     like: 'post' => ['CSRF', 'throttle'],
	public $methods = [];

	// List filter aliases and any before/after uri patterns
	// that they should run on, like:
	//    'isLoggedIn' => ['before' => ['account/*', 'profiles/*']],
	public $filters = [];
}
