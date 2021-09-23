<?php 

require 'config/db_conn.php';

// Define the number of records to be displayed per page
$records_per_page = 5;

// Store current page number (e.g. 1, 2, 3. etc)
$page = '';

// the output that will be returned to Ajax call in HTML format
$output = '';

// check if $POST variable is set and contains the page number required
if (isset($_POST["page"])) {
    $page = $_POST["page"];
}
else {
    $page = 1;
}

// variable used in select statemtnt to decide where to start selecting data
$start_from = ($page - 1) * $records_per_page;

// SELECT query that will get data from database
$query = "SELECT c.course_name, c.course_description, p.professor_name, d.department_name
          FROM course c, professor p, department d ";

$Where_clause = " WHERE p.professor_id = c.professor_id AND d.department_id = c.department_id ";

if($_POST['query'] != '')
{
  $Where_clause .= 
    'AND(
            UPPER(REPLACE(course_name, \' \', \'\')) LIKE UPPER("%'.str_replace(' ', '%', $_POST['query']).'%")
        OR  UPPER(REPLACE(course_description, \' \', \'\')) LIKE UPPER("%'.str_replace(' ', '%', $_POST['query']).'%")
        OR  UPPER(REPLACE(professor_name, \' \', \'\')) LIKE UPPER("%'.str_replace(' ', '%', $_POST['query']).'%")
        OR  UPPER(REPLACE(department_name, \' \', \'\')) LIKE UPPER("%'.str_replace(' ', '%', $_POST['query']).'%")
    )';
}

$final_lines = " ORDER BY c.course_id ASC
                 LIMIT $start_from, $records_per_page";

// concat all clauses to create the query
$query .= $Where_clause . $final_lines;


// execute the query and store the results
$results = mysqli_query($conn, $query);

if(!$results) {
    $output .= mysqli_error($conn);
}

// now build the output in html format
// fetch rows from result one at a time into an associative array
while ($row = mysqli_fetch_array($results)) {
    $output .= '<tr>'
                    .'<td class="course_name">' . $row["course_name"] .'</td>'
                    .'<td class="course_description">' . $row["course_description"] .'</td>'
                    .'<td class="professor_name">' . $row["professor_name"] .'</td>'
                    .'<td class="department_name">' . $row["department_name"] .'</td>'
              .'</tr>';
}

echo $output;

?>