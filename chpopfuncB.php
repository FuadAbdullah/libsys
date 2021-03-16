<?php

while ($_rowsB = mysqli_fetch_assoc($_queryB))
          {
            switch($_getOptionB)
            {
              case "genre":
                $_xvalB = $_rowsB['book_genre'];
                $_yvalB = $_rowsB['book_count'];
              break;
              case "priority":
                $_xvalB = $_rowsB['priority'];
                $_yvalB = $_rowsB['book_count'];
              break;
              case "c_gender":
                $_xvalB = $_rowsB['client_gender'];
                $_yvalB = $_rowsB['client_count'];
              break;
              case "c_dob":
                $_xvalB = $_rowsB['client_dob'];
                $_yvalB = $_rowsB['client_count'];
              break;
              case "c_state":
                $_xvalB = $_rowsB['client_state'];
                $_yvalB = $_rowsB['client_count'];
              break;
              case "l_gender":
                $_xvalB = $_rowsB['librarian_gender'];
                $_yvalB = $_rowsB['librarian_count'];
              break;
              case "l_dob":
                $_xvalB = $_rowsB['librarian_dob'];
                $_yvalB = $_rowsB['librarian_count'];
              break;
              case "l_state":
                $_xvalB = $_rowsB['librarian_state'];
                $_yvalB = $_rowsB['librarian_count'];
              break;
              case "a_gender":
                $_xvalB = $_rowsB['admin_gender'];
                $_yvalB = $_rowsB['admin_count'];
              break;
              case "a_dob":
                $_xvalB = $_rowsB['admin_dob'];
                $_yvalB = $_rowsB['admin_count'];
              break;
              case "a_state":
                $_xvalB = $_rowsB['admin_state'];
                $_yvalB = $_rowsB['admin_count'];
              break;
              default:
                $_xvalB = $_rowsB['book_genre'];
                $_yvalB = $_rowsB['book_count'];
            }

            if(++$_counterB == $_numrowsB)
            {
              echo "['" . $_xvalB . "', " . $_yvalB . ", '" . randomHex() . "']";
            }
            else
            {
              echo "['" . $_xvalB . "', " . $_yvalB . ", '" . randomHex() . "'],";
            }
            
          }

?>