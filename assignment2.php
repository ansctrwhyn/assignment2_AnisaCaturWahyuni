<?php
require_once "connection.php";

session_start();

// die;
// $name = $_REQUEST['name']; //bisa pake $_REQUEST kalo gatau methodnya pake GET/SET
// $role = $_POST['role'];
// $availability = $_POST['availability'];
// $age = $_POST['age'];
// $lokasi = $_POST['lokasi'];
// $experience = $_POST['experience'];
// $email = $_POST['email'];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['submit-session'])) {
        $_SESSION["name"] = $_POST['name'];
        $_SESSION["role"] = $_POST['role'];
        // header("location: assignment2.php");
    }
    // elseif (isset($_POST['submit-cookie'])) {
    //     session_destroy();
    //     $valueName = (isset($_POST['name']) && !empty($_POST['name'])) ? htmlspecialchars($_POST['name']) : 'Data Kosong';
    //     $valueRole = (isset($_POST['role']) && !empty($_POST['role'])) ? htmlspecialchars($_POST['role']) : 'Data Kosong';
    //     setcookie("name", $valueName, time() + 300);
    //     setcookie("role", $valueRole, time() + 300);
    //     $name = $valueName;
    //     $role = $valueRole;
    // }
}

?>


<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.datatables.net/2.1.4/css/dataTables.dataTables.min.css">
    <style>
        .error {
            color: red;
        }
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-lg bg-body-tertiary text-right sticky-top">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">BFLP IT</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup"
                aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav ms-auto">
                    <a class="nav-link active" aria-current="page" href="#">HOME</a>
                    <a class="nav-link" href="#">PRODUCT</a>
                    <a class="nav-link" href="#">GALLERY</a>
                    <a class="nav-link" href="#">BLOG</a>
                    <a class="nav-link" href="#">MY INVENTORY</a>
                </div>
            </div>
        </div>
    </nav>
    <div class="container">
        <div class="section-profile shadow-sm rounded p-3 mt-3 mb-3">
            <div class="row">
                <div class="col-12 col-md-6">
                    <div class="row">
                        <div class="col-12 col-sm-4 img-profile text-center text-sm-start">
                            <div class="photo">
                                <img src="https://i.pinimg.com/474x/92/70/02/927002368dfb5a96427ae990838dd112.jpg"
                                    alt="Avatar" class="avatar img-fluid rounded" width="200px" height="200px">
                            </div>
                        </div>
                        <div class="col-12 col-sm-8 description text-center text-sm-start">
                            <h1 id="data-name">
                                <?= isset($_SESSION["name"]) ? $_SESSION["name"] : "Data Kosong"; ?>
                            </h1>
                            <p id="data-role"><?= isset($_SESSION["role"]) ? $_SESSION["role"] : "Data Kosong"; ?></p>
                            <button class="btn bg-primary text-white mb-2">Kontak</button>
                            <button class="btn mb-2"
                                style="background: #fff; border-color: green; color: green;">Resume</button>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-6 information text-sm-start">
                    <?php
                    $infoLabels = ["Availability", "Usia", "Lokasi", "Pengalaman", "Email"];
                    $infoFields = ["availability", "age", "lokasi", "experience", "email"];
                    $dataFields = [];

                    foreach ($infoLabels as $index => $label) {
                        $data_session = isset($_SESSION[$infoFields[$index]]) ? $_SESSION[$infoFields[$index]] : 'Data Kosong';
                        echo '<div class="row">';
                        echo '<label class="col-5 col-sm-3 fw-bold">' . $label . '</label>';
                        echo '<p class="col-7 col-sm-9" id="data-' . $infoFields[$index] . '">';
                        if (isset($_POST['submit-session'])) {
                            $_SESSION[$infoFields[$index]] = (isset($_POST[$infoFields[$index]]) && !empty($_POST[$infoFields[$index]])) ? htmlspecialchars($_POST[$infoFields[$index]]) : 'Data Kosong';
                            $dataFields[$index] = $_SESSION[$infoFields[$index]];
                            echo isset($dataFields[$index]) ? $dataFields[$index] : 'Data Kosong';
                        }
                        // elseif (isset($_POST['submit-cookie'])) {
                        //     session_destroy();
                        //     $value = (isset($_POST[$infoFields[$index]]) && !empty($_POST[$infoFields[$index]])) ? htmlspecialchars($_POST[$infoFields[$index]]) : 'Data Kosong';
                        //     setcookie($infoFields[$index], $value, time() + 300);
                        //     $dataFields[$index] = $value;
                        //     echo isset($dataFields[$index]) ? $dataFields[$index] : 'Data Kosong';
                        else {
                            echo isset($data_session) ? $data_session : 'Data Kosong';
                        }
                        echo '</p>';
                        echo '</div>';
                    }

                    ?>
                    <!-- <div class="row">
                        <label class="col-5 col-sm-3 fw-bold">Availability</label>
                        <p class="col-7 col-sm-9" id="data-availability"><?= $availability ?></p>
                    </div>
                    <div class="row">
                        <label class="col-5 col-sm-3 fw-bold">Usia</label>
                        <p class="col-7 col-sm-9" id="data-age"><?= $age ?></p>
                    </div>
                    <div class="row">
                        <label class="col-5 col-sm-3 fw-bold">Lokasi</label>
                        <p class="col-7 col-sm-9" id="data-lokasi"><?= $lokasi ?></p>
                    </div>
                    <div class="row">
                        <label class="col-5 col-sm-3 fw-bold">Pengalaman</label>
                        <p class="col-7 col-sm-9" id="data-experience"><?= $experience ?></p>
                    </div>
                    <div class="row">
                        <label class="col-5 col-sm-3 fw-bold">Email</label>
                        <p class="col-7 col-sm-9" id="data-email"><?= $email ?></p>
                    </div> -->
                </div>
            </div>
        </div>
        <div class="section-form shadow-sm rounded p-3 mt-3 mb-3">
            <form method="POST" action="crud.php">
                <div class="mb-3">
                    <label for="name" class="form-label fw-bold">Name</label>
                    <input type="text" class="form-control" id="name" name="name" value="<?php echo isset($_SESSION['valid']['name']) ? htmlspecialchars($_SESSION['valid']['name']) : ''; ?>">
                    <?php if(isset($_SESSION['errors']['name'])): ?>
                        <p class="text-danger"><?php echo $_SESSION['errors']['name']; ?></p>
                    <?php endif; ?>
                </div>
                <div class="mb-3">
                    <label for="role" class="form-label fw-bold">Role</label>
                    <input type="text" class="form-control" id="role" name="role" value="<?php echo isset($_SESSION['valid']['role']) ? htmlspecialchars($_SESSION['valid']['role']) : ''; ?>">
                    <?php if(isset($_SESSION['errors']['role'])): ?>
                        <p class="text-danger"><?php echo $_SESSION['errors']['role']; ?></p>
                    <?php endif; ?>                
                </div>
                <div class="mb-3">
                    <label for="availability" class="form-label fw-bold">Availability</label>
                    <select class="form-select" aria-label="Default select example" name="availability" id="availability">
                        <option value="">Pilih Availability</option>
                        <option value="Full Time" <?php echo (isset($_SESSION['valid']['availability']) && $_SESSION['valid']['availability'] == 'Full Time') ? 'selected' : ''; ?>>Full Time</option>
                        <option value="Part Time" <?php echo (isset($_SESSION['valid']['availability']) && $_SESSION['valid']['availability'] == 'Part Time') ? 'selected' : ''; ?>>Part Time</option>
                        <option value="Internship" <?php echo (isset($_SESSION['valid']['availability']) && $_SESSION['valid']['availability'] == 'Internship') ? 'selected' : ''; ?>>Internship</option>
                    </select>
                    <?php if(isset($_SESSION['errors']['availability'])): ?>
                        <p class="text-danger"><?php echo $_SESSION['errors']['availability']; ?></p>
                    <?php endif; ?>  
                </div>          
                <div class="mb-3">
                    <label for="age" class="form-label fw-bold">Age</label>
                    <input type="number" class="form-control" id="age" name="age" value="<?php echo isset($_SESSION['valid']['age']) ? htmlspecialchars($_SESSION['valid']['age']) : ''; ?>">
                    <?php if(isset($_SESSION['errors']['age'])): ?>
                        <p class="text-danger"><?php echo $_SESSION['errors']['age']; ?></p>
                    <?php endif; ?>                
                </div>
                <div class="mb-3">
                    <label for="location" class="form-label fw-bold">Location</label>
                    <input type="text" class="form-control" id="lokasi" name="lokasi" value="<?php echo isset($_SESSION['valid']['lokasi']) ? htmlspecialchars($_SESSION['valid']['lokasi']) : ''; ?>">
                    <?php if(isset($_SESSION['errors']['lokasi'])): ?>
                        <p class="text-danger"><?php echo $_SESSION['errors']['lokasi']; ?></p>
                    <?php endif; ?>                
                </div>
                <div class="mb-3">
                    <label for="experience" class="form-label fw-bold">Years Experience</label>
                    <input type="number" class="form-control" id="experience" name="experience" value="<?php echo isset($_SESSION['valid']['experience']) ? htmlspecialchars($_SESSION['valid']['experience']) : ''; ?>">
                    <?php if(isset($_SESSION['errors']['experience'])): ?>
                        <p class="text-danger"><?php echo $_SESSION['errors']['experience']; ?></p>
                    <?php endif; ?>                
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label fw-bold">Email Address</label>
                    <input type="email" class="form-control" id="email" name="email" value="<?php echo isset($_SESSION['valid']['email']) ? htmlspecialchars($_SESSION['valid']['email']) : ''; ?>">
                    <?php if(isset($_SESSION['errors']['email'])): ?>
                        <p class="text-danger"><?php echo $_SESSION['errors']['email']; ?></p>
                    <?php endif; ?>                

                </div>
                <button type="submit" class="btn btn-success mb-2" name="submit-session" style="width: 100%;">Submit</button>
                <!-- <button type="submit" class="btn btn-primary" name="submit-cookie" style="width: 100%;">Submit Cookie</button> -->
            </form>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://cdn.datatables.net/2.1.4/js/dataTables.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script type="text/javascript">
        // let table = new DataTable('#myTable');

        // $(document).ready(function() {
        //     $('#submit').click(function() {
        //     e.preventDefault();
        //         var inputName = $('#name').val();
        //         var inputRole = $('#role').val();
        //         var inputAvailability = $('#availability').val();
        //         var inputAge = $('#age').val();
        //         var inputLokasi = $('#lokasi').val();
        //         var inputExperience = $('#experience').val();
        //         var inputEmail = $('#email').val();
        //         var message;

        //         function alertError() {
        //             Swal.fire({
        //                 title: "Oops..",
        //                 text: message,
        //                 icon: "error"
        //             });
        //         }

        //         if (inputName == "") {
        //             message = "Input Name Required!";
        //             alertError();
        //         } else if (inputRole == "") {
        //             message = "Input Role Required!";
        //             alertError();
        //         } else if (inputAvailability == "") {
        //             message = "Input Availability Required!";
        //             alertError();
        //         } else if (inputAge == "") {
        //             message = "Input Age Required!";
        //             alertError();
        //         } else if (inputLokasi == "") {
        //             message = "Input Location Required!";
        //             alertError();
        //         } else if (inputExperience == "") {
        //             message = "Input Years Experience Required!";
        //             alertError();
        //         } else if (inputEmail == "") {
        //             message = "Input Email Address Required!";
        //             alertError();
        //         } else {
        //             $('#data-name').html(inputName);
        //             $('#data-role').html(inputRole);
        //             $('#data-availabilßity').html(inputAvailability);
        //             $('#data-age').html(inputAge);
        //             $('#data-lokasi').html(inputLokasi);
        //             $('#data-experience').html(inputExperience);
        //             $('#data-email').html(inputEmail);
        //         }
        //     });
        // })
    </script>

</body>

</html>