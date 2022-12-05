<style>
/* CALENDAR */
#calendar {
  margin-top: 40px;
}

#calendar h3 {
  margin-bottom: 30px;
}

#calendar a {
  color: rgb(0, 122, 200);
}

#calendar a:hover {
  color: rgb(0, 47, 94);
}

#calendar th {
  height: 30px;
  text-align: center;
  color: rgb(0, 47, 94);
}

#calendar td {
  height: 100px;
}

#calendar .today {
  background: rgba(0, 122, 200, 25%);
}

#calendar th:nth-of-type(1),
#calendar td:nth-of-type(1) {
  color: rgb(0, 122, 200);
}

#calendar th:nth-of-type(7),
#calendar td:nth-of-type(7) {
  color: rgb(0, 122, 200);
}

table {
  width: 100%;
  table-layout: fixed;
}

td {
  width: 15%;
}
</style>

<?php
#sessions
// Set your timezone
date_default_timezone_set('America/Los_Angeles');

// Get prev & next month
if (isset($_GET['m_y'])) {
  $m_y = $_GET['m_y'];
} else {
// This month
  $m_y = date('m-Y');
}

$calDate = explode("-", $m_y);
$calMonth = $calDate[1]; // day

// Check format
$timestamp = strtotime($m_y . '-01');
if ($timestamp === false) {
  $m_y = date('Y-m');
  $timestamp = strtotime($m_y . '-01');
}

// Today
$today = date('Y-m-j', time());

// For H3 title
$html_title = date('F Y', $timestamp);

// Create prev & next month link
$prev = date('Y-m', strtotime('-1 month', $timestamp));
$next = date('Y-m', strtotime('+1 month', $timestamp));

// Number of days in the month
$day_count = date('t', $timestamp);

// 0:Sun 1:Mon 2:Tue ...
$str = date('w', $timestamp);

// Create Calendar!!
$weeks = array();
$week = '';

// Add empty cell
$week .= str_repeat('<td></td>', $str);
for ( $day = 1; $day <= $day_count; $day++, $str++) {
  $date = $m_y . '-' . $day;
  if ($today == $date) {
    $week .= '<td class="today">' . $day;
  } else {
    $week .= '<td>' . $day;
  }

  
  //add reservation indicator
  foreach($all_reservations as $res) {
    $resDate = explode("/", $res->date);
    $resDay = $resDate[1]; // day
    $resMonth = $resDate[0]; //month

      if ($res->roomID == $roomID and $resMonth == $calMonth) {
        if ($resDay == $day) {
          $week .= '<div style="background-color: #41B6FF; border-radius:5px; padding-left: 5px; margin-bottom:2px; color: black">
           Reserved from ' . date("g:ia", strtotime($res->startTime)) . ' to ' . date("g:ia", strtotime( $res->endTime)) . '</div>';
        }
    }
  }

  $week .= '</td>';
  // End of the week OR End of the month
  if ($str % 7 == 6 || $day == $day_count) {
    if ($day == $day_count) {
      // Add empty cell
      $week .= str_repeat('<td></td>', 6 - ($str % 7));
    }
    $weeks[] = '<tr>' . $week . '</tr>';
    // Prepare for new week
    $week = '';
  }
}
?>

<div class="container" id="calendar">
  <h2 style="text-align: center;">
    <a href="?m_y=<?php echo $prev; ?>&roomID=<?php echo $roomID; ?>" style="float: left;">&lt;</a>
    <?php echo $html_title; ?>
    <a href="?m_y=<?php echo $next; ?>&roomID=<?php echo $roomID; ?>" class="float-end">&gt;</a>
    <a href="?m_y=<?php echo $today; ?>&roomID=<?php echo $roomID; ?>"  class="btn btn-light float-end me-2" type="button">today</a>
  </h2>
  <table class="table table-bordered">
    <tr>
      <th>S</th>
      <th>M</th>
      <th>T</th>
      <th>W</th>
      <th>T</th>
      <th>F</th>
      <th>S</th>
    </tr>
    <?php foreach ($weeks as $week) {
        echo $week;
    } ?>
  </table>
</div>
