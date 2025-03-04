 <div class="row">
 <?php 


if(isset($_POST['btnsearch'])) {
  $query = "SELECT * FROM `tblpromopro` pr , `tblproduct` p , `tblcategory` c
            WHERE pr.`PROID`=p.`PROID` AND  p.`CATEGID` = c.`CATEGID`  AND PROQTY>0 
  AND ( `CATEGORIES` LIKE '%{$_POST['search']}%' OR `PROBRAND` LIKE '%{$_POST['search']}%' OR `PRONAME` LIKE '%{$_POST['search']}%' OR `PRODESC` LIKE '%{$_POST['search']}%' or `PROQTY` LIKE '%{$_POST['search']}%' or `PROPRICE` LIKE '%{$_POST['search']}%')";
}elseif(isset($_GET['category'])){
  $query = "SELECT * FROM `tblpromopro` pr , `tblproduct` p , `tblcategory` c
            WHERE pr.`PROID`=p.`PROID` AND  p.`CATEGID` = c.`CATEGID`  AND PROQTY>0 AND CATEGORIES='{$_GET['category']}'";
}else{
  $query = "SELECT * FROM `tblpromopro` pr , `tblproduct` p , `tblcategory` c
            WHERE pr.`PROID`=p.`PROID` AND  p.`CATEGID` = c.`CATEGID`  AND PROQTY>0 ";
}


  $mydb->setQuery($query);
  $cur = $mydb->loadResultList();
 
  foreach ($cur as $result) { 
  
   ?> 

    <div style="float:left; width:320px; margin-left:10px;"> 
 
         <div style="float:left; width:70px; margin-bottom:10px;">   
            <a href="#" class="PHOTO"  data-target="#photoModal" data-toggle="modal" data-id="<?php  echo $result->PROID; ?>"> <img  class="img-hover " src="<?php  echo web_root.'admin/products/'. $result->IMAGES; ?>" width="150px" height="120px" style="-webkit-border-radius:5px; -moz-border-radius:5px;"/></a>
         </div> 
        <div class="row" style="float:right; height:125px; width:160px; margin:0px; color:#000033;"> 
           <form   method="POST" action="cart/controller.php?action=add">
           <input type="hidden" name="PROPRICE" value="<?php  echo $result->PROPRICE; ?>">
              <input type="hidden" id="PROQTY" name="PROQTY" value="<?php  echo $result->PROQTY; ?>">

              <input type="hidden" name="PROID" value="<?php  echo $result->PROID; ?>">
              <p>
                  <b><?php  echo $result->PROMODEL . '  <br/>' . $result->PRONAME; ?> <br/>
                  <!-- <?php  echo $result->PRODESC; ?><br/> -->
                  Price  &#8369 <?php  echo $result->PRODISPRICE; ?><br/>
                  Available Quantity: <?php  echo $result->PROQTY; ?><br/>
                  </b>
              </p>
               <div class="form-group">
                <div class="row">
                  <div class="col-xs-12 col-sm-12">
                    <button  type="submit"  class="btn btn-primary btn-sm"  name="btnorder">Order Now!</button>
                  </div>
                </div>
              </div>


           </form>
         </div>
    </div>  

<?php }  ?>
</div> 

<!-- product details modal -->
<div class="modal fade" id="photoModal" tabindex="-1"> 
   
</div>
 <!-- end -->

