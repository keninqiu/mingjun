<?php

/* @var $this yii\web\View */

$this->title = 'CCTV';
?>

<div class="row">
    <div class="col-md-3"  id="sidebar">
        <form action="/site/search">
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
                <a href="/site/product?id=<?=$product["id"]?>" download>
                    <img class="card-img-top" src="<?=$product["image"]?>" alt="Card image cap">
                </a>
              <div class="card-block">
                <div><h4 class="card-title"><a href="/site/product?id=<?=$product["id"]?>"><?=$product["name"]?></a></h4></div>
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
            ?>
          

    </div>

</div>




    </div>
</div>