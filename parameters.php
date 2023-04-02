<?php
foreach ($values as $value) {




    echo "
                                <tr>
                                   
                                    <td style='
                                    color: black; font-size: 18px;
                                   '>" . $value["name"] . "</td>
                                    <td style='
                                    color: black; font-size: 18px;
                                    '>" . $value["surname"] . "</td>
                                    <td style='
                                    color: black; font-size: 18px;
                                    '>" . $value["age"] . "</td>
                                    <td style='
                                    color: black; font-size: 18px;
                                    '> " . $value["notlar"] . " </td>
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
                                            ";
    foreach ($vakalar as $vaka) {
        if ($vaka['id'] == $value['fileid']) {
            $vakapdf = $vaka["filename"];


            $basePath = $vakapdf;
            $fileLoc = strpos($basePath, 'vakalar');
            $filePath = substr($basePath, $fileLoc);
            if (file_exists($filePath)) {
                echo "                    <iframe id='iframepdf' class='iframepdf' runat='server' src=" . $filePath . " title=''></iframe>
                ";
            }
        }
    }
    echo "
                                            <p>Not:" . $value['notlar'] . "</p>
                                            <h1 class='braden-header'>Braden Parametreleri</h1>
                                            <div class='girisimler'>
                                                <p class='girisimler-p'><span class='girisimler-span block girisimler-header'>Uyaranın Algılanması:</span>" . $uyaranval . "</p>
                                                <p class='girisimler-p'><span class='girisimler-span block girisimler-header'>Önerilen Girişimler:</span>" . $girisim . "</p>
                                            </div>

                                            <div class='girisimler'>
                                                <p class='girisimler-p'><span class='girisimler-span block girisimler-header'>Nemlilik:</span>" . $nemlilikval . "</p>
                                                <p class='girisimler-p'><span class='girisimler-span block girisimler-header'>Önerilen Girişimler:</span>" . $girisimnemlilik . "</p>
                                            </div>

                                            <div class='girisimler'>
                                            <p class='girisimler-p'><span class='girisimler-span block girisimler-header'>Aktivite:</span>" . $aktiviteval . "</p>
                                            <p class='girisimler-p'><span class='girisimler-span block girisimler-header'>Önerilen Girişimler:</span>" . $girisimaktivite . "</p>
                                            </div>

                                            <div class='girisimler'>
                                            <p class='girisimler-p'><span class='girisimler-span block girisimler-header'>Hareket:</span>" . $hareketval . "</p>
                                            <p class='girisimler-p'><span class='girisimler-span block girisimler-header'>Önerilen Girişimler:</span>" . $girisimhareket . "</p>
                                            </div>

                                            <div class='girisimler'>
                                            <p class='girisimler-p'><span class='girisimler-span block girisimler-header'>Beslenme:</span>" . $beslenmeval . "</p>
                                            <p class='girisimler-p'><span class='girisimler-span block girisimler-header'>Önerilen Girişimler:</span>" . $girisimbeslenme . "</p>
                                            </div>
                                            
                                            <div class='girisimler'>
                                            <p class='girisimler-p'><span class='girisimler-span block girisimler-header'>Sürtünme ve Tahriş:</span>" . $surtunmeval . "</p>
                                            <p class='girisimler-p'><span class='girisimler-span block girisimler-header'>Önerilen Girişimler:</span>" . $girisimsurtunme . "</p>
                                            </div>

                                            
                                        </div>

                                    </div>
                                </tr>
                                
                                <script>
                            var modal" . $value['patient_id'] . " = document.getElementById('myModal" . $value['patient_id'] . "');

                                // Get the button that opens the modal
                                var btn" . $value['patient_id'] . " = document.getElementById('" . $value['patient_id'] . "');
                        
                                // Get the <span> element that closes the modal
                                var span" . $value['patient_id'] . " = document.getElementById('close" . $value['patient_id'] . "');
                               
                                
                                // When the user clicks on the button, open the modal
                                btn" . $value['patient_id'] . ".onclick = function() {
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
