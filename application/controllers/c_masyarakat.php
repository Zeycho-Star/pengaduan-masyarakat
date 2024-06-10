<?php
/**
 *
 */
class c_masyarakat extends CI_Controller
{


    function __construct()
    {
      parent::__construct();
      $this->load->model('m_masyarakat');
      $this->load->model('M_petugas');
    }


  public function index() {
    if ($this->session->userdata('login_status') == 'ok') {
      $this->load->view('template/header');
      $this->load->view('template/sidebar');
      $this->load->view('template/navbar');
      $this->load->view('masyarakat/daftar_laporan');
      $this->load->view('template/footer');
    }else {
      $this->load->view('login/login');
    }

  }

      public function login_view(){
        $this->load->view('login/login');
      }

      public function registrasi(){
        $this->load->view('login/register');
      }

  public function registrasi_user(){
         $this->validasi_form();

         if($this->form_validation->run()==FALSE){
             $this->registrasi();
         }else{

             $pass=md5($_POST['password']);
             $data=array(
                 'nik'=> $_POST['nik'],
                 'nama'=>$_POST['nama'],
                 'username'=>$_POST['username'],
                 'password'=>$pass,
                 'telp'=>$_POST['telp']
             );
             if ($this->m_masyarakat->tambahMasyarakat($data)){
                 $this->index();
             }
         }
     }

     public function validasi_form(){
    $this->form_validation->set_rules('nik', 'NIK', 'required');
    $this->form_validation->set_rules('nama', 'Nama', 'required');
    $this->form_validation->set_rules('username', 'Username', 'required');
    $this->form_validation->set_rules('password', 'Password', 'required');
    $this->form_validation->set_rules('telp', 'telp', 'required');
}

    public function validasi_form_login(){
      $this->form_validation->set_rules('username', 'Username', 'required');
      $this->form_validation->set_rules('password', 'Password', 'required');
}

public function login(){
  $this->validasi_form_login();

  if ($this->form_validation->run()==FALSE){
      $this->index();
  }else{
      $pass=md5($_POST['password']);

      $data=array(
          'username'=>$_POST['username'],
          'password'=>$pass
      );

      $data=$this->m_masyarakat->login($data);


      if(count($data)>0){
              $this->session->set_userdata('login_status', 'ok');
              $this->session->set_userdata('nik', $data[0]['nik']);
              $this->session->set_userdata('nama', $data[0]['nama']);
              $this->session->set_userdata('level', 'masyarakat');

              $this->tampilAduan();

      }else{
          $this->index();
      }
  }

}
    public function logout(){
  unset(
      $_SESSION['login_status'],
      $_SESSION['nik'],
      $_SESSION['nama']
);

$this->index();
}
      public function simpanAduan(){
          $this->form_validation->set_rules('isi_laporan','Isi Laporan','required');

          if ($this->form_validation->run()== FALSE) {
            // code...
            $this->index();
          }else {
            $config['upload_path']='./img';
            $config['allowed_types']='gif|jpg|png|jpeg';

            $this->load->library('upload',$config);
            if(!$this->upload->do_upload('foto')){

                $error=array('error'=>$this->upload->display_errors());
                $this->load->view('template/header');
                $this->load->view('template/sidebar');
                $this->load->view('template/navbar');
                $this->load->view('masyarakat/daftar_laporan',$error);
                $this->load->view('template/footer');

            }else{
                $data =$this->upload->data();
                $filename=$data['file_name'];

                $data=array(
                    'tgl_pengaduan' => date('Y-m-d'),
                    'nik'           =>$this->session->userdata('nik'),
                    'isi_laporan'   => $_POST['isi_laporan'],
                    'foto'          => $filename
                );

                if ($this->m_masyarakat->tambahAduan($data)){

                  redirect('/c_masyarakat/tampilAduan');

                }else{
                    $error=array('error'=>'Gagal Simpan Data');
                    $this->load->view('template/header');
                    $this->load->view('template/sidebar');
                    $this->load->view('template/navbar');
                    $this->load->view('masyarakat/daftar_laporan',$error);
                    $this->load->view('template/footer');
                }
              }
          }
      }

  public function tampilAduan(){
     $data['aduan']=$this->m_masyarakat->tampilAduan();
    // var_dump($data['aduan']);
    $this->load->view('template/header');
    $this->load->view('template/sidebar');
    $this->load->view('template/navbar');
    $this->load->view('masyarakat/daftar_laporan',$data);
    $this->load->view('template/footer');
}


    public function tanggapan($id){
        $data['detailaduan']=$this->m_masyarakat->tampilAduan2($id);
        $data['aduantanggapan']=$this->m_masyarakat->tampilAduanTanggapan($id);
        $this->load->view('template/header');
        $this->load->view('masyarakat/tanggapan',$data);
        $this->load->view('template/footer');
    }
  }

?>
