<?php

include 'models/my_patient.php';

$patient_model = new my_patient();

$patients_by_age = $patient_model->list_group_by_age();

if (isset($_REQUEST['age'])) {
    $patients = $patient_model->list_by_age($_REQUEST['age']);
}else{
    $patients = $patient_model->list_all();
}

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
        
        <form role="form">
            <legend>Filter</legend>

            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="patient_filter">Patient Name</label>
                        <input class="form-control" type="text" name="patient_filter" id="patient_filter" />
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="form-group">
                        <label for="patient_filter">Older than</label>
                        <select name="age" class="form-control" id="age">
                            <option value="" <?php if (! isset($_REQUEST['age'])): ?> selected <?php endif ?>>all</option>
                            <option value="20" <?php if (isset($_REQUEST['age'])): ?> <?php echo ($_REQUEST['age'] == 20) ? 'selected' : '' ?> <?php endif ?>>20 years</option>
                            <option value="30" <?php if (isset($_REQUEST['age'])): ?> <?php echo ($_REQUEST['age'] == 30) ? 'selected' : '' ?> <?php endif ?>>30 years</option>
                            <option value="40" <?php if (isset($_REQUEST['age'])): ?> <?php echo ($_REQUEST['age'] == 40) ? 'selected' : '' ?> <?php endif ?>>40 years</option>
                            <option value="50" <?php if (isset($_REQUEST['age'])): ?> <?php echo ($_REQUEST['age'] == 50) ? 'selected' : '' ?> <?php endif ?>>50 years</option>
                            <option value="100" <?php if (isset($_REQUEST['age'])): ?> <?php echo ($_REQUEST['age'] == 100) ? 'selected' : '' ?> <?php endif ?>>100 years</option>
                        </select>
                    </div>
                </div>
            </div>
        </form>

        <p>
        </p>

        <p>
            <label for="patient_filter">Number of patients grouped by age</label>
            <ul>
                <!-- Punto 3 Listar numero de paciente por edades -->
                <?php foreach($patients_by_age as $patient): ?>
                    <li><span>Age: <?php echo $patient->patient_age ?> </span><span>Patients quantity: <?php echo $patient->quantity ?></span></li>
                <?php endforeach ?>
            </ul>
        </p>

        <div class="row">
            <div class="col-xs-4">Name</div>
            <div class="col-xs-4 hidden-xs">Age</div>
            <div class="col-xs-4">Phone</div>
        </div>

        <!-- Hint: Task 4. -->
        <?php foreach($patients as $patient): ?>
            <div class="row">
                <div class="col-xs-4 name"><?php echo $patient->patient_name; ?></div>
                <div class="col-xs-4 hidden-xs"><?php echo $patient->patient_age; ?></div>
                <div class="col-xs-4"><?php echo $patient->patient_phone; ?></div>
            </div>
        <?php endforeach; ?>

    </div>

    <script>
       var base_url = '<?php echo "http://" . $_SERVER['SERVER_NAME']; ?>';
    </script>

    <!-- scripts at the bottom! -->
    <script src="src/js/all.min.js"></script><!-- 
    <script src="src/js/bootstrap.js"></script>
    <script src="src/js/script.js"></script> -->

    <!--  Hint: Task 5. -->
    <!-- <script src="public/js/script.js"></script> -->
</body>
</html>
