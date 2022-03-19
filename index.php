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
        <div class="row justify-content-center">
            <form action="process.php" method="post">
                <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" name="title"  class="form-control"value="Enter task title">
                </div>
                <div class="form-group">
                    <label for="status">Status</label>
                    <input type="text" name="status" class="form-control" value="Enter task status">
                </div>
                <div class="form-group">
                    <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                </div> 
            </form>
        </div>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.slim.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.1/umd/popper.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/js/bootstrap.min.js"></script>
    </body>
</html>