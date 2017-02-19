<?php

    
    echo "<p> This is the value passed: " . $active . "</p>";


    echo "<li class=\"active\">
        <a href=\"index.php\"><i class=\"fa fa-fw fa-dashboard\"></i> Dashboard</a>
    </li>
    <li>
        <a href=\"tasks.php\"><i class=\"fa fa-fw fa-bar-chart-o\"></i> Tasks</a>
    </li>
    <li>
        <a href=\"communication.php\"><i class=\"fa fa-fw fa-desktop\"></i> Communication </a>
    </li>
    <li>
        <a href=\"calendar.php\"><i class=\"fa fa-fw fa-calendar\"></i>Calendar </a>
    </li>
    <li>
        <a href=\"javascript:;\" data-toggle=\"collapse\" data-target=\"#demo\"><i class=\"fa fa-fw fa-arrows-v\"></i> Account <i class=\"fa fa-fw fa-caret-down\"></i></a>
        <ul id=\"demo\" class=\"collapse\">
            <li>
                <a href=\"#\">Messages</a>
            </li>
            <li>
                <a href=\"#\">Embedded Chat</a>
            </li>
        </ul>
    </li>";
?>