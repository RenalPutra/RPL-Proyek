<?php
require "../config/connect.php";
require "../config/functions.php";

$shedule = read("SELECT * FROM todo");

if (isset($_POST['submit'])) {
    masuk();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../asset/css/bootstrap.min.css">
    <link rel="stylesheet" href="../asset/css/hero.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cardo&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Righteous&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Pacifico&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Ubuntu+Mono:ital@1&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer">
    <title>TO DO LIST</title>
</head>
<body>
  <div class="jarak">
    <div class="container-fluid clearfix">
    <nav class="sidebar">
        <header>
            <div class="image-text">
                <span class="image">
                <a href="index.php"><img src="../asset/img/umkt.png" alt=""></a>
                </span>

                <div class="text logo-text">
                    <span class="name">To Do List</span>
                    <span class="profession">Student</span>
                </div>
            </div>

            <i class="fa-solid fa-bars toggle"></i>
        </header>

        <div class="menu-bar">
            <div class="menu">

                <ul class="menu-links">
                    <li class="nav-link">
                        <a href="todos.php">
                            <i class="fa-solid fa-graduation-cap icon"></i>
                            <span class="text nav-text">Jadwal Matkul</span>
                        </a>
                    </li>

                    <li class="nav-link">
                        <a href="ceklist_index.php">
                        <i class="fa-regular fa-square-check icon"></i>
                            <span class="text nav-text">To Do</span>
                        </a>
                    </li>

                    <li class="nav-link">
                        <a href="index.php">
                        <i class="fa-solid fa-bars-progress icon"></i>
                            <span class="text nav-text">Assignmnet</span>
                        </a>
                    </li>

                </ul>
            </div>

            <div class="bottom-content">
                <li class="">
                    <a href="logout.php">
                    <i class="fa-solid fa-font-awesome icon"></i>
                        <span class="text nav-text">Logout</span>                        
                    </a>
                </li>               
            </div>
        </div>

    </nav>

    <section class="home">
        <div class="text">
          <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-6  ">
        <h1 class="d-flex justify-content-center gaya">Assignment</h1>
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
                  <td class="text-center"><a href="ubah.php?code=<?= $sch['id']?>" class="btn btn-outline-info"><i class="fa-solid fa-marker"></i></a></td>
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
    </section>
    </div>
  </div>
  <div class="col-md-3"></div>
    </div>
  </div>
</body>
<script>
      const body = document.querySelector('body'),
      sidebar = body.querySelector('nav'),
      toggle = body.querySelector(".toggle"),
      searchBtn = body.querySelector(".search-box"),
      modeSwitch = body.querySelector(".toggle-switch"),
      modeText = body.querySelector(".mode-text");


toggle.addEventListener("click" , () =>{
    sidebar.classList.toggle("close");
})

searchBtn.addEventListener("click" , () =>{
    sidebar.classList.remove("close");
})

modeSwitch.addEventListener("click" , () =>{
    body.classList.toggle("dark");
    
    if(body.classList.contains("dark")){
        modeText.innerText = "Light mode";
    }else{
        modeText.innerText = "Dark mode";
        
    }
});
    </script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script> 
<script>
 
  
</script>

</html>

