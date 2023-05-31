<?php
  $response = check();
  echo json_encode($response);

  function check() {
    $firstName = $_POST["firstname"]; $lastName = $_POST["lastname"];
    $number1 = $_POST["number1"]; $number2 = $_POST["number2"]; $number3 = $_POST["number3"]; $number4 = $_POST["number4"]; $number5 = $_POST["number5"];
    $dateMM = $_POST["date-mm"]; $dateYY = $_POST["date-yy"];
    $cvv = $_POST["cvv"];
    $cY = substr(date('y'), -2);
    
    if (strlen($firstName) < 1) {
      return "First Name is empty.";
    }
    else if (strlen($lastName) < 1) {
      return "Last Name is empty.";
    }
    else if(strlen($number1)!=4||strlen($number2)!=4||strlen($number3)!=4||strlen($number4)!=4)
    {
      return "Please enter four numbers in each card number field.";
    }
    else if(strlen($dateMM)!=2||strlen($dateYY)!=2)
    {
      return "Please enter two digits in each field for the expiry date.";
    }
    else if ($dateYY<$cY||($dateMM < date('m')&&$dateYY == $cY))
        {
          return "The expiration date must be after the current month.";
        }
    else if(strlen($cvv)<3||strlen($cvv)>4)
    {
      if(strlen($cvv)<3)
      {
            return "Please enter three digits in the CVV field";
      }
      else if(strlen($number5)!=3 && strlen($cvv)!=4)
      {
        return "Please enter four digits in the CVV field for an American Express card.";
      }
    }
    else if(strlen($number5)!=3 && strlen($cvv)==4)
    {
      return "Please enter three digits in the fifth Card Number field for an American Express card";
    }
    else return "[green]All inputs are correct!";
  }
?>
