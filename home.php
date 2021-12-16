<?php
include_once "dbconnectioin.php";
session_start();
$user_data = $_SESSION['student_data'];

$curr_month= strtolower(date('M'));
$stm=$pdoConn->query("select* from holiday where month='$curr_month'");
$res=$stm->fetchAll(PDO::FETCH_ASSOC);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?php echo $user_data['name']?> -RTU University, Kota</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="fonts/material-icon/css/material-design-iconic-font.min.css">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="js/main.js"></script>
    <script src="js/home.js"></script>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/home.css">
</head>
<body>
    <div class="main">
        <h1 style="text-align: center">Rajathan Technical University, Kota</h1>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a class="navbar-brand" href="#"></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav">
                    <li class="nav-item active">
                        <a class="nav-link" href="#" onclick="showDetails()">Home <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#" onclick="showTimetable()">Time Table</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Result
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            <a class="dropdown-item" href="result.php?sem=1&student_id=<?php echo $user_data['student_id']; ?>">1<sup>st</sup> Semester</a>
                            <a class="dropdown-item" href="result.php?sem=2&student_id=<?php echo $user_data['student_id']; ?>">2<sup>nd</sup> Semester</a>
                            <a class="dropdown-item" href="result.php?sem=3&student_id=<?php echo $user_data['student_id']; ?>">3<sup>rd</sup> Semester</a>
                            <a class="dropdown-item" href="result.php?sem=4&student_id=<?php echo $user_data['student_id']; ?>">4<sup>th</sup> Semester</a>
                            <a class="dropdown-item" href="result.php?sem=5&student_id=<?php echo $user_data['student_id']; ?>">5<sup>th</sup> Semester</a>
                            <a class="dropdown-item" href="result.php?sem=6&student_id=<?php echo $user_data['student_id']; ?>">6<sup>th</sup> Semester</a>
                        </div>
                    </li>
                </ul>
            </div>
        </nav>

        <div class="col-md-8" style="margin: auto"  id="student_details">
            <div class="card mb-3">
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-3">
                            <h6 class="mb-0">Full Name</h6>
                        </div>
                        <div class="col-sm-9 text-secondary">
                            <?php echo $user_data['name'];?>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-sm-3">
                            <h6 class="mb-0">Roll Number</h6>
                        </div>
                        <div class="col-sm-9 text-secondary">
                            <?php echo $user_data['roll_no'];?>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-sm-3">
                            <h6 class="mb-0">Year</h6>
                        </div>
                        <div class="col-sm-9 text-secondary">
                            <?php echo $user_data['year'];?>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-sm-3">
                            <h6 class="mb-0">Mobile</h6>
                        </div>
                        <div class="col-sm-9 text-secondary">
                            N/A
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-sm-3">
                            <h6 class="mb-0">Address</h6>
                        </div>
                        <div class="col-sm-9 text-secondary">
                            Jodhpur
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <div class="time-table" id="time-table">
           <div class="js-calendar"></div>
            <div class="indication">

                <div class="calendar-day indication-holiday">Holidays</div>
                <div class="calendar-day indication-today">Today</div>
            </div>

        </div>




 <script>
    function showTimetable() {
        document.getElementById('time-table').style.display="block";
            document.getElementById('student_details').style.display="none";


    }
    function showDetails() {
        document.getElementById('student_details').style.display="block";
        document.getElementById('time-table').style.display="none";

    }
    (function(root, undefined) {
        function parse(str) {
            if ( str.charAt(0) === '?' ) {
                str = str.replace('?', '');
            }

            const result = {};

            str.split('&')
                .forEach((q) => {
                    const [key, value] = q.split('=');
                    result[key] = value;
                });

            return result;
        }

        root.qs = {
            parse
        };
    })(window);

    ;(function(month, undefined) {
        const months = ['january', 'february', 'march', 'april', 'may', 'june', 'july', 'august', 'september', 'october', 'november', 'december'];

        const $container = document.querySelector('.js-calendar');
        const days = [];

        const offset = (() => {
            const date = new Date();
            date.setMonth(month);
            date.setDate(1);
            return date.getDay();
        })();

        for ( let i = 0; i < offset; i++ ) {
            days.push(null);
        }

        for ( let i = 1; i <= daysInMonths(month); i++ ) {
            days.push(i);
        }

        render({days});

        function render({days}) {
            $container.innerHTML = `
      <h1>${ucfirst(months[month])}</h1>
      <div class="calendar">
        <div class="calendar-headings">
          <div class="calendar-heading">Sunday</div>
          <div class="calendar-heading">Monday</div>
          <div class="calendar-heading">Tuesday</div>
          <div class="calendar-heading">Wednesday</div>
          <div class="calendar-heading">Thursday</div>
          <div class="calendar-heading">Friday</div>
          <div class="calendar-heading">Saturday</div>
        </div>

        <div class="calendar-days">
          ${days.map((day) => {
                let classNames = 'calendar-day';
                let thisDay = day;
                let event='';
                if ( thisDay === new Date().getDate() ) classNames += ' is-active';

                <?php foreach ($res as $event){ ?>
                if( thisDay === <?php echo $event['date'];?> ) {
                    event+="<?php echo $event['event'] ?>";

                    classNames+= ' is-holiday';

                }
                <?php }?>

                return `<div class="${classNames}">${thisDay || ''}<br> ${event}</div>`
            }).join('\n')}


        </div>
      </div>
    `;
        }

        function daysInMonths(date = new Date()) {
            if ( !(date instanceof Date) ) {
                const month = date;
                date = new Date();
                date.setMonth(month);

            }

            switch (date.getMonth()) {
                case 1:
                    return date.getFullYear() % 4 ? 28 : 29;
                case 3:
                case 5:
                case 8:
                case 10:
                    return 30;
                default:
                    return 31;
            }
        }

        function ucfirst(str) {
            return str.charAt(0).toUpperCase() + str.slice(1);
        }
    })(location.search.length ? qs.parse(location.search).month - 1 : new Date().getMonth());

 </script>


 </body>
</html>
