<?php

require_once "connection.php";

session_start();
unset($_SESSION['errors']);

function getPostData($field)
{
    return isset($_POST[$field]) ? $_POST[$field] : '';
}

function saveData($conn, $name, $role, $availability, $age, $lokasi, $experience, $email)
{
    $sql = $conn->prepare("INSERT INTO portofolio (name, role, availability, age, lokasi, experience, email) VALUES (?,?,?,?,?,?,?)");
    $sql->bind_param("sssisis", $name, $role, $availability, $age, $lokasi, $experience, $email);

    if ($sql->execute()) {
        $id = $conn->insert_id;
        readData($conn, $id);
        unset($_SESSION['valid']);
        header("location: assignment2.php?id=" . $id);
        exit();
    } else {
        die("Error query failed : " . $sql->error . "<br>");
    }

    $sql->close();
}

function readData($conn, $id)
{
    if ($id !== 0) {
        $sql = $conn->prepare("SELECT * FROM portofolio WHERE id = ?");
        $sql->bind_param("i", $id);
        $sql->execute();

        $result = $sql->get_result();
        if ($result->num_rows > 0) {
            $data = $result->fetch_assoc();
            $_SESSION['name'] = $data['name'];
            $_SESSION['role'] = $data['role'];
            $_SESSION['availability'] = $data['availability'];
            $_SESSION['age'] = $data['age'];
            $_SESSION['lokasi'] = $data['lokasi'];
            $_SESSION['experience'] = $data['experience'];
            $_SESSION['email'] = $data['email'];
        }

        $sql->close();
    }
}

function validateInput($data, $type)
{
    $data = trim($data);
    $data = htmlspecialchars($data);

    if (empty($data) && $data !== '0') {
        return false;
    }

    switch ($type) {
        case 'email':
            if (!filter_var($data, FILTER_VALIDATE_EMAIL)) {
                return false;
            }
            break;

        case 'text':
            if (strlen($data) < 5) {
                return false;
            }
            break;

        case 'number':
            if (!is_numeric($data) || !filter_var($data, FILTER_VALIDATE_INT) || $data <= 0) {
                return false;
            }
            break;

        case 'select':
            if (empty($data)) {
                return false;
            }
            break;

        default:
            return false;
    }

    return $data;
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $conn = getConnection();
    $errors = [];
    $_SESSION['valid'] = [];

    $name = validateInput(getPostData('name'), 'text');
    if (!$name) {
        $errors['name'] = "Name minimal 5 karakter!";
    } else {
        $_SESSION['valid']['name'] = $name;
    }

    $role = validateInput(getPostData('role'), 'text');
    if (!$role) {
        $errors['role'] = "Role minimal 5 karakter!";
    } else {
        $_SESSION['valid']['role'] = $role;
    }

    $availability = validateInput(getPostData('availability'), 'select');
    if (!$availability) {
        $errors['availability'] = "Availability harus dipilih!";
    } else {
        $_SESSION['valid']['availability'] = $availability;
    }

    $age = validateInput(getPostData('age'), 'number');
    if (!$age) {
        $errors['age'] = "Umur harus angka dan lebih dari 0 tahun!";
    } else {
        $_SESSION['valid']['age'] = $age;
    }

    $lokasi = validateInput(getPostData('lokasi'), 'text');
    if (!$lokasi) {
        $errors['lokasi'] = "Location minimal 5 karakter!";
    } else {
        $_SESSION['valid']['lokasi'] = $lokasi;
    }

    $experience = validateInput(getPostData('experience'), 'number');
    if (!$experience) {
        $errors['experience'] = "Years Experience harus angka lebih dari 0 tahun!";
    } else {
        $_SESSION['valid']['experience'] = $experience;
    }

    $email = validateInput(getPostData('email'), 'email');
    if (!$email) {
        $errors['email'] = "Email tidak valid!";
    } else {
        $_SESSION['valid']['email'] = $email;
    }

    if (!empty($errors)) {
        $_SESSION['errors'] = $errors;
        header("location: assignment2.php");
        exit();
    } else {
        saveData($conn, $name, $role, $availability, $age, $lokasi, $experience, $email);
        unset($_SESSION['valid']);
    }

    $conn->close();
}

?>