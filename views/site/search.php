<?php

/* @var $this yii\web\View */

$this->title = $addedToTitle." - FORESIGHT CCTV - Prefessional Manufacturer and Supplier of CCTV Cameras, Lenses, UTP Video Baluns , Ground loop isolator,video distributors and amplifiers, camera Housing and..!";
$this->registerMetaTag([
    'name' => 'description',
    'content' => "Manufacturer and wholesale CCTV importer,distributor and supplier of FORESIGHT Branded high quality craftsmanship CCTV Camera,Glass Camera Lenses,UTP video transceiver,UTP balun,housing,CCTV Surveillance Products. Competitive price. We offer OEM's."
]);
$this->registerMetaTag([
    'name' => 'keywords',
    'content' => "alarm,security,camera,lenses,CCTV,VIDEO,Ground Loop Isolator,Lens,Network,Network Video,Network Video Technologies,CCTV Video,CCTV Transmission,CCTV over UTP,Video Over Unshielded Twisted Pair,Video Transmission,UTP CCTV,UTP Video,Unshielded Twisted Pair Video,Video Over UTP,Video Over Unshielded,Twisted Pair,Surveillance,Surveillance Video,Surveillance CCTV,Surveillance Video Transmission,Video BALUN,CCTV BALUN,BALUN,Twisted Pair BALUN,UTP BALUN,IP Camera Cabling"
]);

$this->params["settings"] = $settings;
?>
<div class="clearfix"><br></div>
<div class="row">
    <div class="col-md-left"  id="sidebar">
        <form action="/site/search" class="search-form">
            <div class="input-group">
               <input type="text" class="form-control"  name="text" placeholder="" id="search">
               <span class="input-group-btn">
                    <button class="btn btn-default" type="submit">Search</button>
               </span>
            </div>
        </form>
        <nav>
            <ul class="nav flex-column flex-nowrap">
                <?php 
                if(isset($categories)) {
                    foreach($categories as $category) {
                        if(!$category["children"]) {
                    ?>

                    <li class="nav-item"><a class="nav-link" href="/site/search?category_id=<?=$category["id"]?>"><?=$category["name"]?></a></li>

                    <?php 
                        }
                        else {
                    ?>
                    <li class="nav-item">
                    <a class="nav-link collapsed" href="#submenu<?=$category["id"]?>" data-toggle="collapse" data-target="#submenu<?=$category["id"]?>"><?=$category["name"]?></a>
                    <?php 
                    if(($expanded_category_id > 0) && ($expanded_category_id == $category["id"])) {
                    ?>
                    <div class="" id="submenu<?=$category["id"]?>" aria-expanded="false">
                    <?php
                    }
                    else {
                    ?>
                    <div class="collapse" id="submenu<?=$category["id"]?>" aria-expanded="false">
                    <?php 
                    }
                    ?>
                    
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
                }
                ?>

            </ul>
        </nav>
    </div>


    <div class="col-md-right">

          
            <?php 
            $i = 0;
            if(isset($products)) {
                foreach($products as $product) { 
                    if($i%3 == 0) {
                ?>
              <div class="row card-set">  
                <?php
                    }
                    $product_name = str_replace('/', '|', $product["name"]);
                    $product_name = urlencode($product_name);
                    echo $product_name;
                ?>
                <div class="col-md-card card">
                    <a href="/<?=$product_name?>.htm">
                        <img class="card-img-top" src="<?=$product["image"]?>" alt="Card image cap">
                    </a>
                  <div class="card-block">
                    <div><h4 class="card-title"><a href="/<?=$product_name?>.htm"><?=$product["name"]?></a></h4></div>
                    <div class="card-text"><?=$product["description"]?></div>

                    <div class="card-footer"></div>
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
            }
            ?>
          

    </div>

</div>




    </div>
</div>