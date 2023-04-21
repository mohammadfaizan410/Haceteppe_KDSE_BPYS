<?php
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
                                        <div class='modal-content white' id='modal-content" . $value['patient_id'] . "'>
                                            <span class='close" . $value['patient_id'] . " closeBtn' id='close" . $value['patient_id'] . "'>&times;</span>
                                            <p>Hasta Adı:" . $value['name'] . "</p>
                                            <p>Hasta Soyadı:" . $value['surname'] . "</p>
                                            <p>Hasta yaşı:" . $value['age'] . "</p>
                                            ";
}