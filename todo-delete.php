<?php
    include "function.php";
    $id = $_GET['id'];

    if (deleteTodo($id) > 0) {
        echo "
            <script>
                alert('Delete todo successfully!');
                document.location.href = 'index.php';
            </script>
        ";
    } else {
        echo "
            <script>
               //  alert('Hapus data gagal');
                document.location.href = 'todo-delete.php';
            </script>
        ";
        echo("<br>");
        echo mysqli_error($koneksi);
    }
    
?>