<div class="container-fluid clearfix">
      <div class="row">
      <div class="col-md-3"></div>
      <div class="col-md-6  ">
      <h1 class="d-flex justify-content-center gaya">TO DO LIST</h1>
      <!-- input tugas -->
      <form action="" method="POST">
          <div class="mb-3">
            <div class="pb-2">
              <input type="text" class="form-control" name="tugas" placeholder="Masukkan tugas anda">
            </div >
            <div class="pb-2">
              <input type="date" class="form-control" name="startdate">
            </div>
            <div class="pb-2">
              <input type="date" class="form-control" name="enddate">
            </div>
            <div>
            <button class="btn btn-outline-success btn-md" type="submit" name="submit"><i class="fw-bolder">Add</i></button>
            </div>
          </div>
        </form>
        <table class="table table-hover table-striped pt-4">
          <tr class="table-dark">
            <th><p class="tulisan3">Keterangan</p></th>
            <th><p class="tulisan3">Start Date</p></th>
            <th><p class="tulisan3">End Date</p></th>
            <th><p class="tulisan3">Selesai</p></th>
            <th><p class="tulisan3">Ubah</p></th>
            <th><p class="tulisan3">Hapus</p></th>
          </tr>
          <tbody>
            <?php foreach ($shedule as $sch) :?>
              <?php 
                if($sch['selesai'] == 1){
                  $different = "<s>"."<p class='tulisan2'>".$sch['isi']."</p>"."</s>";
                }else{
                  $different = $sch['isi'];
                }
                ?>
                
              <tr >
                <td><p class='tulisan2'><?= $different ?></p></td>
                <td><p class="tulisan2"><?= $sch['mulai'] ?></p></td>
                <td><p class="tulisan2"><?= $sch['akhir'] ?></p></td>
                <?php if($sch['selesai'] == 1) :?>
                <td colspan="3" class="text-center"><a  href="Hapus.php?code=<?= $sch['id']?>" class="btn btn-outline-danger"><i class="fa-solid fa-trash-can"></i></a></td>
                <?php else: ?>
                <td class="text-center"><a href="selesai.php?code=<?= $sch['id']?>" class="btn btn-outline-success"><i class="fa-solid fa-check-double"></i></a></td>
                <td class="text-center"><a href="ubah.php?code=<?= $sch['id']?>" class="btn btn-outline-info "><i class="fa-solid fa-marker"></i></a></td>
                <td class="text-center"><a href="Hapus.php?code=<?= $sch['id']?>" class="btn btn-outline-danger "><i class="fa-solid fa-trash-can"></i></a></td>
                <?php endif; ?>
            </tr>
              <?php endforeach ; ?>
          </tbody>
          <tfoot>
              <tr>
                  <th colspan="6px" class="text-center col-md-6"><a href="hapus_semua.php" class="btn btn-outline-danger px-4" ><i class="fw-bolder">Clear</i><i class="fa-solid fa-broom"></i></a></th>
              </tr>
          </tfoot>
        </table>
    </div>