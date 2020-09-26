
<?php

session_start();
// $_SESSION['currentid'] = $emp_id;

if(empty($_SESSION['username'])  )
{
 header("location:register.php");
}

?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <title>Sales Portal</title>

    <!-- bootstrap Lib -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

    <!-- datatable lib -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css">
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    <style type="text/css">
        .content{
            max-width: 800px;
            margin: auto;
        }

        h1{
            text-align: center;
            padding-bottom: 60px;
        }
    </style>

</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="#">Holotech</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavDropdown">
    <ul class="navbar-nav">
      <li class="nav-item active">
        <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
      </li>
      <!-- <li class="nav-item">
        <a class="nav-link" href="register.php">Register</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="login.php">Login</a>
      </li> -->
      <li class="nav-item">
        <a class="nav-link" href="logout.php">Logout</a>
      </li>



    </ul>


  <div class="navbar-collapse collapse">
  <ul class="navbar-nav ml-auto">
  <li class="nav-item active">
        <a class="nav-link" href="#"> <img src="https://img.icons8.com/metro/26/000000/guest-male.png"> <?php echo "Welcome ". $_SESSION['username']?></a>
      </li>
  </ul>
  </div>


  </div>
</nav>

<div class="container mt-4">
<h3><?php echo "Welcome ". $_SESSION['username']?>! You can now use this website</h3>
<hr>

</div>




<!-- <div class="sidenav">
  <a href="#addrecords">Add Records</a>
  <a href="vieworder.php">View Records</a>
  <a href="newadd.php">NewAdd Records</a>
</div> -->
<div class="content">
     <h1>Sales Portal</h1>

               <table id="course_table" class="table table-striped">  
                    <thead bgcolor="#6cd8dc">
                        <tr class="table-primary">
                           <th width="30%">ID</th>
                           <th width="50%">OA No</th>  
                           <th width="30%">Job No</th>
                           <th width="30%">Customer Details</th>
                           <th width="30%">Job Details</th>
                           <th width="30%">Holotech Represntative</th>
                           <th width="30%">Date</th>

                           <th scope="col" width="5%">Edit</th>
                           <th scope="col" width="5%">Delete</th>
                        </tr>
                    </thead>
                </table>
                <br>
                <div align="right">
                <button type="button" id="add_button" data-toggle="modal" data-target="#userModal" class="btn btn-success">Add Order</button>
                </div>
</div>          


<div id="userModal" class="modal fade">
    <div class="modal-dialog">
        <form method="post" id="course_form" enctype="multipart/form-data">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">×</button>
                    <h4 class="modal-title">Add Order</h4>
                </div>
                <div class="modal-body">
                    <label>Enter Oa No</label>
                    <input type="text" name="Oano" id="Oano" class="form-control"/><br>
                    <label>Enter Job No</label>
                    <input type="text" name="Jobno" id="Jobno" class="form-control"/><br>
                    <label>Enter Customer Details</label>
                    <input type="text" name="Customerdetails" id="Customerdetails" class="form-control"/><br>
                    <label>Enter Job Details</label>
                    <input type="text" name="Jobdetails" id="Jobdetails" class="form-control"/><br>
                    <label>Enter Holotech Representative</label>
                    <input type="text" name="HolotechRepresentative" id="HolotechRepresentative" class="form-control"/><br>
                    <label>Enter Date</label>
                    <input type="date" name="Date1" id="Date1" class="form-control"/><br>
                </div>
                <div class="modal-footer">
                    <input type="hidden" name="course_id" id="course_id"/>
                    <input type="hidden" name="operation" id="operation"/>
                    <input type="submit" name="action" id="action" class="btn btn-primary" value="Add" />
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                </div>
            </div>
        </form>
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function(){
        $('#add_button').click(function(){
            $('#course_form')[0].reset();
            $('.modal-title').text("Add Sales Order Details");
            $('#action').val("Add");
            $('#operation').val("Add")
        });

     var dataTable = $('#course_table').DataTable({
        "paging":true,
        "processing":true,
        "serverSide":true,
        "order": [],
        "info":true,
        "ajax":{
            url:"fetch.php",
            type:"POST"
        },
        "columnDefs":[
           {
            "target":[0,3,4],
            "orderable":false,
           },
        ],
     });

     $(document).on('submit', '#course_form', function(event){
        event.preventDefault();
        // var id = $('#id').val();
        var Oano = $('#Oano').val();
        var Jobno = $('#Jobno').val();
        var Customerdetails= $('#Customerdetails').val();
        var Jobdetails = $('#Jobdetails').val();
        var HolotechRepresentative = $('#HolotechRepresentative').val();
        var Date1 = $('#Date1').val();
        
        if(Oano != '' || Jobno != '' ||Customerdetails != '' ||Jobdetails != ''||HolotechRepresentative != '' ||Date1 != '' )
        {
            $.ajax({
                url:"insert.php",
                method:'POST',
                data:new FormData(this),
                contentType:false,
                processData:false,
                success:function(data)
                {
                    $('#course_form')[0].reset();
                    $('#userModal').modal('hide');
                    dataTable.ajax.reload();
                }
            });
        }
        else
        {
            alert("Fields are Required");
        }
    });
    
    $(document).on('click', '.update', function(){
        var course_id = $(this).attr("id");
        $.ajax({
            url:"fetch_single.php",
            method:"POST",
            data:{course_id:course_id},
            dataType:"json",
            success:function(data)
            {
                $('#userModal').modal('show');
                $('#id').val(data.id);
                $('#Oano').val(data.Oano);
                $('#Jobno').val(data.Jobno);
                $('#Customerdetails').val(data.Customerdetails);
                $('#Jobdetails').val(data.Jobdetails);
                $('#HolotechRepresentative').val(data.HolotechRepresentative);
                $('.modal-title').text("Edit Sales Details");
                $('#course_id').val(course_id);
                $('#action').val("Save");
                $('#operation').val("Edit");
            }
        });
     });

    $(document).on('click','.delete', function(){

        var course_id = $(this).attr("id");
        if(confirm("Are you sure want to delete this user?"))
        {
            $.ajax({
                url:"delete.php",
                method:"POST",
                data:{course_id:course_id},
                success:function(data)
                {
                    dataTable.ajax.reload();
                }
            });
        }
        else
        {
            return false;
        }
     });

    });
</script>

</body>
</html>