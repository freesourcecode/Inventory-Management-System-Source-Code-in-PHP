<?php 

if (!isset($_SESSION['CUSID'])){
redirect(web_root."index.php");
}
 

     
include "index.php";
$customerid =$_SESSION['CUSID'];
$customer = New Customer();
$singlecustomer = $customer->single_customer($customerid);

  ?>
 
<?php 
  $autonumber = New Autonumber();
  $res = $autonumber->set_autonumber('ordernumber'); 
?>

 

 
 <form onsubmit="return orderfilter()" action="customer/controller.php?action=processorder" method="post" >
 <div class="row">
    <div class="col-md-6 pull-left">
      <div class="col-md-2 col-lg-2 col-sm-2" style="float:left">
        Name:
      </div>
      <div class="col-md-8 col-lg-10 col-sm-3" style="float:left">
        <?php echo $singlecustomer->FNAME .' '.$singlecustomer->LNAME; ?>
      </div>
       <div class="col-md-2 col-lg-2 col-sm-2" style="float:left">
        Address:
      </div>
      <div class="col-md-8 col-lg-10 col-sm-3" style="float:left">
        <?php echo $singlecustomer->CUSHOMENUM . ' ' . $singlecustomer->STREETADD . ' ' .$singlecustomer->BRGYADD . ' ' . $singlecustomer->CITYADD . ' ' .$singlecustomer->PROVINCE . ' ' .$singlecustomer->COUNTRY; ?>
      </div>
    </div>

    <div class="col-md-6 pull-right">
    <div class="col-md-10 col-lg-12 col-sm-8">
    <input type="hidden" value="<?php echo $res->AUTO; ?>" id="ORDEREDNUM" name="ORDEREDNUM">
      Order Number :<?php echo $res->AUTO; ?>
    </div>
    </div>
 </div>
<hr/> 
 <div class="table-responsive">
 
              <table class="gcCentrum-table table-hover" id="table">
                <thead >
                <tr>
                  <!-- <th width="10">#</th> -->
                  <th style="width:12%; align:center; ">Product</th>
                  <th >Description</th>
                  <th style="width:15%; align:center; ">Quantity</th>
                  <th style="width:15%; align:center; ">Price</th>
                  <th style="width:30%; align:center; ">Total</th>
                  </tr>
                </thead>
                <tbody>    
                       
              <?php
                if (!empty($_SESSION['gcCart'])){ 
                      $count_cart = count($_SESSION['gcCart']);
                      for ($i=0; $i < $count_cart  ; $i++) { 

                      $query = "SELECT * FROM `tblpromopro` pr , `tblproduct` p , `tblcategory` c
                           WHERE pr.`PROID`=p.`PROID` AND  p.`CATEGID` = c.`CATEGID`  and p.PROID='".$_SESSION['gcCart'][$i]['productid']."'";
                        $mydb->setQuery($query);
                        $cur = $mydb->loadResultList();
                        foreach ($cur as $result){ 
              ?>

                         <tr>
                         <!-- <td></td> -->
                          <td><img src="admin/products/<?php echo $result->IMAGES ?>"  width="50px" height="50px"></td>
                          <td><?php echo $result->PROMODEL . ' <br/>'. $result->PRONAME .' '. $result->CATEGORIES. ' <br/>' .$result->PRODESC ; ?></td>
                          <td align="center"><?php echo $_SESSION['gcCart'][$i]['qty']; ?></td>
                          <td>&#8369 <?php echo  $result->PRODISPRICE ?></td>
                          <td>&#8369 <output><?php echo $_SESSION['gcCart'][$i]['price']?></output></td>
                        </tr>
              <?php
                        }

                      }
                }
              ?>
            

                </tbody>
                
              </table> 
              </div>
<hr/> 
              <div class="row">
                   <div class="col-md-7">
              <div class="form-group">
                  <label> Payment Method : </label>
                  <div class="radio">
                      <label>
                    
                          <input type="radio" class="paymethod " data-toggle="collapse"  data-parent="#accordion"  data-target="#collapseTwo" name="paymethod" id="pickupfee" value="Cash on Pickup" checked>Cash on Pickup 
                       
                      </label>
                  </div>
                  <div class="radio" >
                      <label >
                          <input type="radio"  class="paymethod" name="paymethod" id="deliveryfee" value="Cash on Delivery" data-toggle="collapse"  data-parent="#accordion" data-target="#collapseOne" >Cash on Delivery 
                        
                      </label>
                  </div>
                  <img src="https://www.paypalobjects.com/webstatic/en_US/i/buttons/cc-badges-ppppcmcvdam.png" alt="Pay with PayPal, PayPal Credit or any major credit card" /> 
              </div>

                <div class="panel-group" id="accordion">
                        <div class="panel">
                            <!-- <div class="panel-heading">
                                <h4 class="panel-title"> 
                                   <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne">Cash on Delivery</a>
                                </h4>
                            </div> -->
                            <div id="collapseTwo" class="panel-collapse collapse">
                              
                            </div>
                            <div id="collapseOne" class="panel-collapse collapse">
                                <div class="panel-body">
                                    <div class="form-group ">
                                      <label>Address where to deliver</label>

                                    
                                        <div class="col-md-12">
                                          <label class="col-md-2 control-label" for=
                                          "PLACE">City:</label>

                                          <div class="col-md-10">
                                           <select class="form-control paymethod" name="PLACE" id="PLACE" onchange="validatedate()"> 
                                              <?php 
                                            $query = "SELECT * FROM `tblsetting` ";
                                            $mydb->setQuery($query);
                                            $cur = $mydb->loadResultList();

                                            foreach ($cur as $result) {  
                                              echo '<option value='.$result->DELPRICE.'>'.$result->PLACE.'</option>';
                                            }
                                            ?>
                                          </select>
                                          </div>
                                        </div>

                                       <div class="col-md-12">
                                          <label class="col-md-2 control-label" for=
                                          "BRGY">Brgy:</label>

                                          <div class="col-md-10">
                                           <select class="form-control paymethod" name="BRGY" id="BRGY" > 
                                           <option >Select</option>
                                              <?php 
                                            $query = "SELECT * FROM `tblsetting` ";
                                            $mydb->setQuery($query);
                                            $cur = $mydb->loadResultList();

                                            foreach ($cur as $result) {  
                                              echo '<option value='.$result->DELPRICE.'>'.$result->BRGY.'</option>';
                                            }
                                            ?>
                                          </select>
                                          </div>
                                        </div>
                                      
                                    </div>
    
                                </div>
                            </div>
                        </div>
                   </div>             
                   
      
                        <input type="hidden"  placeholder="HH-MM-AM/PM"  id="CLAIMEDDATE" name="CLAIMEDDATE" value="<?php echo date('y-m-d h:i:s') ?>"  class="form-control"/>

                   </div>  
    
             
              <div class="col-md-5">
                  <p align="right">
                <div > Total Price :   &#8369 <span id="sum">0.00</span></div>
                 <div > Delivery Fee : &#8369 <span id="fee">0.00</span></div>
                 <div> Overall Price : &#8369 <span id="overall"></span></div>
                <input type="hidden" name="alltot" id="alltot" value=""/>
                  </p>  
                </div>
              </div>
<br/>
              <div class="row">
                <div class="col-md-6">
                    <a href="index.php?q=cart" class="btn btn-default pull-left"><span class="glyphicon glyphicon-arrow-left"></span>&nbsp;<strong>View Cart</strong></a>
                   </div>
                  <div class="col-md-6">
                      <button type="submit" class="btn btn-primary  pull-right " name="btn" id="btn" onclick="return validatedate();"   /> Submit Order <span class="glyphicon glyphicon-chevron-right"></span></button> 
                </div>  
              </div>
             
        
   </form>
 