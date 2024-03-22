<?php 

namespace App\Controllers;
use App\Models\UserModel;
use CodeIgniter\Controller;

class UserController extends Controller {

    // users list
    public function index() {

        $userModel = new UserModel();

        $data['users'] = $userModel->orderBy('id', 'ASC')->findAll();

        return view('user_view', $data);
    }

    // insert data into database
    public function store() {
        
        $userModel = new UserModel();

        $name = $this->request->getVar('name');
        $email = $this->request->getVar('email');
        $password = $this->request->getVar('password');

        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        $data = [
            'name' => $name,
            'email' => $email,
            'password' => $hashedPassword,
        ];

        $userModel->insert($data);
        return $this->response->redirect(site_url('/users-list'));
    }

    // update data into database
    public function update($userId) {

        $name = $this->request->getVar('name');
        $email = $this->request->getVar('email');
    
        $userModel = new UserModel();
        $data = [
            'name' => $name,
            'email' => $email,
        ];
        $userModel->update($userId, $data);
    
        return $this->response->redirect(site_url('/users-list'));
    }

    // delete data
    public function delete($id) {

        $userModel = new UserModel();

        $data['user'] = $userModel->where('id', $id)->delete($id);

        return $this->response->redirect(site_url('/users-list'));
    }
}
