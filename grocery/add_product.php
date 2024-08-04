<?php
if(isset($_POST["submit"])){
       	$cpid= $_POST['cpid'];
        $value= $_POST['Acost'];
        $value2 = $_POST['Ano_of_items'];
        $value3 = $_POST['Acategory'];
        $value4 = $_POST['AItem_name'];
		
        $database = "grocery";
        $db = mysqli_connect('localhost','root','',$database);
        
		$q = "INSERT INTO products VALUES($cpid,'$value3','$value4',$value,$value2)";
            $insert = $db->query($q);
        
       header('Location: Admin_logged.php');
        
}
?>
