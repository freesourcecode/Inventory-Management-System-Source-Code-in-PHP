<?php
include '../../include/connection.php';
   if (!isset($_SESSION['USERID'])){
      redirect(web_root."index.php");
     }

      // $autonum = New Autonumber();
      // $result = $autonum->single_autonumber(4);

?> 
 <form class="form-horizontal span6" action="#" method="POST" enctype="multipart/form-data"    >
 <div class="row">
         <div class="col-lg-12">
            <h1 class="page-header">Add New Product</h1>
          </div>
          <!-- /.col-lg-12 -->
       </div> 

                 <div class="form-group">
                    <div class="col-md-8">
                      <label class="col-md-4 control-label" for=
                      "PROMODEL">Model:</label>

                      <div class="col-md-8">
                            <input class="form-control input-sm" id="PROMODEL" name="PROMODEL" placeholder=
                            "Product Model" type="text" value="">
                      </div>
                    </div>
                  </div> 

                <div class="form-group">
                    <div class="col-md-8">
                      <label class="col-md-4 control-label" for=
                      "PRONAME">Product:</label>

                      <div class="col-md-8">
                             <input class="form-control input-sm" id="PRONAME" name="PRONAME" placeholder=
                            "Product Name" type="text" value="">
                      </div>
                    </div>
                  </div>

                 <div class="form-group">
                    <div class="col-md-8">
                      <label class="col-md-4 control-label" for=
                      "PRODESC">Description:</label>

                      <div class="col-md-8"> 
                      <textarea class="form-control input-sm" id="PRODESC" name="PRODESC" cols="1" rows="3" >
                        

                      </textarea>
                        
                      </div>
                    </div>
                  </div>

                  <div class="form-group">
                    <div class="col-md-8">
                      <label class="col-md-4 control-label" for=
                      "CATEGORY">Category:</label>

                      <div class="col-md-8">
                       <select class="form-control input-sm" name="CATEGORY" id="CATEGORY">
                          <option value="None">Select Category</option>
                          <?php
                            //Statement
                          $mydb->setQuery("SELECT * FROM `tblcategory`");
                          $cur = $mydb->loadResultList();

                        foreach ($cur as $result) {
                          echo  '<option value='.$result->CATEGID.' >'.$result->CATEGORIES.'</option>';
                          }
                          ?>
          
                        </select> 
                      </div>
                    </div>
                  </div>

                  <div class="form-group">
                    <div class="col-md-8">
                      <label class="col-md-4 control-label" for=
                      "PROQTY">Quantity:</label>

                      <div class="col-md-3">
                         <input class="form-control input-sm" id="PROQTY" name="PROQTY" placeholder=
                            "Quantity" type="number" value="">
                      </div>
                       <label class="col-md-2 control-label" for=
                      "PROPRICE">Price:</label>

                      <div class="col-md-3">
                         <input class="form-control input-sm" id="PROPRICE"  step="any" name="PROPRICE" placeholder=
                            "&#8369 Price " type="text" value="">
                      </div>
                    </div>
                  </div>

  
                  <div class="form-group">
                    <div class="col-md-8">
                      <label class="col-md-4" align = "right"for=
                      "image">Upload Image:</label>

                      <div class="col-md-8">
                      <input type="file" name="file"/>
                      </div>
                    </div>
                  </div>
            
             <div class="form-group">
                    <div class="col-md-8">
                      <label class="col-md-4 control-label" for=
                      "idno"></label>

                      <div class="col-md-8">
                        <button class="btn  btn-primary btn-sm" name="submit" type="submit" ><span class="fa fa-save fw-fa"></span> Save</button>
                      </div>
                    </div>
                  </div>

               
        <div class="form-group">
                <div class="rows">
                  <div class="col-md-6">
                    <label class="col-md-6 control-label" for=
                    "otherperson"></label>

                    <div class="col-md-6">
                   
                    </div>
                  </div>

                  <div class="col-md-6" align="right">
                   

                   </div>
                  
              </div>
              </div>
          
        </form>
      
<?php
if(isset($_POST['submit'])){
  $PROMODEL = $_POST['PROMODEL'];
  $PRODESC = $_POST['PROMODEL'];
  $Product_Name = $_POST['PRONAME'];
  $CATEGORY = $_POST['CATEGORY'];
  $PROQTY = $_POST['PROQTY'];
  $PROPRICE = $_POST['PROPRICE'];
  //$_FILES['file']['image'];
  //$image = $_FILES['file']['image'];
  $image = 'image_' . date('Y-m-d-H-i-s') . '_' . uniqid() . '.jpg';
  move_uploaded_file($_FILES["file"]["tmp_name"],'uploaded_photos/'.$image);
  $images = 'uploaded_photos/'.$image;

$query = "INSERT INTO tblproduct
                (PROMODEL,PRONAME,PRODESC,PROQTY,PROPRICE,CATEGID,IMAGES,PROSTATS)
                VALUES ('".$PROMODEL."','".$Product_Name."','".$PRODESC."','".$PROQTY."','".$PROPRICE."','".$CATEGORY."','".$images."','Available')";
                mysqli_query($con,$query)or die (mysqli_error($con));

$query1=mysqli_query($con,"SELECT PROID,PROPRICE from tblproduct WHERE PRONAME = '".$Product_Name."'")or die(mysqli_error());
    $row=mysqli_fetch_array($query1);
    $proid=$row['PROID'];
    $proprice = $row['PROPRICE'];

$query2 = "INSERT INTO tblpromopro
                (PROID,PRODISPRICE,PROBANNER)
                VALUES ('".$proid."','".$proprice."','1')";
                mysqli_query($con,$query2)or die (mysqli_error($con));


                ?>
                <script type="text/javascript">
            alert("Successfull Added.");
            window.location = "index.php";
        </script>
                <?php
}
      ?>
       