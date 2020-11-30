<?php
    if(!(isset($panel_sys)) || empty($panel_sys)){
        header("Location: ../index.php");
    }
?>
        <section class="sec1">
            <div class="dboard-con">
                <div class="card dashboard-card">
                   <div class="card-header">
    <?php if($panel_sys==="1"){ echo '<p>Total Floor</p>'; }
            else if($panel_sys==="2"){ echo '<p>My Floor</p>'; } ?>

                   </div>
                   <div class="card-body">
                        <p class="total-text"><?=$floor;?></p>
                        <p class="dashboard-icon"><i class="far fa-building"></i></p>
                   </div>
                   <div class="card-footer">
                        <a href="<?php if($panel_sys==="1"){ echo 'floorlist.php'; } ?>">Click for more &ensp;<i class="fas fa-arrow-circle-right"></i></a>
                   </div>
                </div>
                <div class="card dashboard-card">
                   <div class="card-header">
    <?php if($panel_sys==="1"){ echo '<p>Total Unit</p>'; }
            else if($panel_sys==="2"){ echo '<p>My Unit</p>'; } ?>

                   </div>
                   <div class="card-body">
                        <p class="total-text"><?=$unit;?></p>
                        <p class="dashboard-icon"><i class="fas fa-door-open"></i></p>
                   </div>
                   <div class="card-footer">
                        <a href="<?php if($panel_sys==="1"){ echo 'unitlist.php'; } ?>">Click for more &ensp;<i class="fas fa-arrow-circle-right"></i></a>
                   </div>
                </div>
                <div class="card dashboard-card">
                    <div class="card-header">
                        <p>Total Tenant</p>
                    </div>
                    <div class="card-body">
                        <p class="total-text"><?=$tenant;?></p>
                        <p class="dashboard-icon"><i class="fas fa-users"></i></p>
                    </div>
                    <div class="card-footer">
                        <a href="<?php if($panel_sys==="1"){ echo 'tenantlist.php'; } ?>">Click for more &ensp;<i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <div class="card dashboard-card">
                    <div class="card-header">
                        <p>Total Staff</p>
                    </div>
                    <div class="card-body">
                        <p class="total-text"><?=$staff;?></p>
                        <p class="dashboard-icon"><i class="fas fa-male"></i></p>
                    </div>
                    <div class="card-footer">
                    <a href="<?php if($panel_sys==="1"){ echo 'stafflist.php'; } ?>">Click for more &ensp;<i class="fas fa-arrow-circle-right"></i></a>

                    </div>
                </div>

                <div class="card dashboard-card">
                    <div class="card-header">
        <?php if($panel_sys==="2"){ echo '<p>My Complains</p>'; } 
                else{ echo '<p>Total Complain</p>'; } ?>

                    </div>
                    <div class="card-body">
                        <p class="total-text"><?=$complain;?></p>
                        <p class="dashboard-icon"><i class="fas fa-file-alt"></i></p>
                    </div>
                    <div class="card-footer">
                        <a href="tenantcomplains.php">Click for more &ensp;<i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <div class="card dashboard-card">
                    <div class="card-header">
        <?php if($panel_sys==="2"){ echo '<p>My Rental Transactions</p>'; }
                else{ echo '<p>Total Rental Transaction</p>'; } ?>
                
                    </div>
                    <div class="card-body">
                        <p class="total-text"><?=round($rent,1);?></p>
                        <p class="dashboard-icon"><i class="fas fa-chart-line"></i></p>
                    </div>
                    <div class="card-footer">
                        <a href="rentaltransaction.php">Click for more &ensp;<i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
            </div>
        </section>
