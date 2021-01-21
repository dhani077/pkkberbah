<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php')) {
	require SYSTEMPATH . 'Config/Routes.php';
}

/**
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(true);

/**
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
//$routes->match(['get', 'post'], '/auth/login', 'Auth::login');

$routes->get('/', 'AuthCon::index');
$routes->get('/logout', 'AuthCon::logout');

$routes->get('/admin', 'AdminCon');
$routes->get('/visimisi', 'VisiMisiCon');
$routes->get('/visimisi/create', 'VisiMisiCon::create');
$routes->get('/visimisi/edit/(:num)', 'VisiMisiCon::edit/$1');
$routes->get('/flash/index', 'FlashCon::index');

$routes->get('/admin/home', 'PagesAdmin');
$routes->get('/admin/data', 'PagesAdmin::data');
$routes->get('/admin/laporan', 'PagesAdmin::laporan');
$routes->get('/admin/tentang', 'PagesAdmin::tentang');
$routes->get('/admin/pokjai', 'PagesAdmin::pokjai');
$routes->get('/admin/pokjaii', 'PagesAdmin::pokjaii');
$routes->get('/admin/pokjaiii', 'PagesAdmin::pokjaiii');
$routes->get('/admin/pokjaiv', 'PagesAdmin::pokjaiv');
$routes->post('/admin/cari', 'PagesAdmin');

$routes->get('/pencarian/cari/(:any)', 'PencarianCon::cari/$1');
$routes->get('/pencarian/bukuinven/(:any)', 'PencarianCon::searchBukuinven/$1');
$routes->get('/pencarian/bukukegiatan/(:any)', 'PencarianCon::searchBukukegiatan/$1');
$routes->get('/pencarian/daftaranggota/(:any)', 'PencarianCon::searchDaftaranggota/$1');
$routes->get('/pencarian/daftartimpkk/(:any)', 'PencarianCon::searchDaftartimpkk/$1');
$routes->get('/pencarian/industrirt/(:any)', 'PencarianCon::searchIndustrirt/$1');
$routes->get('/pencarian/kegiatanlain/(:any)', 'PencarianCon::searchKegiatanlain/$1');
$routes->get('/pencarian/kejarpaket/(:any)', 'PencarianCon::searchKejarpaket/$1');
$routes->get('/pencarian/koperasi/(:any)', 'PencarianCon::searchKoperasi/$1');
$routes->get('/pencarian/manfaattanah/(:any)', 'PencarianCon::searchManfaattanah/$1');
$routes->get('/pencarian/posyandu/(:any)', 'PencarianCon::searchPosyandu/$1');
$routes->get('/pencarian/simulasi/(:any)', 'PencarianCon::searchSimulasi/$1');
$routes->get('/pencarian/tamanbacaan/(:any)', 'PencarianCon::searchTamanbacaan/$1');

$routes->get('/admin/create', 'AdminCon::create');
$routes->get('/admin/edit/(:segment)', 'AdminCon::edit/$1');
$routes->delete('/admin/(:num)', 'AdminCon::delete/$1');
$routes->get('/admin/ganti/(:num)', 'AdminCon::ganti/$1');

$routes->get('/visimisi/edit/(:segment)', 'VisiMisiCon::edit/$1');

$routes->get('/bukuinventaris/index', 'BukuinvenCon');
$routes->get('/bukuinventaris/create', 'BukuinvenCon::create');
$routes->get('/bukuinventaris/edit/(:segment)', 'BukuinvenCon::edit/$1');
$routes->delete('/bukuinventaris/(:num)', 'BukuinvenCon::delete/$1');
$routes->get('/bukuinventaris/range', 'BukuinvenCon::range');
$routes->post('/bukuinventaris/lihatrange', 'BukuinvenCon::lihatRange');
$routes->post('/bukuinventaris/print', 'BukuinvenCon::print');

$routes->get('/kegiatanlain/index', 'KegiatanLainCon');
$routes->get('/kegiatanlain/range', 'KegiatanLainCon::range');
$routes->post('/kegiatanlain/lihatrange', 'KegiatanLainCon::lihatRange');
$routes->get('/kegiatanlain/create', 'KegiatanLainCon::create');
$routes->get('/kegiatanlain/edit/(:any)', 'KegiatanLainCon::edit/$1');
$routes->delete('/kegiatanlain/(:num)', 'KegiatanLainCon::delete/$1');
$routes->get('kegiatanlain/detail/(:any)', 'KegiatanLainCon::detail/$1');
$routes->post('kegiatanlain/print', 'KegiatanLainCon::print');

$routes->get('/pokjai/index', 'PokjaICon::index');
$routes->post('/pokjai/detail', 'PokjaICon::detail');
$routes->get('/pokjai/create', 'PokjaICon::create');
$routes->get('/pokjai/edit/(:segment)', 'PokjaICon::edit/$1');
$routes->delete('/pokjai/(:num)', 'PokjaICon::delete/$1');
$routes->get('/pokjai/range', 'PokjaICon::range');
$routes->post('/pokjai/lihatrange', 'PokjaICon::lihatRange');
$routes->post('/pokjai/print', 'PokjaICon::print');

$routes->get('/pokjaii/index', 'PokjaIICon::index');
$routes->post('/pokjaii/detail', 'PokjaIICon::detail');
$routes->get('/pokjaii/create', 'PokjaIICon::create');
$routes->get('/pokjaii/edit/(:segment)', 'PokjaIICon::edit/$1');
$routes->delete('/pokjaii/(:num)', 'PokjaIICon::delete/$1');
$routes->get('/pokjaii/range', 'PokjaIICon::range');
$routes->post('/pokjaii/lihatrange', 'PokjaIICon::lihatRange');
$routes->post('/pokjaii/print', 'PokjaIICon::print');

$routes->get('/pokjaiii/index', 'PokjaIIICon::index');
$routes->post('/pokjaiii/detail', 'PokjaIIICon::detail');
$routes->get('/pokjaiii/create', 'PokjaIIICon::create');
$routes->get('/pokjaiii/edit/(:segment)', 'PokjaIIICon::edit/$1');
$routes->delete('/pokjaiii/(:num)', 'PokjaIIICon::delete/$1');
$routes->get('/pokjaiii/range', 'PokjaIIICon::range');
$routes->post('/pokjaiii/lihatrange', 'PokjaIIICon::lihatRange');
$routes->post('/pokjaiii/print', 'PokjaIIICon::print');

$routes->get('/pokjaiv/index', 'PokjaIVCon::index');
$routes->post('/pokjaiv/detail', 'PokjaIVCon::detail');
$routes->get('/pokjaiv/create', 'PokjaIVCon::create');
$routes->get('/pokjaiv/edit/(:segment)', 'PokjaIVCon::edit/$1');
$routes->delete('/pokjaiv/(:num)', 'PokjaIVCon::delete/$1');
$routes->get('/pokjaiv/range', 'PokjaIVCon::range');
$routes->post('/pokjaiv/lihatrange', 'PokjaIVCon::lihatRange');
$routes->post('/pokjaiv/print', 'PokjaIVCon::print');

$routes->get('/dataumumtppkkkec/index', 'DataumumtppkkkecCon');
$routes->get('/dataumumtppkkkec/create', 'DataumumtppkkkecCon::create');
$routes->get('/dataumumtppkkkec/edit/(:segment)', 'DataumumtppkkkecCon::edit/$1');
$routes->delete('/dataumumtppkkkec/(:num)', 'DataumumtppkkkecCon::delete/$1');
$routes->post('/dataumumtppkkkec/detail', 'DataumumtppkkkecCon::detail');
$routes->get('/dataumumtppkkkec/range', 'DataumumtppkkkecCon::range');
$routes->post('/dataumumtppkkkec/lihatrange', 'DataumumtppkkkecCon::lihatRange');
$routes->post('/dataumumtppkkkec/print', 'DataumumtppkkkecCon::print');

$routes->get('/daftaranggotatppkkkader/index', 'DaftaranggotatppkkkaderCon');
$routes->get('/daftaranggotatppkkkader/detail/(:any)', 'DaftaranggotatppkkkaderCon::detail/$1');
$routes->get('/daftaranggotatppkkkader/create/(:num)', 'DaftaranggotatppkkkaderCon::create/$1');
$routes->get('/daftaranggotatppkkkader/edit/(:any)', 'DaftaranggotatppkkkaderCon::edit/$1');
$routes->delete('/daftaranggotatppkkkader/delete/(:any)', 'DaftaranggotatppkkkaderCon::delete/$1');
$routes->get('/daftaranggotatppkkkader/wilayahrange', 'DaftaranggotatppkkkaderCon::wilayahRange');
$routes->get('/daftaranggotatppkkkader/range/(:num)', 'DaftaranggotatppkkkaderCon::range/$1');
$routes->post('/daftaranggotatppkkkader/lihatrange/(:num)', 'DaftaranggotatppkkkaderCon::lihatRange/$1');
$routes->post('/daftaranggotatppkkkader/print/(:num)', 'DaftaranggotatppkkkaderCon::print/$1');

$routes->get('/pelatihankader/index', 'PelatihankaderCon');
$routes->get('/pelatihankader/detail/(:num)', 'PelatihankaderCon::detail/$1');
$routes->get('/pelatihankader/datapelatihan/(:any)', 'PelatihankaderCon::dataPelatihan/$1');
$routes->get('/pelatihankader/createpelatihan/(:any)', 'PelatihankaderCon::createDatapelatihan/$1');
$routes->get('/pelatihankader/editdatapelatihan/(:num)', 'PelatihankaderCon::editDatapelatihan/$1');
$routes->delete('/pelatihankader/deletedatapelatihan/(:num)', 'PelatihankaderCon::deleteDatapelatihan/$1');
$routes->get('/pelatihankader/wilayahrange', 'PelatihankaderCon::wilayahRange');
$routes->get('/pelatihankader/range/(:num)', 'PelatihankaderCon::range/$1');
$routes->post('/pelatihankader/lihatrange/(:any)', 'PelatihankaderCon::lihatRange/$1');
$routes->post('/pelatihankader/detailrange/(:any)', 'PelatihankaderCon::detailRange/$1');
$routes->post('/pelatihankader/print/(:any)', 'PelatihankaderCon::print/$1');

$routes->get('/daftartimpkk/index', 'DaftartimpkkCon');
$routes->get('/daftartimpkk/create/(:num)', 'DaftartimpkkCon::create/$1');
$routes->get('/daftartimpkk/edit/(:segment)', 'DaftartimpkkCon::edit/$1');
$routes->delete('/daftartimpkk/(:num)', 'DaftartimpkkCon::delete/$1');
$routes->get('/daftartimpkk/detail/(:any)', 'DaftartimpkkCon::detail/$1');
$routes->get('/daftartimpkk/wilayahrange', 'DaftartimpkkCon::wilayahRange');
$routes->get('/daftartimpkk/range/(:num)', 'DaftartimpkkCon::range/$1');
$routes->post('/daftartimpkk/lihatrange/(:num)', 'DaftartimpkkCon::lihatRange/$1');
$routes->post('/daftartimpkk/print/(:num)', 'DaftartimpkkCon::print/$1');

$routes->get('/pengunjungposyandu/tahun/(:num)', 'DatapengunjungposyanduCon::tahun/$1');
$routes->get('/pengunjungposyandu/create/(:num)', 'DatapengunjungposyanduCon::create/$1');
$routes->get('/pengunjungposyandu/edit/(:segment)', 'DatapengunjungposyanduCon::edit/$1');
$routes->delete('/pengunjungposyandu/(:num)', 'DatapengunjungposyanduCon::delete/$1');
$routes->post('/pengunjungposyandu/detail/(:num)', 'DatapengunjungposyanduCon::detail/$1');
$routes->get('/pengunjungposyandu/range/(:num)', 'DatapengunjungposyanduCon::range/$1');
$routes->post('/pengunjungposyandu/lihatrange/(:num)', 'DatapengunjungposyanduCon::lihatRange/$1');
$routes->post('/pengunjungposyandu/print/(:num)', 'DatapengunjungposyanduCon::print/$1');

$routes->get('/kegiatanposyandu/tahun/(:any)', 'KegiatanposyanduCon::tahun/$1');
$routes->get('/kegiatanposyandu/create/(:num)', 'KegiatanposyanduCon::create/$1');
$routes->get('/kegiatanposyandu/edit/(:segment)', 'KegiatanposyanduCon::edit/$1');
$routes->delete('/kegiatanposyandu/(:num)', 'KegiatanposyanduCon::delete/$1');
$routes->post('/kegiatanposyandu/detail/(:any)', 'KegiatanposyanduCon::detail/$1');
$routes->get('/kegiatanposyandu/range/(:any)', 'KegiatanposyanduCon::range/$1');
$routes->post('/kegiatanposyandu/lihatrange/(:any)', 'KegiatanposyanduCon::lihatRange/$1');
$routes->post('/kegiatanposyandu/print/(:num)', 'KegiatanposyanduCon::print/$1');

$routes->get('/catatankegwarga/index', 'CatatanKegwargaCon');
$routes->get('/catatankegwarga/create', 'CatatanKegwargaCon::create');
$routes->get('/catatankegwarga/edit/(:segment)', 'CatatanKegwargaCon::edit/$1');
$routes->delete('/catatankegwarga/(:num)', 'CatatanKegwargaCon::delete/$1');
$routes->post('/catatankegwarga/detail', 'CatatanKegwargaCon::detail');
$routes->get('/catatankegwarga/range', 'CatatanKegwargaCon::range');
$routes->post('/catatankegwarga/lihatrange', 'CatatanKegwargaCon::lihatRange');
$routes->post('/catatankegwarga/print', 'CatatanKegwargaCon::print');

$routes->get('/catatanibuhamil/index', 'CatatanibuhamilCon');
$routes->post('/catatanibuhamil/bulan', 'CatatanibuhamilCon::bulan');
$routes->get('/catatanibuhamil/detail/(:any)/(:any)', 'CatatanibuhamilCon::detail/$1/$2');
$routes->get('/catatanibuhamil/range', 'CatatanibuhamilCon::range');
$routes->post('/catatanibuhamil/lihatrange', 'CatatanibuhamilCon::lihatRange');
$routes->post('/catatanibuhamil/print', 'CatatanibuhamilCon::print');
$routes->get('/catatanibuhamil/create', 'CatatanibuhamilCon::create');
$routes->get('/catatanibuhamil/edit/(:segment)', 'CatatanibuhamilCon::edit/$1');
$routes->delete('/catatanibuhamil/(:num)', 'CatatanibuhamilCon::delete/$1');

$routes->get('/bukukegiatan/index', 'BukukegiatanCon');
$routes->get('/bukukegiatan/range', 'BukukegiatanCon::range');
$routes->get('/bukukegiatan/create', 'BukukegiatanCon::create');
$routes->get('/bukukegiatan/edit/(:segment)', 'BukukegiatanCon::edit/$1');
$routes->delete('/bukukegiatan/(:num)', 'BukukegiatanCon::delete/$1');
$routes->get('/bukukegiatan/range', 'BukukegiatanCon::range');
$routes->post('/bukukegiatan/lihatrange', 'BukukegiatanCon::lihatrange');
$routes->post('/bukukegiatan/print', 'BukukegiatanCon::print');

$routes->get('/suratmasuk/index', 'SuratmasukCon');
$routes->get('/suratmasuk/range', 'SuratmasukCon::range');
$routes->post('/suratmasuk/lihatrange', 'SuratmasukCon::lihatRange');
$routes->post('/suratmasuk/print', 'SuratmasukCon::print');
$routes->get('/suratmasuk/create', 'SuratmasukCon::create');
$routes->get('/suratmasuk/edit/(:segment)', 'SuratmasukCon::edit/$1');
$routes->delete('/suratmasuk/(:num)', 'SuratmasukCon::delete/$1');

$routes->get('/suratkeluar/index', 'SuratkeluarCon');
$routes->get('/suratkeluar/range', 'SuratkeluarCon::range');
$routes->post('/suratkeluar/lihatrange', 'SuratkeluarCon::lihatRange');
$routes->post('/suratkeluar/print', 'SuratkeluarCon::print');
$routes->get('/suratkeluar/create', 'SuratkeluarCon::create');
$routes->get('/suratkeluar/edit/(:segment)', 'SuratkeluarCon::edit/$1');
$routes->delete('/suratkeluar/(:num)', 'SuratkeluarCon::delete/$1');

$routes->get('/uangmasuk/create', 'UangmasukCon::create');
$routes->get('/uangmasuk/range', 'UangmasukCon::range');
$routes->post('/uangmasuk/lihatrange', 'UangmasukCon::lihatRange');
$routes->post('/uangmasuk/print', 'UangmasukCon::print');
$routes->get('/uangmasuk/edit/(:segment)', 'UangmasukCon::edit/$1');
$routes->delete('/uangmasuk/(:num)', 'UangmasukCon::delete/$1');
$routes->get('/uangmasuk/index', 'UangmasukCon');

$routes->get('/uangkeluar/create', 'UangkeluarCon::create');
$routes->get('/uangkeluar/range', 'UangkeluarCon::range');
$routes->post('/uangkeluar/lihatrange', 'UangkeluarCon::lihatRange');
$routes->post('/uangkeluar/print', 'UangkeluarCon::print');
$routes->get('/uangkeluar/edit/(:segment)', 'UangkeluarCon::edit/$1');
$routes->delete('/uangkeluar/(:num)', 'UangkeluarCon::delete/$1');
$routes->get('/uangkeluar/index', 'UangkeluarCon');

$routes->get('/manfaattanah/create', 'ManfaattanahCon::create');
$routes->get('/manfaattanah/edit/(:segment)', 'ManfaattanahCon::edit/$1');
$routes->delete('/manfaattanah/(:num)', 'ManfaattanahCon::delete/$1');
$routes->get('/manfaattanah/index', 'ManfaattanahCon');
$routes->get('/manfaattanah/range', 'ManfaattanahCon::range');
$routes->post('/manfaattanah/lihatrange', 'ManfaattanahCon::lihatRange');
$routes->post('/manfaattanah/print', 'ManfaattanahCon::print');

$routes->get('/industrirt/create', 'IndustrirtCon::create');
$routes->get('/industrirt/index', 'IndustrirtCon');
$routes->get('/industrirt/range', 'IndustrirtCon::range');
$routes->post('/industrirt/lihatrange', 'IndustrirtCon::lihatRange');
$routes->post('/industrirt/print', 'IndustrirtCon::print');
$routes->get('/industrirt/edit/(:segment)', 'IndustrirtCon::edit/$1');
$routes->delete('/industrirt/(:num)', 'IndustrirtCon::delete/$1');

$routes->get('/koperasi/index', 'KoperasiCon');
$routes->get('/koperasi/detail/(:num)', 'KoperasiCon::detail/$1');
$routes->get('/koperasi/wilayahkoperasi', 'KoperasiCon::wilayahKoperasi');
$routes->get('/koperasi/lihatkoperasi/(:num)', 'KoperasiCon::lihatKoperasi/$1');
$routes->post('/koperasi/print/(:num)', 'KoperasiCon::print/$1');
$routes->get('/koperasi/create/(:num)', 'KoperasiCon::create/$1');
$routes->get('/koperasi/edit/(:segment)', 'KoperasiCon::edit/$1');
$routes->delete('/koperasi/(:num)', 'KoperasiCon::delete/$1');

$routes->get('/kejarpaket/index', 'KejarpaketCon');
$routes->get('/kejarpaket/wilayahrange', 'KejarpaketCon::wilayahRange');
$routes->get('/kejarpaket/range/(:num)', 'KejarpaketCon::range/$1');
$routes->post('/kejarpaket/lihatrange/(:num)', 'KejarpaketCon::lihatRange/$1');
$routes->post('/kejarpaket/print/(:num)', 'KejarpaketCon::print/$1');
$routes->get('/kejarpaket/create/(:num)', 'KejarpaketCon::create/$1');
$routes->get('/kejarpaket/edit/(:segment)', 'KejarpaketCon::edit/$1');
$routes->delete('/kejarpaket/(:num)', 'KejarpaketCon::delete/$1');
$routes->get('/kejarpaket/detail/(:num)', 'KejarpaketCon::detail/$1');
$routes->get('KejarpaketCon/search/(:any)', 'KejarpaketCon::search/$1');

$routes->get('/posyandu/index', 'PosyanduCon');
$routes->get('/posyandu/indexlaporan', 'PosyanduCon::indexLaporan');
$routes->get('/posyandu/detaillaporan/(:num)', 'PosyanduCon::detailLaporan/$1');
$routes->get('/posyandu/layananlaporan/(:num)', 'PosyanduCon::layananLaporan/$1');
$routes->get('/posyandu/printlayanan/(:num)', 'PosyanduCon::printLayanan/$1');
$routes->get('/posyandu/create/(:num)', 'PosyanduCon::create/$1');
$routes->get('/posyandu/edit/(:num)', 'PosyanduCon::edit/$1');
$routes->delete('/posyandu/(:num)', 'PosyanduCon::delete/$1');
$routes->get('/posyandu/detail/(:any)', 'PosyanduCon::detail/$1');
$routes->get('/posyandu/jenislayanan/(:any)', 'PosyanduCon::jenisLayanan/$1');
$routes->get('/posyandu/createlayanan/(:any)', 'PosyanduCon::createLayanan/$1');
$routes->get('/posyandu/pengunjunglayanan/(:num)', 'PosyanduCon::pengunjungLayanan/$1');
$routes->get('/posyandu/editlayanan/(:num)', 'PosyanduCon::editLayanan/$1');
$routes->delete('/posyandu/deletelayanan/(:num)', 'PosyanduCon::deleteLayanan/$1');
$routes->get('/posyandu/posyandulaporan/(:num)', 'PosyanduCon::posyanduLaporan/$1');

$routes->get('/simulasi/wilayahrange', 'SimulasiCon::wilayahRange');
$routes->get('/simulasi/range/(:num)', 'SimulasiCon::range/$1');
$routes->post('/simulasi/lihatrange/(:num)', 'SimulasiCon::lihatRange/$1');
$routes->post('/simulasi/print/(:num)', 'SimulasiCon::print/$1');
$routes->get('/simulasi/create/(:num)', 'SimulasiCon::create/$1');
$routes->get('/simulasi/edit/(:segment)', 'SimulasiCon::edit/$1');
$routes->delete('/simulasi/(:num)', 'SimulasiCon::delete/$1');
$routes->get('/simulasi/index', 'SimulasiCon');
$routes->get('/simulasi/detail/(:num)', 'SimulasiCon::detail/$1');

$routes->get('/tamanbacaan/index', 'TamanbacaanCon');
$routes->get('/tamanbacaan/detail/(:any)', 'TamanbacaanCon::detail/$1');
$routes->get('/tamanbacaan/jenisbuku/(:any)', 'TamanbacaanCon::jenisBuku/$1');
$routes->delete('/tamanbacaan/deletebuku/(:num)', 'TamanbacaanCon::deleteBuku/$1');
$routes->get('/tamanbacaan/wilayahrange', 'TamanbacaanCon::wilayahRange');
$routes->get('/tamanbacaan/detailrange/(:num)', 'TamanbacaanCon::detailRange/$1');
$routes->get('/tamanbacaan/rangejenisbuku/(:num)', 'TamanbacaanCon::RangeJenisBuku/$1');
$routes->get('/tamanbacaan/print/(:num)', 'TamanbacaanCon::print/$1');
$routes->get('/tamanbacaan/create/(:num)', 'TamanbacaanCon::create/$1');
$routes->get('/tamanbacaan/edit/(:num)', 'TamanbacaanCon::edit/$1');
$routes->delete('/tamanbacaan/(:num)', 'TamanbacaanCon::delete/$1');
$routes->get('/tamanbacaan/createbuku/(:any)', 'TamanbacaanCon::createBuku/$1');
$routes->get('/tamanbacaan/editbuku/(:num)', 'TamanbacaanCon::editBuku/$1');

$routes->get('users', 'UsersCon::home');
$routes->get('/users/laporan', 'UsersCon::laporan');
$routes->get('/users/tentang', 'UsersCon::tentang');
$routes->get('/users/pokjai', 'UsersCon::pokjai');
$routes->get('/users/pokjaii', 'UsersCon::pokjaii');
$routes->get('/users/pokjaiii', 'UsersCon::pokjaiii');
$routes->get('/users/pokjaiv', 'UsersCon::pokjaiv');
$routes->post('/users/cari', 'UsersCon::home');

$routes->get('/users/tahunpokjai', 'UsersCon::tahunPokjaI');
$routes->get('/users/tahunpokjaii', 'UsersCon::tahunPokjaII');
$routes->get('/users/tahunpokjaiii', 'UsersCon::tahunPokjaIII');
$routes->get('/users/tahunpokjaiv', 'UsersCon::tahunPokjaIV');
$routes->post('/users/detailpokjai', 'UsersCon::detailPokjaI');
$routes->post('/users/detailpokjaii', 'UsersCon::detailPokjaII');
$routes->post('/users/detailpokjaiii', 'UsersCon::detailPokjaIII');
$routes->post('/users/detailpokjaiv', 'UsersCon::detailPokjaIV');

$routes->get('/users/rangebukuinven', 'UsersCon::rangeBukuinven');
$routes->post('/users/lihatbukuinven', 'UsersCon::lihatBukuinven');
$routes->get('/users/rangebukukegiatan', 'UsersCon::rangeBukukegiatan');
$routes->post('/users/lihatbukukegiatan', 'UsersCon::lihatBukukegiatan');
$routes->get('/users/rangeibuhamil', 'UsersCon::rangeIbuhamil');
$routes->post('/users/lihatibuhamil', 'UsersCon::lihatIbuhamil');
$routes->get('/users/rangecatatankegwarga', 'UsersCon::rangeCatatanKegwarga');
$routes->post('/users/lihatcatatankegwarga', 'UsersCon::lihatCatatanKegwarga');
$routes->get('/users/wilayahdaftaranggotatppkkkader', 'UsersCon::wilayahDaftaranggotatppkkkader');
$routes->get('/users/rangedaftaranggotatppkkkader/(:num)', 'UsersCon::rangeDaftaranggotatppkkkader/$1');
$routes->post('/users/lihatdaftaranggotatppkkkader/(:num)', 'UsersCon::lihatDaftaranggotatppkkkader/$1');
$routes->get('/users/wilayahdaftartimpkk', 'UsersCon::wilayahDaftartimpkk');
$routes->get('/users/rangedaftartimpkk/(:num)', 'UsersCon::rangeDaftartimpkk/$1');
$routes->post('/users/lihatdaftartimpkk/(:num)', 'UsersCon::lihatDaftartimpkk/$1');
$routes->get('/users/rangedataumumtppkk', 'UsersCon::rangeDataumumtppkk');
$routes->post('/users/lihatdataumumtppkk', 'UsersCon::lihatDataumumtppkk');
$routes->get('/users/rangeindustrirt', 'UsersCon::rangeIndustrirt');
$routes->post('/users/lihatindustrirt', 'UsersCon::lihatIndustrirt');
$routes->get('/users/rangekegiatanlain', 'UsersCon::rangeKegiatanlain');
$routes->post('/users/lihatkegiatanlain', 'UsersCon::lihatKegiatanlain');
$routes->get('/users/indexlaporanposyandu', 'UsersCon::indexLaporanPosyandu');
$routes->get('/users/detaillaporanposyandu/(:num)', 'UsersCon::detailLaporanPosyandu/$1');
$routes->get('/users/posyandulaporan/(:num)', 'UsersCon::posyanduLaporan/$1');
$routes->get('/users/rangepengunjungposyandu/(:num)', 'UsersCon::rangePengunjungPosyandu/$1');
$routes->post('/users/lihatpengunjungposyandu/(:num)', 'UsersCon::lihatPengunjungPosyandu/$1');
$routes->get('/users/layananlaporanposyandu/(:num)', 'UsersCon::layananLaporanPosyandu/$1');
$routes->get('/users/rangekegiatanposyandu/(:num)', 'UsersCon::rangeKegiatanPosyandu/$1');
$routes->post('/users/lihatkegiatanposyandu/(:num)', 'UsersCon::lihatKegiatanPosyandu/$1');
$routes->get('/users/wilayahkejarpaket', 'UsersCon::wilayahKejarpaket');
$routes->get('/users/rangekejarpaket/(:num)', 'UsersCon::rangeKejarpaket/$1');
$routes->post('/users/lihatkejarpaket/(:num)', 'UsersCon::lihatKejarpaket/$1');
$routes->get('/users/wilayahkoperasi', 'UsersCon::wilayahKoperasi');
$routes->get('/users/lihatkoperasi/(:num)', 'UsersCon::lihatKoperasi/$1');
$routes->get('/users/rangemanfaattanah', 'UsersCon::rangeManfaattanah');
$routes->post('/users/lihatmanfaattanah', 'UsersCon::lihatManfaattanah');

$routes->get('/users/wilayahpelatihankader', 'UsersCon::wilayahPelatihankader');
$routes->get('/users/rangepelatihankader/(:num)', 'UsersCon::rangePelatihankader/$1');
$routes->post('/users/lihatpelatihankader/(:num)', 'UsersCon::lihatPelatihankader/$1');
$routes->post('/users/detailpelatihankader/(:any)', 'UsersCon::detailPelatihankader/$1');

$routes->get('/users/rangepokjai', 'UsersCon::rangePokjaI');
$routes->post('/users/lihatpokjai', 'UsersCon::lihatPokjaI');
$routes->get('/users/rangepokjaii', 'UsersCon::rangePokjaII');
$routes->post('/users/lihatpokjaii', 'UsersCon::lihatPokjaII');
$routes->get('/users/rangepokjaiii', 'UsersCon::rangePokjaIII');
$routes->post('/users/lihatpokjaiii', 'UsersCon::lihatPokjaIII');
$routes->get('/users/rangepokjaiv', 'UsersCon::rangePokjaIV');
$routes->post('/users/lihatpokjaiv', 'UsersCon::lihatPokjaIV');

$routes->get('/users/wilayahsimulasi', 'UsersCon::wilayahSimulasi');
$routes->get('/users/rangesimulasi/(:num)', 'UsersCon::rangeSimulasi/$1');
$routes->post('/users/lihatsimulasi/(:num)', 'UsersCon::lihatSimulasi/$1');

$routes->get('/users/rangesuratkeluar', 'UsersCon::rangeSuratkeluar');
$routes->post('/users/lihatsuratkeluar', 'UsersCon::lihatSuratkeluar');

$routes->get('/users/rangesuratmasuk', 'UsersCon::rangeSuratmasuk');
$routes->post('/users/lihatsuratmasuk', 'UsersCon::lihatSuratmasuk');

$routes->get('/users/wilayahtamanbacaan', 'UsersCon::wilayahTamanbacaan');
$routes->get('/users/rangejenisbuku/(:num)', 'UsersCon::rangeJenisBuku/$1');
$routes->get('/users/detailtamanbacaan/(:num)', 'UsersCon::detailTamanbacaan/$1');

$routes->get('/users/rangeuangkeluar', 'UsersCon::rangeUangkeluar');
$routes->post('/users/lihatuangkeluar', 'UsersCon::lihatUangkeluar');

$routes->get('/users/rangeuangmasuk', 'UsersCon::rangeUangmasuk');
$routes->post('/users/lihatuangmasuk', 'UsersCon::lihatUangmasuk');

/**
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need it to be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
	require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
