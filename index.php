<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculator</title>
    <link rel="stylesheet" href="./style.css">
</head>

<body>
    <?php
    $ans = 0;
    $error = '';

    $num1 = '';
    $num2 = '';
    $operand = '';


    class Caclulator
    {
        public $num1;
        public $num2;
        public $result;

        public $error;


        public function __construct()
        {
            $this->num1 = '';
            $this->num2 = '';
            $this->error = '';
            $this->result = '';
        }




        public function calculate($n1, $op, $n2)
        {
            $this->num1 = $n1;
            $this->num2 = $n2;

            switch ($op) {
                case '+':
                    $this->result = $this->add();
                    break;
                case '-':
                    $this->result = $this->subtract();
                    break;
                case 'x':
                    $this->result = $this->multiply();
                    break;
                case '÷':
                    if ($n2 == 0) {
                        $this->error = "<span class='error'>Division by zero is not allowed</span>";
                        break;
                    } else {
                        $this->result = $this->divide();
                    }
                    break;

                default:
                    $this->result = "Invalid Input values";
            }

            return $this->result;
        }

        public function add()
        {
            return  $this->num1 + $this->num2;
        }
        public function subtract()
        {
            return  $this->num1 - $this->num2;
        }
        public function divide()
        {
            return  $this->num1 / $this->num2;
        }
        public function multiply()
        {
            return  $this->num1 * $this->num2;
        }
    }


    ?>


    <div class="container">
        <h1>Simple Calculator App</h1>

        <div class="answer">
            <p class="result">RESULT</p>
            <p class="ans">

                <?php

                $calc = new Caclulator();

                if (isset($_POST['submit'])) {

                    $num1 = $_POST['num1'];
                    $num2 = $_POST['num2'];
                    $operand = $_POST['op'];

                    if ($num1 == '' || $num2 == '') {
                        $calc->error = '<span class="error">Missing input</span>';
                    } else {
                        $ans = $calc->calculate($num1, $operand, $num2);
                    }
                }
                echo $calc->error == '' ? $ans : $calc->error;

                ?>
            </p>

        </div>

        <form action="" method="post">
            <div class="inputs">
                <div>
                    <label for="num1">First Number</label>
                    <input type="number" placeholder="First Number" name="num1" id="num1" value="<?php echo $num1; ?>">
                </div>
                <div>
                    <label for="num">Second Number</label>
                    <input type="number" placeholder="Second Number" name="num2" id="num2" value="<?php echo $num2; ?>">
                </div>
            </div>

            <div class="checks">
                <label for="plus">+<input type="radio" value="+" name="op" id="plus" checked /></label>

                <label for="minus">-<input type="radio" value="-" name="op" id="minus" /></label>

                <label for="multiply">x<input type="radio" value="x" name="op" id="multiply" /></label>

                <label for="divide">÷<input type="radio" value="÷" name="op" id="divide" /></label>

            </div>

            <input type="submit" value="CALCULATE" name='submit' />
        </form>
    </div>
</body>

</html>