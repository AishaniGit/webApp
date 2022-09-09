<?php
/*
plugin name: Display Data
*/

$path = preg_replace('/wp-content.*$/', '', __DIR__);
require_once($path . '/wp-load.php');

function displayData()
{
 global $wpdb;  
?>

<!--Enter Search Criteria-->
<style>
    <meta name="viewport"content="width=device-width, initial-scale=1.0>
<?php include "displayData.css"?>
</style>
<!-- <h1> Enter Book Search Info</h1> -->
<br/>
<br/>
<center>
  <div class="container">
            <form action="https://asecondlife.me/wp-content/plugins/custom/bookSearchResult.php" method="get">
                <div>
                <!-- <fieldset> -->
                   
                    <p>

                        <label for="category">Category:</label>
                        <select  name="category" id="category" required>
                            <option value="">Select Category </option>
                            <?php
                                $result = $wpdb->get_results("SELECT bookCategory FROM bookCategory");
                                foreach ($result as $row) {
                                $category = $row->bookCategory;
                                echo '<option value = ' . $category . '>' . $category . '</option>';
                               }
                               ?>
                        </select>
     
        </p>
        <p>
            <label for="grade">Grade:</label>
            <select " name="grade" id="grade" required>
                <option value="">Select Grade </option>
                <?php
                                $result = $wpdb->get_results("SELECT grade FROM grade");
                                foreach ($result as $row) {
                                $grade = $row->grade;
                                echo '<option value = ' . $grade . '>' . $grade . '</option>';
                               }
                               ?>
            </select>
        </p>
        
        <!-- </fieldset> -->
        <input type="submit" id="submitBtn" name="submit" value="Submit" />
        </div>
</center>
</br>
</br>
</form>
 </div>


<?php
}/*function*/
add_shortcode('displayData', 'displayData');
?>