<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="<?php echo base_url('Assets/css/bootstrap/css/bootstrap.min.css'); ?>">
    <title>CRUD CI</title>
</head>

<body>
    <div class="bg-dark">
        <h2 class="py-3 text-center text-light">CRUD CI APP</h2>

    </div>
    <?php # echo $singleData->id; ?> 
    <!-- Modal -->
    <div class="container">
        <div>
                <form action="<?php echo base_url('Crud/update'); ?>/<?php echo $singleData->id; ?>" method="post">
                        <h2>Update User</h2>
                        <div class="my-3">
                            <label class="form-label">Full Name</label>
                            <input type="text" name="name" class="form-control" value="<?php echo $singleData->name; ?>">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Designation</label>
                            <input type="text" name="designation" class="form-control" autocomplete="off" value="<?php echo $singleData->designation; ?>">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Address</label>s
                            <input type="text" class="form-control" name="address" autocomplete="off" value="<?php echo $singleData->address; ?>">
                        </div>
                    <div>
                        <button type="submit" name="submit" class="btn btn-success">Update</button>
                        <!-- <input type="submit" name="submit" class="btn btn-outline-success" value="Update"> -->
                    </div>
                </form>
            </div>
        </div>

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script type="text/javascript" src="<?php echo base_url("Assets/css/bootstrap/js/jquery-3.1.1.js"); ?>"></script>
    <script type="text/javascript" src="<?php echo base_url("Assets/css/bootstrap/js/bootstrap.js"); ?>"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
</body>

</html>