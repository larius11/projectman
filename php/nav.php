<?php
    // Switch statement to choose diff active pages
    switch ($active){
        case "dash":
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
                    <a href=\"faq.php\"><i class=\"fa fa-fw fa-book\"></i>Pam's Notebook</a>
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
            break;
        case "task":
           echo "<li>
                    <a href=\"index.php\"><i class=\"fa fa-fw fa-dashboard\"></i> Dashboard</a>
                </li>
                <li class=\"active\">
                    <a href=\"tasks.php\"><i class=\"fa fa-fw fa-bar-chart-o\"></i> Tasks</a>
                </li>
                <li>
                    <a href=\"communication.php\"><i class=\"fa fa-fw fa-desktop\"></i> Communication </a>
                </li>
                <li>
                    <a href=\"calendar.php\"><i class=\"fa fa-fw fa-calendar\"></i>Calendar </a>
                </li>
                <li>
                    <a href=\"faq.php\"><i class=\"fa fa-fw fa-book\"></i>Pam's Notebook</a>
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
            break;
        case "comm":
           echo "<li>
                    <a href=\"index.php\"><i class=\"fa fa-fw fa-dashboard\"></i> Dashboard</a>
                </li>
                <li>
                    <a href=\"tasks.php\"><i class=\"fa fa-fw fa-bar-chart-o\"></i> Tasks</a>
                </li>
                <li class=\"active\">
                    <a href=\"communication.php\"><i class=\"fa fa-fw fa-desktop\"></i> Communication </a>
                </li>
                <li>
                    <a href=\"calendar.php\"><i class=\"fa fa-fw fa-calendar\"></i>Calendar </a>
                </li>
                <li>
                    <a href=\"faq.php\"><i class=\"fa fa-fw fa-book\"></i>Pam's Notebook</a>
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
            break;
        case "calendar":
           echo "<li>
                    <a href=\"http://www.ricardoriveron.com/projectman/index.php\"><i class=\"fa fa-fw fa-dashboard\"></i> Dashboard</a>
                </li>
                <li>
                    <a href=\"http://www.ricardoriveron.com/projectman/tasks.php\"><i class=\"fa fa-fw fa-bar-chart-o\"></i> Tasks</a>
                </li>
                <li>
                    <a href=\"http://www.ricardoriveron.com/projectman/communication.php\"><i class=\"fa fa-fw fa-desktop\"></i> Communication </a>
                </li>
                <li class=\"active\">
                    <a href=\"http://www.ricardoriveron.com/projectman/calendar.php\"><i class=\"fa fa-fw fa-calendar\"></i>Calendar </a>
                </li>
                <li>
                    <a href=\"http://www.ricardoriveron.com/projectman/faq.php\"><i class=\"fa fa-fw fa-book\"></i>Pam's Notebook</a>
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
            break;
        case "pam":
           echo "<li>
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
                <li class=\"active\">
                    <a href=\"faq.php\"><i class=\"fa fa-fw fa-book\"></i>Pam's Notebook</a>
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
            break;
    }
?>