	<?php 
	include'set_session1.php';
?>
<!doctype html>
<html lang="en">


<head>
		<?php include('includeupwork/db.php');?>
<?php include('includeupwork/scripts.php');?>
</head>

<body>


	<!--wrapper-->
	<div class="wrapper">
		<!--sidebar wrapper -->
		<?php include('includeupwork/sidebar.php');?>
		<!--end sidebar wrapper -->
		<!--start header -->
		<?php include('includeupwork/header.php');?>
		<!--start page wrapper -->
		<div class="page-wrapper">
			<div class="page-content">
				<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
					<div class="breadcrumb-title pe-3">User Queries </div>
					<div class="ps-3">
						<nav aria-label="breadcrumb">
							<ol class="breadcrumb mb-0 p-0">
								<li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-comment"></i></a>
								</li>
								
							</ol>
						</nav>
					</div>
				
				</div>
				<div class="row">

					<div class="col-md-12 text-end">

					
								</div>
	<div class="row">
					<div class="col-12 col-md-12 mx-auto">
						
					


						<div class="card">
							<div class="card-body p-4">
								<h5 class="mb-4 text-center text-success">Users Queries</h5>
					
							</div>
	
						<hr/>
						<div class="card">
							<div class="card-body">
							 <table class="table mb-0 table-striped">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Subject</th>
                <th scope="col">Description</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $sql = "SELECT * FROM report";
$result = pg_query($connection,$sql);
            if (pg_num_rows($result) > 0) {
                while ($row = pg_fetch_assoc($result)) {
                    echo '<tr>';
                    echo '<th scope="row">' . $row['id'] . '</th>';
                    echo '<td>' . $row['subject'] . '</td>';
                    echo '<td>' . $row['description'] . '</td>';
                    echo '</tr>';
                }
            } else {
                echo '<tr><td colspan="3">No data found</td></tr>';
            }
            ?>
        </tbody>
    </table>
							</div>
						</div>
						</div>


					</div>
				</div>
					</div>
					<?php include('includeupwork/footer.php');?>
						</div>	<!-- Bootstrap JS -->
<?php include('includeupwork/footerscripts.php');?>
</body>



</html>