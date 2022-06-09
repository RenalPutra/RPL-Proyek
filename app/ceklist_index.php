<?php
require "../config/connect.php";
require "../config/functions.php";

$shedule = read_cek("SELECT * FROM ceklist");

if (isset($_POST['add'])){
    masuk_cek();
}



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../asset/css/bootstrap.min.css">
    <link rel="stylesheet" href="../asset/css//hero6.css">
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
    <title>Document</title>
</head>
<body>
    <div class="container-fluid">
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
                <div class="space">
                    <h1 class="tulisan">To Do</h1>
                    <i><?= date('l, M d'); ?></i>
                </div>
                <div class="space-4">
                    <h1 class="tulisan">Ultraman said "Ssshhhaaaa"</h1>
                    <p class="tulisan2">Write your to do</p>
                </div>
                <form action="" method="POST">
                    <div class="activity">
                    <?php foreach ($shedule as $sch) :?>
                        <?php 
                        if($sch['selesai'] == 1){
                            $different = "<s>".$sch['kegiatan']."</s>";
                        }else{
                            $different = $sch['kegiatan'];
                        }
                        ?>
                        <div class="form-check space-3">
                            <div class="geser">
                                <a href="hapus_cek.php?id=<?= $sch['id']?>" class="btn btn-outline-danger"><i class="fa-solid fa-trash-can"></i></a>
                            </div>
                            <a href="ubah_cek.php?id=<?= $sch['id'] ?>" class="btn btn-outline-success"></a>
                            <label class="form-check-label" id="my_cek" for="flexCheckDefault" ><?= $different ?></label>
                        </div>
                        <?php endforeach; ?>
                    </div>
                    <div class="space2">
                        <input type="text" id="inputPassword5" name="addtask" class="form-control" placeholder="+ Add a task" aria-describedby="passwordHelpBlock">
                        <button type="submit" name="add" class="btn tombol">add</button>
                    </div>
                </form>
            </div>
        </div>
    </section>
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
</html>