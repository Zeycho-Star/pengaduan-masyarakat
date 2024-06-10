<?= validation_errors() ?>
<?php
  if (!empty($error)){
    echo $error;
  }
?>

<!-- Begin Page Content -->
   <div class="container-fluid">

       <!-- Page Heading -->
       <h1 class="h3 mb-2 text-gray-800">Laporan Masyarakat</h1>


       <!-- DataTales Example -->
       <div class="card shadow mb-4">
           <div class="card-header py-3">
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" ><i class="fas fa-clipboard-list"></i>
Buat Laporan</button>
           </div>
           <div class="card-body">
             <div class="row row-cols-1 row-cols-md-3 g-4">
               <?php
                //var_dump($aduan);
               foreach ($aduan as $data){
                 if ($data['status']==0){
                   $status='Menunggu';
                 }else{
                   $status=$data['status'];
                 }
                   echo '

                   <div class="col">
                   <div class="card">
                     <img src="'.base_url('/img/').$data['foto'].'" class="card-img-top" alt="...">
                     <div class="card-body">
                       <h5 class="card-title">Status : '.$status.'</h5>
                       <p class="card-text">Laporan :'.$data['isi_laporan'].'</p>
                     </div>
                     <div class="card-footer">
                       <a href="'.base_url('c_masyarakat/tanggapan/').$data['id_pengaduan'].'" class="btn btn-sm btn-primary float-end" >Tanggapan</a>
                     </div>

                   </div>
                 </div>
               ';
               }


             ?>
             </div>
         </div>
     </div>

 </div>
 <!-- /.container-fluid -->
</div>
 <!-- Modal -->
 <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
   <div class="modal-dialog" role="document">
     <div class="modal-content">
       <div class="modal-header">
         <h5 class="modal-title" id="exampleModalLabel">Tambah Laporan</h5>
         <button type="button" class="close" data-dismiss="modal" aria-label="Close">
           <span aria-hidden="true">&times;</span>
         </button>
       </div>
       <div class="modal-body">
         <form action="<?= base_url('c_masyarakat/simpanAduan'); ?>" method="POST" enctype="multipart/form-data">
           <div class="form-group">
             <label for="exampleFormControlFile1">Foto</label>
             <input type="file" class="form-control-file" id="Foto" name="foto">
           </div>
           <div class="form-group">
             <label for="exampleFormControlTextarea1">Isi Laporan</label>
             <textarea class="form-control" id="Isi_laporan" name="isi_laporan" placeholder="silahkan masukan laporan anda" rows="3"></textarea>
           </div>
           <div class="modal-footer">
             <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
             <button type="submit" class="btn btn-primary">Save changes</button>
           </div>
         </form>
       </div>
     </div>
   </div>
 </div>
