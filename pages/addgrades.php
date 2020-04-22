<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Ubuntu&display=swap" rel="stylesheet">
    <link href="/assets/css/styler.css" rel="stylesheet">
    <title>Cohort selection</title>
</head>

<body>
    <div class="logo">
        <img src="/assets/images/alu_logo_original.png">
    </div>

    <form action="/classes/gradesaddd.php" method="POST">
        <input class="form-control" type="text" name="cohort" required placeholder="Enter Cohort Name e.g. Y2C1"><br>
        <input class="form-control" type="text" name="title"  placeholder="Enter the title of the grades e.g. Quiz 2"> <br>
        <input class="form-control" type="text" name="courseID"  placeholder="Select Course ID"><br>
        <button type="submit" class="btn btn-primary" name="enter">Enter</button>
    </form>
   
    

</body>