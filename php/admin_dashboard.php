<?php 

session_start();
if(!isset($_SESSION['admin_username']))
    header("location:login.php")

 ?>





<!DOCTYPE html>
<html lang="en">
<head>
    <title>Admin-Dashboard</title>
    <link rel="stylesheet" href="../css/all.css">
    <link rel="stylesheet" href="../css/dashboard.css">
    
</head>
<body>
    <nav id="navber">
		<h1 class="logo">
			<span class="logo-text">
                Admin Dashboard <span class="Wellcome">Wellcome:  <?php echo $_SESSION['admin_username']; ?></span>
			</span>
		</h1>
		<ul>
			
			<li> <a href=""> <span><i class="fas fa-user-circle"></i></span>   Profile</a></li>
		</ul>
	</nav>
    <div class="wrapper">
        <div class="sidebar">
            
            <ul>
                <li><a href=""> <span><i class="fas fa-home"></i></span>Home</a></li>
                <li><a href=""><span><i class="fas fa-user-shield"></i></span>Admin</a>
                    <ul>
                        <li><a href=""> <span><i class="fas fa-plus"></i></span>Add</a></li>
                    
                    </ul>
                </li>

                <li><a href=""><span><i class="far fa-edit"></i></span>Post</a>
                
                    <ul>
                        <li><a href=""> <span><i class="fas fa-plus"></i></span>Add</a></li>
                        
                    </ul>
                
                </li>

                <li><a href=""><span><i class="fas fa-users"></i></span>Users</a></li>
            </ul>
        </div>
        <div class="main-space">
            <div class="overview">
                <h1>Overview</h1>
            </div>
            <div class="admin_panel">
                <hr>
                <h3>Admin panel</h3>


                <div class="table_box">
                    <div class="table_row table_head">
                        <div class="table_cell ">
                            <p>username</p>
                        </div>
                        <div class="table_cell">
                            <p>email</p>
                        </div>
                        <div class="table_cell">
                            <p>status</p>
                        </div>
                        <div class="table_cell">
                            <p>Operation</p>
                        </div>
                        
                    </div>
                    <div class="table_row">
                        <div class="table_cell ">
                            <p>ruhul123</p>
                        </div>
                        <div class="table_cell">
                            <p>ruhul@gmail.com</p>
                        </div>
                        <div class="table_cell">
                            <p>admin</p>
                        </div>
                        <div class="table_cell">
                            <div class="O-btn">
                                <div class="Update-Btn">
                                    <a href="">Update</a>
                                </div>
                                <div class="Delete-Btn">
                                    <a href="">Delete</a>
                                </div>
                            </div>
                            
                        </div>
                    </div>
                    <div class="table_row">
                        <div class="table_cell ">
                            <p>shithy67</p>
                        </div>
                        <div class="table_cell">
                            <p>shithy@gmail.com</p>
                        </div>
                        <div class="table_cell">
                            <p>admin</p>
                        </div>
                        <div class="table_cell">
                            <div class="O-btn">
                                <div class="Update-Btn">
                                    <a href="">Update</a>
                                </div>
                                <div class="Delete-Btn">
                                    <a href="">Delete</a>
                                </div>
                            </div>
                            
                        </div>
                    </div>
                    <div class="table_row">
                        <div class="table_cell ">
                            <p>muaj247</p>
                        </div>
                        <div class="table_cell">
                            <p>muaj@gmail.com</p>
                        </div>
                        <div class="table_cell">
                            <p>admin</p>
                        </div>
                        <div class="table_cell">
                            <div class="O-btn">
                                <div class="Update-Btn">
                                    <a href="">Update</a>
                                </div>
                                <div class="Delete-Btn">
                                    <a href="">Delete</a>
                                </div>
                            </div>
                            
                        </div>
                    </div>
                    </div>

            </div>
            
        <div id="container">
            <div class="form-wrap">
                <h1>Add Admin</h1>

                <div class="error">
                
                </div>

                <form method="post">
                <div class="form-group name">
                    <label for="first-name">First Name</label>
                    <input type="text" name="firstName" required>
                </div>

                <div class="form-group name">
                    <label for="last-name">Last Name</label>
                    <input type="text" name="lastName"  required>
                </div>

                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" name="email" required>
                </div>

                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" name="password" required >
                </div>

                <div class="form-group">
                        <label for="password2">Confirm Password</label>
                        <input type="password" name="password2" required>
                </div>
                <button type="submit" class="btn" name="sing_submit">ADD</button>
                </form>
            </div>
            </div>
            <div class="Job-post">
                <hr>
                <h3>Post a Job</h3>

                <div id="container">
                    <div class="form-wrap">
                        
                        <form method="post">
                        <div class="form-group name">
                            <label for="title">Job Title</label>
                            <input type="text" name="job_title" required>
                        </div>
                        <div class="form-group">
                            <label for="job-details">Job Details</label>
                            <textarea name="job-details" id="" rows="7"></textarea>
                        </div>
                        <button type="submit" class="btn" name="sing_submit">Post</button>
                        </form>
                    </div>

                </div>

                
            </div>

            <div class="user-table">
                    <hr>
                    <h3>User Table</h3>
                    <div class="table_box">
                    <div class="table_row table_head">
                        <div class="table_cell ">
                            <p>username</p>
                        </div>
                        <div class="table_cell">
                            <p>email</p>
                        </div>
                        <div class="table_cell">
                            <p>status</p>
                        </div>
                        <div class="table_cell">
                            <p>Operation</p>
                        </div>
                        
                    </div>
                    <div class="table_row">
                        <div class="table_cell ">
                            <p>ruhul123</p>
                        </div>
                        <div class="table_cell">
                            <p>ruhul@gmail.com</p>
                        </div>
                        <div class="table_cell">
                            <p>admin</p>
                        </div>
                        <div class="table_cell">
                            <div class="O-btn">
                                <div class="Update-Btn">
                                    <a href="">Update</a>
                                </div>
                                <div class="Delete-Btn">
                                    <a href="">Delete</a>
                                </div>
                            </div>
                            
                        </div>
                    </div>
                    <div class="table_row">
                        <div class="table_cell ">
                            <p>shithy67</p>
                        </div>
                        <div class="table_cell">
                            <p>shithy@gmail.com</p>
                        </div>
                        <div class="table_cell">
                            <p>admin</p>
                        </div>
                        <div class="table_cell">
                            <div class="O-btn">
                                <div class="Update-Btn">
                                    <a href="">Update</a>
                                </div>
                                <div class="Delete-Btn">
                                    <a href="">Delete</a>
                                </div>
                            </div>
                            
                        </div>
                    </div>
                    <div class="table_row">
                        <div class="table_cell ">
                            <p>muaj247</p>
                        </div>
                        <div class="table_cell">
                            <p>muaj@gmail.com</p>
                        </div>
                        <div class="table_cell">
                            <p>admin</p>
                        </div>
                        <div class="table_cell">
                            <div class="O-btn">
                                <div class="Update-Btn">
                                    <a href="">Update</a>
                                </div>
                                <div class="Delete-Btn">
                                    <a href="">Delete</a>
                                </div>
                            </div>
                            
                        </div>
                    </div>
                    </div>


            </div>



        </div>
    </div>
   
</body>
</html>