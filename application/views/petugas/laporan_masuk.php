<!-- Begin Page Content -->
   <div class="container-fluid">

       <!-- Page Heading -->
       <h1 class="h3 mb-2 text-gray-800">Pengaduan Masuk</h1>


       <!-- DataTales Example -->
       <div class="card shadow mb-4">
           <div class="card-header py-3">
               <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6>
           </div>
           <div class="card-body">
               <div class="table-responsive">
 
<table id="example" class="table table-striped" style="width:100%">
        <thead>
            <tr>
                <th>No</th>
                <th>Tanggal Pengaduan</th>
                <th>Nama Pelapor</th>
                <th>Isi Laporan</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
<?php
$no=1;
foreach ($aduan as $data){

    if($data['status']=='0'){
        $status='menunggu';
    }else{
        $status=$data['status'];
    }

    echo '<tr>
    <td>'.$no.'</td>
    <td>'.$data['tgl_pengaduan'].'</td>
    <td>'.$data['nama'].'</td>
    <td>'.$data['isi_laporan'].'</td>
    <td>'.$status.'</td>
    <td><a href="'.base_url('c_petugas/detailaduan/').$data['id_pengaduan'].'" class="btn btn-sm btn-primary">Detail</a>&nbsp;<a href="'.base_url('c_petugas/tanggapan/').$data['id_pengaduan'].'" class="btn btn-sm btn-success">Tanggapan</a></td>
</tr>';
$no++;
}
            
?>
        </tbody>
        <tfoot>
        <tr>
                <th>No</th>
                <th>Tanggal Pengaduan</th>
                <th>Nama Pelapor</th>
                <th>Isi Laporan</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>
        </tfoot>
    </table>

               </div>
           </div>
       </div>

   </div>
 </div>
