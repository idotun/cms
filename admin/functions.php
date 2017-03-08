<?php 

function deleteComment(){
    global $connection; 
    if (isset($_GET['delete_post_id'])){
                     
                     $delete_post_id = $_GET['delete_post_id'];
                     
                     $delete_post = "DELETE FROM posts WHERE post_id = $delete_post_id ";
                     $delete_post_query = mysqli_query($connection, $delete_post);
                     header("Location: posts.php");
                     confirmQuery($delete_post_query);
                     }   
    
    
}


function readComments(){
    global $connection;
    
    
    
                            $posts_query = "SELECT * FROM comments";
                            $select_all_comments = mysqli_query($connection, $posts_query);
                            if(!$select_all_comments)
                            { die("Connection Failed" . mysqli_error($connection));}
                            else {
                            
                            while ($row = mysqli_fetch_assoc($select_all_comments)){
                            $comment_id = $row['comment_id'];
                            $comment_post_id = $row['comment_post_id'];
                            $comment_author = $row['comment_author'];
                            $comment_content = $row['comment_content'];
                            $comment_email = $row['comment_email'];  
                            $comment_status = $row['comment_status'];
                            $comment_date = $row['comment_date'];
                             
                    echo "<tr>";
                    echo "<td>{$comment_id}</td>";
                    echo "<td>{$comment_author}</td>";
                    echo "<td>{$comment_content}</td>";
                     
                                
                    /*echo "<td>";
                    $query = "SELECT * FROM categories WHERE cat_id = {$post_category_id} ";
                    $query_cat_post = mysqli_query($connection, $query);
                    while ($row = mysqli_fetch_assoc($query_cat_post)){
                        $cat_id = $row['cat_id'];
                        $cat_title = $row['cat_title'];
                        echo $cat_title;
                    }
                    echo "</td>";
                    */
                   
                    echo "<td>{$comment_email}</td>";
                    echo "<td>{$comment_status}</td>";
                    echo "<td>{$comment_post_id}</td>";
                    echo "<td>{$comment_date}</td>";
        echo "<td><a href='posts.php?source=edit_post&edit_post_id={$comment_id}'>Approve</a></td>";
        echo "<td><a href='posts.php?delete_post_id={$comment_id}'>Unapprove</a></td>";
        echo "<td><a href='posts.php?source=edit_post&edit_post_id={$comment_id}'>Edit</a></td>";
        echo "<td><a href='posts.php?delete_post_id={$comment_id}'>Delete</a></td>";
                    
                    echo "</tr>";
                               
                            }
                            
                }
    
    
}

function deletePost(){
    global $connection; 
    if (isset($_GET['delete_post_id'])){
                     
                     $delete_post_id = $_GET['delete_post_id'];
                     
                     $delete_post = "DELETE FROM posts WHERE post_id = $delete_post_id ";
                     $delete_post_query = mysqli_query($connection, $delete_post);
                     header("Location: posts.php");
                     confirmQuery($delete_post_query);
                     }   
    
    
}

function confirmQuery($result){
 global $connection; 
if(!$result){
    
    die("Connection Failed" . mysqli_error($connection));
} 

}

function insertCategory(){
    
    global $connection;
    if(isset($_POST['submit'])){
                            $cat_title = $_POST['cat_title'];
                            if(!$cat_title){
                                
                                echo "You can't leave the field empty";
                                
                            } else {
                            $cat_title = mysqli_real_escape_string($connection, $cat_title);
                            $insert_category_query = "INSERT into categories(cat_title) VALUE('{$cat_title}') ";
                            $insert_category = mysqli_query($connection, $insert_category_query);
                            
                            if(!$insert_category){
                                die ("Connection failed" . mysqli_error($connection));
                            } else {
                                
                               echo "You have successfully added a new category"; 
                            }
                                
                            }
                        }
    
    
}

function selectCategory() {
    
global $connection;
$query = "SELECT * FROM categories";
$select_categories = mysqli_query($connection, $query);
while ($row = mysqli_fetch_assoc($select_categories)){
$cat_id = $row['cat_id'];
$cat_title = $row['cat_title'];
echo "<tr>";
echo "<td>{$cat_id}</td>";
echo "<td>{$cat_title}</td>";
echo "<td><a href='categories.php?delete={$cat_id}'>Delete</a></td>";
echo "<td><a href='categories.php?edit={$cat_id}'>Edit</a></td>";
echo "</tr>";     
    }
}

function deleteCategory(){
    
    global $connection;
    if (isset($_GET['delete'])) {
    $delete = $_GET['delete'];
    $delete_query = "DELETE FROM categories WHERE cat_id = {$delete} ";
    $delete_query_result = mysqli_query($connection, $delete_query);
    header("Location: categories.php");
    if(!$delete_query_result){
    die ("Connection Failed". mysqli_error($connection));
    }
    }
}

function updateCategory(){
    
global $connection;
if(isset($_GET['edit'])){
$cat_id = $_GET['edit'];  
include "includes/update_categories.php";
}
}

function readPosts(){
                            
    
    global $connection;
    
    
    
                            $posts_query = "SELECT * FROM posts";
                            $select_all_posts = mysqli_query($connection, $posts_query);
                            if(!$select_all_posts)
                            { die("Connection Failed" . mysqli_error($connection));}
                            else {
                            
                            while ($row = mysqli_fetch_assoc($select_all_posts)){
                            $post_id = $row['post_id'];
                            $post_author = $row['post_author'];
                            $post_title = $row['post_title'];
                            $post_category_id = $row['post_category_id'];  
                            $post_status = $row['post_status'];
                            $post_image = $row['post_image'];
                            $post_tags = $row['post_tags'];
                            $post_comment_count = $row['post_comment_count'];
                            $post_date = $row['post_date'];
                             
                    echo "<tr>";
                    echo "<td>{$post_id}</td>";
                    echo "<td>{$post_author}</td>";
                    echo "<td>{$post_title}</td>";
                    echo "<td>";
                    $query = "SELECT * FROM categories WHERE cat_id = {$post_category_id} ";
                    $query_cat_post = mysqli_query($connection, $query);
                    while ($row = mysqli_fetch_assoc($query_cat_post)){
                        $cat_id = $row['cat_id'];
                        $cat_title = $row['cat_title'];
                        echo $cat_title;
                    }
                    echo "</td>";
                    
                   
                    echo "<td>{$post_status}</td>";
                    echo "<td><img class='img-responsive' src='../images/{$post_image}'/></td>";
                    echo "<td>{$post_tags}</td>";
                    echo "<td>{$post_comment_count}</td>";
                    echo "<td>{$post_date}</td>";
                    echo "<td><a href='posts.php?source=edit_post&edit_post_id={$post_id}'>Edit</a></td>";
                    echo "<td><a href='posts.php?delete_post_id={$post_id}'>Delete</a></td>";
                    
                    echo "</tr>";
                               
                            }
                            
                            
                            
                            
                            
                            
                            
                            
                            }
    
    
}

?>