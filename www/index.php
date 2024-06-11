<!-- put in ./www directory -->

<html>
 <head>
  <title>Hello...</title>

  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

</head>
<body>
    <div class="container">
        <h1>Hi! I'm happy</h1>

    <?php
    $conn = mysqli_connect('db', 'user', 'test', 'myDb');

    if (mysqli_connect_errno()) {
      echo "Failed to connect to MySQL: " . mysqli_connect_error();
      exit();
    }
    echo("hhh");
    $query = "SELECT * From Person";
    $result = mysqli_query($conn, $query);

    echo '<table class="table table-striped">';
    echo '<thead><tr><th></th><th>id</th><th>name</th></tr></thead>';
    while($value = $result->fetch_array())
    {
        echo '<tr>';
        echo '<td><a href="#"><span class="glyphicon glyphicon-search"></span></a></td>';
        foreach($value as $element){
            echo '<td>' . $element . '</td>';
        }

        echo '</tr>';
    }
    echo '</table>';

    $result->close();
    mysqli_close($conn);
    ?>

    </div>

    <?php
    require 'config.php';
    $connection = pg_connect("host={$config['host']} port={$config['port']} dbname={$config['database']} user={$config['user']} password={$config['password']}");

    if (!$connection) {
      echo "Failed to connect to PostgreSQL: " . pg_last_error();
      exit;
    }

    $query = "SELECT * FROM persons";
    $result = pg_query($connection, $query); 
    if (!$result) {
        echo 'Error message: ' . pg_last_error();
    }

    echo '<table class="table table-striped">';
    echo '<thead><tr><th></th><th>id</th><th>name</th></tr></thead>';
    while ($row = pg_fetch_assoc($result)) {
        echo '<tr>';
        echo '<td><a href="#"><span class="glyphicon glyphicon-search"></span></a></td>';
        echo '<td>' . $row['id'] . '</td>'; 
        echo '<td>' . $row['name'] . '</td>';
        echo '</tr>';
    }
    echo '</table>';

    pg_free_result($result);
    pg_close($connection);
    ?>

</body>
</html>
