<?php
$level_akses = "admin";
include "../login/cek.php";
include "koneksi.php";

$stmt = $conn->prepare("SELECT * FROM news WHERE id = ?");
$stmt->bind_param("i", $_GET["id"]);
$stmt->execute();
$result = $stmt->get_result();
$data = $result->fetch_assoc();
?>

<form method="POST" action="proses_update.php" enctype="multipart/form-data">
  <table border="1">
    <tr>
      <td>Id</td>
      <td>:</td>
      <td>
        <input type="text" name="id" value="<?php echo $data['id']; ?>" readonly="readonly">
      </td>
    </tr>
    <tr>
      <td>Title</td>
      <td>:</td>
      <td>
        <input type="text" name="title" value="<?php echo $data['title']; ?>">
      </td>
    </tr>
    <tr>
      <td>Content</td>
      <td>:</td>
      <td>
        <textarea name="content" value="<?php echo $data['content']; ?>"></textarea>
      </td>
    </tr>
    <tr>
      <td>Author</td>
      <td>:</td>
      <td>
        <input type="text" name="author" value="<?php echo $data['author']; ?>">
      </td>
    </tr>
    <tr>
      <td>Image</td>
      <td>:</td>
      <td>
        <img src="upload/<?php echo $data['image']; ?>" width="100">
        <input type="hidden" name="image_lama" value="<?php echo $data['image']; ?>">
        <input type="file" name="image">
      </td>
    </tr>
    <tr>
      <td>
        <input type="submit" name="submit" value="UPDATE">
      </td>
      <td></td>
      <td>
        <input type="reset" name="reset" value="RESET">
      </td>
      <td></td>
    </tr>
  </table>
</form>