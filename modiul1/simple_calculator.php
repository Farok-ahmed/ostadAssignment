<!DOCTYPE html>
<html lang="en">
<head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title> simple calculator</title>
</head>
<body>

        <div class="continer">
            <div class="row">
                <form method="post">
                        <input type="number" name="num1" placeholder="Enter first number" id=""></br></br>
                        <input type="number" name="num2" placeholder="Enter secound number" id=""></br></br>
                        <select name="operation" id="">
                                <option value="add">addition</option>
                                <option value="sub">subtraction</option>
                                <option value="multi">multiplication</option>
                                <option value="divi">division</option>
                        </select></br></br>
                        <input type="submit" value="Calculator">
                </form>
             </div>
             <div class="row">
                <div id="result">
                        <?php
                        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                            $num1 = $_POST['num1'];
                            $num2 = $_POST['num2'];
                            $operation = $_POST['operation'];

                            switch ($operation) {
                                case 'add':
                                    $result = $num1 + $num2;
                                    echo "Result: $result";
                                    break;
                                case 'sub':
                                    $result = $num1 - $num2;
                                    echo "Result: $result";
                                    break;
                                case 'multi':
                                    $result = $num1 * $num2;
                                    echo "Result: {$result}";
                                    break;
                                case 'divi':
                                    if ($num2 != 0) {
                                        $result = $num1 / $num2;
                                        echo "Result: {$result}";
                                    } else {
                                        echo 'Error: Division by zero!';
                                    }
                                    break;
                            }
                        }
                        ?>
                </div>
             </div>
        </div>
        
</body>
</html>
