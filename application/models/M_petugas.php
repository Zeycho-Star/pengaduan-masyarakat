<?php

class M_petugas extends CI_Model
{
    public function login($data){
        $this->db->select('id_petugas,nama_petugas,level');
        $this->db->where($data);
        $query =$this->db->get('petugas');
        return $query->result_array();
    }

    public function tampilPengaduan(){
        $this->db->select('pengaduan.id_pengaduan,pengaduan.tgl_pengaduan,pengaduan.isi_laporan,pengaduan.status,masyarakat.nama');
        $this->db->from('pengaduan');
        $this->db->join('masyarakat','masyarakat.nik=pengaduan.nik','left');
        $query=$this->db->get();
        return $query->result_array();
      }
    public function tampilDetailAduan($id){
        $this->db->select('pengaduan.id_pengaduan,pengaduan.tgl_pengaduan,pengaduan.isi_laporan,pengaduan.status,masyarakat.nama,pengaduan.foto');
        $this->db->join('masyarakat','masyarakat.nik=pengaduan.nik','left');
        $this->db->where('pengaduan.id_pengaduan='.$id);
        $query=$this->db->get('pengaduan');
        return $query->result_array();
 }
     public function ubahStatusAduan($id,$data){
        $this->db->where('id_pengaduan=',$id);
        return $this->db->update('pengaduan',$data);
 
 }
 
    public function tampilAduanTanggapan($id){
        $this->db->select('tgl_tanggapan,tanggapan');
        $this->db->where('id_pengaduan='.$id);
        $query=$this->db->get('tanggapan');
        return $query->result_array();
    }
 
    public function tambahTanggapan($data){
        $this->db->insert('tanggapan',$data);
    }

    public function tampilpetugas(){
     
      $this->db->select('username,nama_petugas,telp,level');
      $this->db->where('level=','petugas');
      $query = $this->db->get('petugas');

      return $query->result_array();
    
    }

    public function tambahpetugas($data){
        return $this->db->insert('petugas',$data);

    }

}
?>
