<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/9/20
 * Time: 11:27
 */
/*
检查保存的路径  检查上传的信息  检查error 信息  检查自定义的信息   检查是不是上传的文件  拼接保存的路径
移动文件
*/
class Upload()
{
    protected $savePath = 'public/upload';
    protected $randName = true;
    protected $mime = ['image/png','image/jpeg','img/jpg'];
    protected $extension = 'png';
    public $errorNumber = 0;
    public errorMessage = '成功';
    protected $datePath = true;
    protected $maxsize = 2000000;
    public $pathName;
    protected $uploadInfo;
    public function __construct($option = null)
    {
        $this->setOption($options);
    }
    protected function setOption($options)
    {

        if(is_array($options)){
            //h获取类内的所有成员属性
            $keys = get_class_vars(__CLASS__);
            foreach ($options as $key => $value) {
               if(array_key_exists($key, $keys)){
                // 判断成员属性数组中有没有当前参数
                $this->$key = $value;
               }
            }
        }
    }
    public function uploadfile($field)
    {
        // 存储的路径
        if(!$this->checkSavePath()){
            return false;
        }
        // 上传信息
        if(!$this->checkUploadFile($field)){
            return false;
        }
        if(!$this->checkUploadError()){
            return false;
        }
    }
    public function moveUploadFile()
    {
        if(!move_uploaded_file($this->uploadInfo['tmp_name'], $this->pathName)){
            $this->errorNumber = -8;
            $this->errorMessage = '移动文件失败';
            return false;
        }
    }
    public function joinPathName()
    {
        $this->pathName = $this->savePath;
        if($this->datePath){
            $this->pathName.= date('Y/m/d').'/';
            // 存储的文件目录不存在则创建目录并赋予最大的权限
            if(!file_exists($this->pathName)){
                mkdir($this->pathName,0777,true);
            }
        } 
        // 名字
        if($this->randName){
            $this->pathName.=uniqid();
        }else{
            $info = pathinfo($this->uploadInfo['name']);
            $this->pathName.=$info['filename'];
        }
        $this->pathName.='.'.$this->extension;
        return $this->pathName;
    }
    // 检查上传文件 是不是post上传过来
    public function checkUploadFile()
    {
        if(!is_uploaded_file($this->uploadInfo['tmp_name'])){
            $this->errorNumber = -6;
            $this->errorMessage ='不是post传过来的';
            return false;
        }else{
            return true;
        }
    }
    // 检查类型和大小 是否合适
    protected function checkAllowOption()
    {
        if(!in_array($this->uploadInfo['type'],$this->mime)){
            $this->errorNumber = -4;
            $this->errorMessage = '不是允许的上传类型';
            return false;
        }
        if($this->uploadInfo['size'] > $this->maxsize){
            $this->errorNumber = -5;
            $this->errorMessage ='超过了允许的最大范围';
            return false;
        }

        return true;
    }
    protected function checkUploadError()
    {
        if(!$this->upload['error']){
            return true;
        }
    }

}