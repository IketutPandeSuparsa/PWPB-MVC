<?php
class Flasher{
    public static function setFlash($pesan,$aksi,$tipe) {
        $_SESSION['flash'] = [
            'pesan' => $pesan,
            'aksi' => $aksi,
            'tipe' => $tipe,
        ];
    }
    public static function flash() {
        if (isset($_SESSION['flash'])) {
            echo '<div class="alert alert-' . $_SESSION ["flash"]["tipe"] .'>
                    <strong>'.$_SESSION["flash"]["pesan"] . '</strong>'. $_SESSION
                    ["flash"]["aksi"].'
                    <button type="button" class="close" data-bs-dismiss="alert"
                    aria-table="close">
                        <span aria-hidden="true"> </span>
                    </button>
                </div>';
                unset($_SESSION['flash']);
                        
        }
    }
}


?>