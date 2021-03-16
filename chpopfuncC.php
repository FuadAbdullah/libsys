<?php

while ($_rowsC = mysqli_fetch_assoc($_queryC))
          {
            switch($_getOptionC)
            {
              case "genre":
                $_xvalC = $_rowsC['book_genre'];
                $_yvalC = $_rowsC['book_count'];
              break;
              case "priority":
                $_xvalC = $_rowsC['priority'];
                $_yvalC = $_rowsC['book_count'];
              break;
              case "c_gender":
                $_xvalC = $_rowsC['client_gender'];
                $_yvalC = $_rowsC['client_count'];
              break;
              case "c_dob":
                $_xvalC = $_rowsC['client_dob'];
                $_yvalC = $_rowsC['client_count'];
              break;
              case "c_state":
                $_xvalC = $_rowsC['client_state'];
                $_yvalC = $_rowsC['client_count'];
              break;
              case "l_gender":
                $_xvalC = $_rowsC['librarian_gender'];
                $_yvalC = $_rowsC['librarian_count'];
              break;
              case "l_dob":
                $_xvalC = $_rowsC['librarian_dob'];
                $_yvalC = $_rowsC['librarian_count'];
              break;
              case "l_state":
                $_xvalC = $_rowsC['librarian_state'];
                $_yvalC = $_rowsC['librarian_count'];
              break;
              case "a_gender":
                $_xvalC = $_rowsC['admin_gender'];
                $_yvalC = $_rowsC['admin_count'];
              break;
              case "a_dob":
                $_xvalC = $_rowsC['admin_dob'];
                $_yvalC = $_rowsC['admin_count'];
              break;
              case "a_state":
                $_xvalC = $_rowsC['admin_state'];
                $_yvalC = $_rowsC['admin_count'];
              break;
              default:
                $_xvalC = $_rowsC['book_genre'];
                $_yvalC = $_rowsC['book_count'];
            }

            if(++$_counterC == $_numrowsC)
            {
              echo "['" . $_xvalC . "', " . $_yvalC . ", '" . randomHex() . "']";
            }
            else
            {
              echo "['" . $_xvalC . "', " . $_yvalC . ", '" . randomHex() . "'],";
            }
            
          }

?>