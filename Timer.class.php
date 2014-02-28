<?php
/** Timer class, 计算页面运行时间,可按不同key计算不同的运行时间
*   Date:   2014-02-28
*   Author: fdipzone
*   Ver:    1.0
*
*   Func:
*   public  start        记录开始时间
*   public  end          记录结束时间
*   public  getTime      计算运行时间
*   pulbic  printTime    输出运行时间
*   private getKey       获取key
*   private getMicrotime 获取microtime
*/

class Timer{ // class start

    private $_start = array();
    private $_end = array();
    private $_default_key = 'Timer';
    private $_prefix = 'Timer_';


    /** 记录开始时间
    * @param String $key 标记
    */
    public function start($key=''){
        $flag = $this->getKey($key);
        $this->_start[$flag] = $this->getMicrotime();
    }


    /** 记录结束时间
    * @param String $key 标记
    */
    public function end($key=''){
        $flag = $this->getKey($key);
        $this->_end[$flag] = $this->getMicrotime();
    }


    /** 计算运行时间
    * @param  String $key 标记
    * @return float
    */
    public function getTime($key=''){
        $flag = $this->getKey($key);
        if(isset($this->_end[$flag]) && isset($this->_start[$flag])){
            return (float)($this->_end[$flag] - $this->_start[$flag]);
        }else{
            return 0;
        }
    }


    /** 输出页面运行时间
    * @param  String $key 标记
    * @return String
    */
    public function printTime($key=''){
        printf("%srun time %f ms\r\n", $key==''? $key : $key.' ', $this->getTime($key)*1000);
    }


    /** 获取key
    * @param  String $key 标记
    * @return String 
    */
    private function getKey($key=''){
        if($key==''){
            return $this->_default_key;
        }else{
            return $this->_prefix.$key;
        }
    }


    /** 获取microtime
    */
    private function getMicrotime(){
        list($usec, $sec) = explode(' ', microtime());
        return (float)$usec + (float)$sec;
    }


} // class end

?>