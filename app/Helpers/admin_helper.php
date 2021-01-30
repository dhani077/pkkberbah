<?php

use App\Models\AuthModel;

function allow($level)
{
    $session = \Config\Services::session();
    $user = $session->get('id_admin');
    $model = new AuthModel();
    $row = $model->getAdmin($user);
    if ($row != null) {
        if ($row['level'] == $level) {
            return true;
        } else {
            return false;
        }
    }
}
function cek($id)
{
    $model = new AuthModel();
    $row = $model->getAdmin($id);
    if ($row != null) {
        return redirect()->to('/PagesAdmin');
    } else {
        return redirect()->to('/');
    }
}
