<?php

class Blog extends Controller {
    public function tambah() {
        if($this->model('Blog_model') ->buatArtikel ($_POST)> 0) {
            Flasher::setFlash('berhasil', 'ditambahkan','success');
            header('location'. BASE_URL .'/blog');
            exit;
        } else {
            Flasher::setFlash('gagal', 'ditambahkan','danger');
            $this->redirect('home/index');
        }
    }
    function redirect($string) {
        header('location: '. BASE_URL . '/' . $string);
        exit;
    }
}