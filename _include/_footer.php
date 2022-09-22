<?php
//"Footer";
?>
        </div>
      </div>
    </div>
    
       <script>
        var link = window.location.href;
        $(".top-list li a").each(function(){
            if($(this).attr("href") == link){
                $(this).addClass("active");
            }
        });
        </script>
      </body>
    </html>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://cdn.ckeditor.com/ckeditor5/24.0.0/classic/ckeditor.js"></script>
    <script src="//cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>
    <script>
        ClassicEditor
        .create( document.querySelector( '#blog_content' ) )
        .catch( error => {
            console.error( error );
        } );
        
        $("#blog").DataTable();
        
        <?php
        if(isset($_SESSION['success']) && !empty($_SESSION['success'])):
            echo 'alert("'.$_SESSION['success'].'")';
            unset($_SESSION['success']);
        endif;
        if(isset($_SESSION['error']) && !empty($_SESSION['error'])):
            echo 'alert("'.$_SESSION['error'].'")';
            unset($_SESSION['error']);
        endif;
        ?>
    </script>

 <footer class="main-footer">
     <div class="row">
     <div class="col-md-12 text-center">
    <div class="pull-right hidden-xs"></div>
    Copyright © 2018 . All rights reserved.</footer>
        
    </div>    
    </div>    
      </section>
      <script src='js/jquery-latest.js'></script>
      <script src="js/bootstrap.min.js"></script>
      <script src="js/Chart.bundle.js"></script>
      <script src='js/jquery.js'></script>
       <script>
        var link = window.location.href;
        $(".top-list li a").each(function(){
            if($(this).attr("href") == link){
                $(this).addClass("active");
            }
        });
        </script>
      </body>
    </html>