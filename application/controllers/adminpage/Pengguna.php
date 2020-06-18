<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pengguna extends Admin_Controller {

    private $table = 'users';
    private $pk = 'id_user';

    // Load database
    public function __construct()
    {
        parent::__construct();
        $this->load->model('users_model');
    }

    // Index
    public function index()
    {                                                                                                                                           
        $q = $this->input->get('q', TRUE) ? $this->input->get('q', TRUE) : NULL;
        $cari_query = cari_query($q, array('fullname', 'email', 'username'));

        $config['total_rows'] = $this->users_model->count($cari_query);
        $config['per_page'] = 10;
        $offset = (($this->input->get('p', TRUE) ? $this->input->get('p', TRUE) : 1) - 1) * $config['per_page'];
        $this->pagination->initialize($config);

        $users = $this->users_model->listing($config['per_page'], $offset, $cari_query);
        $data = array(  'title'         => 'Daftar Pengguna',
                        'users'         => $users,
                        'offset'        => $offset,
                        'pagination'    => $this->pagination->create_links(),
                        'isi'           => 'adminpage/pengguna/list');
        $this->load->view('adminpage/_layout/wrapper', $data);
    }

    // Tambah
    public function tambah()
    {
        // if ($this->session->akses_level == 'Blocked') view_error('Error 404');

        $data = array(  'title' => 'Tambah Pengguna',
                        'roles' => $this->config->item('roles'),
                        'isi'   => 'adminpage/pengguna/tambah');

        $valid = $this->form_validation;
        $valid->set_error_delimiters('<i style="color: red;">', '</i>');
        $valid->set_rules('username', 'Username', 'required|trim|strip_tags|htmlspecialchars|is_unique[users.username]',
            array('is_unique' => '%s ini telah terpakai. coba yang lain.')
        );
        $valid->set_rules('password', 'Password', 'required|trim|strip_tags|htmlspecialchars',array('required' => 'Kamu Harus menyediakan sebuah %s.'));
        $valid->set_rules('repassword', 'Ulangi Password', 'required|trim|strip_tags|htmlspecialchars|matches[password]',
            array('matches' => '%s tidak cocok.')
        );
        $valid->set_rules('fullname', 'Name Lengkap', 'required|trim|strip_tags|htmlspecialchars');
        $valid->set_rules('email', 'Email', 'required|trim|strip_tags|htmlspecialchars|valid_email|is_unique[users.email]',
            array('valid_email' => '%s ini tidak valid', 'is_unique' => '$s ini telah terpakai. coba yang lain.')
        );
        $valid->set_rules('roles[]', 'Roles', 'required|trim|strip_tags|htmlspecialchars');

        if ($valid->run() === FALSE) $this->load->view('adminpage/_layout/wrapper', $data);
        else
        {
            // Mekanisme upload gambar
            $gambar = upload_image('gambar', 'tambah', 'userpics', '', $data);
            // Masuk ke database
            if ($gambar !== FALSE)
            {
                $data_id = acak_id($this->table, $this->pk);
                $input = $this->input->post(NULL, TRUE);
                foreach ($input as $key => $value) {
                    if(is_arraY($value))
                        $input[$key] = multiselect_tostring($value);
                }

                $data = array(  'id_user'   => $data_id['id'],
                                'username'  => $input['username'],
                                'password'  => do_hash($input['password']),
                                'fullname' => $input['fullname'],
                                'email' => $input['email'],
                                'foto'    => $gambar,
                                // 'akses_level'   => "Admin",
                                'roles' => $input['roles'],
                                // 'template_name'   => "binary_admin",
                                'iat'       => date('Y-m-d H:i:s'));
                $this->crud->i($this->table, $data);
                $this->session->set_flashdata('sukses', 'Pengguna berhasil ditambah.');
                redirect(admin_url('pengguna'));
            }
        }
    }

    // Update
    public function edit($id_user = NULL)
    {
        // if ($this->session->akses_level == 'Blocked') view_error('Error 404');

        $users = $this->crud->gd($this->table, array($this->pk => $id_user));

        foreach ($users as $key => $value) {
            if(strpos($value, ','))
                $users->$key = explode(',', $value);
        }

        if($this->input->post('username') != $users->username){
            $is_unique_username =  '|is_unique[users.username]';
        } else {
            $is_unique_username =  '';
        }
        if($this->input->post('email') != $users->email){
            $is_unique_email =  '|is_unique[users.email]';
        } else {
            $is_unique_email =  '';
        }

        // Mengecek jika ID tidak valid
        if (empty($users)) view_error('Error 404', 'admin');

        $data = array(  'title' => 'Edit Pengguna',
                        'data'  => $users,
                        'roles' => $this->config->item('roles'),
                        'isi'   => 'adminpage/pengguna/edit');

       

        $valid = $this->form_validation;
        $valid->set_error_delimiters('<i style="color: red;">', '</i>');
        $valid->set_rules('username', 'Username Pengguna', 'required|trim|strip_tags|htmlspecialchars'.$is_unique_username,
            array('is_unique' => '%s ini telah terpakai. coba yang lain.')
        );
        $valid->set_rules('fullname', 'Nama Lengkap Pengguna', 'required|trim|strip_tags|htmlspecialchars');
        $valid->set_rules('email', 'Email Pengguna', 'required|trim|strip_tags|htmlspecialchars'.$is_unique_email,
            array('valid_email' => '%s ini tidak valid', 'is_unique' => '$s ini telah terpakai. coba yang lain.')
        );
        $valid->set_rules('roles[]', 'Roles', 'required|trim|strip_tags|htmlspecialchars');

        if ($valid->run() === FALSE) $this->load->view('adminpage/_layout/wrapper', $data);
        else
        {
            // Mekanisme upload gambar
            $gambar = upload_image('gambar', 'edit', 'userpics', $users->foto, $data);

            // Masuk ke database
            if ($gambar !== FALSE)
            {
                $data_id = acak_id($this->table, $this->pk);
                $input = $this->input->post(NULL, TRUE);
                foreach ($input as $key => $value) {
                    if(is_arraY($value))
                        $input[$key] = multiselect_tostring($value);
                }
                $data = array(  'username'  => $input['username'],
                                'fullname'      => $input['fullname'],
                                'roles' => $input['roles'],
                                'foto'      => $gambar);
                $this->crud->u($this->table, $data, array($this->pk => $id_user));
                $this->session->set_flashdata('sukses', 'Pengguna berhasil diperbarui.');
                redirect(admin_url('pengguna'));
            }
        }
    }

    // Hapus
    public function hapus($id_user = NULL)
    {
        // if ($this->session->akses_level == 'Blocked') view_error('Error 404');

        $cek = $this->crud->gd($this->table, array($this->pk => $id_user));
        if ($this->input->get('act', TRUE) == $id_user && ! empty($cek))
        {
            if ($cek->gambar != '')
            {
                unlink('./'.upload_path('userpics').$cek->gambar);
                unlink('./'.upload_path('userpics').'thumbs/'.$cek->gambar);
            }
            $this->crud->d($this->table, array($this->pk => $id_user));
            $this->session->set_flashdata('sukses', 'Pengguna berhasil dihapus.');
            redirect(admin_url('pengguna'));
        }
        else
        {
            $this->session->set_flashdata('gagal', 'Pengguna gagal dihapus.');
            redirect(admin_url('pengguna'));
        }
    }
}
