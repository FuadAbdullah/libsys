<?php

while ($_rowsA = mysqli_fetch_assoc($_queryA))
          {
            switch($_getOptionA)
            {
              case "genre":
                $_xvalA = $_rowsA['book_genre'];
                $_yvalA = $_rowsA['book_count'];
              break;
              case "priority":
                $_xvalA = $_rowsA['priority'];
                $_yvalA = $_rowsA['book_count'];
              break;
              case "c_gender":
                $_xvalA = $_rowsA['client_gender'];
                $_yvalA = $_rowsA['client_count'];
              break;
              case "c_dob":
                $_xvalA = $_rowsA['client_dob'];
                $_yvalA = $_rowsA['client_count'];
              break;
              case "c_state":
                $_xvalA = $_rowsA['client_state'];
                $_yvalA = $_rowsA['client_count'];
              break;
              case "l_gender":
                $_xvalA = $_rowsA['librarian_gender'];
                $_yvalA = $_rowsA['librarian_count'];
              break;
              case "l_dob":
                $_xvalA = $_rowsA['librarian_dob'];
                $_yvalA = $_rowsA['librarian_count'];
              break;
              case "l_state":
                $_xvalA = $_rowsA['librarian_state'];
                $_yvalA = $_rowsA['librarian_count'];
              break;
              case "a_gender":
                $_xvalA = $_rowsA['admin_gender'];
                $_yvalA = $_rowsA['admin_count'];
              break;
              case "a_dob":
                $_xvalA = $_rowsA['admin_dob'];
                $_yvalA = $_rowsA['admin_count'];
              break;
              case "a_state":
                $_xvalA = $_rowsA['admin_state'];
                $_yvalA = $_rowsA['admin_count'];
              break;
              default:
                $_xvalA = $_rowsA['book_genre'];
                $_yvalA = $_rowsA['book_count'];
            }

            if(++$_counterA == $_numrowsA)
            {
              echo "['" . $_xvalA . "', " . $_yvalA . ", '" . randomHex() . "']";
            }
            else
            {
              echo "['" . $_xvalA . "', " . $_yvalA . ", '" . randomHex() . "'],";
            }
            
          }

?>