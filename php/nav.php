<?php
    // Switch statement to choose diff active pages
    switch ($active){
        case "dash":
           echo "<li class=\"active\">
                    <a href=\"http://www.ricardoriveron.com/projectman/index.php\"><i class=\"fa fa-fw fa-dashboard\"></i> Dashboard</a>
                </li>
                <li>
                    <a href=\"http://www.ricardoriveron.com/projectman/tasks.php\"><i class=\"fa fa-fw fa-bar-chart-o\"></i> Tasks</a>
                </li>
                <li>
                    <a href=\"http://www.ricardoriveron.com/projectman/communication.php\"><i class=\"fa fa-fw fa-desktop\"></i> Communication</a>
                </li>
                <li>
                    <a href=\"http://www.ricardoriveron.com/projectman/calendar.php\"><i class=\"fa fa-fw fa-calendar\"></i> Calendar</a>
                </li>
                <li>
                    <a href=\"http://www.ricardoriveron.com/projectman/faq.php\"><i class=\"fa fa-fw fa-book\"></i> Pam's Notebook</a>
                </li>
                <li>
                    <a href=\"http://www.ricardoriveron.com/projectman/roster.php\"><i class=\"fa fa-list-alt\"></i> Roster</a>
                </li>
                <li>
                    <a href=\"http://www.ricardoriveron.com/projectman/huddle.php\"><i class=\"fa fa-users\"></i> Huddles</a>
                </li>";
            break;
        case "task":
           echo "<li>
                    <a href=\"http://www.ricardoriveron.com/projectman/index.php\"><i class=\"fa fa-fw fa-dashboard\"></i> Dashboard</a>
                </li>
                <li class=\"active\">
                    <a href=\"http://www.ricardoriveron.com/projectman/tasks.php\"><i class=\"fa fa-fw fa-bar-chart-o\"></i> Tasks</a>
                </li>
                <li>
                    <a href=\"http://www.ricardoriveron.com/projectman/communication.php\"><i class=\"fa fa-fw fa-desktop\"></i> Communication</a>
                </li>
                <li>
                    <a href=\"http://www.ricardoriveron.com/projectman/calendar.php\"><i class=\"fa fa-fw fa-calendar\"></i> Calendar</a>
                </li>
                <li>
                    <a href=\"http://www.ricardoriveron.com/projectman/faq.php\"><i class=\"fa fa-fw fa-book\"></i>Pam's Notebook</a>
                </li>
                <li>
                    <a href=\"http://www.ricardoriveron.com/projectman/roster.php\"><i class=\"fa fa-list-alt\"></i> Roster</a>
                </li>
                <li>
                    <a href=\"http://www.ricardoriveron.com/projectman/huddle.php\"><i class=\"fa fa-users\"></i> Huddles</a>
                </li>";
            break;
        case "comm":
           echo "<li>
                    <a href=\"http://www.ricardoriveron.com/projectman/index.php\"><i class=\"fa fa-fw fa-dashboard\"></i> Dashboard</a>
                </li>
                <li>
                    <a href=\"http://www.ricardoriveron.com/projectman/tasks.php\"><i class=\"fa fa-fw fa-bar-chart-o\"></i> Tasks</a>
                </li>
                <li class=\"active\">
                    <a href=\"http://www.ricardoriveron.com/projectman/communication.php\"><i class=\"fa fa-fw fa-desktop\"></i> Communication</a>
                </li>
                <li>
                    <a href=\"http://www.ricardoriveron.com/projectman/calendar.php\"><i class=\"fa fa-fw fa-calendar\"></i> Calendar</a>
                </li>
                <li>
                    <a href=\"http://www.ricardoriveron.com/projectman/faq.php\"><i class=\"fa fa-fw fa-book\"></i> Pam's Notebook</a>
                </li>
                <li>
                    <a href=\"http://www.ricardoriveron.com/projectman/roster.php\"><i class=\"fa fa-list-alt\"></i> Roster</a>
                </li>
                <li>
                    <a href=\"http://www.ricardoriveron.com/projectman/huddle.php\"><i class=\"fa fa-users\"></i> Huddles</a>
                </li>";
            break;
        case "calendar":
           echo "<li>
                    <a href=\"http://www.ricardoriveron.com/projectman/index.php\"><i class=\"fa fa-fw fa-dashboard\"></i> Dashboard</a>
                </li>
                <li>
                    <a href=\"http://www.ricardoriveron.com/projectman/tasks.php\"><i class=\"fa fa-fw fa-bar-chart-o\"></i> Tasks</a>
                </li>
                <li>
                    <a href=\"http://www.ricardoriveron.com/projectman/communication.php\"><i class=\"fa fa-fw fa-desktop\"></i> Communication</a>
                </li>
                <li class=\"active\">
                    <a href=\"http://www.ricardoriveron.com/projectman/calendar.php\"><i class=\"fa fa-fw fa-calendar\"></i> Calendar</a>
                </li>
                <li>
                    <a href=\"http://www.ricardoriveron.com/projectman/faq.php\"><i class=\"fa fa-fw fa-book\"></i> Pam's Notebook</a>
                </li>
                <li>
                    <a href=\"http://www.ricardoriveron.com/projectman/roster.php\"><i class=\"fa fa-list-alt\"></i> Roster</a>
                </li>
                <li>
                    <a href=\"http://www.ricardoriveron.com/projectman/huddle.php\"><i class=\"fa fa-users\"></i> Huddles</a>
                </li>";
            break;
        case "pam":
           echo "<li>
                    <a href=\"http://www.ricardoriveron.com/projectman/index.php\"><i class=\"fa fa-fw fa-dashboard\"></i> Dashboard</a>
                </li>
                <li>
                    <a href=\"http://www.ricardoriveron.com/projectman/tasks.php\"><i class=\"fa fa-fw fa-bar-chart-o\"></i> Tasks</a>
                </li>
                <li>
                    <a href=\"http://www.ricardoriveron.com/projectman/communication.php\"><i class=\"fa fa-fw fa-desktop\"></i> Communication</a>
                </li>
                <li>
                    <a href=\"http://www.ricardoriveron.com/projectman/calendar.php\"><i class=\"fa fa-fw fa-calendar\"></i> Calendar</a>
                </li>
                <li class=\"active\">
                    <a href=\"http://www.ricardoriveron.com/projectman/faq.php\"><i class=\"fa fa-fw fa-book\"></i> Pam's Notebook</a>
                </li>
                <li>
                    <a href=\"http://www.ricardoriveron.com/projectman/roster.php\"><i class=\"fa fa-list-alt\"></i> Roster</a>
                </li>
                <li>
                    <a href=\"http://www.ricardoriveron.com/projectman/huddle.php\"><i class=\"fa fa-users\"></i> Huddles</a>
                </li>";
            break;
        case "roster":
           echo "<li>
                    <a href=\"http://www.ricardoriveron.com/projectman/index.php\"><i class=\"fa fa-fw fa-dashboard\"></i> Dashboard</a>
                </li>
                <li>
                    <a href=\"http://www.ricardoriveron.com/projectman/tasks.php\"><i class=\"fa fa-fw fa-bar-chart-o\"></i> Tasks</a>
                </li>
                <li>
                    <a href=\"http://www.ricardoriveron.com/projectman/communication.php\"><i class=\"fa fa-fw fa-desktop\"></i> Communication</a>
                </li>
                <li>
                    <a href=\"http://www.ricardoriveron.com/projectman/calendar.php\"><i class=\"fa fa-fw fa-calendar\"></i> Calendar</a>
                </li>
                <li>
                    <a href=\"http://www.ricardoriveron.com/projectman/faq.php\"><i class=\"fa fa-fw fa-book\"></i> Pam's Notebook</a>
                </li>
                <li class=\"active\">
                    <a href=\"http://www.ricardoriveron.com/projectman/roster.php\"><i class=\"fa fa-list-alt\"></i> Roster</a>
                </li>
                <li>
                    <a href=\"http://www.ricardoriveron.com/projectman/huddle.php\"><i class=\"fa fa-users\"></i> Huddles</a>
                </li>";
            break;
        case "huddle":
           echo "<li>
                    <a href=\"http://www.ricardoriveron.com/projectman/index.php\"><i class=\"fa fa-fw fa-dashboard\"></i> Dashboard</a>
                </li>
                <li>
                    <a href=\"http://www.ricardoriveron.com/projectman/tasks.php\"><i class=\"fa fa-fw fa-bar-chart-o\"></i> Tasks</a>
                </li>
                <li>
                    <a href=\"http://www.ricardoriveron.com/projectman/communication.php\"><i class=\"fa fa-fw fa-desktop\"></i> Communication</a>
                </li>
                <li>
                    <a href=\"http://www.ricardoriveron.com/projectman/calendar.php\"><i class=\"fa fa-fw fa-calendar\"></i> Calendar</a>
                </li>
                <li>
                    <a href=\"http://www.ricardoriveron.com/projectman/faq.php\"><i class=\"fa fa-fw fa-book\"></i> Pam's Notebook</a>
                </li>
                <li>
                    <a href=\"http://www.ricardoriveron.com/projectman/roster.php\"><i class=\"fa fa-list-alt\"></i> Roster</a>
                </li>
                <li class=\"active\">
                    <a href=\"http://www.ricardoriveron.com/projectman/huddle.php\"><i class=\"fa fa-users\"></i> Huddles</a>
                </li>";
            break;
    }
?>