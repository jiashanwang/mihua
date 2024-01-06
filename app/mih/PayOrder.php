<?php

namespace app\mih;
//include "./getSign.php";
//include "./getData.php";
use app\mih\KeyWorker;


class PayOrder
{
    public function encodeRequestData($paramsData)
    {
        $privateKey = $paramsData["privateKey"];
        $data = $paramsData["data"];
        $data['sign'] = $this->getSign($data, $privateKey);
        $encode_data = $this->encryptData($data, $privateKey);
        echo "加密数据=".$encode_data;
        return $encode_data;
    }
    public function decodeResponseData($paramsData)
    {
        $publicKey = $paramsData["publicKey"];
        $encode_data = $paramsData["data"];
        $decody_data = $this->decryptData($encode_data,$publicKey);
//        echo "解密数据".$decody_data;
        $retjson = json_decode($decody_data,true);
        return $retjson;
    }

    public function getSign($params, $signKey)//签名方式
    {
        ksort($params);
        $data = "";
        foreach ($params as $key => $value) {
            $data .= trim($value);
        }
        $sign = strtoupper(md5($data . $signKey));
        return $sign;
    }

    public function checkSign($params, $signKey) //验签
    {
        ksort($params);
        $psign = "";
        $data = "";
        foreach ($params as $key => $value) {
            if ($key == "sign") {
                $psign = $value;
            } else {
                $data .= trim($value);
            }
        }
        $sign = strtoupper(md5($data . $signKey));
        if ($psign == $sign) {
            return true;
        } else {
            return false;
        };
    }
    public function encryptData($params,$privateKey)
    {
        ksort($params);
        $privateWorker = new KeyWorker($privateKey ,1);
        $data = $privateWorker->encrypt(json_encode($params));
        return $data;
    }

    public function decryptData($params,$publicKey)
    {
        $publicWorker = new KeyWorker($publicKey ,1);
        $data = $publicWorker->decrypt($params);
        return $data;
    }
}


?>