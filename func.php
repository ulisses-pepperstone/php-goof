<?php 
    require __DIR__.'/vendor/autoload.php';
	include("db.php");

    use League\CommonMark\CommonMarkConverter;

    $converter = new CommonMarkConverter(['html_input' => 'escape', 'allow_unsafe_links' => false]);

	if (isset($_GET['edid'])){

	    $id = $_GET['edid'];

	    $query = "SELECT * FROM task where id = ?";
	    $stmt = mysqli_prepare($conn, $query);
	    mysqli_stmt_bind_param($stmt, "i", $id);
	    mysqli_stmt_execute($stmt);
	    $result = mysqli_stmt_get_result($stmt);

	    if(mysqli_num_rows($result) == 1){
	        $row = mysqli_fetch_array($result);
	        $title = $row['title'];

	        $_SESSION['message'] = 'Edit Task';
	        $_SESSION['message_type'] = 'info';
	    }
	}


?>