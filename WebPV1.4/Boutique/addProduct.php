<!-- including the stylesheet for the form -->
<link rel="stylesheet" type="text/css" href="/webproject/WebPV1.4/register.css"/>

<form action="image_temp/upload.php" method  ="POST" enctype="multipart/form-data" style="border:1px solid #ccc">
<div class="bg-img">

  <div class="container">
    <h1>Add Product</h1>
    <p>Please fill in this form to add a product</p>
    <hr>

    <label for="Name"><b>Product Name</b></label>
      <input type="text" placeholder="Enter goodies name" name="goodies_name" required>

    <label for="Surname"><b>Product description</b></label>
      <input type="text" placeholder="Enter goodies description" name="goodies_description" required>

    <label for="location"><b>Stock available of the Product</b></label>
      <input type="text" placeholder="Enter stock" name="stock" required>

    <label for="category"><b>Category</b></label><br>
      <input type="radio" name="category" value="goodies"> Goodies<br>
      <input type="radio" name="category" value="special_events"> special event<br>
      <input type="radio" name="category" value="food"> food<br>
    
    <label for="photo">
    <b>Select picture to upload</b></label><br>
      <td><input type="file" name="fileToUpload" id="fileToUpload" accept="image"></td>
     
    
 
      
    
    <!-- pattern used to check the good requirements of the password -->
    <label for="psw"><b>Put the price of the product</b></label>
      <input type="text" placeholder="Write down the price" name="goodies_cost" required>


    <div class="clearfix">
    <button type="button" onclick="history.back()" class="cancelbtn">Cancel</button>
    <input type="submit" name="submit" value="Upload Image">
    </div>
  </div>
</div>
</form>
</div>
