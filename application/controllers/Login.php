<?php
/**
 * Author      : Cary.He
 * Contact QQ  : 373889161($S$-memory)
 * Email       : 373889161@qq.com
 */
/**
 * Created by PhpStorm.
 * User: asusa
 * Date: 2017/7/1/0001
 * Time: 15:32
 */
class Login extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->Model('Login_Model','set_session');
        $this->load->library('Get_password');
    }
    public function index()
    {
        $this->load->view('login');
    }
    //检查用户登录信息
    public function check_user()
    {
        $this->name = $this->input->post('username');
        $this->password = $this->input->post('password');
        $getid = $this->get_password->get_client_ip();
        $arr = array(
            'username'=>$this->name,
            'state'=> 1,
        );
        $userp = $this->set_session->user_login('admin_user',$arr);
        if($userp)
        {
            $password = $this->get_password->password_get_verify($this->password,$userp[0]->password);
            if($password)
            {
                $data = array(
                    'id'=>$userp[0]->id,
                    'username'=>$userp[0]->username,
                    'arrid'=>$userp[0]->addid,
                    'email'=>$userp[0]->email,
                    'description'=>$userp[0]->description,
                    'add_time'=>$userp[0]->add_time,
                    'up_time'=>$userp[0]->up_time,
                    'login_time'=>time(),
                    'login_ip'=>$getid,
                    'status'=>$userp[0]->status,
                );
                $arr = array('status'=>200,'mess'=>'登录成功!');
                $this->set_session->save_session($data);
                header('location:'.base_url().'jqmain');
            }
            else
            {
                $arr = array('status'=>300,'mess'=>'密码错误!');
            }
        }
        else
        {
            $arr = array('status'=>300,'mess'=>'用户名或密码错误!');
        }
        echo json_encode($arr);die;
    }
    public function logout()
    {
        $this->session->sess_destroy();
        header('location:'.base_url().'login');
    }
}