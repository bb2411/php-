<?php
$conn=new mysqli("localhost","root","root","phppractice");
$result=$conn->query("select * from user_lec");
if($result->num_rows>0){
    echo "<table border>";
    while($row=$result->fetch_assoc()){
        $username=$row['username'];
        $ur=$username.'input';
        $password=$row['password'];
        $ps=$password.'input';
        echo '<tr><td><input value="'.$username.'" name="username" class='."'$username'".' disabled id='."'$ur'".'></td>';
        echo '<td><input value="'.$password.'" name="password" class='."'$username'".' disabled id='."'$ps'".'></td>';
        echo '<td><button style="display:none" id='."'$username'".' class='."'$username'".' onclick="sendreq('."'$username','$password'".')" disabled>save</button></td>';
        echo '<td><button onclick="editrow('."'$username'".')" id="'.$username.'edit'.'">edit</button></td><td id="'.$username.'msg'.'"></td></tr>';    
    }
    echo "</table>";
}
?>
<script>
    function editrow(id){
        var a=document.getElementsByClassName(id);
        for(var i=0;i<=a.length;i++){
            if(a[i].disabled){
                document.getElementById(id+'edit').innerHTML='Cancel';
                document.getElementById(id).style.display="block";  
                a[i].disabled=false;
            }else{
                document.getElementById(id+'edit').innerHTML='Edit';
                document.getElementById(id).style.display="none";
                a[i].disabled=true;
            }
        }
    } 
    function sendreq(username,password){
            var data={
                'rowid':username,
                'username':document.getElementById(username+'input').value,
                'password':document.getElementById(password+'input').value,
            }
            console.log(data);
            $.ajax({
                url: 'updaterow.php',
                type: 'post',
                data: data,
                success: function(response){
                    console.log(response);
                    document.getElementById(username+'msg').innerHTML=response.msg;
                    setTimeout(function(){
                        document.getElementById(username+'msg').innerHTML='';
                    },3000);
                    editrow(username);
                },
                error: function(xhr, status, error){
                    console.error(xhr.responseText);
                }
            });
    }
</script>
<script src="jquery.js"></script>