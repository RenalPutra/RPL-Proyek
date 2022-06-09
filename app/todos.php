<?php
require "../config/connect.php";
require "../config/functions.php";




?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../asset/css/bootstrap.min.css">
    <link rel="stylesheet" href="../asset/css/hero8.css">
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
            <div class="container">
                <h1 class="mb-4 text-center fw-bold pt-3 text-light gaya">Mata Kuliah</h1>
                <div class="row">
                <?php 
                    $sql1 = "SELECT * FROM todos";
                    $res1 = mysqli_query($conn, $sql1);?>
                    <?php if (mysqli_num_rows($res1) > 0) : ?>
                        <?php foreach ($res1 as $todo): ?>
                            <div class="col-lg-3 col-md-6 mb-4">
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="card-title tulisan2"><?= textLimit($todo['title'], 28) ?></h4>
                                        <p class="card-text tulisan2"><?= textLimit($todo['description'], 75) ?></p>
                                        <div class="d-flex justify-content-between align-items-center">
                                            <div class="btn-group ">
                                                <a href="view-todo.php?id=<?=$todo['id']?>" class="btn btn-sm btn-outline-secondary tulisan2">View</a>
                                                <a href="edit-todo.php?id=<?=$todo['id']?>" class="btn btn-sm btn-outline-secondary tulisan2">Edit</a>
                                            </div>
                                            <small class="text-muted tulisan2"><?=$todo['date']?></small>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                        <?php else: ?>
                            <h1 class='text-danger text-center fw-bold tulisan2'>Mata Kuliah Belum Di Setting</h1>
                    <?php endif ;?>
                </div class="">
                <a href="add-todo.php" class="rounded-circle btn btn-light position-absolute bottom-0 end-0 translate-middle"><i class="fa-solid fa-plus"></i></a>
                </div>
            </div>
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
<script type="text/javascript" src="../asset/js/vanilla-tilt.js"></script>
<script>
    VanillaTilt.init(document.querySelectorAll(".card"), {
		max: 25,
		speed: 400
	});
</script>
</html>

