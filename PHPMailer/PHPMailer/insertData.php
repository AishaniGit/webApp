<?php
/*
plugin name: Insert Data
*/

$path = preg_replace('/wp-content.*$/', '', __DIR__);
require_once($path . '/wp-load.php');

function insertData()
{
    

    if (isset($_POST['submit'])) {

        //echo 'submitted';
        $inserReselts="";
        $donername = $_POST['donername'];
        $category = $_POST['category'];
        $grade = $_POST['grade'];
        $bookname = $_POST['bookname'];
        $publishYr = $_POST['publishYr'];
        //$comments = $_POST['comments'];
        $comments = (strlen($_POST['comments']) > 300) ? substr($_POST['comments'],0,297).'...' : $_POST['comments'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        //echo $donername;
        //echo $bookname;
  // Validate email
        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {

            global $wpdb;

            $sql = $wpdb->insert("bookInfo", array("donerName" => $donername, "bookCategory" => $category, "grade" => $grade, "bookName" => $bookname, "publishYear" => $publishYr, "comments" => $comments, "email" => $email, "phone" => $phone));
        // echo $wpdb->show_errors();
         //echo $wpdb->print_error();
        // echo $wpdb->last_errors();
            if ($sql == true) {
                $inserReselts='Details Updated';
            } else {
                $inserReselts='Details could not be Updated , please contact Admin';
            }
            
            echo "<h3><center>" . $inserReselts . "<center></h3>";
          
        } //validate email
        else {
            echo ($email ." is not a valid email address");
        }
    } //submit
?>
    <style>
        <?php include "insertData.css" ?>
    </style>
    <?php
    global $wpdb;
    ?>
    <form action="" method="post">
        <fieldset>
            <p>
                <label for="donername">Doner Name:</label>
                <input type="text" placeholder="Doner Name" name="donername" id="donername" align="left"  />
            </p>
            <p>
                <label for="category">Category:</label>
                <select name="category" id="category" required>
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
                <select name="grade" id="grade" required>
                    <option value="">Select Grade</option>
                    <?php
                    $result_grade = $wpdb->get_results("SELECT grade FROM grade");
                    foreach ($result_grade as $row) {
                        $grade = $row->grade;
                        echo '<option value = ' . $grade . '>' . $grade . '</option>';
                    }
                    ?>
                </select>
            </p>
            <p>
                <label for="bookName:">BookName:</label>
                <input type="text" placeholder="BookName" name="bookname" id="bookname" align="left" required/>
            </p>
            <p>
                <label for="publishYr">PublishYr:</label>
                <input type="text" placeholder="Year the book was published" name="publishYr" id="publishYr" align="left" />
            </p>
            <p>
                <label for="Email">Email:</label>
                <input type="text" placeholder="Your email Id" name="email" id="email" align="left" required/>
            </p>
            <p>
                <label for="phone">Phone:</label>
                <input type="text" placeholder="Your Phone number(optional)" name="phone" id="phone" align="left" />
            </p>
            <p>
                <label for="comments">Comments:</label>
                <textarea id="comment" placeholder="Enter any comments in 300 chars" name="comments" cols="10" rows="2" align="left"></textarea>
            </p>
            <p>
                <input type="submit" name="submit" value="Submit" align="right"/>
            </p>
        </fieldset>
    </form>
    </body>
<?php
}
add_shortcode('insertData', 'insertData');
?>