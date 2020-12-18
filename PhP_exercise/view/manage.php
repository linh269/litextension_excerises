<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <style>
        img {
            width: 200px;
            height: 150px;
        }
    </style>
</head>

<body>
    <div class="container">
        <?php include_once('../controller/controller.php') ?>
        <table class="table">

            <thead>
                <tr>
                    <th>ID</th>
                    <th>Image</th>
                    <th>Title</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <form action="../controller/controller.php" method="post">
                    <?php
                    $result = getPageData();
                    while ($row = $result->fetch_assoc()) : ?>

                        <tr>
                            <td><?= $row['id']; ?></td>
                            <td><img src="<?='../uploads/'. $row['image']; ?>" alt=""></td>
                            <td><?= $row['title']; ?></td>
                            <td><?php
                                if ($row['status'] == 1) {
                                    echo 'Enable';
                                } else {
                                    echo 'Disable';
                                }
                                ?></td>
                            <td>
                                <button type="submit" name="delete" value="<?= $row['id']; ?>" class="btn btn-danger">Delete</button>
                                <a class="btn btn-primary" href="<?php echo 'update.php?id='.$row['id'];?>">Update</a>
                            </td>
                        </tr>

                    <?php endwhile;?>

                </form>

            </tbody>
        </table>
<!-- Paginate -->
        <?php $total_pages = getTotalPages(); ?>
        <ul class="pagination">
            <li><a href="?page=1">Page 1</a></li>
            <li class="<?php if ($page_id <= 1) {
                            echo 'disabled';
                        } ?>">
                <a href="<?php if ($page_id <= 1) {
                                echo '#';
                            } else {
                                echo '?page=' . ($page_id - 1);
                            }
                            ?>">Previous</a>
            </li>
            <li class="<?php if ($page_id >= $total_pages) {
                            echo 'disabled';
                        } ?>">
                <a href="<?php if ($page_id >= $total_pages) {
                                echo '#';
                            } else {
                                echo "?page=" . ($page_id + 1);
                            } ?>">Next</a>
            </li>
            <li><a href="?page=<?php echo $total_pages; ?>">Last</a></li>
        </ul>

    </div>
                            
</body>

</html>