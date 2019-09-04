<?php
   $title = "Add Todo";
   include "layouts/header.php";
   include "function.php";
?>


<div class="row p-3 m-3">   
   <div class="col-md-12 mb-3">
      <h2 class="card-title ">
         <?= $title ?>         
      </h2> 
   </div>   
   <div class="col-md-6 bg-white">
      <form action="" method="post" class="shadow-lg p-3 bg-white">
         <label for="name">Name</label>
         <input type="text" 
            name="name" 
            id="name"
            class="form-control"
            placeholder="Input todo name . . ." 
            autofocus="on" required> <br>

         <label for="description">Description</label>
         <textarea name="description" 
            id="description" cols="30" rows="5"
            class="form-control"
            placeholder="Input todo description . . ." required></textarea> <br>
      
         <input type="submit" name="submit"
            value="Save" 
            class="btn btn-success btn-block">
      </form>
   </div>
</div>

<?php
   include "layouts/footer.php";

   if (isset($_POST['submit'])) {
      if (addTodo($_POST) > 0) 
      {
         echo "
            <script>
               alert('Todo successfully added!');
               document.location.href = 'index.php';
            </script>
            ";

        } else {
            echo "
            <script>
               alert('Data gagal ditambahkan');
               // document.location.href = 'todo-create.php';            
            </script>
            ";
            echo("<br>");
            echo mysqli_error($koneksi);        
      }
   }
?>