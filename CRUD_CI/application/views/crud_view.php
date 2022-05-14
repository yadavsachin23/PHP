<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="<?php echo base_url('Assets/css/bootstrap/css/bootstrap.min.css'); ?>">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <title>CRUD CI</title>
</head>
<style>
    #nav a {
        color: #4CAF50;
        font-size: 20px;
        margin-top: 22px;
        font-weight: 600;
    }
</style>

<body>
    <div class="bg-dark">
        <h2 class="py-3 text-center text-light">CRUD CI APP</h2>
    </div>
    <div class="container">
        <div class="clearfix py-3">
            <h3 style="float: left;">ALL DATA</h3>
            <div class="d-flex justiy-content-center  justify-content-end">
                <input type="search" name="" class="me-3" id="myInput" placeholder="Search">
                <a href="" data-bs-toggle="modal" data-bs-target="#exampleModal" class="btn btn-primary">ADD DATA</a>
            </div>
        </div>
        <table id="data" class="table table-dark table-striped">
            <thead>
                <tr class="text-center">
                    <th scope="col">SNo</th>
                    <th scope="col">Name</th>
                    <th scope="col">Designation</th>
                    <th scope="col">Address</th>
                    <th class="text-center" scope="col">Operations</th>
                </tr>
            </thead>
            <tbody id="myTable">
                <?php $id = 1 ?>
                <?php foreach ($users_data as $user) : ?>
                    <tr class="text-center align-middle">
                        <td><?php echo $id++; ?></td>
                        <td><?php echo $user->name; ?></td>
                        <td><?php echo $user->designation; ?></td>
                        <td><?php echo $user->address; ?></td>
                        <td>
                            <a href="<?php echo base_url('Crud/editData') ?>/<?php echo $user->id; ?>" class="btn btn-outline-warning">Edit</a>
                            <a href="<?php echo base_url('Crud/deleteData') ?>/<?php echo $user->id; ?>" class="btn btn-outline-danger">Delete</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <?php $this->session->flashdata('inserted') ?>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="<?php echo base_url('Crud/addUsers'); ?>" method="post">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Add Users</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label class="form-label">Full Name</label>
                            <input type="text" name="name" class="form-control" autocomplete="off">
                            <div class="text-danger">
                                <?php echo $this->session->flashdata('name') ?>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Designation</label>
                            <input type="text" name="designation" class="form-control" autocomplete="off">
                            <div class="text-danger">
                                <?php echo $this->session->flashdata('error') ?>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Address</label>s
                            <input type="text" class="form-control" name="address" autocomplete="off">
                            <div class="text-danger">
                                <?php echo $this->session->flashdata('error') ?>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <!-- <button type="submit" name="submit" class="btn btn-primary">Add User</button> -->
                        <input type="submit" name="submit" class="btn btn-outline-info" value="Add User">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <?php if ($this->session->flashdata('error')) : {
            # code...
        } ?>
        <div class="text-danger">
            <?php $this->session->flashdata('error') ?>
        </div>

    <?php endif; ?>
    <?php if ($this->session->flashdata('inserted')) : {
            # code...
        } ?>
        <div class="text-danger">
            <?php $this->session->flashdata('inserted') ?>
        </div>

    <?php endif; ?>


    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script type="text/javascript" src="<?php echo base_url("Assets/css/bootstrap/js/jquery-3.1.1.js"); ?>"></script>
    <script type="text/javascript" src="<?php echo base_url("Assets/css/bootstrap/js/bootstrap.js"); ?>"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    <script>
        $(document).ready(function() {
            $("#myInput").on("keyup", function() {
                var value = $(this).val().toLowerCase();
                $("#myTable tr").filter(function() {
                    $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                });
            });
            $('#data').after('<div id="nav"></div>');
            var rowsShown = 10;
            var rowsTotal = $('#data tbody tr').length;
            var numPages = rowsTotal / rowsShown;
            for (i = 0; i < numPages; i++) {
                var pageNum = i + 1;
                $('#nav').append('<a href="#" rel="' + i + '">' + pageNum + '</a> ');
            }
            $('#data tbody tr').hide();
            $('#data tbody tr').slice(0, rowsShown).show();
            $('#nav a:first').addClass('active');
            $('#nav a').bind('click', function() {
                $('#nav a').removeClass('active');
                $(this).addClass('active');
                var currPage = $(this).attr('rel');
                var startItem = currPage * rowsShown;
                var endItem = startItem + rowsShown;
                $('#data tbody tr').css('opacity', '0.0').hide().slice(startItem, endItem).
                css('display', 'table-row').animate({
                    opacity: 1
                }, 300);
            });
        });
    </script>
    <!-- <script>
        $(document).ready(function() {
            $('#data').after('<div id="nav"></div>');
            var rowsShown = 10;
            var rowsTotal = $('#data tbody tr').length;
            var numPages = rowsTotal / rowsShown;
            for (i = 0; i < numPages; i++) {
                var pageNum = i + 1;
                $('#nav').append('<a href="#" rel="' + i + '">' + pageNum + '</a> ');
            }
            $('#data tbody tr').hide();
            $('#data tbody tr').slice(0, rowsShown).show();
            $('#nav a:first').addClass('active');
            $('#nav a').bind('click', function() {
                $('#nav a').removeClass('active');
                $(this).addClass('active');
                var currPage = $(this).attr('rel');
                var startItem = currPage * rowsShown;
                var endItem = startItem + rowsShown;
                $('#data tbody tr').css('opacity', '0.0').hide().slice(startItem, endItem).
                css('display', 'table-row').animate({
                    opacity: 1
                }, 300);
            });
        });
    </script> -->

</body>

</html>