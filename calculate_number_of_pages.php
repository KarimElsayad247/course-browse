<?php

require 'config/db_conn.php';

// Define the number of records to be displayed per page
// this decides the number of buttons to make
$records_per_page = 5;

// the output that will be returned to Ajax call in HTML format
$output = '';

/*
 * now to get the total number of records to calculate the total nubmer of pages
 * that should be displayed in page selection thingy.
 * for that I define a query that calculates the number of courses,
 * devide said number by the records per page, ceil the result to get said number.
*/
// SELECT query that will get data from database
$counting_query = "SELECT COUNT(*) as total FROM course c, professor p, department d ";

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

$counting_query .= $Where_clause;

$result = mysqli_query($conn, $counting_query);
$data = mysqli_fetch_assoc($result);
$total_records = $data['total'];
$total_pages = ceil($total_records/$records_per_page);

?>