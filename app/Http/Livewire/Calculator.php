<?php

namespace App\Http\Livewire;

use Exception;
use Livewire\Component;

class Calculator extends Component
{
    public string $math = '';
    public int $result = 0;

    public function render()
    {
        return view('livewire.calculator');
    }

    public function addMath($number)
    {
        $this->math .= $this->handleMath($number);
    }

    public function clearMath()
    {
        $this->math = '';
        $this->result = 0;
    }

    public function operation($operation)
    {        
        if ($operation == '=') {
            // $this->result = eval('return ' . $this->math . ';');
            $this->result = $this->evalmath($this->math);
        } else {
            $this->math .= $operation;
        }
    }

    public function handleMath($math): string
    {
        return match($math) {
            'parl' => '(',
            'parr' => ')',
            default => $math
        };
    }

    public function evalmath($equation)
    {        
        $result = 0;
        // sanitize imput
        $equation = preg_replace("/[^a-z0-9+\-.*\/()%]/","",$equation);
        // convert alphabet to $variabel 
        $equation = preg_replace("/([a-z])+/i", "\$$0", $equation); 
        // convert percentages to decimal
        $equation = preg_replace("/([+-])([0-9]{1})(%)/","*(1\$1.0\$2)",$equation);
        $equation = preg_replace("/([+-])([0-9]+)(%)/","*(1\$1.\$2)",$equation);
        $equation = preg_replace("/([0-9]{1})(%)/",".0\$1",$equation);
        $equation = preg_replace("/([0-9]+)(%)/",".\$1",$equation);
   
        if ( $equation != "" ){
            $result = @eval("return " . $equation . ";" );
        }
        
        if ($result == null) {
            throw new Exception("Unable to calculate equation");
        }
        return $result;
    // return $equation;
    }
}
