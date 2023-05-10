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
                                        <div class='form-results'>
                                        ";
    $sql = "SELECT * FROM form2";
    $smtmselect = $db->prepare($sql);
    $result = $smtmselect->execute();
    if ($result) {
        $form2 = $smtmselect->fetchAll(PDO::FETCH_ASSOC);
    } else {
        echo 'error';
    }
    foreach ($form2 as $form2) {

        echo "  
                <div class='girisimler'>
                    <h1 class='form-detail-header'>Ağrı Değerlendirmesi</h1>
                    <p class='girisimler-p'><span class='girisimler-span block girisimler-header'>Ağrının Şiddeti:</span>" . $form2['pain_intensity'] . "</p>
                    <p class='girisimler-p'><span class='girisimler-span block girisimler-header'>Ağrının Süresi:</span>" . $form2['pain_duration'] . "</p>
                    <p class='girisimler-p'><span class='girisimler-span block girisimler-header'Ağrının Yeri:</span>" . $form2['pain_location'] . "</p>
                    <p class='girisimler-p'><span class='girisimler-span block girisimler-header'>Ağrının Karakteri:</span>" . $form2['pain_character'] . "</p>
                    <p class='girisimler-p'><span class='girisimler-span block girisimler-header'>Ağrının Sıklığı:</span>" . $form2['pain_frequency'] . "</p>
                    <p class='girisimler-p'><span class='girisimler-span block girisimler-header'>Ağrıyı Arttıran Durumlar:</span>" . $form2['pain_increase_factors'] . "</p>
                    <p class='girisimler-p'><span class='girisimler-span block girisimler-header'>Ağrıyı Azaltan Durumlar:</span>" . $form2['pain_decrease_factors'] . "</p>
                </div>         ";
    }
    $sql = "SELECT * FROM form3";
    $smtmselect = $db->prepare($sql);
    $result = $smtmselect->execute();
    if ($result) {
        $form3 = $smtmselect->fetchAll(PDO::FETCH_ASSOC);
    } else {
        echo 'error';
    }

    foreach ($form3 as $form3) {
        $getup = $form3['arm_chair_point'];
        if ($getup == "0") {
            $getup_text = "Kollarını Kullanmadan Kalkabiliyor";
        };
        if ($getup == "1") {
            $getup_text = "Kalkmak için sandalye kolluğunu kullanıyor ancak tek denemede kalkabiliyor";
        };
        if ($getup == "3") {
            $getup_text = "Kalkmak için sandalye kolluğunu kullanıyor ancak birden fazla denemede kalkabiliyor";
        };
        if ($getup == "4") {
            $getup_text = "Yardım olmadan kalkamıyor";
        };
        echo "  
                <div class='girisimler'>
                    <h1 class='form-detail-header'>Düşme Riski Değerlendirmesi</h1>
                    <p class='girisimler-p'><span class='girisimler-span block girisimler-header'>Risk Faktörü Puan ( ≥ 5 Yüksek Risk ):</span></p>
                    <p class='girisimler-p'><span class='girisimler-span block girisimler-header'>Konfüzyon / Dezoryantasyon:</span>" . $form3['confusion_point'] . "</p>
                    <p class='girisimler-p'><span class='girisimler-span block girisimler-header'Semptomatik Depresyon:</span>" . $form3['symtomatic_depression_point'] . "</p>
                    <p class='girisimler-p'><span class='girisimler-span block girisimler-header'>Boşaltım ihtiyacında sorun:</span>" . $form3['evacuation_trouble'] . "</p>
                    <p class='girisimler-p'><span class='girisimler-span block girisimler-header'>Baş dönmesi:</span>" . $form3['dizziness_point'] . "</p>
                    <p class='girisimler-p'><span class='girisimler-span block girisimler-header'>Cinsiyet (erkek):</span>" . $form3['gender_point'] . "</p>
                    <p class='girisimler-p'><span class='girisimler-span block girisimler-header'>Antiepileptik Grubu İlaç Alımı:</span>" . $form3['epilepsy_drug_point'] . "</p>
                    <p class='girisimler-p'><span class='girisimler-span block girisimler-header'>Benzodiazepin Grubu İlaç Alımı:</span>" . $form3['benzo_drug_point'] . "</p>
                    <p class='girisimler-p'><span class='girisimler-span block girisimler-header'>Sandalyeden Kalkma Testi:</span></p>
                    <p class='girisimler-p'><span class='girisimler-span block girisimler-header'>" . $getup_text . ":</span>" . $form3['arm_chair_point'] . " point</p>
                    <p class='girisimler-p'><span class='girisimler-span block girisimler-header'>Total:</span>" . $form3['total'] . "</p>



                </div>         ";
    }
    $sql = "SELECT * FROM form4";
    $smtmselect = $db->prepare($sql);
    $result = $smtmselect->execute();
    if ($result) {
        $form4 = $smtmselect->fetchAll(PDO::FETCH_ASSOC);
    } else {
        echo 'error';
    }
    foreach ($form4 as $form4) {

        echo "  
                <div class='girisimler'>
                    <h1 class='form-detail-header'>Düşme Bildirimi</h1>
                    <p class='girisimler-p'><span class='girisimler-span block girisimler-header'>Hasta Adı:</span>" . $form4['patient_name'] . "</p>
                    <p class='girisimler-p'><span class='girisimler-span block girisimler-header'>Cinsiyet:</span>" . $form4['patient_gender'] . "</p>
                    <p class='girisimler-p'><span class='girisimler-span block girisimler-header'>Tıbbi Tanı:</span>" . $form4['medical_diagnosis'] . "</p>
                    <p class='girisimler-p'><span class='girisimler-span block girisimler-header'>Düşülen Yer:</span>" . $form4['place_of_fall'] . "</p>
                    <p class='girisimler-p'><span class='girisimler-span block girisimler-header'>Düşme Tarihi:</span>" . $form4['fall_date'] . "</p>
                    <p class='girisimler-p'><span class='girisimler-span block girisimler-header'>Son Düşme Risk Skoru:</span>" . $form4['last_fall_risk_score'] . "</p>
                    <p class='girisimler-p'><span class='girisimler-span block girisimler-header'>Yaralanma Durumu:</span>" . $form4['injury_status'] . "</p>
                    <p class='girisimler-p'><span class='girisimler-span block girisimler-header'>Yaralanma Şiddeti:</span>" . $form4['injury_severity'] . "</p>
                    <p class='girisimler-p'><span class='girisimler-span block girisimler-header'>Düşme Nedeni:</span>" . $form4['fall_cause'] . "</p>
                    <p class='girisimler-p'><span class='girisimler-span block girisimler-header'>Düşme Öncesi Alınan Önlemler:</span>" . $form4['pre_fall_precautions'] . "</p>
                    <p class='girisimler-p'><span class='girisimler-span block girisimler-header'>Düşme Öncesi Genel Durumu:</span>" . $form4['pre_fall_general_condition'] . "</p>
                    <p class='girisimler-p'><span class='girisimler-span block girisimler-header'>Düşme Sonrası Genel Durumu:</span>" . $form4['post_fall_general_condition'] . "</p>


                </div>         ";
    }
    $sql = "SELECT * FROM form5";
    $smtmselect = $db->prepare($sql);
    $result = $smtmselect->execute();
    if ($result) {
        $form5 = $smtmselect->fetchAll(PDO::FETCH_ASSOC);
    } else {
        echo 'error';
    }

    foreach ($form5 as $form5) {
        $eye_opening = $form5['eye_opening_points'];
        if ($eye_opening == "1") {
            $eye_opening_text = "Açmıyor";
        };
        if ($eye_opening == "2") {
            $eye_opening_text = "Ağrılı Uyaranla Açabiliyor";
        };
        if ($eye_opening == "3") {
            $eye_opening_text = "Sözel Emirle Açabiliyor";
        };
        if ($eye_opening == "4") {
            $eye_opening_text = "Spontan Açabiliyor";
        };

        $motor_response = $form5['motor_response_points'];
        if ($motor_response == "1") {
            $motor_response_text = "Tepki yok";
        }
        if ($motor_response == "2") {
            $motor_response_text = "Ekstansiyon (Deserebre duruş)";
        }
        if ($motor_response == "3") {
            $motor_response_text = "Fleksiyon (Dekortike duruş)";
        }
        if ($motor_response == "4") {
            $motor_response_text = "Çekme (Ekstremitesini ağrılı uyarandan uzaklaştırmaya/çekmeye çalışıyor)";
        }
        if ($motor_response == "5") {
            $motor_response_text = "Ağrıya lokalize (Ağrılı uyaranı uzaklaştırmaya çalışıyor)";
        }
        if ($motor_response == "6") {
            $motor_response_text = "Emirler Uyuyor";
        }

        $verbal_response = $form5['verbal_response_points'];
        if ($verbal_response == "1") {
            $verbal_response_text = "Tepki yok";
        }
        if ($verbal_response == "2") {
            $verbal_response_text = "Anlamsız sesler (Hasta mırıldanıyor, inliyor)";
        }
        if ($verbal_response == "3") {
            $verbal_response_text = "Uygunsuz cümleler (Bir ya da daha fazla yanlış yanıt)";
        }
        if ($verbal_response == "4") {
            $verbal_response_text = "Konfüze (Cümle kuruyor ancak yanıtlar yanlış)";
        }
        if ($verbal_response == "5") {
            $verbal_response_text = "Oryante";
        }

        echo "  
                <div class='girisimler'>
                    <h1 class='form-detail-header'>Glaskow Koma Skalası</h1>
                    <p class='girisimler-p'><span class='girisimler-span block girisimler-header'>Gözleri Açabilme:</span></p>
                    <p class='girisimler-p'><span class='girisimler-span block girisimler-header'></span>" . $eye_opening_text . " " . $form5['eye_opening_points'] . " point</p>
                    <p class='girisimler-p'><span class='girisimler-span block girisimler-header'>Motor Cevap:</span></p>
                    <p class='girisimler-p'><span class='girisimler-span block girisimler-header'></span>" . $motor_response_text . " " . $form5['motor_response_points'] . " point</p>
                    <p class='girisimler-p'><span class='girisimler-span block girisimler-header'>Sözel Tepki:</span></p>
                    <p class='girisimler-p'><span class='girisimler-span block girisimler-header'></span>" . $verbal_response_text . " " . $form5['verbal_response_points'] . " point</p>
                    
                    <p class='girisimler-p'><span class='girisimler-span block girisimler-header'>Total:</span>" . $form5['total'] . "</p>



                </div>         ";
    }
    $sql = "SELECT * FROM form6";
    $smtmselect = $db->prepare($sql);
    $result = $smtmselect->execute();
    if ($result) {
        $form6 = $smtmselect->fetchAll(PDO::FETCH_ASSOC);
    } else {
        echo 'error';
    }

    foreach ($form6 as $form6) {
        $sensory = $form6['sensory_perception'];
        if ($sensory == "1") {
            $sensory_text = "Tamamen yetersiz (Ağrılı uyaranlara yanıt vermiyor)";
        };
        if ($sensory == "2") {
            $sensory_text = "Çok yetersiz (Yalnız ağrılı uyaranlara yanıt veriyor)";
        };
        if ($sensory == "3") {
            $sensory_text = "Biraz yeterli (Sözlü uyaranlara yanıt veriyor, sürekli iletişim kuramıyor, yatak içerisinde çevrilmesi gerekiyor)";
        };
        if ($sensory == "4") {
            $sensory_text = "Tamamen yeterli (Sözlü uyaranlara yanıt veriyor. Duyu kusuru yok)";
        };

        $moisture = $form6['moisture'];
        if ($moisture == "1") {
            $moisture_text = "Sürekli ıslak (deri, ter, idrar, gaita ile sürekli ıslak)";
        }
        if ($moisture == "2") {
            $moisture_text = "Çok ıslak (Deri çoğu zaman ıslak, her şiftte çarşafların en az bir kez değiştirilmesi gerekiyor)";
        }
        if ($moisture == "3") {
            $moisture_text = "Bazen ıslak (Deri bazen ıslak, Çarşafların ıslandıkça değiştirilmesi gerekiyor)";
        }
        if ($moisture == "4") {
            $moisture_text = "Nadiren ıslak (Deri genellikle kuru, Çarşafların rutin değişimini gerektirmekte)";
        }


        $activity = $form6['activity'];
        if ($activity == "1") {
            $activity_text = "Yatağa bağımlı (Her türlü bakım gereksinimi yatakta karşılanıyor)";
        }
        if ($activity == "2") {
            $activity_text = "Sandalyeye bağımlı (Çok az yürüyebiliyor, sandalyeye oturabilmesi için yardım gerekiyor, kendi ağırlığını kaldırmakta güçlük çekiyor)";
        }
        if ($activity == "3") {
            $activity_text = "Bazen yürüyebiliyor (Yardımla veya yardımsız kısa mesafede yürüyebiliyor, çoğu zaman yatakta veya sandalyede oturuyor)";
        }
        if ($activity == "4") {
            $activity_text = "Sık sık yürüyebiliyor (Günde en az iki defa oda dışına çıkabiliyor, oda içinde 2 saatte bir yürüyebiliyor)";
        }

        $mobility = $form6['mobility'];
        if ($mobility == "1") {
            $mobility_text = "Tamamen hareketsiz (Yardımsız pozisyon değiştirebiliyor)";
        }
        if ($mobility == "2") {
            $mobility_text = "Çok hareketsiz (Vücut ve ekstremite pozisyonunda hafif değişiklik yapabiliyor, kendiliğinden pozisyonunu değiştiremiyor)";
        }
        if ($mobility == "3") {
            $mobility_text = "Az hareketli (Vücut ve ekstremitelerinde sık ancak hafif değişiklik yapabiliyor)";
        }
        if ($mobility == "4") {
            $mobility_text = "Hareketli (Pozisyonunu yardımsız sıklıkla değiştirebiliyor)";
        }

        $nutrition = $form6['nutrition'];
        if ($nutrition == "1") {
            $nutrition_text = "Çok yetersiz (Asla öğünün tamamını yiyemiyor. Nadiren verilen yemeğin 1/3’ünü yiyebiliyor.
            <br>İki öğün ya da daha az protein alabiliyor (Et ve süt ürünleri). Sıvı alımı az.
            <br>Ağızdan sıvı desteği alamıyor. 5 günden fazla süredir IV ve berrak diyet alıyor)";
        }
        if ($mobility == "2") {
            $nutrition_text = "Yetersiz (Verilen yemeğin yarısını, nadiren tamamını yiyebiliyor.
            <br>Günde 3 defa protein, bazen destekleyici ek gıda alabiliyor.
            <br>Uygun diyetin veya tüp ile verilen besinin birazını alabiliyor):";
        }
        if ($mobility == "3") {
            $nutrition_text = "Yeterli (Verilen yemeğin yarısından fazlasını yiyebiliyor. Günde 4 kez protein alabiliyor.
            <br>Ara sıra yemeği reddediyor. Verilmişse ek diyeti yada TPN’İ alabiliyor):";
        }
        if ($mobility == "4") {
            $nutrition_text = "Çok iyi (Yemeğini çoğunlukla yiyor. Öğünleri reddetmiyor. Günde 4 defa protein alabiliyor.
            <br>Genellikle öğün aralarında yiyor. Ek gıda gerekmiyor):";
        }

        $discomfort = $form6['discomfort'];
        if ($discomfort == "1") {
            $discomfort_text = "Sorun
            <br>(Hareket ederken çok fazla yardıma gereksinimi var. Çarşafta kaydırmaksızın tamamen kaldırılması olanaksız):";
        }
        if ($discomfort == "2") {
            $discomfort_text = "Olası sorun
            <br>(Çok az yardımla az ve güçsüz hareket edebiliyor. Hareket sırasında deri; çarşafa, sandalyeye sürtünüyor):";
        }
        if ($discomfort == "3") {
            $discomfort_text = "Sorun yok (Yatakta ve sandalyede bağımsız hareket edebiliyor. Kendini kaldırabilmek için yeterli kas gücü var):";
        }


        echo "  
                <div class='girisimler'>
                    <h1 class='form-detail-header'>Braden Bası Yarası Risk Değerlendirme Aracı (> 5 Yaş)</h1>
                    <p class='girisimler-p'><span class='girisimler-span block girisimler-header'>Risk Faktörleri (Uyaranın algılanması, basınca karşı oluşan rahatsızlığın algılanması):</span></p>
                    <p class='girisimler-p'><span class='girisimler-span block girisimler-header'></span>" . $sensory_text . " " . $form6['sensory_perception'] . " point</p>
                    <p class='girisimler-p'><span class='girisimler-span block girisimler-header'Nemlilik (Vücudun nemliliği):</span></p>
                    <p class='girisimler-p'><span class='girisimler-span block girisimler-header'></span>" . $moisture_text . " " . $form6['moisture'] . " point</p>
                    <p class='girisimler-p'><span class='girisimler-span block girisimler-header'Aktivite (Fiziksel aktivitenin derecesi):</span></p>
                    <p class='girisimler-p'><span class='girisimler-span block girisimler-header'></span>" . $activity_text . " " . $form6['activity'] . " point</p>
                    <p class='girisimler-p'><span class='girisimler-span block girisimler-header'>Hareket (Pozisyonunu değiştirme ve kontrol edebilme):</span></p>
                    <p class='girisimler-p'><span class='girisimler-span block girisimler-header'></span>" . $mobility_text . " " . $form6['mobility'] . " point</p>
                    <p class='girisimler-p'><span class='girisimler-span block girisimler-header'>Beslenme (Beslenme Alışkanlığı):</span></p>
                    <p class='girisimler-p'><span class='girisimler-span block girisimler-header'></span>" . $nutrition_text . " " . $form6['nutrition'] . " point</p>
                    <p class='girisimler-p'><span class='girisimler-span block girisimler-header'>Risk Faktörleri(Uyaranın algılanması, basınca karşı oluşan rahatsızlığın algılanması):</span></p>
                    <p class='girisimler-p'><span class='girisimler-span block girisimler-header'></span>" . $discomfort_text . " " . $form6['discomfort'] . " point</p>
                    
                    <p class='girisimler-p'><span class='girisimler-span block girisimler-header'>Total:</span>" . $form6['total'] . "</p>



                </div>         ";
    }
    echo "
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
