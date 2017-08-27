<?php

include 'models/my_patient.php';

$patient_model = new my_patient();

$patients = $patient_model->list_all();

?>


<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Test for New Hires</title>
    <meta name="description" content="Test for New Hires">
    <meta name="author" content="PV">
    <link rel="stylesheet" href="src/css/bootstrap.min.css">
</head>
<body>

    <div class="container">

        <h1>Patient Listing</h1>

        <p>
            <label for="patient_filter">Filter by Name</label>
            <input type="text" name="patient_filter" id="patient_filter" />
        </p>

        <p>
            <label for="patient_filter">Number of patients grouped by age</label>
            <ul>
                <!-- Hint: Task 3. -->
                <li><span>Age:  </span><span>Patients quantity: </span></li>
            </ul>
        </p>

        <div class="row">
            <div class="col-xs-4">Name</div>
            <div class="col-xs-4">Age</div>
            <div class="col-xs-4">Phone</div>
        </div>

        <!-- Hint: Task 4. -->
        <?php foreach($patients as $patient): ?>
            <div class="row">
                <div class="col-xs-4 name"><?php echo $patient->patient_name; ?></div>
                <div class="col-xs-4"><?php echo $patient->patient_age; ?></div>
                <div class="col-xs-4"><?php echo $patient->patient_phone; ?></div>
            </div>
        <?php endforeach; ?>

    </div>

    <!-- scripts at the bottom! -->
    <script src="src/js/jquery-3.2.1.min.js"></script>
    <script src="src/js/bootstrap.js"></script>
    <script src="src/js/script.js"></script>

    <!--  Hint: Task 5. -->
    <!-- <script src="public/js/script.js"></script> -->
</body>
</html>
