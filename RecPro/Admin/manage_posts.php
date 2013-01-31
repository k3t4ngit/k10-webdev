  <?php 
        session_start();
        $title="Manage Posts";
        include 'header.php';
        include 'manage_post.php';
        if(!isset($_SESSION['logged_in'])){
        header('location:adminlogin.php');
      }

      
      ?>
      <script type="text/javascript">
        var xmlhttp;

        if (window.XMLHttpRequest)
        {// code for IE7+, Firefox, Chrome, Opera, Safari
          xmlhttp=new XMLHttpRequest();
        }
        else
        {// code for IE6, IE5
          xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
        }
        function back()
        {
          $('#editpost').hide();
          $('#addpost').hide();
          $('#addpost').fadeIn(1000);
        }
        $(document).ready(function(){back()});
        function get_edit_post(id)
        {
        
          
          xmlhttp.onreadystatechange=function()
            {
            if (xmlhttp.readyState==4 && xmlhttp.status==200)
              {
                $('#addpost').fadeOut(500);
                $('#editpost').fadeIn(1000);
                post_det=xmlhttp.responseText;
                
                var obj = eval("(" + post_det + ")");
                
                $('#code').val(obj.code);
                $('#criteria').val(obj.criteria);
                $('#description').val(obj.description);
                $('#post_id').val(obj.post_id);
                if (obj.active=="Y") {
                  $('#checkbox').attr('checked' ,true);

                };
               $('#submit').attr('onclick','update_post('+obj.post_id+')');
              }
            }

            xmlhttp.open("GET","manage_post.php?action=edit&post_id="+id,true);
            xmlhttp.send();
        }
        
      </script>
     
              <table class="table table-striped">
                   <caption>Existing Posts</caption>
                    <thead>
                      <tr>
                        <th>#</th>
                        <th>Code</th>
                        <th>Criteria</th>
                        <th>Description</th>
                        <th>Date Added</th>
                        <th>Activate</th>
                        <th>Edit</th>
                        <th>Delete</th>
                       </tr>
                    </thead>
                    <tbody>
                    <?php $obj=new addpost();
                      $rs=$obj->get_posts();
                      $i=1; 
                     
                      foreach ($rs as $key ) {?>
                      <tr>
                        <td><?php echo $i;?></td>
                        <td><?php echo $key['code'];?></td>
                        <td><?php echo $key['criteria'];?></td>
                        <td><?php echo $key['description'];?></td>
                        <td><?php echo $key['open_date'];?></td>
                        <?php if ($key['active']=="Y"){
                          echo "<td><input type='checkbox' checked value='".$key['post_id']."'> </td>";
                        }
                        else{
                         echo "<td><input type='checkbox'  value='".$key['post_id']."'> </td>";
                        }?>
                       <th><button type="button" onclick="get_edit_post(<?php echo $key['post_id'];?>)">Edit</button></th>

                        <!-- <th><a href="editpost.php/?post_id=<?php echo $key['post_id'];?>">Edit</a></th> -->
                        <th><a href="manage_post.php?action=delete&post_id=<?php echo $key['post_id'];?>">Delete</a></th>
                      </tr>
                     <?php $i++; }?>
                    </tbody>
              </table>
              <hr>
           
                  <div id="addpost">
                    <legend>Add New Post</legend>
                     <form class="form-horizontal offset3" action="manage_post.php?action=add" method="post">
                        
                        <div class="control-group">
                          <label class="control-label" for="inputEmail">Code</label>
                          <div class="controls">
                            <input type="text"  name="code" placeholder="code">
                          </div>
                        </div>
                        <div class="control-group">
                          <label class="control-label" for="inputEmail">Criteria</label>
                          <div class="controls">
                             <textarea rows="3" name="criteria"></textarea>
                          </div>
                        </div>
                        <div class="control-group">
                          <label class="control-label" for="inputPassword">Descrption</label>
                          <div class="controls">
                            <textarea rows="3" name="desc"></textarea>
                          </div>
                        </div>
                        <div class="control-group">
                          <div class="controls">
                            <label class="checkbox">
                              <input name="active" value="Y" type="checkbox">Activate immediately
                            </label>
                            <button type="submit" name="add" class="btn ">Add Vacancy</button>
                          </div>
                        </div>
                      </form>
                  </div>
                  <div  id="editpost">
                     <button class="btn btn-primary pull-right " onclick="back();">Cancel</button>
                  <legend>Edit Post </legend>
                     <form class="form-horizontal offset3" action="manage_post.php?action=update" method="post">
                    <input id="post_id"type= "hidden" name="post_id"value="">
                      <div class="control-group">
                        <label class="control-label" for="inputEmail">Code</label>
                        <div class="controls">
                          <input type="text" id="code" name="code" placeholder="code">
                        </div>
                      </div>
                      <div class="control-group">
                        <label class="control-label" for="inputEmail">Criteria</label>
                        <div class="controls">
                           <textarea rows="3" id="criteria" name="criteria"></textarea>
                        </div>
                      </div>
                      <div class="control-group">
                        <label class="control-label" for="inputPassword">Description</label>
                        <div class="controls">
                          <textarea rows="3" id="description"name="description"></textarea>
                        </div>
                      </div>
                      <div class="control-group">
                        <div class="controls">
                          <label class="checkbox">
                            <input name="active" value="Y" id="checkbox" type="checkbox">Activate
                          </label>
                          <button type="submit" id="submit" name="update"class="btn ">Save</button>
                        
                        </div>
                      </div>
                      </form>
                  </div>
        
             