<?php

/**
 *
 */
class c_petugas extends CI_Controller
{


      function __construct()
      {
        parent::__construct();
        $this->load->model('M_petugas');
      }

  public function index() {
    if ($this->session->userdata('login_petugas_status') == 'ok') {
      $this->dashboard();
    }else {
      $this->load->view('petugas/login');
    }

  }
      public function dashboard(){
        $this->load->view('template/header');
        $this->load->view('template/sidebar');
        $this->load->view('template/navbar');
        $this->load->view('petugas/dashboard');
        $this->load->view('template/footer');
      }
      public function lap_masuk(){
        $this->load->view('template/header');
        $this->load->view('template/sidebar');
        $this->load->view('template/navbar');
        $this->load->view('petugas/laporan_masuk');
        $this->load->view('template/footer');
      }

      public function lap_terima(){
        $this->load->view('template/header');
        $this->load->view('template/sidebar');
        $this->load->view('template/navbar');
        $this->load->view('petugas/laporan_diterima');
        $this->load->view('template/footer');
      }

      public function lap_proses(){
        $this->load->view('template/header');
        $this->load->view('template/sidebar');
        $this->load->view('template/navbar');
        $this->load->view('petugas/laporan_diproses');
        $this->load->view('template/footer');
      }

    


      public function login(){
       $this->form_validation->set_rules('username', 'Username', 'required');
       $this->form_validation->set_rules('password', 'Password', 'required');

       if ($this->form_validation->run()==FALSE){
           $this->load->view('petugas/login');
       }else{
           $pass=md5($this->input->post('password'));
           $data=array(
               'username'  => $this->input->post('username'),
               'password'  => $pass
           );
           $data_login=$this->M_petugas->login($data);
            // var_dump($data);
           if(count($data_login)>0){
               //data login ada
               $this->session->set_userdata('login_petugas_status','ok');
               $this->session->set_userdata('id_petugas',$data_login[0]['id_petugas']);
               $this->session->set_userdata('nama_petugas',$data_login[0]['nama_petugas']);
               $this->session->set_userdata('level',$data_login[0]['level']);
               redirect('c_petugas/index');
           }else{

           $data['error']=array('error'=>'Username atau Password Salah');
           $this->load->view('petugas/login',$data);
           }


       }
   }

   public function logout(){

       unset(
           $_SESSION['login_petugas_status'],
           $_SESSION['id_petugas'],
           $_SESSION['nama_petugas'],
           $_SESSION['level']
   );

   redirect('c_petugas/index');
   }

   public function pengaduan(){
   $data['aduan']=$this->M_petugas->tampilPengaduan();
   $this->load->view('template/header');
   $this->load->view('template/sidebar');
   $this->load->view('template/navbar');
   $this->load->view('petugas/laporan_masuk',$data);
   $this->load->view('template/footer');


} public function detailaduan($id){
    $data['detailaduan']=$this->M_petugas->tampilDetailAduan($id);
    $this->load->view('template/header');
    $this->load->view('template/sidebar');
    $this->load->view('template/navbar');
    $this->load->view('petugas/detail_pengaduan',$data);
    $this->load->view('template/footer');
 }

 public function ubahstatus($id){
    $this->form_validation->set_rules('status','Status','required');
    if($this->form_validation->run()==FALSE){
      $this->load->view('template/header');
      $this->load->view('template/sidebar');
      $this->load->view('template/navbar');
      $this->load->view('petugas/detail_pengaduan');
      $this->load->view('template/footer');
    }else{
       $data=array(

            'status'    => $this->input->post('status')
      );

    if($this->M_petugas->ubahStatusAduan($id,$data)){
           redirect ('c_petugas/pengaduan');

       }else{
        echo "Gagal Ubah Status";
       }
    }
 }

    public function tanggapan($id){
       $data['detailaduan']=$this->M_petugas->tampilDetailAduan($id);
       $data['aduantanggapan']=$this->M_petugas->tampilAduanTanggapan($id);
       $this->load->view('template/header');
       $this->load->view('template/sidebar');
       $this->load->view('template/navbar');
       $this->load->view('petugas/tanggapan',$data);
       $this->load->view('template/footer');

   }

  public function tambahtanggapan($id){
       $this->form_validation->set_rules('tanggapan','Tanggapan','required');

       if($this->form_validation->run()==FALSE){
       $data['detailaduan']=$this->M_petugas->tampilDetailAduan($id);
       $data['aduantanggapan']=$this->M_petugas->tampilAduanTanggapan($id);
       $this->load->view('template/header');
       $this->load->view('template/sidebar');
       $this->load->view('template/navbar');
       $this->load->view('petugas/tanggapan',$data);
       $this->load->view('template/footer');
       }else{
           $data=array(
               'tgl_tanggapan'=>date('Y-m-d'),
               'id_pengaduan'=>$id,
               'tanggapan'     =>$this->input->post('tanggapan'),
               'id_petugas'    =>$this->session->id_petugas
           );
           if ($this->M_petugas->tambahTanggapan($data)){
               redirect ('c_petugas/tanggapan/'.$id);

           }

       }
 }


         public function daftarpetugas(){
        $data['petugas']=$this->M_petugas->tampilpetugas();
      $this->load->view('template/header');
      $this->load->view('template/sidebar');
      $this->load->view('template/navbar');
      $this->load->view('admin/daftar_petugas',$data);
      $this->load->view('template/footer');
    }


    public function tambahpetugas(){
        $this->form_validation->set_rules('nama_petugas', 'Nama', 'required');
        $this->form_validation->set_rules('username', 'Username', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');
        $this->form_validation->set_rules('telp', 'Telpon', 'required');

        if($this->form_validation->run()==FALSE){
        $this->pengaduan();
        }else{
            $data=array(
                'nama_petugas'=>$this->input->post('nama_petugas'),
                'username'=>$this->input->post('username'),
                'password'=>md5($this->input->post('password')),
                'telp'=>$this->input->post('telp'),
                'level'=>'petugas'
            );

            if($this->M_petugas->tambahpetugas($data)){
                redirect('c_petugas/daftarpetugas');
            }else{
                echo "Gagal Tambah Data Petugas";
            }
        }
    
     

    }


}


 ?>
