<?php
/**
 * Created by PhpStorm.
 * User: Diego
 * Date: 9/3/2019
 * Time: 11:29 AM
 */


class Calculator
{
    /** @var $operation string */
    private $operation;
    /** @var $operation array */
    private $values;

    /**
     * Calculator constructor.
     * @param string $operation
     * @param array $values
     */
    public function __construct($operation, array $values)
    {
        $this->operation = $operation;
        $this->values = $values;
    }

    public function doMath() {
        $oper = $this->operation;
        $vals = $this->values;

        $status = 'error';
        $result = '';
        if(is_array($vals) && count($vals) == 2) {

            if(!is_numeric($vals[0]) || !is_numeric($vals[1])) {
                $result = 'Invalid arguments for operation, values must be numeric.';
            } else {
                switch($oper) {
                    case 'sum':
                        $status = 'OK';
                        $result = $this->Sum($vals[0], $vals[1]);
                        break;
                    case 'substraction':
                        $status = 'OK';
                        $result = $this->Substract($vals[0], $vals[1]);
                        break;
                    case 'division':
                        $status = 'OK';
                        $result = $this->Divide($vals[0], $vals[1]);
                        break;
                    case 'multiplication':
                        $status = 'OK';
                        $result = $this->Multiply($vals[0], $vals[1]);
                        break;
                    default:
                        $result = 'Not a valid operation.';
                }
            }

        } else {
            $result = 'Invalid arguments for operation, values must be an array with two values.';
        }

        return [
            'result' => $result,
            'status' => $status
        ];
    }

    public function Sum($a, $b){
        return $a + $b;
    }

    public function Substract($a, $b){
        return $a - $b;
    }

    public function Divide($a, $b){
        if ($b !== 0 ){
            return $a / $b;
        } else {
            return 'Division by zero';
        }
    }

    public function Multiply($a, $b){
        return $a * $b;
    }
}