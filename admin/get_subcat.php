 <?php
	include '../functions/functions.php';
	$categories_id=$_POST["categories_id"];
	$result = mysqli_query($db,"SELECT * FROM sub_categories");
?>
<select> 
<option value="">Select Sub-Category</option>
<?php

while($row = mysqli_fetch_array($result)) {
?>
	<option value="<?php echo $row["id"];?>"><?php echo $row["sub_categories"];?></option>
<?php
}
?>
</select>