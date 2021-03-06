<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <style>
        img {
            width: 200px;
            height: 150px;
        }
    </style>
</head>

<body>

    <div class="container">
        <form action="../controller/controller.php" method="POST" enctype="multipart/form-data">
            <table class='table'>
                <tbody>
                    <tr>
                        <td>
                            <label for="title">Title</label>
                        </td>
                        <td>
                            <input type="text" name="title" value="" placeholder="Enter title">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for="description">Description</label>
                        </td>
                        <td>
                            <textarea name="description" id="" cols="50" rows="6" placeholder='Description'>

                            </textarea>

                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for="image">Image</label>
                        </td>
                        <td>
                            <input type="file" onchange='loadImage(event)' id="image" name="image" class='form-control'>
                            <br>

                            <img id='showimage' src="#" alt="">
                        </td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>
                            <select class="custom-select" name='select_option'>
                                <option value="1">Disabled</option>
                                <option value="2">Enabled</option>
                            </select>
                        </td>
                    </tr>
                </tbody>
            </table>
            <button class='btn btn-primary ' type="submit" name="add">Add</button>
        </form>
       
        <div>
            <a class="btn btn-primary" href="../view/manage.php">Manage</a>
        </div>


    </div>
    <script>
        function loadImage(event) {
            if (event.target.files.length > 0) {
                let src = URL.createObjectURL(event.target.files[0]);
                let preview = document.getElementById("showimage");
                preview.src = src;
                preview.style.display = "block";
            }
        }
    </script>
</body>

</html>


<!-- <div class="row justify-content-center">
        <form action="" method="POST">
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" name="name" class='form-control' value="" placeholder="Enter name">
            </div>

            <div class="form-group">
                <label for="description">Description</label>
                <input type="text" name="description" class='form-control' placeholder="Description">
            </div>

            <div class="form-group">
                <label for="image">Image</label>
                <input type="file" id="image" name="image" class='form-control'>
                <br>
                <img src="a.jpeg" alt="">
            </div>
            <div class="dropdown form-group">
                <select class="custom-select">
                    <option selected>Open this select menu</option>
                    <option value="1">One</option>
                    <option value="2">Two</option>
                    <option value="3">Three</option>
                </select>
            </div>
            <button class='btn btn-primary ' type="submit" name="submit">Add</button>
        </form>
    </div> -->