<?php
session_start();
if (!isset($_SESSION["user"])) {
   header("Location: login.php");
}
?>

<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css"
            integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
       
        

        <title>All items</title>
        <style>
            html,
            body {
                padding: 0;
                margin: 0;
                /* overflow: hidden; */

            }
            .ok{
                font-weight: bold;
            }

            table td,
            table th {
                vertical-align: middle;
                text-align: center;
                padding: 20px ;
            }

            header {
                background-color: rgb(162, 162, 249);
                height: 75px;
                align-items: center;
                padding: 22px;
            }

            .add-item {
                z-index: 110;
                position: fixed;
                bottom: 0;
                right: 20px;
                color: rgb(162, 162, 249);
            }
            .stock-v{
                font-size: small;
                padding-top: 5px;
            }
            img{
                    width: 70px;
                    height: 70px;
                    border-radius: 50%;
                }
            @media (max-width:500px; ) {
          
                img{
                    width: 40px;
                    height: 40px;
                }
            }
        </style>
    </head>

    <body>
        <header class="d-flex justify-content-between ">
            <h1>All items</h1>

        </header>
        <div class="container my-4">
            <?php
  
        if (isset($_SESSION["create"])) {
        ?>
            <div class="alert alert-success">
                <?php
            echo $_SESSION["create"];
            ?>
            </div>
            <?php
            unset($_SESSION["create"]);
        }
        ?>
            <?php
         if (isset($_SESSION["update"])) {
         ?>
            <div class="alert alert-success">
                <?php
             echo $_SESSION["update"];
            ?>
            </div>
            <?php
             unset($_SESSION["update"]);
         }
         ?>
            <?php
        if (isset($_SESSION["delete"])) {
        ?>
            <div class="alert alert-success">
                <?php
            echo $_SESSION["delete"];
            ?>
            </div>
            <?php
            unset($_SESSION["delete"]);
        }
        ?>

            <table class="table ">
                <thead>
                    <tr>
                        <!-- <th>#</th> -->


                        <th>Image</th>
                        <th>Item/<br>Stock</th>

                        <th>Price</th>

                        <th>Action</th>

                    </tr>
                </thead>
                <tbody>

                    <?php
        include('database.php');
        $sqlSelect = "SELECT * FROM items_data";
        $result = mysqli_query($conn, $sqlSelect);
        while ($data = mysqli_fetch_array($result)) {
        ?>
                    <tr>
                        <!-- <td><?php echo $data['id']; ?></td> -->
                        <td> <img  src="item-photos/<?php echo $data['uploaded_image']; ?>" alt=""></td>

                        <td>
                           <div class="ok"> <?php echo $data['item']; ?></div>
                            <div>
                              <div class="stock-v" >  <?php echo $data['stock']; ?></div>
                            </div>

                        </td>
                        <td>
                            <?php echo $data['price']; ?>

                        </td>

                        <td class="item-action">

                            <a style="width: 70px;" href="edit.php?id=<?php echo $data['id']; ?>"
                                class="btn btn-info my-2">Edit</a>
                            <a href="delete.php?id=<?php echo $data['id']; ?>" class="btn btn-danger" onclick="promptHandler()" >Delete</a>
                        </td>
                    </tr>
                    <?php
        }
            ?>

                </tbody>

            </table>


        </div>


        <div class="add-item">
            <a href="create.php">
                <i style="font-size:50px " class="bi2 bi-plus-circle"></i>
            </a>
        </div>

    </body>
    
    <script src="main.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

</html>