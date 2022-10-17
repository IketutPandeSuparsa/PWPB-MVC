<?php
class Home extends Controller
{
    public function index() {
        $data['title'] = 'Home';
        // $data['nama'] $this->model ('User_model')->getUser();
        $this->view("templates/header", $data);
        $this->view("home/index", $data);
        $this->view("templates/footer", $data);
    }

    public function login()
    {
        if (isset($_POST['username'])) {
            $user = $this->model('User_model')->getUserByUsername($_POST['username']);

            // Cek user ada atau tidak
            if (!$user) {
                header('Location: ' . BASE_URL . '/home/signup');
                exit;
            }

            // Cek password benar / salah
            if (password_verify($_POST['password'], $user['password'])) {
                header('Location: ' . BASE_URL . '/home/index');
                Flasher::setFlash('Berhasil', 'Login berhasil', 'success');
                exit;    
            }
        }

        return $this->view('login');
    }
    
    public function about ($company = 'SMKN1')
    {
        $data['title'] = 'Home';
        $data['company'] = $company;
        $this->view("templates/header", $data);
        $this->view("home/index", $data);
        $this->view("templates/footer", $data);
    }   
     public function register(){

        if (isset($_POST['username'])) {

            $data = [
                'username' => $_POST['username'], 
                'email' => $_POST['email'],
                'first_name' => $_POST['first_name'],
                'last_name' => $_POST['last_name'],
                'password' => password_hash ($_POST['password'], PASSWORD_BCRYPT),
            ];

            if ($this->model('User_model')->addUser($data)) {
                header('Location: '. BASE_URL . 'home/login');
                exit;
            }
        }

        return $this->view('register');

    }

    public function signup() {
        $data['judul'] = 'register';
        $this->view('register', $data);
    }
    public function signin() {
        $data['judul'] = 'login';
        $this->view('login', $data);
    }
}

?>