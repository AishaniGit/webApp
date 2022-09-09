<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>Book Search Results</title>
  <style>
   <meta name="viewport" content="width=device-width, initial-scale=1.0>
    <?php include "bookSearchResult.css" ?>
  </style>
</head>

<body>
  
  <?php

  $category = $_GET['category'];
  $grade = $_GET['grade'];
  
  // echo '$category'.$category;
  // echo '$grade'.$grade;

  $servername = "localhost";
  $username = "asecsaxg_webUser";
  $password = "Covid2021!";

  $rowIdArry = array();
  $rowId = 0;
  // Create connection
  mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
  $con = new mysqli($servername, $username, $password);

  // Check connection
  if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
  }
  //echo "Connected successfully";

  $con->select_db("asecsaxg_webDatabase");
  $result = $con->query("SELECT DATABASE()");
  $row = $result->fetch_row();
  $results_per_page = 2;
  $sql = "select * from bookInfo where bookcategory='$category' and grade='$grade' ";
  //echo '$sql'.$sql;s
  $result = mysqli_query($con, $sql);
  $number_of_results = mysqli_num_rows($result);

  // determine number of total pages available
  $number_of_pages = ceil($number_of_results / $results_per_page);

  if (!isset($_GET['page'])) {
    $page = 1;
  } else {
    $page = $_GET['page'];
  }

  // determine the sql LIMIT starting number for the results on the displaying page
  $this_page_first_result = ($page - 1) * $results_per_page;

  // retrieve selected results from database and display them on page
  $sql = "SELECT * FROM bookInfo where bookcategory='$category' and grade='$grade' LIMIT $this_page_first_result,$results_per_page";
  
  $result = mysqli_query($con, $sql);
  
   
    
        
  
     
?>
  <center>
  <div class="ablock ">
    <h1> BOOK SEARCH RESULTS </h1>
    

    
    <table border="1" >
      <tr>
        
    <?php
       if ($number_of_results > 0) { ?>
        
        <th colspan="5">Book Details</th>
        
        
    <?php } else {
    
  ?>
       <th colspan="5"> No Books Found for this Criteria </th>
       
     <?php  } ?>
        
        
        
        
      </tr>
    
     
<?php
  while ($row = mysqli_fetch_array($result)) {

    $rowId++;
  ?>
    <tr>
      <?php $id = $row['id']; ?>
      <td>
        <?php $rowIdArry[$rowId] = $id; ?>
  
        <?php $ButtonId = "Btn" . $rowId; ?>
        <button  id=<?php echo $ButtonId; ?>>Request Donor</button>
        <script>
          var rowId = <?php echo $rowId ?>;

          function innerFunc(index) {
            let btnIndex = "Btn" + rowId;
            console.log(btnIndex);
            document.getElementById(btnIndex).addEventListener("click", function() {
              window.location.href = "https://asecondlife.me/wp-content/plugins/custom/contactDoner.php?id=" + encodeURIComponent(<?php echo $id ?>);
            }, false);
          }
          innerFunc(<?php $rowId ?>);
        </script>
      </td>
        <!-- Id-->
       <td> <center><label> Book Id:</label><br><?php echo $id; ?><center></td>
      <!-- Book Name-->
      <td><label>Book Name:</label><br><?php echo $row['bookName']; ?></td>
      <!--Book Details With Donor name and other details-->
      <td><label>Donor Name:</label><br><?php echo $row['donorName']; ?></td>
      <td><label>Published Year:</label><br><?php echo $row['publishYear']; ?></td>
      <td><label>Comments:</label><br><?php echo $row['comments']; ?></td>
      
    </tr>
    </center>
  <?php

  }/*while*/
  ?>
  </table>
</div>
  <?php
  // display the links to the pages
  for ($page = 1; $page <= $number_of_pages; $page++) {
    echo '<a href="bookSearchResult.php?page=' . $page . '&category=' . $category . '&grade=' . $grade . '">' . $page . '</a> ';
  }

  ?>
</body>
<!---Button to Home-->
<form method="post" action="https://asecondlife.me/">
  </br>
  <center><input type="submit" name="submit" value="Home" align="right" /> </center>
</form>

</html>