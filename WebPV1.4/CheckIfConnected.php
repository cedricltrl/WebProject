<?php


if($_SESSION['connected']!=="yes")
{
    echo"<script type=\"text/javascript\">
            alert(\"You are not connected, you can't visit this part of the website without beeing a member. Please connect your account $_SESSION[connected]\")
            window.location='connexion.php';
            </script>"; 
}

else{
    if($_SESSION['connected'] == "yes" && $_SESSION['role']=="bdemember"){
        echo"<script type=\"text/javascript\">
    alert(\"You are connected as BDE member ! Here is your Session value : $_SESSION[connected]; $_SESSION[username]; $_SESSION[role]; \")
    window.location='./bde/bdeMain.php';
    </script>"; 
    }
    elseif($_SESSION['connected'] == "yes" && $_SESSION['role']=="student"){
        echo"<script type=\"text/javascript\">
    alert(\"You are connected as student ! Here is your Session value : $_SESSION[connected]; $_SESSION[username]; $_SESSION[role]; \")
    window.location='./student/studentMain.php';
    </script>"; 
    }
    elseif($_SESSION['connected'] == "yes" && $_SESSION['role']=="employee"){
        echo"<script type=\"text/javascript\">
    alert(\"You are connected as employee ! Here is your Session value : $_SESSION[connected]; $_SESSION[username]; $_SESSION[role]; \")
    window.location='./employee/employeeMain.php';
    </script>"; 
    }


    echo"<script type=\"text/javascript\">
    alert(\"You are connected well done bro ! Here is your Session value : $_SESSION[connected]; $_SESSION[username];\")
    </script>"; 
}

?>