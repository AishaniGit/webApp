<?php
/*
plugin name: Stationery Input Information
*/

$path = preg_replace('/wp-content.*$/', '', __DIR__);
require_once($path . '/wp-load.php');

function stationeryInputInformation()
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

                        <label for="stationeryCategory">Stationery Category:</label>
                        <select  name="stationeryCategory" id="category" required>
                            <option value="">Select Stationery Category </option>
                            <?php
                                $result = $wpdb->get_results("SELECT stationeryType FROM stationeryTypes");
                                foreach ($result as $row) {
                                $option = $row->stationeryType;
                                echo '<option value = ' . $option . '>' . $option . '</option>';
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
add_shortcode('stationeryInputInformation', 'stationeryInputInformation');
?>