<?php
    if(!(isset($panel_sys)) || empty($panel_sys)){
        header("Location: ../index.php");
    }
?>
        <header>
            <div class="nav-wrapper">
                <!--Responsive Navigation-->
                <nav class="navbar navbar-expand-md">
                <div class="navbar-brand"><i class="fas fa-user"></i>&ensp;<?=$_SESSION['USER'];?></div>
                    <button class="navbar-toggler ml-auto toggleBtn responsive_nav_menu" type="button" data-toggle="collapse" data-target="#toggle" >
                        <span>MENU&ensp;<i class="fas fa-caret-square-down"></i></span>
                    </button>
                      <div class="collapse navbar-collapse" id="toggle">
                        <ul class="navbar-nav ml-auto">
                            <li class="nav-item"><a href="dashboard.php" class="nav-link"><i class="fas fa-tachometer-alt"></i>&ensp;Dashboard</a></li>
                            <li class="nav-item dropdown"><a href="javascript:void(0)" class="nav-link dropdown-toggle" data-toggle="dropdown"><i class="fas fa-building"></i>&ensp;House</a>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item" href="houseinfo.php">House Information</a>
                                    <?php if($panel_sys==="2"){ echo '<a class="dropdown-item" href="ownerinfo.php">Owner Information</a>'; }?>

                                    <?php if($panel_sys==="1"){ 
                                        echo '<a class="dropdown-item" href="floorlist.php">Floor List</a>
                                              <a class="dropdown-item" href="unitlist.php">Unit List</a>
                                              <a class="dropdown-item" href="stafflist.php">Staff List</a>
                                              <a class="dropdown-item" href="expenses.php">Expenses</a>
                                              <a class="dropdown-item" href="rentaltransaction.php">Rental Transactions</a>
                                              <a class="dropdown-item" href="expenseentry.php">Bill and Fee Entry</a>'; } ?>

                                </div>
                            </li>
                            <?php   if($panel_sys==="1"){ echo '<li class="nav-item dropdown"><a href="javascript:void(0)" class="nav-link dropdown-toggle" data-toggle="dropdown"><i class="fas fa-users"></i>&ensp;Tenant</a>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item" href="tenantlist.php">Tenant List</a>
                                    <a class="dropdown-item" href="tenantcomplains.php">Tenant Complains</a>
                                    <a class="dropdown-item" href="addtenant.php">Add Tenant</a>
                                    <a class="dropdown-item" href="rententry.php">Rent Entry</a>
                                </div>
                            </li>'; } ?>
                            
                            <li class="nav-item dropdown"><a href="javascript:void(0)" class="nav-link dropdown-toggle" data-toggle="dropdown"><i class="fas fa-sliders-h"></i>&ensp;Settings</a>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item" href="profile.php">Profile</a>

                                    <?php   if($panel_sys==="1"){ 
                                        echo '<a class="dropdown-item" href="addunit.php">Add Unit</a>
                                        <a class="dropdown-item" href="addstaff.php">Add Staff</a>'; } ?>

                                    <?php   if($panel_sys==="2"){ echo '<a class="dropdown-item" href="filecomplain.php">File a complain</a>';}?>

                                    <a class="dropdown-item" href="logout.php">Logout</a>
                                    <a class="dropdown-item" id="di" href="javascript:void(0)">Dev's Info</a>
                                </div>
                            </li>
                        </ul>
                    </div>
                </nav>
            </div>
        </header>
        