<?php
$base_url = 'http://' . $_SERVER['HTTP_HOST'] . '/Hacettepe-KDSE-BPYS';

foreach ($values as $value) {




    echo "
                                <tr class='white'>
                                   
                                    <td style='
                                    color: white; font-size: 18px;
                                   '>" . $value["name"] . "</td>
                                    <td style='
                                    color: white; font-size: 18px;
                                    '>" . $value["surname"] . "</td>
                                   
                                   
                                    <td style='
                                    color: black; font-size: 18px;
                                    '> <button type='button' id = '" . $value['patient_id'] . "' class='btn btn-success'>Detay</button> </td>
                                    
                                    <div id='myModal" . $value['patient_id'] . "' class='modal none'>

                                    <!-- Modal content -->
                                    <div class='modal-content' id='modal-content" . $value['patient_id'] . "'>
                                        <span class='close" . $value['patient_id'] . " closeBtn' id='close" . $value['patient_id'] . "'>&times;</span>
                                        <p>Hasta Adı:" . $value['name'] . "</p>
                                        <p>Hasta Soyadı:" . $value['surname'] . "</p>
                                        <p>Hasta yaşı:" . $value['age'] . "</p>
                                        <div class='form-selection'>
                                            <div class='custom-select' style='width:200px;'>
                                                <select id='select-form'>
                                                    <option value='0'>Select Form:</option>
                                                    <option value='1'>Form 1</option>
                                                    <option value='2'>Form 2</option>
                                                    <option value='3'>Form 3</option>
                                                    <option value='4'>Form 4</option>
                                                    <option value='5'>Form 5</option>
                                                    <option value='6'>Form 6</option>
                                                    <option value='7'>Form 7</option>
                                                    <option value='8'>Form 8</option>
                                                    <option value='9'>Form 9</option>
                                                    <option value='10'>Form 10</option>
                                                    <option value='11'>Form 11</option>
                                                    <option value='12'>Form 12</option>
                                                    <option value='12'>Form 13</option>
                                                    <option value='12'>Form 14</option>
                                                    <option value='12'>Form 15</option>

                                                </select>
                                            </div>
                                        
                                        </div>
                                        <div id='box'></div>
                                    </div>
                                </tr>
                                    

                                        
        ";



    echo "
   
  
                                    
                                    <script>
                                    $('#select-form').on('change',function(){
                                        console.log('aaa');

                                    });
                                    const el = document.getElementById('select-form');
                                    el.value
                                    const box = document.getElementById('box');
                                    
                                    el.addEventListener('change', function handleChange(event) {
                                        console.log(event.target.value);
                                        if (event.target.value === '2') {
                                            $('#box').load('./formlar-review/Form2-review.php'); 
                                        } 
                                        if (event.target.value === '3') {
                                            $('#box').load('./formlar-review/Form3-review.php'); 
                                        } 
                                        if (event.target.value === '4') {
                                            $('#box').load('./formlar-review/Form4-review.php'); 
                                        } 
                                        if (event.target.value === '5') {
                                            $('#box').load('./formlar-review/Form5-review.php'); 
                                        } 
                                        if (event.target.value === '6') {
                                            $('#box').load('./formlar-review/Form6-review.php'); 
                                        }
                                        if (event.target.value === '7') {
                                            $('#box').load('./formlar-review/Form7-review.php'); 
                                        }
                                        if (event.target.value === '8') {
                                            $('#box').load('./formlar-review/Form8-review.php'); 
                                        }   
                                    });

                                   
                            var modal" . $value['patient_id'] . " = document.getElementById('myModal" . $value['patient_id'] . "');
                            
                                // Get the button that opens the modal
                                var btn" . $value['patient_id'] . " = document.getElementById('" . $value['patient_id'] . "');
                        
                                // Get the <span> element that closes the modal
                                var span" . $value['patient_id'] . " = document.getElementById('close" . $value['patient_id'] . "');
                               
                                
                                // When the user clicks on the button, open the modal
                                btn" . $value['patient_id'] . ".onclick = function() {
                                    console.log(modal" . $value['patient_id'] . ");
                                    modal" . $value['patient_id'] . ".classList.remove('none');
                                    modal" . $value['patient_id'] . ".classList.add('block');
                                 

                                span" . $value['patient_id'] . ".onclick = function() {
                                    modal" . $value['patient_id'] . ".classList.remove('block');
                                    modal" . $value['patient_id'] . ".classList.add('none');
                                }
                    
                                
                                window.onclick = function(event) {
                                    if (event.target == modal" . $value['patient_id'] . ") {
                                        modal" . $value['patient_id'] . ".classList.remove('block');
                                    
                                    }
                                }
                                }
                    
                                
                            </script>";
}
