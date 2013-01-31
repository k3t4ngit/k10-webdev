<?php 
      session_start();
      $title="Manage Problems";
      include 'header.php';
		  include 'getproblems.php';
      if(!isset($_SESSION['logged_in'])){
        header('location:adminlogin.php');
      }
      ?>

<table class="table table-striped">
                   <caption><h3>Existing problems</h3></caption>
                    <thead>
                      <tr>
                        <th>#</th>
                        <th>Description</th>
                      </tr>
                    </thead>
                    <tbody>
                    <?php 
                    $prob=new getproblems();
                    $problem=$prob->get_problems();
                      $i=1; 

                      foreach ($problem as $key ) {?>
                      <tr>
                        <td><?php echo $i;?></td>
                        <td><p><?php print_r($key['description']);?></p></td>
                       
                       
                        <th><a href="editpost.php/?post_id=<?php echo $key['problem_id'];?>">Edit</a></th>
                        <th><a href="deletepost.php/?post_id=<?php echo $key['problem_id'];?>">Delete</a></th>
                      </tr>
                     <?php $i++; }?>
                    </tbody>
                  </table>
                  <hr>
                  <a href="../questionBank/text_editor.php" id="button"class="btn btn-large">Add New</a>