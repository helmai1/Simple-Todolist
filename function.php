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
    $email = htmlspecialchars($data['email']);
    $notelp = htmlspecialchars($data['notelp']);

    $query = "INSERT INTO todo VALUES (NULL, '$name', '$email', '$notelp') ";
    mysqli_query($koneksi, $query);

    return mysqli_affected_rows($koneksi);
  }

  function editTodo($data, $id)
  {
    global $koneksi;

    $name = htmlspecialchars($data['name']);
    $email = htmlspecialchars($data['email']);
    $notelp = htmlspecialchars($data['notelp']);

    $query = "UPDATE todo SET 
            name = '$name',
            email = '$email',
            notelp = '$notelp'
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