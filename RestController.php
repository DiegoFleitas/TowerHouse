<?php
/**
 * Created by PhpStorm.
 * User: Diego
 * Date: 9/3/2019
 * Time: 11:39 AM
 */

require_once("Calculator.php");

if (isset($_POST['operation']) && isset($_POST['values'])) {

    $oper = $_POST['operation'];
    $values = $_POST['values'];
    $calc = new Calculator($oper, $values);

    try {
        $message = $calc->doMath();
    } catch (Exception $e) {
        $message = [
            'result' => 'Internal error.',
            'status' => 'error'
        ];
    }

    $response = json_encode((array)$message);
    echo $response;
}
