<?php

/* @var $this yii\web\View */

$this->title = 'My Yii Application';
?>

<div class="row">
    <div class="col-md-3"  id="sidebar">
        <input type="text" class="form-control" placeholder="Search..." id="search">
        <nav>
            <ul class="nav flex-column flex-nowrap">
                <?php 
                foreach($categories as $category) {
                    if(!$category["children"]) {
                ?>

                <li class="nav-item"><a class="nav-link" href="#"><?=$category["name"]?></a></li>

                <?php 
                    }
                    else {
                ?>
                <li class="nav-item">
                <a class="nav-link collapsed" href="#submenu<?=$category["id"]?>" data-toggle="collapse" data-target="#submenu<?=$category["id"]?>"><?=$category["name"]?></a>
                <div class="collapse" id="submenu<?=$category["id"]?>" aria-expanded="false">
                    <ul class="flex-column pl-2 nav">
                        <?php 
                        foreach($category["children"] as $child) {
                        ?>
                        <li class="nav-item"><a class="nav-link py-0" href="/site/search?category_id=<?=$child["id"]?>"><?=$child["name"]?></a></li>
                        <?php
                        }
                        ?>
                    </ul>
                </div>
                </li>
                <?php         
                    }
                }
                ?>

                <!--
                <li class="nav-item"><a class="nav-link" href="#">Overview</a></li>
                <li class="nav-item">
                    <a class="nav-link collapsed" href="#submenu1" data-toggle="collapse" data-target="#submenu1">Reports</a>
                    <div class="collapse" id="submenu1" aria-expanded="false">
                        <ul class="flex-column pl-2 nav">
                            <li class="nav-item"><a class="nav-link py-0" href="">Orders</a></li>
                            <li class="nav-item">
                                <a class="nav-link collapsed py-1" href="#submenu1sub1" data-toggle="collapse" data-target="#submenu1sub1">Customers</a>
                                <div class="collapse" id="submenu1sub1" aria-expanded="false">
                                    <ul class="flex-column nav pl-4">
                                        <li class="nav-item">
                                            <a class="nav-link p-1" href="">
                                                <i class="fa fa-fw fa-clock-o"></i> Daily
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link p-1" href="">
                                                <i class="fa fa-fw fa-dashboard"></i> Dashboard
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link p-1" href="">
                                                <i class="fa fa-fw fa-bar-chart"></i> Charts
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link p-1" href="">
                                                <i class="fa fa-fw fa-compass"></i> Areas
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                        </ul>
                    </div>
                </li>
                <li class="nav-item"><a class="nav-link" href="#">Analytics</a></li>
                <li class="nav-item"><a class="nav-link" href="#">Export</a></li>
                -->
            </ul>
        </nav>
    </div>


    <div class="col-md-9">

          
            <?php 
            $i = 0;
            foreach($products as $product) { 
                if($i%3 == 0) {
            ?>
          <div class="row card-set">  
            <?php
                }
            ?>
            <div class="col-md-4 card">
              <img class="card-img-top" src="<?=$product["image"]?>" alt="Card image cap">
              <div class="card-block">
                <h4 class="card-title"><?=$product["name"]?></h4>
                <p class="card-text"><?=$product["description"]?></p>
                
                <a href="/site/product?id=<?=$product["id"]?>" class="btn btn-primary">View Details</a>
              </div>
            </div>
            <?php 
                if($i%3 == 2) {
            ?>
            </div>    
            <?php    
                }            
                $i ++;
            } 
            ?>
          

    </div>

</div>




    </div>
</div>