<?php
include "./config.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet" />
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet" />
    <!-- MDB -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/4.1.0/mdb.min.css" rel="stylesheet" />
    <title>Document</title>
    <style>
        .mainbox {
            width: 50%;
            margin: auto;
        }

        .maintable {
            padding: 5%;
        }
    </style>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>


</head>

<body>
    <div class="mainbox">
        <h2 class="text-center"> Enter your Daily Expenses</h2>
        <!-- <form> -->
        <!-- select input -->
        <input type="text" hidden id="id">
        <select class="form-control mb-4" name="category" id="category" require>
            <option value="">-------- Select Category -------</option>
            <option value="Grocery">Grocery</option>
            <option value="Veggies">Veggies</option>
            <option value="Travelling">Travelling</option>
            <option value="Miscellaneous">Miscellaneous</option>
        </select>

        <!-- Username input -->
        <div class="form-outline mb-4">
            <input type="date" id="date" name="date" class="form-control" />
            <label class="form-label" for="date">Date</label>
        </div>

        <!-- text input -->
        <div class="form-outline mb-4">
            <input type="text" id="dis" name="discription" class="form-control" />
            <label class="form-label" for="dis">Discription</label>
        </div>

        <!-- Password input -->
        <div class="form-outline mb-4">
            <input type="number" id="amount" class="form-control" />
            <label class="form-label" for="">Amount</label>
        </div>

        <!-- Submit button -->
        <button id="add" class="btn btn-primary btn-block mb-3">Add</button>
        <button id="update" class="btn btn-primary btn-block mb-3">Update</button>
        <!-- </form> -->
    </div>
    <div class="maintable">
        <div class="persontable text-center">
            <h1>Name</h1>
            <h2>Monthly salery</h2>
            <!-- <input id="myInput" type="text" placeholder="Search.."> -->
            <!-- select input -->
            <select class="form-control mb-4" name="category" id="myInput" require>
                <option value="">-------- Search Category -------</option>
                <option value="Grocery">Grocery</option>
                <option value="Veggies">Veggies</option>
                <option value="Travelling">Travelling</option>
                <option value="Miscellaneous">Miscellaneous</option>
            </select>

            <table class="table table-bordered border-primary mt-2">
                <thead>
                    <tr>
                        <th scope="col">Date</th>
                        <th scope="col">Category</th>
                        <th scope="col">Discription</th>
                        <th scope="col">Amount</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody id="myTable">
                 
                </tbody>
                <tr>
                    <th scope="row">3</th>
                    <th colspan="2">Total</th>
                    <td id="total"></td>
                </tr>

            </table>
        </div>
    </div>

    <!-- MDB -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/4.1.0/mdb.min.js"></script>

    <script src="app.js"></script>
</body>

</html>