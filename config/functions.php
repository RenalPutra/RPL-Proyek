<?php
require "connect.php";

function read($query){
    global $conn;
	$result = mysqli_query($conn, $query);
	$rows = [];
	while($row = mysqli_fetch_assoc($result)){
		$rows[] = $row;
	} 
	return $rows; 
}

function masuk(){
    global $conn;
    $isi = $_POST['tugas'];
    $start = $_POST['startdate'];
    $end = $_POST['enddate'];
    $cry_query = mysqli_query($conn, "INSERT INTO todo VALUES('', '$isi', '0','$start','$end', '')");

    if (mysqli_errno($conn) > 0){
        header("Location: index.php");
    }else{
        header("Location: index.php");
    }

    return $cry_query;
}

function kelar($id){
    global $conn;
    $result = mysqli_query($conn, "UPDATE todo SET selesai='1' WHERE id = '$id'");
    
    if (mysqli_errno($conn) > 0){
        header("Location: index.php");
    }else{
        header("Location: index.php");
    }

    return $result;
}

function dell($id){
    global $conn;
    $result = mysqli_query($conn, "DELETE FROM todo WHERE id='$id'");
    
    if (mysqli_errno($conn) > 0){
        header("Location: index.php");
    }else{
        header("Location: index.php");
    }

    return $result;
}

function dell_all(){
    global $conn;
    $result = mysqli_query($conn, "DELETE FROM todo");
    
    if (mysqli_errno($conn) > 0){
        header("Location: index.php");
    }else{
        header("Location: index.php");
    }

    return $result;
}

function ubah(){
    global $conn;
    $isi = $_POST['ubah'];
    $id = $_POST['id'];
    $start = $_POST['startdate'];
    $end = $_POST['enddate'];
    $cry_query = mysqli_query($conn, "UPDATE todo SET isi='$isi', mulai='$start', akhir='$end' WHERE id='$id'");

    if (mysqli_errno($conn) > 0){
        header("Location: index.php");
    }else{
        header("Location: index.php");
    }

    return $cry_query;
}


function read_cek($query){
    global $conn;
	$result = mysqli_query($conn, $query);
	$rows = [];
	while($row = mysqli_fetch_assoc($result)){
		$rows[] = $row;
	} 
	return $rows; 
}

function masuk_cek(){
    global $conn;
    $kegiatan = $_POST['addtask'];
    $cry_query = mysqli_query($conn, "INSERT INTO ceklist VALUES('', '$kegiatan', '0')");

    if (mysqli_errno($conn) > 0){
        header("Location: ceklist_index.php");
    }else{
        header("Location: ceklist_index.php");
    }

    return $cry_query;
}

function kelar_cek($id){
    global $conn;

    $cry_query = mysqli_query($conn, "UPDATE ceklist SET selesai='1' WHERE id='$id'");

    if (mysqli_errno($conn) > 0){
        header("Location: ceklist_index.php");
    }else{
        header("Location: ceklist_index.php");
    }

    return $cry_query;
}

function dell_cek($id){
    global $conn;
    $result = mysqli_query($conn, "DELETE FROM ceklist WHERE id='$id'");
    
    if (mysqli_errno($conn) > 0){
        header("Location: ceklist_index.php");
    }else{
        header("Location: ceklist_index.php");
    }

    return $result;
}

function textLimit($string, $limit)
{
    if (strlen($string) > $limit) {
        return substr($string, 0, $limit) . "...";
    } else {
        return $string;
    }
}

function getTodo($todo)
{
    $output = '<div class="card shadow-sm">
        <div class="card-body">
            <h4 class="card-title">'. textLimit($todo['title'], 28) .'</h4>
            <p class="card-text">'. textLimit($todo['description'], 75) .'</p>
            <div class="d-flex justify-content-between align-items-center">
                <div class="btn-group">
                    <a href="view-todo.php?id='. $todo['id'] .'" class="btn btn-sm btn-outline-secondary">View</a>
                    <a href="edit-todo.php?id='. $todo['id'] .'" class="btn btn-sm btn-outline-secondary">Edit</a>
                </div>
                <small class="text-muted">'. $todo['date'] .'</small>
            </div>
        </div>
    </div>';

    echo $output;

}

?>