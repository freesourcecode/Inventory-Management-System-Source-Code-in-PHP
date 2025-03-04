 <style type="text/css">
 
  .logo img{
    height: 80px; 
    /*
    margin-top: -12%;
    margin-bottom: 2%; */
    /*float: left;*/
    width: 100%;

} 
 </style> 
  
    <!-- Projects Row -->
  <div class="row">
  <div class="col-md-12">
 <div class="table-responsive">
  <table id="home" class="home" >
  <thead>
    <tr class="col-md-6 img-portfolio"><td></td></tr>
  </thead>
  <tbody>
  
<?php   check_message(); ?>

<?php
    // $limit = 10;

 $query = "SELECT * FROM `tblproduct` p  ,`tblcategory` c  WHERE   p.`CATEGID`=c.`CATEGID` AND PROQTY>0 ";
  $mydb->setQuery($query);
  $cur = $mydb->loadResultList(); 
  foreach ($cur as $result) { ?>
  
    <tr class="col-md-6 logo" >
        <td class="col-md-12">
          <a href="index.php?q=single-item&id=<?php echo $result->PROID; ?>">
        <img class="img-hover logo" src="<?php echo web_root.'admin/products/'. $result->IMAGES; ?>" alt="<?php echo $result->PRONAME; ?>"> 
        </a> 
        <h3>
            <a href="index.php?q=single-item&id=<?php echo $result->PROID; ?>"><?php echo $result->PRONAME . ' -model::' .$result->PROMODEL . ''; ?></a>
        </h3>
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam viverra euismod odio, gravida pellentesque urna varius vitae.</p>
        </td>
      </tr>
 
<?php  }?>


<!-- <div class="tooltip-demo">
                                <button type="button" class="btn btn-default" data-toggle="tooltip" data-placement="left" title="Tooltip on left">Tooltip on left</button>
                                <button type="button" class="btn btn-default" data-toggle="tooltip" data-placement="top" title="Tooltip on top">Tooltip on top</button>
                                <button type="button" class="btn btn-default" data-toggle="tooltip" data-placement="bottom" title="Tooltip on bottom">Tooltip on bottom</button>
                                <button type="button" class="btn btn-default" data-toggle="tooltip" data-placement="right" title="Tooltip on right">Tooltip on right</button>
                            </div> -->

        <!-- Pagination -->
       <!--  <div class="row text-center">
            <div class="col-lg-12">
                <ul class="pagination">
                    <li>
                        <a href="#">&laquo;</a>
                    </li>
                    <li class="active">
                        <a href="#">1</a>
                    </li>
                    <li>
                        <a href="#">2</a>
                    </li>
                    <li>
                        <a href="#">3</a>
                    </li>
                    <li>
                        <a href="#">4</a>
                    </li>
                    <li>
                        <a href="#">5</a>
                    </li>
                    <li>
                        <a href="#">&raquo;</a>
                    </li>
                </ul>
            </div>
        </div> -->
        <!-- /.row -->    
     </tbody>
   <!--   <tfoot>
         <tr><td></td></tr>
     </tfoot>   -->    
    </table>
    </div>
</div>
</div>
    <!-- /.row -->



        <!-- <hr> -->
