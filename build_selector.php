<?php 

require 'config/db_conn.php';

// provides total_pages variable
require 'calculate_number_of_pages.php';

// create previous page button
$output .= "<span class = 'btn z-depth-1 pagination_next_prev_link' id='previous_page_button'>Previous</span>";

for ($i = 1; $i <= $total_pages; $i++) {
          $output .= "<span class='btn z-depth-1 pagination_number_link' id='".$i."'>".$i."</span>";  
}

// create next page button
$output .= "<span class = 'btn z-depth-1 pagination_next_prev_link' id='next_page_button'>Next</span>";

echo $output;

?>