<?php 
    $db=mysqli_connect('localhost','root','','heapshop');
?>

<?php 
$categoryId = $_POST['categoryId'];
echo "<option>Select Sub-Category</option>";
$res= mysqli_query($db, "SELECT * FROM sub_categories WHERE categories_id=$categoryId"); 
        while($data=mysqli_fetch_array($res))
        {
?>
        <option value="<?php echo $data['id']; ?>">
        	<?php echo $data['sub_categories']; ?>
       	</option>";
<?php 
        }
?>

