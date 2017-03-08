 <table class="table table-bordered table-hover">
                        <thead>
                           <tr>
                            <th>Id</th>
                            <th>Author</th>
                            <th>Title</th>
                            <th>Category</th>
                            <th>Status</th>
                            <th>Image</th>
                            <th>Tags</th>
                            <th>Comments</th>
                            <th>Date</th>
                           </tr>
                        </thead>
                        <tbody>
                           
                        <?php 
                            
                            //To display posts
                            
                            readPosts();
                            
                        ?>
                        <?php 
                            //To delete a post
                        
                        deletePost();
                        ?>
                        </tbody>

                    </table>