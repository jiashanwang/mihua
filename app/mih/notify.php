<?php
include "./getSign.php";
include "./getData.php";
//公钥
$publicKey = "MIGfMA0GCSqGSIb3DQEBAQUAA4GNADCBiQKBgQCDlU0hWk0MQFMQLCC/Snw/+PS80DX8F3+1uUGlppP8SZSEklzzqFQF9cWy5hg4UDrQ79hnTGFUljtkrPjikbFgql80d5DVzT8tObPetndbw5do3WsSXlGDlX6+5BTc41dVvNf2lqdtroos4M3nMGvPGdqWyr46FdzyrzqTeMCMRQIDAQAB";
$data = $_GET['data'];
$data = decryptData($data,$publicKey);
echo "解密data:".$data;
$retjson = json_decode($data,true);
if(checkSign($retjson,$publicKey)){
  echo '验签成功';
  //业务处理成功 , 返回结果
  echo 'SUCCESS';
} else {
  echo '验签失败';
  //业务处理失败 , 返回结果
  echo 'FAIL';
}
  
?>