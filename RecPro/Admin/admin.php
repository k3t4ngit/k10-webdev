<?php  
session_start();
$title="Home";
if(!$_SESSION['logged_in']==true){
header('location:adminlogin.php');}
include 'header.php';
include '../DB/getformdata.php';
include 'getcandidates.php';
     
      ?>
      <script type="text/javascript">
        function back()
        {
          $('#generated').hide();
          $('#default').hide();
          $('.span3').hide();
          $('#default').fadeIn(1000);
        }
        $(document).ready(function(){back()});
        var xmlhttp;
        if (window.XMLHttpRequest)
        {// code for IE7+, Firefox, Chrome, Opera, Safari
          xmlhttp=new XMLHttpRequest();
        }
        else
        {// code for IE6, IE5
          xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
        }
        
        function get_by_reference(ref_id)
        {
            xmlhttp.onreadystatechange=function()
            {
              if (xmlhttp.readyState==4 && xmlhttp.status==200)
              {
                post_det=xmlhttp.responseText;
                var myObject = eval('(' + post_det + ')');
                $('tbody > tr').remove();
                $('.span3').fadeIn(1000);
                $('#default').fadeOut(400);
                $('#generated').fadeIn(1000);
                if (myObject.data.length===0) {
                 
                  $('#tbl').append("<tr><td>No Results!</td></tr>");
                };
                for(var i=0;i<myObject.data.length;i++)
                {
                  var z= i+1;
                  if (myObject.data[i].status==null) {
                    myObject.data[i].status="Not Applied"
                  };
                 $('#tbl').append("<tr><td>"+z+"</td><td>"+myObject.data[i].name+"</td><td>"+myObject.data[i].email_id+"</td><td>"+myObject.data[i].create_date+"</td><td>"+myObject.data[i].qual+"</td><td>"+myObject.data[i].ref+"</td><td>"+myObject.data[i].status+"</td></tr>");

                }                
              }
            }
            xmlhttp.open("GET","sort_candidates.php?sortby=reference_id&value="+ref_id,true);
            xmlhttp.send();
        }
          function get_by_qualification(qual_id)
        {
            xmlhttp.onreadystatechange=function()
            {
              if (xmlhttp.readyState==4 && xmlhttp.status==200)
              {
                post_det=xmlhttp.responseText;
                
                
                var myObject = eval('(' + post_det + ')');
                $('tbody > tr').remove();
                $('.span3').fadeIn(1000);
                $('#default').fadeOut(400);
                $('#generated').fadeIn(1000);

                if (myObject.data.length===0) {
                 
                  $('#tbl').append("<tr><td>No Results!</td></tr>");
                };
                for(var i=0;i<myObject.data.length;i++)
                {
                  var z= i+1;
                  if (myObject.data[i].status==null) {
                    myObject.data[i].status="Not Applied"
                  };
                 $('#tbl').append("<tr><td>"+z+"</td><td>"+myObject.data[i].name+"</td><td>"+myObject.data[i].email_id+"</td><td>"+myObject.data[i].create_date+"</td><td>"+myObject.data[i].qual+"</td><td>"+myObject.data[i].ref+"</td><td>"+myObject.data[i].status+"</td></tr>");

                }                
              }
            }
            xmlhttp.open("GET","sort_candidates.php?sortby=qual_id&value="+qual_id,true);
            xmlhttp.send();
        }
        
        
      </script>

      <hr>
      <div class="row">
        <div class="span5">
          <blockquote>
          <p>Sort By Reference</p>
          <ul class="inline">
          <?php  foreach($refs as $ref){
            echo "<button class='btn btn-info btn-mini' type='button' onclick='get_by_reference(".$ref['reference_id'].")'>".$ref['description']."</button> &nbsp;";
            // echo "<li><a href='sort_candidates.php?sortby=reference_id&value=".$ref['reference_id']."'>".$ref['description']. "</a></li>";
            // echo "<li><a href= onclick='get_by_reference(".$ref['reference_id'].")'>".$ref['description']. "</a></li>";
            }?>
          </ul>
        </blockquote>
        </div>
        <div class="span7">
          <blockquote>
          <p>Sort By Qualification</p>
          <ul class="inline">
            <?php  foreach($quals as $qual){
              echo "<button class='btn btn-info btn-mini' type='button ' onclick='get_by_qualification(".$qual['qual_id'].")'>".$qual['description']."</button> &nbsp;";
            // echo "<li><a href='sort_candidates.php?sortby=qual_id&value=".$qual['qual_id']."'>".$qual['description']. "</a></li>";
            }?>
          </ul>
        </blockquote>
        </div>
        <div class="span9">
          <blockquote>
            <p>Sort By Status</p>
            <ul class="inline">
               <?php  foreach($stats as $status)
               {
                  if (!$status['status_id']==0) 
                  {
                    echo "<button class='btn btn-info btn-mini' type='button' onclick='get_by_status(".$status['status_id'].")'>".$status['description']."</button> &nbsp;";
                    // echo "<li><a href='sort_candidates.php?sortby=status_id&value=".$status['status_id']."'>".$status['description']. "</a></li>";
                  }
                }?>
            </ul>
          </blockquote>
        </div>
        <div class="span3">
          <blockquote>
            <p>Show All</p>
            <a href="admin.php"><button class="btn btn-large btn-info">Show All</button></a>
          </blockquote>
        </div>
      </div>
      <hr>
    <div id="default">
        <table class="table table-striped" >
          <caption><h3>Registered Candidates</h3></caption>
       
          <thead>
            <tr>
              <th>#</th>
              <th>Name</th>
              <th>Email ID</th>
              <th>Date of Registering</th>
              <th>Qualification</th>
              <th>Refered By</th>
              <th>Status</th>
              <th>Edit</th>             
            </tr>
          </thead>
          <tbody>
             <?php $obj=new getcandidates();
                      $rs=$obj->get_candidate();
                      
                      $i=1; 

                      foreach ($rs as $key ){ ?>
                      <tr>

                        <td><?php echo $i;?></td>
                        <td><?php echo $key['name'];?></td>
                        <td><?php echo $key['email_id'];?></td>
                        <td><?php echo $key['create_date'];?></td>
                        <td><?php echo $key['qual'];?></td>
                        <td><?php echo $key['ref'];?></td>
                       
                        <?php 
                        if (isset($key['status'])) {
                          # code...
                          echo "<td>".$key['status']."</td>";
                        }
                        else{
                          echo "<td>Not Applied</td>";
                        }?>
                        
                         <td><a href="edit_user.php?user_id=<?php echo $key['user_id'];?>">Edit</a></td>
                      </tr>
              <?php $i++; }?>
          </tbody>
        </table>
    </div><!--table-->
    <div id="generated">
      <table class='table table-striped' id="tbl">
        <caption><h3>Sorted Candidates</h3></caption>
      
        <thead>
          <tr >
            <th>#</th>
            <th>Name</th>
            <th>Email ID</th>
            <th>Date of Registering</th>
            <th>Qualification</th>
            <th>Refered By</th>
            <th>Status</th>
           
          </tr>
        </thead>
        <tbody >
          <tr class="trow"></tr>
        </tbody>
      </table>
    </div>

    <!-- Le javascript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="../assets/js/jquery.js"></script>
    <script src="../assets/js/bootstrap-transition.js"></script>
    <script src="../assets/js/bootstrap-alert.js"></script>
    <script src="../assets/js/bootstrap-modal.js"></script>
    <script src="../assets/js/bootstrap-dropdown.js"></script>
    <script src="../assets/js/bootstrap-scrollspy.js"></script>
    <script src="../assets/js/bootstrap-tab.js"></script>
    <script src="../assets/js/bootstrap-tooltip.js"></script>
    <script src="../assets/js/bootstrap-popover.js"></script>
    <script src="../assets/js/bootstrap-button.js"></script>
    <script src="../assets/js/bootstrap-collapse.js"></script>
    <script src="../assets/js/bootstrap-carousel.js"></script>
    <script src="../assets/js/bootstrap-typeahead.js"></script>
     <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"></script>
    <script type="text/javascript" src="jquery.cleditor.min.js"></script>
    <script type="text/javascript">
      $(document).ready(function() {
        $("#input").cleditor()[0].focus();
      });
    </script>
   

  </body>
</html>
