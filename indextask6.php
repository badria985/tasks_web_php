<?php
require 'dbconnection.php';
$sql = "select * from blog ";
$op = mysqli_query($con , $sql);





?>
<html>
<head>
<!-- Latest compiled and minified Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />
<!-- custom css -->
    <style>
        .m-r-1em {
            margin-right: 1em;
        }
        
        .m-b-1em {
            margin-bottom: 1em;
        }
        
        .m-l-1em {
            margin-left: 1em;
        }
        
        .mt0 {
            margin-top: 0;
        }
    </style>

</head>

<body>

    <!-- container -->
    <div class="container">
 

        <div class="page-header">
            <h1>Read Users </h1> 
            <br>
        </div>

    <a href="create.php">+ Account</a> ||  <a href="">LogOut</a> 

        <table class='table table-hover table-responsive table-bordered'>
            <!-- creating our table heading -->
            <tr>
                <th>ID</th>
                <th>Title</th>
                <th>Content</th>
                <th>Date</th> 
                <th>Image</th>  
                <th>Action</th>        
            </tr>
     <?php 
                 while($data=mysqli_fetch_assoc($op)){
     ?>  
           <tr>
                 <td><?php echo $data['id']; ?></td>
                 <td><?php echo $data['title']; ?></td>
                 <td><?php echo $data['content']; ?></td>
                 <td><?php echo $data['date']; ?></td>
                 <td><img src="./uploads/<?php echo $data['image']; ?>" width="50px" hight="50px"></td>
                 <td>
                 <a href='update.php?id=<?php echo $data['id'] ;?>' class='btn btn-danger m-r-1em'>Update</a>
                 <a href='delete.php?id=<?php echo $data['id'];?>' class='btn btn-primary m-r-1em'>Delete</a>           
                </td> 
           </tr> 
    <?php } ?>
       
            <!-- end table -->
        </table>

    </div>
    <!-- end .container -->


    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>

    <!-- Latest compiled and minified Bootstrap JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    <!-- confirm delete record will be here -->

</body>

</html>