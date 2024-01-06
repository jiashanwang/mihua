<?php
namespace app\controller;

use app\BaseController;
use app\mih\PayOrder;

class Index extends BaseController
{
    public function encodeRequestData()
    {
        $paramsData =$this->request->post();

        $resinit = new PayOrder();
        $result = $resinit->encodeRequestData($paramsData);

        return $this->jsonReturn(0,"操作成功!",$result);
    }
    public function decodeResponseData()
    {
        $paramsData =$this->request->post();

        $resinit = new PayOrder();
        $result = $resinit->decodeResponseData($paramsData);
        return $this->jsonReturn(0,"操作成功!",$result);
    }

}
