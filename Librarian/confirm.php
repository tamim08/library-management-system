<!-- Navbar -->
<?php
 include_once("layout/header.php");
 include_once("layout/sidebar.php");

 ?>

<!-- Main Sidebar Container -->


<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Confirm book</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">book</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <section class="content">
        <table id="example1" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>Student Name</th>
                    <th>Student Id</th>
                    <th>Department</th>
                    <th>Book_title</th>
                    <th>Borrow Date</th>
                    <th>Action</th>

                </tr>
            </thead>
            <tbody>
                <?php
      include_once('../db/run.php');
      $sql="SELECT b.book_name,bs.id,bs.issue_date,bs.return_date,bs.status,u.username,b.id as booksId,u.std_id,u.department
      FROM book_issue as bs INNER JOIN books as b on bs.book_id=b.id INNER JOIN user_info as u on bs.user_id=u.id where bs.status=0";
      $query=mysqli_query($con,$sql);
   
                if($query== true){
                while($info=mysqli_fetch_array($query)){ 
                    $bookid=$info['booksId'];
                    $_SESSION['books']=$bookid;
                    ?>
               
                <tr>
                    <td><?php echo $info['username']?></td>
                    <td><?php echo $info['std_id']?></td>
                    <td><?php echo $info['department']?></td>
                    <td><?php echo $info['book_name']?></td>
                    <td><?php echo $info['issue_date']?></td>
                    <td><a href="confirmdata.php?id=<?php echo $info['id'] ?>" class='btn btn-primary'>confirm</a></td>
                    
                </tr>
                <?php }
      }
      
    
      ?>
            </tbody>
        </table>
    </section>

</div>

<?php
 include_once('layout/footer.php');
 ?>
<script>
let btn = document.getElementById('bor')
btn.addEventListener("click", function() {
    btn.innerHTML = 'Panding'
})
</script>