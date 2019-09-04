<?php
   include "koneksi/koneksi.php";

   function query($query)
   {
      global $koneksi;

      $result = mysqli_query($koneksi, $query);
      $rows = [];
      while ($data = mysqli_fetch_assoc($result)) {
          $rows[] = $data;
      }
      return $rows;
  }

  function addTodo($data)
  {
    global $koneksi;

    $name = htmlspecialchars($data['name']);
    $description = htmlspecialchars($data['description']);

    $query = "INSERT INTO todo VALUES (NULL, '$name', '$description') ";
    mysqli_query($koneksi, $query);

    return mysqli_affected_rows($koneksi);
  }

  function editTodo($data, $id)
  {
    global $koneksi;

    $name = htmlspecialchars($data['name']);
    $description = htmlspecialchars($data['description']);

    $query = "UPDATE todo SET 
            name = '$name',
            description = '$description'
            WHERE id = '$id'";

    mysqli_query($koneksi, $query);

    return mysqli_affected_rows($koneksi);
  }

  function deleteTodo($id)
  {
      global $koneksi;

      $query = "DELETE FROM todo WHERE id = '$id'";

      mysqli_query($koneksi, $query);

      return mysqli_affected_rows($koneksi);
  }

  
?>