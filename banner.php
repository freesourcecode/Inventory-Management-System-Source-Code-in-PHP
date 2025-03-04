<?php

  $query="SELECT count(IMAGES) as 'counts'  FROM `tblpromopro` pr , `tblproduct` p  
  WHERE pr.`PROID`=p.`PROID` and `PROBANNER`=1";
  $mydb->setQuery($query);
  $cur = $mydb->loadResultList(); 
  foreach ($cur as $result) {
  $maxrow = $result->counts; 
  }
 
?>
 


 
     <header id="myCarousel" class="carousel slide">
        <!-- Indicators -->
<!--         <ol class="carousel-indicators">
            <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
            <li data-target="#myCarousel" data-slide-to="1"></li>
            <li data-target="#myCarousel" data-slide-to="2"></li>
        </ol>
 -->
<?php 
 $query="SELECT * FROM `tblpromopro` pr , `tblproduct` p  
              WHERE pr.`PROID`=p.`PROID` and `PROBANNER`=1";
              $mydb->setQuery($query);
              $cur = $mydb->loadResultList();
              ?>
  <!-- Wrapper for slides -->
        <div class="carousel-inner">
            <div class="item active">
            <div class="fill">  
                    <img src="<?php echo web_root ;?>img/images.jpg"   /> 
              </div>
                <div class="carousel-caption">
                    <h2>GC Centrum Appliance </h2>
                </div>
            </div>
              <?php   
           foreach ($cur as $result) {   ?>
<?php if($result->PRODISCOUNT>0){ ?>
            <div class="item"> 
            <?php if(@$_GET['q']=='cart' OR @$_GET['q']=='profile') {?>
            <a href="<?php echo web_root ;?>index.php?q=single-item&id=<?php echo $result->PROID;?>"  data-toggle="lightbox">
            <?php }else{ ?>
           <a href="<?php echo web_root ;?>popup_Item.php?id=<?php echo $result->PROID;?>" data-toggle="lightbox">
            <?php } ?>
              <div class="fill">  
                   <img src="<?php echo web_root. 'admin/products/'.$result->IMAGES; ?>"   /> 
              </div>
            
                <div class="carousel-caption">
                    <h2>Discount <?php echo $result->PRODISCOUNT;?> %</h2>
                </div>
                 </a>
            </div>
          
          <?php } }?>
        </div>

         <!-- Controls -->
        <a class="left carousel-control" href="#myCarousel" data-slide="prev">
            <span class="icon-prev"></span>
        </a>
        <a class="right carousel-control" href="#myCarousel" data-slide="next">
            <span class="icon-next"></span>
        </a>

</header>
 
 

    <!-- Script to Activate the Carousel -->
