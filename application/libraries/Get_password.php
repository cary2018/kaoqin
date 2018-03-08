<?php
/**
 * CreateTime  : 2016/10/6 15:29
 * Author      : Cary.He
 * Contact QQ  : 373889161($S$-memory)
 * Email       : 373889161@qq.com
 */

/**
 * Created by PhpStorm.
 * User: asusa
 * Date: 2017/2/24/0024
 * Time: 13:44
 */
class Get_password
{
    /**
     * @param $password
     * @return bool|mixed|string
     * 哈唏加密+MD5加密
     *
     */
    public function password_set_hash($password)
    {
        $new_password = password_hash(md5($password),PASSWORD_BCRYPT);
        return $new_password;
    }
    /**
     * @param $newp    //输入的原始密码
     * @param $oldp   //加密后的原始密码
     * @return bool
     * 哈唏解密+MD5解密
     */
    public function password_get_verify($newp,$oldp)
    {
        $new_p1 = password_verify(md5($newp),$oldp);
        if($new_p1)
        {
            return true;
        }
        else
        {
            return false;
        }
    }

    /**
     * @param int $type
     * @return mixed
     * 获取用户IP
     */
    function get_client_ip($type = 0) {
        $type       =  $type ? 1 : 0;
        static $ip  =   NULL;
        if ($ip !== NULL) return $ip[$type];
        if (isset($_SERVER['HTTP_X_FORWARDED_FOR'])) {
            $arr    =   explode(',', $_SERVER['HTTP_X_FORWARDED_FOR']);
            $pos    =   array_search('unknown',$arr);
            if(false !== $pos) unset($arr[$pos]);
            $ip     =   trim($arr[0]);
        }elseif (isset($_SERVER['HTTP_CLIENT_IP'])) {
            $ip     =   $_SERVER['HTTP_CLIENT_IP'];
        }elseif (isset($_SERVER['REMOTE_ADDR'])) {
            $ip     =   $_SERVER['REMOTE_ADDR'];
        }
        // IP地址合法验证
        $long = sprintf("%u",ip2long($ip));
        $ip   = $long ? array($ip, $long) : array('0.0.0.0', 0);
        return $ip[$type];
    }
}