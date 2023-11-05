<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE-edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Dashboard - WQMSystem</title>
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    </head>
    <body class="sb-nav-fixed">
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <!-- Navbar Brand-->
            <a class="navbar-brand ps-3" href="dashboard.php">Water Quality Data</a>
            <!-- Sidebar Toggle-->
            <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
            <!-- Navbar Search-->
            <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
                <div class="input-group">
                    <input class="form-control" type="text" placeholder="Search for..." aria-label="Search for..." aria-describedby="btnNavbarSearch" />
                    <button class="btn btn-primary" id="btnNavbarSearch" type="button"><i class="fas fa-search"></i></button>
                </div>
            </form>
            <!-- Navbar-->
            <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="#!">Settings</a></li>
                        <li><a class="dropdown-item" href="#!">Activity Log</a></li>
                        <li><hr class="dropdown-divider" /></li>
                        <li><a class="dropdown-item" href="#!">Logout</a></li>
                    </ul>
                </li>
            </ul>
        </nav>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <div class="sb-sidenav-menu-heading">Core</div>
                            <a class="nav-link" href="dashboard.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Dashboard
                            </a>
                            <a class="nav-link" href="pH.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                                pH Datatable
                            </a>
                            <a class="nav-link" href="turbidity.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                                Turbidity Datatable
                            </a>
                        </div>
                    </div>
                    <div class="sb-sidenav-footer">
                        <div class="small">Logged in as:</div>
                        ADMIN
                    </div>
                </nav>
            </div>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Water Quality Monitoring</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Dashboard</li>
                        </ol>
                        <div class="row">
                                <div class="col-xl-6">
                                    <div class="card mb-4">
                                        <div class="card-header">
                                            pH Level
                                        </div>
                                        <div class="card-body">
                                            <!-- Circular Element for Card 1 -->
                                            <div class="circular">
                                                <?php
                                                    // Assuming you have a database connection established
                                                    include('authentication.php');
                                                    // $con should be your database connection variable

                                                    // Execute the SQL query to retrieve data from the "data" table for the latest (maximum) ID
                                                    $query = "SELECT pH FROM data WHERE id = (SELECT MAX(id) FROM data)";
                                                    $result = mysqli_query($conn, $query);

                                                    // Check if the query was successful
                                                    if ($result) {
                                                        // Fetch the row from the result set
                                                        $row = mysqli_fetch_assoc($result);

                                                        // Check if a row was found
                                                        if ($row) {
                                                            // Access the 'pH' value from the row
                                                            $pH_value = $row['pH'];
                                                            // Do something with the pH value (e.g., print it)
                                                            echo  $pH_value;
                                                        } else {
                                                            echo "No data found in the 'data' table";
                                                        }

                                                        // Free the result set
                                                        mysqli_free_result($result);
                                                    }
                                                ?>
                                            </div>
                                            <!-- pH Level Information -->
                                                <div>
                                                    <p>High on Acid (below 5)</p>
                                                    <p>Low on Acid (6.4 - 5)</p>
                                                    <p>Normal (6.6 to 8.5)</p>
                                                    <p>Alkaline (8.5 and above)</p>
                                                </div>
                                            <!-- Add your content here for the first card -->
                                        </div>
                                    </div>
                                </div>

                                <div class="col-xl-6">
                                    <div class="card mb-4">
                                        <div class="card-header">
                                            Turbidity Level
                                        </div>
                                        <div class="card-body">
                                            <!-- Circular Element for Card 2 -->
                                            <div class="circular">
                                                <?php
                                                    // Assuming you have a database connection established
                                                    include('authentication.php');
                                                    // $con should be your database connection variable

                                                    // Execute the SQL query to retrieve data from the "data" table for the latest (maximum) ID
                                                    $query = "SELECT turbidity FROM data WHERE id = (SELECT MAX(id) FROM data)";
                                                    $result = mysqli_query($conn, $query);

                                                    // Check if the query was successful
                                                    if ($result) {
                                                        // Fetch the row from the result set
                                                        $row = mysqli_fetch_assoc($result);

                                                        // Check if a row was found
                                                        if ($row) {
                                                            // Access the 'pH' value from the row
                                                            $turbidity_value = $row['turbidity'];
                                                            // Do something with the pH value (e.g., print it)
                                                            echo  $turbidity_value;
                                                        } else {
                                                            echo "No data found in the 'data' table";
                                                        }

                                                        // Free the result set
                                                        mysqli_free_result($result);
                                                    }
                                                ?>
                                            </div>
                                                <div>
                                                    <p>Clear Water (0-10)</p>
                                                    <p>Blurry Water (10-20 )</p>
                                                    <p>Milky Water (20-30)</p>
                                                    <p>Muddy Water (31 above)</p>
                                                </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                DataTable
                            </div>
                            <div class="card-body">
                                <table id="datatablesSimple">
                                    <thead>
                                        <tr>
                                            <th>pH</th>
                                            <th>Turbidity</th>
                                            <th>Date and Time</th>
                                            <th>Acidity Level</th>
                                            <th>Turbidity Level</th>
                                            <th>Drinkable or Not</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>

                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <?php
                                            // Assuming you have a database connection established
                                            include('authentication.php');
                                            // Execute the SQL query to retrieve data from the "data" table
                                            $query = "SELECT pH, turbidity, date_time FROM data";
                                            $result = mysqli_query($conn, $query);
                                            
                                            // Loop through the query results and populate the table rows
                                            while ($row = mysqli_fetch_assoc($result)) {
                                                echo "<tr>";
                                                echo "<td>".$row['pH']."</td>";
                                                echo "<td>".$row['turbidity']."</td>";
                                                echo "<td>".$row['date_time']."</td>";
                                                
                                                // Determine the acidity level based on the pH value
                                                $pH = $row['pH'];
                                                $acidityLevel = '';
                                                
                                                if ($pH < 6.5) {
                                                    $acidityLevel = 'Acidic';
                                                } elseif ($pH >= 6.5 && $pH <= 8) {
                                                    $acidityLevel = 'Normal';
                                                } elseif ($pH > 8) {
                                                    $acidityLevel = 'High Alkalinity';
                                                }
                                                
                                                echo "<td>".$acidityLevel."</td>";
                                                
                                                // Determine the turbidity level based on the turbidity value
                                                $turbidity = $row['turbidity'];
                                                $turbidityLevel = '';
                                                
                                                if ($turbidity < 600) {
                                                    $turbidityLevel = 'High Tubidity';
                                                } else {
                                                    $turbidityLevel = 'Clear';
                                                }
                                                
                                                echo "<td>".$turbidityLevel."</td>";
                                                
                                                // Determine the drinkable status based on the pH and turbidity values
                                                $drinkableStatus = '';
                                                
                                                if ($pH < 6.5 && $turbidity < 600) {
                                                    $drinkableStatus = 'Not drinkable';
                                                } elseif ($pH < 6.5 && $turbidity >= 600) {
                                                    $drinkableStatus = 'Not drinkable';
                                                } elseif ($pH >= 6.5 && $pH <= 8 && $turbidity >= 600 && $turbidity <= 700) {
                                                    $drinkableStatus = 'Drinkable';
                                                } else {
                                                    $drinkableStatus = 'Not drinkable';
                                                }
                                                
                                                echo "<td>".$drinkableStatus."</td>";
                                                
                                                echo "</tr>";
                                            }
                                            // Free the result set
                                            mysqli_free_result($result);
                                            
                                            // Close the database connection
                                            mysqli_close($conn);
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </main>
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid px-4">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; Your Website 2023</div>
                            <div>
                                <a href="#">Privacy Policy</a>
                                &middot;
                                <a href="#">Terms &amp; Conditions</a>
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/chart-area-demo.js"></script>
        <script src="assets/demo/chart-bar-demo.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js" crossorigin="anonymous"></script>
        <script src="js/datatables-simple-demo.js"></script>
    </body>
</html>
<style>
  /* CSS for the circular element */
  .circular {
        width: 200px;
        height: 200px;
        border: 2px solid black; /* Add a border to the circle */
        border-radius: 50%;
        display: flex;
        justify-content: center;
        align-items: center;
        color: black; /* Set the text color to match the border color */
        font-size: 70px; /* You can customize the font size */
        float: left; /* Float the circular element to the left */
        margin-right: 70px; /* Add some right margin for spacing */
        background-color: transparent; /* Set the background to transparent */
    }
</style>
