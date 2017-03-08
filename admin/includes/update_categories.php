<form action="" method="post">
                          <div class="form-group">
                             <label for="cat_title">Edit Category</label>
                             <?php 
                              
                              if (isset($_GET['edit'])){
                                  
                              $edit = $_GET['edit'];
                              
                              $query_edit = "SELECT * FROM categories WHERE cat_id = $edit ";
                              $select_categories_edit = mysqli_query($connection, $query_edit);
                    
                              while ($row = mysqli_fetch_assoc($select_categories_edit)){
                              $cat_id = $row['cat_id'];
                              $cat_title = $row['cat_title'];
                                
                              }
                                  
                            ?>
                                
<input value="<?php if(isset($cat_title)) {echo $cat_title;} ?>" type="text" class="form-control" name="cat_title">                      
                                  
                                  
                           <?php } ?>
                             
                           <?php
                              
                        //Update categories
                              
                       if(isset($_POST['update_cat'])){
                           
                           $update_cat = $_POST['cat_title'];
                           $update_query = "UPDATE categories SET cat_title = '$update_cat' WHERE cat_id = {$cat_id} ";
                           $update_query_result = mysqli_query($connection, $update_query);
                           if(!$update_query_result){
                               
                               die("Connection Failed" . mysqli_error($connection));
                           }
                           
                           
                       }
                              
                              
                              
                        ?>
                                 
                             
                       
                             
                              
                          </div>
                          <div class="form-group">
                              <input class="btn btn-primary" type="submit" name="update_cat" value="Update Category">
                          </div>
                      </form>  