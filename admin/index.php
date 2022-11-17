<?php include('partials/menu.php'); ?>
        <!--Main content selection starts -->
        <div class="main-content">
        <div class ="wrapper">
            <h1> CUSTOMIZE </h1>
            <br><br>
            <?php  
                if(isset($_SESSION['login'])){
                    echo $_SESSION['login'];
                    unset($_SESSION['login']);
                }            
            ?>
            <br><br>

            <div class="col-4 text-center">
                <a href="manage-admin.php">Manage admin  </a>
                <br />
            </div>

            <div class="col-4 text-center">
                <a href="manage-student.php">Manage student </a>
                <br />
            </div>

            <div class="col-4 text-center">
            <a href="manage-course.php">Manage course </a>
                 <br />
            </div> 

            <div class="col-4 text-center">
                <a href="manage-lecturer.php">Manage Lecturers </a>
                <br />
            </div>
            
            <div class="col-4 text-center">
                <a href="manage-forms.php">Manage forms </a>
                <br />
            </div>

            <div class="col-4 text-center">
            <a href="manage-batch.php">Manage batch </a>
                 <br />
            </div> 

            <div class="col-4 text-center">
            <a href="manage-purpose.php">Manage purpose </a>
                 <br />
            </div> 

            <div class="col-4 text-center">
            <a href="manage-department.php">Manage department </a>
                 <br />
            </div> 

            <div class="col-4 text-center">
            <a href="report.php">Report by course </a>
                 <br />
            </div>

            <div class="col-4 text-center">
            <a href="filter.php">Report by session </a>
                 <br />
            </div>


            <div class="clearfix"></div> 
               
                
        </div>   
        </div>
        <!--Main content selection ends -->

<?php include('partials/footer.php'); ?>
        