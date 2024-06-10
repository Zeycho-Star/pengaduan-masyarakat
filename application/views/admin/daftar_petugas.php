<!-- Begin Page Content -->
   <div class="container-fluid">

       <!-- Page Heading -->
       <h1 class="h3 mb-2 text-gray-800">Daftar Petugas</h1>


       <!-- DataTales Example -->
       <div class="card shadow mb-4">
           <div class="card-header py-3">
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" ><i class="fas fa-user-plus"></i>
Tambah Petugas</button>
           </div>
           <div class="card-body">
               <div class="table-responsive">

                   <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                       <thead>
                           <tr>
                               <th>No</th>
                               <th>Nama</th>
                               <th>username</th>
                               <th>No Hp</th>
                               <th>Level</th>
                               <th>Action</th>
                           </tr>
                       </thead>
                       <tfoot>
                           <tr>
                            <th>No</th>
                             <th>Nama</th>
                             <th>username</th>
                             <th>No Hp</th>
                             <th>Level</th>
                             <th>Action</th>
                           </tr>
                       </tfoot>
                       <tbody>
<?php
$no=1;
foreach ($petugas as $data){

    echo '<tr>
    <td>'.$no.'</td>
    <td>'.$data['nama_petugas'].'</td>
    <td>'.$data['username'].'</td>
    <td>'.$data['telp'].'</td>
    <td>'.$data['level'].'</td>
    <td><a href="'.base_url('c_petugas/hapuspetugas').'" class="btn btn-sm btn-danger">Hapus</a></td>
</tr>';
$no++;
}
            
?>
                       </tbody>
                   </table>
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
         <h5 class="modal-title" id="exampleModalLabel">Tambah Petugas</h5>
         <button type="button" class="close" data-dismiss="modal" aria-label="Close">
           <span aria-hidden="true">&times;</span>
         </button>
       </div>
       <div class="modal-body">
         <form action="<?php echo base_url('c_petugas/tambahpetugas'); ?>" method="POST">
           <div class="form-group">
             <label for="nama_petugas">Nama Anda</label>
             <input type="text" class="form-control" name="nama_petugas" id="nama_petugas" placeholder="Nama">
           </div>
           <div class="form-group">
             <label for="username">Username</label>
             <input type="text" class="form-control" id="username" name="username" placeholder="username">
           </div>
           <div class="form-group">
             <label for="password">Password</label>
             <input type="password" class="form-control" id="password" placeholder="password" name="password">
           </div>
           <div class="form-group">
             <label for="telp">Nomor Telpon</label>
             <input type="number" class="form-control" id="telp" placeholder="telp" name="telp">
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
