<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>register here</title>
    <link rel="stylesheet" href="style.css">

    <style>
        .form{
    min-height: 100vh;
    display: flex;
    align-items: center;
    justify-content: center;
    background: rgb(208, 241, 199);
}

.registration{
    position: relative;
    max-width: 900px;
    width: 100%;
    border-radius: 5px;
    padding: 30px;
    margin: 0 15px;
    background: #fff;
    box-shadow: var(--box-shadow);
}

.registration header{
    position: relative;
    font-size: 2rem;
    font-weight: 600;
}

.registration header::before{
    content: "";
    position: absolute;
    left: 0;
    bottom: -2px;
    height: 3px;
    width: 30px;
    background-color: #16a085;
    border-radius: 5px;
}

.registration form{
    position: relative;
    margin-top: 1.5rem;
    min-height: 500px;
    
}

.registration form .personal{
    margin-top: 10px;
}

.registration form .title{
    display: block;
    font-size: 2rem;
    font-weight: 300;
    margin: 6px 0;
    margin-bottom: 8px;
}

.registration form .fields{
    display: flex;
    align-items: center;
    justify-content: space-between;
    flex-wrap: wrap;
}

form .fields .inputs{
    display: flex;
    width: calc(100% / 3 - 15px);
    flex-direction: column;
}

.inputs input{
    outline: none;
    font-size: 1rem;
    border-radius: 5px;
    border: var(--border);
    padding: 0 15px;
    height: 40px; 
    margin: 8px 0;
}

.inputs input:is(:focus, :valid){
    /* box-shadow: var(--box-shadow); */
}

.inputs label{
    font-size: 1.5rem;
}

select{
    border: var(--border);
    outline: none;
    font-size: 1rem;
    border-radius: 5px;
    border: var(--border);
    padding: 0 15px;
    height: 40px;
    margin: 8px 0;
}

input[type=submit]{
  background-color: #04AA6D;
  border: none;
  color: white;
  padding: 16px 32px;
  text-decoration: none;
  margin-top: 3rem;
  cursor: pointer;
  float: right;
}
    </style>
    

</head>

<body class="form">
    <div class="registration">
        <header>medical registration</header>

        <form action="registration2.php" method="post">
            <div class="details">

                        <div class="fields">
                        
                            <div class="inputs">
                            <span class="title">select symptoms</span>
                        <?php

$conn = mysqli_connect('localhost', 'root', '', 'disease');

$query = "SELECT id, name FROM symptoms";
$result = mysqli_query($conn, $query);



while ($row = mysqli_fetch_assoc($result)) {
    $symptoms[] = $row;
}



mysqli_query($conn, $query);

if (isset($_POST['submit'])) {
  $symptoms = $_POST['symptoms'];
  $patient_id = $_POST['patient_id'];
  foreach ($symptoms as $symptom_id) {
      $query = "INSERT INTO patient_symptoms (PATIENT_ID, SYMPTOM_ID) VALUES ('$patient_id','$symptom_id')";
      echo "Query: $query <br>"; // Debug statement
        $result = mysqli_query($conn, $query);
        if (!$result) {
            die("Error: " . mysqli_error($conn)); // Debug statement
        }
  }
  echo "Symptoms saved successfully!";
} else {
    "Error" . mysqli_error($conn);
}


// Close the database connection
mysqli_close($conn);
?>



  <?php foreach ($symptoms as $symptom): ?>
    <input type="checkbox" name="symptoms[]" value="<?php echo $symptom['id']; ?>"><?php echo $symptom['name']; ?><br>
  <?php endforeach; ?>
  <div class="inputs">
                            <label for="">enter ID</label>
                            <input type="text" placeholder="enter your ID" name="patient_id" required>
                        </div>
  <input type="submit" name="submit" value="Submit">
</form>




</div>
                            </div>
                        </div>

                    </div>

                </div>
            </div>
        </form>
    </div>
</body>

</html>
