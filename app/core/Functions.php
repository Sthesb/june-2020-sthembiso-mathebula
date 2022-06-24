<?php 
    namespace App;


    class Functions {

        // bubble sort
        public function bubbleSort($text)
        {
        
            $count = 0;

            $string_length = strlen($text); // getting the string length
            
            for ($i=0; $i < $string_length; $i++) { // set i to be the first value of the string

                for ($j=$i+1; $j < $string_length; $j++) { // set j to be the second value of the string
                    $count += 1;
                    if($text[$i] > $text[$j]) { // compare the i and j
                        $temp = $text[$i];
                        $text[$i] = $text[$j];
                        $text[$j] = $temp;
                    }
                }
                

            }
            
            return $text;
        }


        // function for merge sort - splits the array 
        // and call merge function to sort and merge the array
        // mergesort is a recursive function
        public function mergeSort(&$Array, $left, $right) {
            if ($left < $right) { 
                $mid = $left + (int)(($right - $left)/2);
                $this->mergesort($Array, $left, $mid);
                $this->mergesort($Array, $mid+1, $right);
                $this->merge($Array, $left, $mid, $right);
            }
        }

        // merge function performs sort and merge operations
        // for mergesort function
        public function merge(&$Array, $left, $mid, $right) {
            // Create two temporary array to hold split 
            // elements of main array 
            $n1 = $mid - $left + 1; //no of elements in LeftArray
            $n2 = $right - $mid;     //no of elements in RightArray    
            $LeftArray = array_fill(0, $n1, 0); 
            $RightArray = array_fill(0, $n2, 0);
            for($i=0; $i < $n1; $i++) { 
                $LeftArray[$i] = $Array[$left + $i];
            }
            for($i=0; $i < $n2; $i++) { 
                $RightArray[$i] = $Array[$mid + $i + 1];
            }

            // In below section x, y and z represents index number
            // of LeftArray, RightArray and Array respectively
            $x=0; $y=0; $z=$left;
            while($x < $n1 && $y < $n2) {
                if($LeftArray[$x] < $RightArray[$y]) { 
                    $Array[$z] = $LeftArray[$x]; 
                    $x++; 
                }
                else { 
                    $Array[$z] = $RightArray[$y];  
                    $y++; 
                }
                $z++;
            }

            // Copying the remaining elements of LeftArray
            while($x < $n1) { 
                $Array[$z] = $LeftArray[$x];  
                $x++;  
                $z++;
            }

            // Copying the remaining elements of RightArray
            while($y < $n2) { 
                $Array[$z] = $RightArray[$y]; 
                $y++;  
                $z++; 
            }
        }

        
        // function to print array
        public function PrintArray($Array, $n) { 
            $sorted_string = '';
            for ($i = 0; $i < $n; $i++) 
                // echo $Array[$i].""; 
                $sorted_string .= $Array[$i];
                
            return $sorted_string;
        }


        // Quick Sort
        public function quickSort($my_array)
        {
            $loe = $gt = array();
            if(count($my_array) < 2)
            {
                return $my_array;
            }
            $pivot_key = key($my_array);
            $pivot = array_shift($my_array);
            foreach($my_array as $val)
            {
                if($val <= $pivot)
                {
                    $loe[] = $val;
                }elseif ($val > $pivot)
                {
                    $gt[] = $val;
                }
            }
            return array_merge($this->quickSort($loe),array($pivot_key=>$pivot),$this->quickSort($gt));
        }

    }
    