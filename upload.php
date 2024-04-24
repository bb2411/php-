<?php 
    $name=$_POST['name'];
    $dir='uploads/';
    $decod=$_FILES['file']['name'];
    $file=$dir.basename($decod);
    
    echo "$file $decod";
    if(move_uploaded_file($_FILES['file']['tmp_name'],$file)){
        echo "file is uploaded";
    }else{
        echo "error occured";
    }
    
?>