<?php

//Switch module to swap between different variables to be displayed on chart
//Core module of this feature
switch($_getOptionC)
{
  //For 'Genre' option
  case "genre":
    $_sqlC = "SELECT
            bk_genre AS book_genre,
            COUNT(*) AS book_count
            FROM book_t
            GROUP BY bk_genre";
    $_titleC = "Chart of Book Genres Against Number of Books for Each Genre";
    //$_subtitle = "Sorted in Ascending Alphabetical Order of the Genres";
    $_filterdispC = "Genre";
    $_xaxisC = "Genre";
    $_yaxisC = "Number of Books";
    break;
  //For 'Priority' option
   case "priority":
    $_sqlC = "SELECT
            CASE 
                WHEN bk_priority = 1 THEN '14 Days Limit'
                WHEN bk_priority = 2 THEN '10 Days Limit'
                WHEN bk_priority = 3 THEN '7 Days Limit'
                WHEN bk_priority = 4 THEN '5 Days Limit'
                WHEN bk_priority = 5 THEN '3 Days Limit'
          END AS priority,
            COUNT(*) AS book_count
            FROM book_t
            GROUP BY bk_priority
            ORDER BY bk_priority DESC";
    $_titleC = "Chart of Book Priority Against Number of Books for Each Priority";
    //$_subtitle = "Sorted in Ascending Numerical Order of the Days Limit";
    $_filterdispC = "Priority";
    $_xaxisC = "Priority";
    $_yaxisC = "Number of Books";
    break;
    ///////////////////////////////////////////////////////////////////////////////////////////////
    //////////////////////////////////CLIENT BLOCK////////////////////////////////////////////////
  case "c_gender":
    $_sqlC = "SELECT   
            cl_gender AS client_gender,
            COUNT(*) AS client_count
            FROM client_t
            GROUP BY cl_gender"; 
    $_titleC = "Chart of Client Gender Against Number of Clients for Each Gender";
    //$_subtitle = "Sorted in Ascending Numerical Order of the Days Limit";
    $_filterdispC = "Gender";
    $_xaxisC = "Gender";
    $_yaxisC = "Number of Clients";
    break;
  case "c_dob":
    $_sqlC = "SELECT
            CASE
            WHEN cl_dob BETWEEN '1960-01-01' AND '1969-12-31' THEN 'Born in the 60s'
            WHEN cl_dob BETWEEN '1970-01-01' AND '1979-12-31' THEN 'Born in the 70s'
            WHEN cl_dob BETWEEN '1980-01-01' AND '1989-12-31' THEN 'Born in the 80s'
            WHEN cl_dob BETWEEN '1990-01-01' AND '1999-12-31' THEN 'Running in the 90s'
            WHEN cl_dob BETWEEN '2000-01-01' AND '2009-12-31' THEN 'Born in the 2000s'
            WHEN cl_dob BETWEEN '2010-01-01' AND '2019-12-31' THEN 'Born in the 2010s'
            WHEN cl_dob BETWEEN '2020-01-01' AND '2029-12-31' THEN 'Born in the 2020s'
            END AS client_dob,
            COUNT(*) AS client_count
            from client_t
            GROUP BY client_dob
            ORDER BY cl_dob"; 
    $_titleC = "Chart of Client Birth Date Against Number of Clients for Each Year Range";
    //$_subtitle = "Sorted in Ascending Numerical Order of the Days Limit";
    $_filterdispC = "Birth Date";
    $_xaxisC = "Birth Date";
    $_yaxisC = "Number of Clients";
    break;
    case "c_state":
    $_sqlC = "SELECT
      cl_state AS client_state,
            COUNT(*) AS client_count
            from client_t
            GROUP BY client_state
            ORDER BY client_state"; 
    $_titleC = "Chart of Client State Area Against Number of Clients for Each State";
    //$_subtitle = "Sorted in Ascending Numerical Order of the Days Limit";
    $_filterdispC = "State";
    $_xaxisC = "State";
    $_yaxisC = "Number of Clients";
    break;
    //////////////////////////////////CLIENT BLOCK END//////////////////////////////////////////////
    ///////////////////////////////////////////////////////////////////////////////////////////////
    ///////////////////////////////////////////////////////////////////////////////////////////////
    //////////////////////////////////LIBRARIAN BLOCK/////////////////////////////////////////////
  case "l_gender":
    $_sqlC = "SELECT   
            lb_gender AS librarian_gender,
            COUNT(*) AS librarian_count
            FROM librarian_t
            GROUP BY lb_gender"; 
    $_titleC = "Chart of Librarian Gender Against Number of Librarians for Each Gender";
    //$_subtitle = "Sorted in Ascending Numerical Order of the Days Limit";
    $_filterdispC = "Gender";
    $_xaxisC = "Gender";
    $_yaxisC = "Number of Librarians";
    break;
  case "l_dob":
    $_sqlC = "SELECT
            CASE
            WHEN lb_dob BETWEEN '1960-01-01' AND '1969-12-31' THEN 'Born in the 60s'
            WHEN lb_dob BETWEEN '1970-01-01' AND '1979-12-31' THEN 'Born in the 70s'
            WHEN lb_dob BETWEEN '1980-01-01' AND '1989-12-31' THEN 'Born in the 80s'
            WHEN lb_dob BETWEEN '1990-01-01' AND '1999-12-31' THEN 'Running in the 90s'
            WHEN lb_dob BETWEEN '2000-01-01' AND '2009-12-31' THEN 'Born in the 2000s'
            WHEN lb_dob BETWEEN '2010-01-01' AND '2019-12-31' THEN 'Born in the 2010s'
            WHEN lb_dob BETWEEN '2020-01-01' AND '2029-12-31' THEN 'Born in the 2020s'
            END AS librarian_dob,
            COUNT(*) AS librarian_count
            from librarian_t
            GROUP BY librarian_dob
            ORDER BY lb_dob"; 
    $_titleC = "Chart of Librarian Birth Date Against Number of Librarians for Each Year Range";
    //$_subtitle = "Sorted in Ascending Numerical Order of the Days Limit";
    $_filterdispC = "Birth Date";
    $_xaxisC = "Birth Date";
    $_yaxisC = "Number of Librarians";
    break;
    case "l_state":
    $_sqlC = "SELECT
      lb_state AS librarian_state,
            COUNT(*) AS librarian_count
            from librarian_t
            GROUP BY librarian_state
            ORDER BY librarian_state"; 
    $_titleC = "Chart of Librarian State Area Against Number of Librarians for Each State";
    //$_subtitle = "Sorted in Ascending Numerical Order of the Days Limit";
    $_filterdispC = "State";
    $_xaxisC = "State";
    $_yaxisC = "Number of Librarians";
    break;
    //////////////////////////////////LIBRARIAN BLOCK END///////////////////////////////////////////
    ///////////////////////////////////////////////////////////////////////////////////////////////
    ///////////////////////////////////////////////////////////////////////////////////////////////
    //////////////////////////////////ADMIN BLOCK/////////////////////////////////////////////////
  case "a_gender":
    $_sqlC = "SELECT   
            adm_gender AS admin_gender,
            COUNT(*) AS admin_count
            FROM admin_t
            GROUP BY adm_gender"; 
    $_titleC = "Chart of Admin Gender Against Number of Admins for Each Gender";
    //$_subtitle = "Sorted in Ascending Numerical Order of the Days Limit";
    $_filterdispC = "Gender";
    $_xaxisC = "Gender";
    $_yaxisC = "Number of Admins";
    break;
  case "a_dob":
    $_sqlC = "SELECT
            CASE
            WHEN adm_dob BETWEEN '1960-01-01' AND '1969-12-31' THEN 'Born in the 60s'
            WHEN adm_dob BETWEEN '1970-01-01' AND '1979-12-31' THEN 'Born in the 70s'
            WHEN adm_dob BETWEEN '1980-01-01' AND '1989-12-31' THEN 'Born in the 80s'
            WHEN adm_dob BETWEEN '1990-01-01' AND '1999-12-31' THEN 'Running in the 90s'
            WHEN adm_dob BETWEEN '2000-01-01' AND '2009-12-31' THEN 'Born in the 2000s'
            WHEN adm_dob BETWEEN '2010-01-01' AND '2019-12-31' THEN 'Born in the 2010s'
            WHEN adm_dob BETWEEN '2020-01-01' AND '2029-12-31' THEN 'Born in the 2020s'
            END AS admin_dob,
            COUNT(*) AS admin_count
            from admin_t
            GROUP BY admin_dob
            ORDER BY adm_dob"; 
    $_titleC = "Chart of Admin Birth Date Against Number of Admins for Each Year Range";
    //$_subtitle = "Sorted in Ascending Numerical Order of the Days Limit";
    $_filterdispC = "Birth Date";
    $_xaxisC = "Birth Date";
    $_yaxisC = "Number of Admins";
    break;
    case "a_state":
    $_sqlC = "SELECT
      adm_state AS admin_state,
            COUNT(*) AS admin_count
            from admin_t
            GROUP BY admin_state
            ORDER BY admin_state"; 
    $_titleC = "Chart of Admin State Area Against Number of Admins for Each State";
    //$_subtitle = "Sorted in Ascending Numerical Order of the Days Limit";
    $_filterdispC = "State";
    $_xaxisC = "State";
    $_yaxisC = "Number of Admins";
    break;
    //////////////////////////////////ADMIN BLOCK END///////////////////////////////////////////////
    ///////////////////////////////////////////////////////////////////////////////////////////////
    //For default option when no option was selected or on first load 
  default:
    $_sqlC = "SELECT
            bk_genre AS book_genre,
            COUNT(*) AS book_count
            FROM book_t
            GROUP BY bk_genre";
    $_filterdispC = "Genre";
    $_xaxisC = "Genre";
    $_yaxisC = "Number of Books";
}

$_queryC = mysqli_query($conn1, $_sqlC);

$_numrowsC = mysqli_num_rows($_queryC);

if ($_numrowsC <= 0)
{
  echo "<script>alert('Failed to retrieve any records for chart C from the database!');</script>";
  die("<script>window.location.hostname = 'www.google.com'</script>");
}


?>