<?php
include "./config.php";

if ($_POST['action'] == "add") {
    $category = $_POST['category'];
    $dis = $_POST['dis'];
    $date = $_POST['date'];
    $amount = $_POST['amount'];

    $sql = "INSERT INTO `Expense` (`e_id`, `dis`, `amount`, `category`, `date`) 
    VALUES (NULL, '$dis', '$amount', '$category', '$date');";

    $result = mysqli_query($conn, $sql);

    if ($result == 1) {
        // print_r("add successfuly");
        display($conn);
    }
}

if ($_POST['action'] == "update") {
    $id = $_POST['id'];
    $category = $_POST['category'];
    $dis = $_POST['dis'];
    $date = $_POST['date'];
    $amount = $_POST['amount'];

    $sql = "UPDATE `Expense` 
    SET `dis` = '$dis', `amount` = '$amount', `category` = '$category', `date` = '$date' 
    WHERE `Expense`.`e_id` = $id;";

    $result = mysqli_query($conn, $sql);

    if ($result == 1) {
        display($conn);
    }
};
if ($_GET['action'] == "display") {
    display($conn);
}
if ($_GET['action'] == "delete") {
    $id = $_GET['id'];
    $stm = "DELETE FROM `Expense` WHERE `Expense`.`e_id` = $id";
    $result = mysqli_query($conn, $stm);
    display($conn);
}
if ($_GET['action'] == "delete") {
    $val = $_GET['val'];
}
if ($_GET['action'] == 'search') {
    $name = $_GET['val'];

    $sql = "SELECT * FROM `Expense` WHERE `category` LIKE '%$name%'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $_SESSION['search'] = array();
        while ($row = $result->fetch_assoc()) {
            array_push($_SESSION['search'], $row);
        };
        print_r(json_encode($_SESSION['search']));
    } else {
        // echo "Error: " . $sql . "<br>" . $conn->error;
        display($conn);
    }
}
function display($conn)
{
    // print_r("hello");
    $stm = "SELECT * FROM `Expense`";
    $result1 = $conn->query($stm);
    $_SESSION['expense'] = array();
    if ($result1->num_rows > 0) {
        while ($row = $result1->fetch_assoc()) {

            array_push($_SESSION['expense'], $row);
        }
    }
    print_r(json_encode($_SESSION['expense']));
};
