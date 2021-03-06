<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <meta name="Description" content="Enter your description here"/>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
        <link rel="stylesheet" href="assets/css/style.css">
        <title>Simple Todo List</title>
    </head>
    <body>
        <?php require_once 'process.php'?>

        <!-- display session messages -->
        <?php
            if(isset($_SESSION['message'])):?>
            <div class="alert alert-<?=$_SESSION['msg_type'];?>">
                <?php
                    echo $_SESSION['message'];
                    unset($_SESSION['message']);
                ?>
            </div>
        <?php endif ?>
        <div class="container">
            <?php
            
            //    display all tasks
            include 'db.php'; 
            $result = $mysqli->query("SELECT * FROM todos") or die($mysqli->error);
            //    pre_r($result->fetch_assoc());
            ?>
            <div class="row justify-content-center">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Title</th>
                            <th>Status</th>
                            <th colspan="2">Action</th>
                        </tr>
                    </thead>
                    <?php
                    while($row = $result->fetch_assoc()):?>
                    <tr>
                        <td><?php echo $row['title']; ?></td>
                        <td><?php echo $row['status']; ?></td>
                        <td>
                            <a href="index.php?edit=<?= $row['id']; ?>" class="btn btn-info">Edit</a>
                            <a href="process.php?delete=<?= $row['id']; ?>" class="btn btn-danger">Delete</a>
                        </td>
                    </tr>
                    <?php endwhile; ?>
                </table>
            </div>
                <!-- pre_r($result);
                function pre_r($array){
                    echo '<pre>';
                    print_r($array);
                    echo '</pre>';
                }
                ?> -->
            <div class="row justify-content-center">
                <form action="process.php" method="post">
                    <input type="hidden" name="id" value="<?= $id; ?>">
                    <div class="form-group">
                        <label for="title">Title</label>
                        <input type="text" name="title" class="form-control" value="<?=$title;?>" placeholder="Enter task title">
                    </div>
                    <div class="form-group">
                        <label for="status">Status</label>
                        <input type="text" name="status" class="form-control" value="<?=$status;?>"  placeholder="Enter task status">
                    </div>
                    <?php 
                        if($update == true):?>
                            <div class="form-group">
                                <button type="submit" name="update" class="btn btn-info">Update</button>
                            </div> 
                        <?php else: ?>
                            <div class="form-group">
                                <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                            </div> 
                        <?php endif ?>
                </form>
            </div>
        </div>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.slim.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.1/umd/popper.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/js/bootstrap.min.js"></script>
    </body>
</html>