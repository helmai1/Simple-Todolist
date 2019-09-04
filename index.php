<?php
   $title = "Simple Todo List";
   include "layouts/header.php";
   include "function.php";

   $todoList = query("SELECT * FROM todo");
?>

<div class="row p-3 m-3">
   
   <h2 class="card-title mb-3">
      <?= $title ?>   
   </h2> 

   <div class="col-md-12 bg-white shadow-lg">
      <div class="row">
         <div class="col-md-12 text-right">
            <a href="todo-create.php" 
               class="btn btn-primary mt-3 mb-3">Tambah data</a>
         </div>
      </div>
      <table class="table table-bordered table-striped table-hover">
         <thead>
            <tr>
               <td>NO</td>
               <td>Name</td>
               <td>Description</td>
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
               <td><?= $data['description'] ?></td>
               <td>
                  <a href="todo-edit.php?id=<?= $data['id'] ?>" 
                     class="btn btn-warning btn-sm">Edit</a>
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