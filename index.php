<?php
   $title = "Tambah Kontak";
   include "layouts/header.php";
   include "function.php";

   $todoList = query("SELECT * FROM todo");
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
            placeholder="Input Nama . . ." 
            autofocus="on" required> <br>

         <label for="email">Email</label>
         <textarea name="email" 
            id="email" cols="30" rows="5"
            class="form-control"
            placeholder="Input Email . . ." required></textarea> <br>

            <label for="name">No Telepon</label>
         <input type="number" 
            name="notelp" 
            id="notelp"
            class="form-control"
            placeholder="No Telepon . . ." 
            autofocus="on" required> <br>
      
         <input type="submit" name="submit"
            value="Save" 
            class="btn btn-success btn-block">
      </form>
   </div>
</div>


<?php

   if (isset($_POST['submit'])) {
      
      if (addTodo($_POST) > 0  ) 
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
               alert('Isi data dengan benar!');
               // document.location.href = 'index.php';            
            </script>
            ";
            echo("<br>");
            echo mysqli_error($koneksi);        
      }
   }
?>
<div class="row p-3 m-3">
   
   <h2 class="card-title mb-3">
      Daftar Kontak
   </h2> 

   <div class="col-md-12 bg-white shadow-lg">
      <!-- <div class="row">
         <div class="col-md-12 text-right">
            <a href="todo-create.php" 
               class="btn btn-primary mt-3 mb-3">Tambah data</a>
         </div>
      </div> -->
      <table class="table table-bordered table-striped table-hover">
         <thead>
            <tr>
               <td>NO</td>
               <td>Name</td>
               <td>No Telepon</td>
               <td>Email</td>
               <td>Action</td>
            </tr>
         </thead>
         <tbody>
            <?php
               $i = 1;
               foreach ($todoList as $data) {
            ?>
            <tr>
               <td><?= $i++ ?>.</td>
               <td><?= $data['name'] ?></td>
               <td><?= $data['notelp']?></td>
               <td><?= $data['email'] ?></td>
               <td>
                  <a href="todo-edit.php?id=<?= $data['id'] ?>" 
                     class="btn btn-info btn-sm">Edit</a>
                  <a href="todo-delete.php?id=<?= $data['id'] ?>" 
                     onclick="return confirm('Apakah anda ingin menghapus todo ini ?')"
                     class="btn btn-danger btn-sm">Delete</a>
               </td>
            </tr>

            <?php } ?>
         
         </tbody>
      </table>
   </div>
</div>

<?php
   include "layouts/footer.php";
?>