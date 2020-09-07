<?php
date_default_timezone_set('Asia/Jakarta');

function fetch_value($str,$find_start,$find_end) {
	$start = @strpos($str,$find_start);
	if ($start === false) {
		return "";
	}
	$length = strlen($find_start);
	$end = strpos(substr($str,$start +$length),$find_end);
	return trim(substr($str,$start +$length,$end));
}

echo "NYURI BILANG BOS"."\n";
echo "WA = 081212571925"."\n";
echo "JOSSKI"."\n";

while(true){

echo "INPUT USER = ";
$p = trim(fgets(STDIN));
echo "NOMOR = ";
$nomor = trim(fgets(STDIN));

$ua = array(
'Host: api.x898xe.fun',
'accept: */*',
'language: en-US',
'user-agent: Mozilla/5.0 (Linux; Android 10; Redmi Note 8 Pro Build/QP1A.190711.020; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/84.0.4147.89 Mobile Safari/537.36',
'content-type: application/x-www-form-urlencoded; charset=UTF-8',
'origin: https://home.x898xe.fun',
'x-requested-with: mark.via.gp',
'sec-fetch-site: same-site',
'sec-fetch-mode: cors',
'sec-fetch-dest: empty',
'referer: https://home.x898xe.fun/agentid/27782',
'accept-language: id-ID,id;q=0.9,en-US;q=0.8,en;q=0.7');

$login = "https://api.x898xe.fun/api/login/register";

$data = 'username='.$p.'&pwd=OkeOce45&tel='.$nomor.'&code=&agentid=27782';

$ch = curl_init();

curl_setopt($ch, CURLOPT_URL, $login);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_HTTPHEADER, $ua);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
curl_setopt($ch, CURLOPT_COOKIEJAR, "cookie.txt");
curl_setopt($ch, CURLOPT_COOKIEFILE, "cookie.txt");

$result = curl_exec($ch);
$balance = fetch_value($result,'"username":"','"');
$balance1 = fetch_value($result,'"token":"','"');
$myFile = "data.txt";

$fh = fopen($myFile, 'a') or die("can’t open file");

$stringData = "user: ".$balance."\n"."token: ".$balance1."\n";

fwrite($fh, $stringData);

fclose($fh);
echo $balance1;
echo "\n";

      sleep(1);
          }

