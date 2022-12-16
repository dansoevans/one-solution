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
        <link rel="stylesheet" href="main.css">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.3/jquery.min.js"
            integrity="sha512-SFaNb3xC08k/Wf6CRM1J+O/vv4YWyrPBSdy0o+1nqKzf+uLrIBnaeo8aYoAAOd31nMNHwX8zwVwTMbbCJjA8Kg=="
            crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    </head>

    <body>
        <div class="navbar sticky-top">
            <h2>
                Edit Item
            </h2>
            <div>
                <a href="index.php" class="btn btn-primary">Back</a>
            </div>
        </div>
        <div class="container my-5">

            <form action="process.php" method="post" enctype="multipart/form-data">
                <?php

                if (isset($_GET['id'])) {
                    include("database.php");
                    $id = $_GET['id'];
                    $sql = "SELECT * FROM items_data WHERE id=$id";
                    $result = mysqli_query($conn, $sql);
                    $row = mysqli_fetch_array($result);
                ?>
                <div class="form-element my-4">
                    <h6>Item name</h6>
                    <input type="text" class="form-control" name="item" placeholder="item:" required
                        value="<?php echo $row["item"]; ?>">
                </div>

                <div class="form-element my-4">
                    <h6>Category</h6>

                    <select name="category" id="" class="form-control">
                        <option value=""> No category</option>

                    </select>
                </div>
                <div class="form-element my-4">

                    <div class="tit"><small>Sold By</small></div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" checked name="sold_by"
                            value=" <?php echo $row["sold_by"]; ?>" />
                        <span>Each</span>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="sold_by"
                            value=" <?php echo $row["sold_by"]; ?>" />
                        <span>Weight</span>
                    </div>
                </div>
                <div class="form-element my-4">
                    <h6>Price</h6>

                    <input type="text" required name="price" id="" class="form-control" placeholder="Price"
                        value="<?php echo $row["price"]; ?>">
                </div>
                <div class="form-element my-4">
                    <h6>Cost</h6>

                    <input type="text" name="cost" id="" class="form-control" placeholder="cost"
                        value=" <?php echo $row["cost"]; ?> ">

                </div>
                <div class="form-element my-4">
                    <h6>SKU</h6>

                    <input type="text" name="SKU" id="" class="form-control" placeholder="SKU"
                        value="<?php echo $row["SKU"]; ?>">

                </div>
                <div class="form-element my-4">
                    <h6>Barcode</h6>

                    <input type="text" name="barcode" id="" class="form-control" placeholder="barcode"
                        value="<?php echo $row["barcode"]; ?>">

                </div>

                <div class="form-element my-4">


                    <div class="name-assign ss">
                        <div style="color: rgb(162, 162, 249); font-weight: bold" class="tit">
                            Inventory
                        </div>

                        <label class="switch">
                            <input checked onclick="doIt()" type="checkbox" />
                            color <span class="slider round"></span>
                        </label>
                    </div>

                </div>


                <div class="form-element my-4">


                    <div id="hider" class="name-assign">
                        <div><small>In stock</small></div>
                        <input class="form-control" type="number" name="stock" value="<?php echo $row["stock"]; ?>" ; />
                    </div>

                </div>

                <div class="form-element my-4">

                    <div class="form-element my-4">




                        <div class="name-assign">
                            <div style="color: rgb(162, 162, 249); font-weight: bold" class="name">Representation on POS
                            </div>
                            <div class="radio_tabs">
                                <label class="radio_wrap" data-radio="radio_1">
                                    <input type="radio" name="sports" class="input2" checked>
                                    <span class="radio_mark">
                                        color
                                    </span>
                                </label>
                                <label class="radio_wrap" data-radio="radio_2">
                                    <input type="radio" name="sports" class="input2">
                                    <span class="radio_mark">
                                        image
                                    </span>
                                </label>

                            </div>

                        </div>

                        <div class="content">
                            <div class="radio_content radio_1">
                                <div class="colors">
                                    <input type="checkbox" class="color grey" />
                                    <input type="checkbox" class="color red" />
                                    <input type="checkbox" class="color pink" />
                                    <input type="checkbox" class="color orange" />
                                    <input type="checkbox" class="color lemon" />
                                    <input type="checkbox" class="color green" />
                                    <input type="checkbox" class="color violet" />
                                    <input type="checkbox" class="color sqr" />

                                    <div class="shapes cir"> </div>
                                    <div class="shapes sqr"> </div>
                                    <div class="shapes zig"> </div>
                                    <div class="shapes polygon"> </div>

                                </div>


                            </div>
                            <div class="radio_content radio_2">
                                <!-- <i class="bi bi-card-image"></i>
<i class="bi bi-card-image"></i>>
-->
                                <div class="first-radi">
                                    <img id="imgprev" src="place.png" alt="placeholder">
                                </div>
                                <div class="others">

                                    <input required class="form-control img-input" type="file" accept="image/*"
                                        name="uploaded_image" id="file"
                                         onchange="prev(event)"
                                         
                                         />


                                    <label  class="upp" for="file"> <i style=" font-size: 20px;"
                                            class="bi bi-cloud-arrow-up-fill"></i>
                                        <h5> upload image</h5>

                                    </label>


                                </div>
                            </div>


                        </div>




                    </div>

                </div>

                <input type="hidden" value="<?php echo $id; ?>" name="id">
                <div class="form-element my-4">
                    <input type="submit" name="edit" value="Edit Item" class="btn btn-primary">
                </div>
                <?php
                } else {
                    echo "<h3>Item Does Not Exist</h3>";
                }
                ?>

            </form>


        </div>
        <script src="main.js"></script>
        <script>
               function prev(){
  var img = URL.createObjectURL(event.target.files[0]);
  var  preim = document.getElementById('imgprev');
  preim.src =img;
}
           </script>
        <style>
            .navbar {
                align-items: center;
                width: auto;
            }

            .first-radi img {
                width: 180px;
                height: 140px;
            }

            .wize {
                position: fixed;
                top: -5px;
                right: 20px;
                z-index: 111199;
            }

            .container {
                width: 700px;
            }

            .upp {
                background: rgb(31, 31, 43);
                padding: 12px;
                align-items: center;
                text-align: center;
                display: flex;

                cursor: pointer;
                border-radius: 4px;
                color: aliceblue;
                justify-content: space-between;

            }

            .upp:hover {
                background-color: antiquewhite;
                color: #234542;
                transition: 0.3s ease-in-out;
            }

            .upp h5 {
                padding-left: 10px;
                padding-top: 4px;
            }

            input[type=file] {
                display: none;

            }
            .radio_mark{
        padding-left: 6px;
        padding-bottom: 10px;
        font-size : larger;
        position: relative;
        bottom: 7px;
      }
                /* MEDIA QUERY */
            @media (max-width:500px) {
                .container {
                    width: 100%;
                }

                .wize {
                    position: fixed;
                    top: -10px;
                    right: 20px;
                    z-index: 111199;
                }

                .upp {
                    background: rgb(31, 31, 43);
                    padding: 12px;
                    align-items: center;
                    text-align: center;
                    display: flex;

                    cursor: pointer;
                    border-radius: 4px;
                    color: aliceblue;


                }

                .upp h5 {
                    padding-left: 10px;
                    padding-top: 4px;
                }

                .first-radi img {
                    width: 120px;
                    height: 100px;
                }
            }
        </style>

    </body>

</html>