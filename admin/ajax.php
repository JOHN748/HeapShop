<?php 
    $db=mysqli_connect('localhost','root','','heapshop');
?>

<option value="">Select Sub-Category</option>
<?php 
$categoryId = $_POST['categoryId'];
$res= mysqli_query($db, "SELECT * FROM sub_categories WHERE categories_id=$categoryId"); 
    while($data=mysqli_fetch_array($res)){
?>
        <option value="<?php echo $data['id']; ?>">
        	<?php echo $data['sub_categories']; ?>
       	</option>";

<?php } ?>

