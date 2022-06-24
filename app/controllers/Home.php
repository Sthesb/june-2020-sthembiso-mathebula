<?php

use App\Functions;

    class Home extends Controller 
    {
        public function index()
        {
            $functions = new Functions();
            $data = [];

            if(isset($_POST['submit'])){
                
                // checks form data
                if($_POST['text'] && $_POST['strategy']) {

                    // bubble sort
                    if($_POST['strategy'] == 'Bubble Sort'){
                        $data = [
                            'original' => $_POST['text'],
                            'strategy' => $_POST['strategy'],
                            'sorted' => $functions->bubbleSort($_POST['text'])
                        ];
                    }
    
                    // merge sort
                    if($_POST['strategy'] == 'Merge Sort'){
                        $MyArray = str_split($_POST['text']);
                        
                        $n = sizeof($MyArray); 
                        
                        $functions->mergeSort($MyArray, 0, $n-1);
                        
                        $data = [
                            'original' => $_POST['text'],
                            'strategy' => $_POST['strategy'],
                            'sorted' => $functions->PrintArray($MyArray, $n)
                        ];
                    }


                    // quick sort
                    if($_POST['strategy'] == 'Quick Sort'){
                        $MyArray = str_split($_POST['text']);
                        
                        $n = sizeof($MyArray); 
                        
                        print_r($functions->quickSort($MyArray));
                        $sorted_string = implode('', $functions->quickSort($MyArray));
                        $data = [
                            'original' => $_POST['text'],
                            'strategy' => $_POST['strategy'],
                            'sorted' => $sorted_string
                        ];
                    }


                } else {
                    $this->view('home/index', ['error' => 'Please fill both fields']);
                }

                // exit;
            }
            
            
           $this->view('home/index', $data);
        }

        
    }