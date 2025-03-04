 
      <div class="table-responsive" style="margin-top:5%;"> 
             <form   method="POST" action="<?php echo web_root ; ?>cart/controller.php?action=add">           
                    <table id="example" class="table "  style="font-size:12px" cellspacing="0"  > 
                      
                    <tbody>
                        <?php 
                            $query = "SELECT * FROM `tblproduct` P , `tblwishlist` W , `tblcustomer`  C , `tblpromopro` PR, `tblcategory` CT 
                            WHERE P.`PROID`=W.`PROID` AND W.`CUSID`=C.`CUSTOMERID`  AND P.`PROID`=PR.`PROID` AND P.`CATEGID`=CT.`CATEGID`
                           AND WISHSTATS=0 AND  `CUSTOMERID`=".$_SESSION['CUSID'] ." ORDER BY `WISHDATE` desc ";
                          $mydb->setQuery($query);
                          $cur = $mydb->loadResultList();
                          echo $cur;
                         
                        foreach ($cur as $result) {
                           // if($result>0){
                          // echo $result;
                          ?>
                          <tr>
                          <td rowspan="2">
                             <img alt="" style="width:300px; height:200px;>" title="" class="img-reponsive img-thumbnail isTooltip" src="<?php echo web_root.'admin/products/'. $result->IMAGES; ?>" data-original-title="Usuario"> 
                         </td>
                          <td>
                          <p><h4>Date added: <?php echo date_format(date_create($result->WISHDATE),"M/d/Y h:i:s") ; ?></h4></p>
                          <p><h2><?php echo  $result->PRONAME; ?> <small> <?php echo  $result->PROMODEL; ?></small></h2></p> 
                          <p><h4>Product Description</h4></p>
                          <ul>
                            <li><?php echo  $result->CATEGORIES; ?></li>
                            <li><?php echo  $result->PRODESC; ?></li> 
                          </ul>
                          <p><h5>Price :<?php echo  $result->PROPRICE; ?></h5></p>
                          <?php
                            if ($result->PRODISCOUNT>0){
                           ?>
                            <p><h5>Discount : <?php echo  $result->PRODISCOUNT; ?></h5></p>
                            <p><h5>Discounted Price :<?php echo  $result->PRODISPRICE; ?></h5></p> 
                            <?php } ?>
                        <input type="hidden" name="PROPRICE" value="<?php  echo $result->PRODISPRICE; ?>">
                        <input type="hidden" name="PROID" value="<?php  echo $result->PROID; ?>">
                       <button  type="submit"  class="btn btn-primary btn-sm"  name="btnorder">Order Now!</button>
                         <a href="<?php echo web_root ; ?>customer/controller.php?action=wishlist&wishid=<?php echo $result->WISHID; ?>"    class="btn btn-info btn-sm "  data-toggle="lightbox"  >
                                 <i class="fa fa-trash-o fa-fw"  data-toggle="tooltip" data-placement="left" title="Remove"></i>  
                                 </a>
                             
                          </td>
                          
                          </tr>

                          <tr>
                            
                          </tr>
                             
                       

                        <?php
                       // }else{
                       //    echo "<h1>Wishlist is empty.</h1>";
                       // }
                        } 
                       ?>
                    
                      </tbody>
                      
                      
                    </table>
                 </form>
                         
           <!--      <div class="row">
                  <div class="col-md-4 col-md-offset-4 text-center">
                    <ul class="pagination" id="myPager"></ul>
                  </div>
                </div> -->
              </div><!--/table-resp-->
               
 