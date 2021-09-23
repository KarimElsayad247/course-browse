<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <!-- Any personally made CSS goes here -->
    <link rel="stylesheet" type="text/css" href="styles/style.css">

    <!-- JS code goes here -->
    <script src="scripts/jquery.js"></script>
    <script type="text/javascript" src="scripts/scritp.js"></script>

    <title>testing frameworks!</title>

    <!-- For style only: Materialize -->
    <!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="styles/materialize.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!-- Compiled and minified JavaScript -->
    <script src="scripts/materialize.min.js"></script>

  </head>
  <body class="teal lighten-5">
    <div class="container">
      <div class="before_table">
        <h1 class="">Courses</h1>
        <div class="pages_selector" id="pages_selector" >
        
        </div>
      </div>
      <nav>
        <div class="nav-wrapper">
          <form>
            <div class="input-field">
              <input id="search_box" class="white" type="search" required>
              <label class="label-icon" for="search"><i class="material-icons black-text">search</i></label>
              <i class="material-icons">close</i>
            </div>
          </form>
        </div>
      </nav>
      <table class="highlight z-depth-1 data_table white">
        <thead class="table_header">
          <tr>
              <th class="course_name">Course Name</th>
              <th class="course_description">Course Description</th>
              <th class="department_name">Professor Name</th>
              <th class="professor_name">Department Name</th>
          </tr>
        </thead>

        <tbody id="pagination_data">

        </tbody>
      </table>
    </div>
  </body>
</html>