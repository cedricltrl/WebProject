<!DOCTYPE html>
<html lang="fr">
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8" />
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
          integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" href="style.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title> Formulaire PHP </title>
    <link rel="stylesheet" type="text/css" href="footer.css"/>
</head>
<body>

<form action="BDD_event.php" method  ="POST" enctype="application/x-www-form-urlencoded" style="border:1px solid #ccc">
    <div class="container">
        <h1>Add Event</h1>
        <p>Please fill in this form to add an event.</p>
        <hr>
        <div>
            <label for="nom"><b>Nom Activité</b></label>
            <input type="text" placeholder="Enter Name" name="name_activity" required>
        </div>

        <div>
            <label for="date"><b>Date Activité</b></label>
            <input type="date" placeholder="Enter date of activity" name="date_activity" required>
        </div>

        <div>
            <label for="description"><b>Description</b></label>
            <input type="text" placeholder="Enter description of your activity" name="description_activity" required>
        </div>

        <div>
            <label for="temps"><b>Durée de l'activité(h:m)</b></label>
            <input type="time" placeholder="Length of the activity" name="length_activity"  required>
        </div>

        <div>
            <label for="prix"><b>Prix de l'activité(€)</b></label>
            <input type="number" placeholder="Price of activity" name="activity_price" required>
        </div>



        <p>By creating an account you agree to our <a href="#" style="color:dodgerblue">Terms & Privacy</a>.</p>

        <div class="clearfix">
            <button type="button" class="cancelbtn">Cancel</button>
            <button type="submit" class="signupbtn">Add Event</button>
        </div>
    </div>
</form>

<?php
include_once("footer.php");
?>

</body>

</html>