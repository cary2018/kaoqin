<?php
/**
 * Author      : Cary.He
 * Contact QQ  : 373889161($S$-memory)
 * Email       : 373889161@qq.com
 */
class Jqmain extends MY_Controller {

	public function index()
	{
		$this->load->view('main');
	}
	public function jqnav()
	{
		$this->load->view('nav');
	}
	public function right_conter()
	{
		$time = time();                  //当前时间
		$hhgy = strtotime(SYS_UP_WORK);   //可打卡上班时间
		$ghgy = strtotime(SYS_DO_WORK);  //可打卡下班时间
		$uid = $this->session->userdata('id');
		$this->db->where('uid='.$uid.' AND DATE_FORMAT(FROM_UNIXTIME(up_work),\'%Y%m%d\')=DATE_FORMAT(NOW(),\'%Y%m%d\')');
		$query = $this->db->get('work');
		$res = $query->result();
		//上班
		if($res)
		{
			$data['to_work'] = '';
		}
		else
		{
			if($time > $hhgy && $time < $ghgy)    //判断是否在上班时间段
			{
				$data['to_work'] = 'go_to_work';
			}
			else
			{
				$data['to_work'] = '';
			}
		}
		$this->db->where('uid='.$uid.' AND DATE_FORMAT(FROM_UNIXTIME(do_work),\'%Y%m%d\')=DATE_FORMAT(NOW(),\'%Y%m%d\')');
		$query2 = $this->db->get('work');
		$res2 = $query2->result();
		//下班
		if($res2)
		{
			$data['off_work'] = '';
		}
		else
		{
			if($time > $ghgy)
			{
				$data['off_work'] = 'go_off_work';
			}
			else
			{
				$data['off_work'] = '';
			}
		}

		$this->load->view('conter',$data);
	}
	//上班
	public function to_work()
	{
		$time = time();                  //当前时间
		$hhgy = strtotime(SYS_UP_WORK);   //可打卡上班时间
		$ghgy = strtotime(SYS_DO_WORK);  //可打卡下班时间
        $getip = $this->get_password->get_client_ip();
		$uid = $this->session->userdata('id');
		$this->db->where('uid='.$uid.' AND DATE_FORMAT(FROM_UNIXTIME(up_work),\'%Y%m%d\')=DATE_FORMAT(NOW(),\'%Y%m%d\')');
		$query = $this->db->get('work');
		$res = $query->result();
		if($res)
		{
			$arr = array('status'=>300,'mess'=>'已打卡!');
		}
		else
		{
			if($time > $hhgy && $time < $ghgy)    //判断是否在上班时间段
			{
				$data = array(
					'uid' => $uid,
					'up_work' => time(),
					'ip_upwork' => $getip,
				);
				$this->db->insert('work',$data);
				$arr = array('status'=>200,'mess'=>'打卡成功!');
			}
			else
			{
				$arr = array('status'=>300,'mess'=>'已打卡!');
			}
		}
		echo json_encode($arr);
	}
	//下班
	public function off_work()
	{
		$time = time();                  //当前时间
		$hhgy = strtotime(SYS_UP_WORK);   //可打卡上班时间
		$ghgy = strtotime(SYS_DO_WORK);  //可打卡下班时间
        $getip = $this->get_password->get_client_ip();
		$uid = $this->session->userdata('id');
		$this->db->where('uid='.$uid.' AND DATE_FORMAT(FROM_UNIXTIME(up_work),\'%Y%m%d\')=DATE_FORMAT(NOW(),\'%Y%m%d\')');
		$query = $this->db->get('work');
		$res = $query->result();
		if($res)
		{
			if($time > $ghgy)    //判断是否在上班时间段
			{
				$data = array(
					'do_work' => time(),
					'ip_dowork' => $getip,
				);
				$this->db->where('id',$res[0]->id);
				$this->db->update('work',$data);
				$arr = array('status'=>200,'mess'=>'打卡成功!');
			}
			else
			{
				$arr = array('status'=>300,'mess'=>'请先打上班卡!');
			}
		}
		else
		{
			$arr = array('status'=>300,'mess'=>'请先打上班卡!');
		}
		echo json_encode($arr);
	}
    	//异步添加备注
	public function ajax_up()
	{
		$uid = $this->input->get_post('uid');
		$mess = $this->pu_fun->trimall($this->input->get_post('mess'));
		$data = array(
			'description' => $mess,
		);
        $this->db->where('id',$uid);
		$this->db->update('work',$data);
		$arr = array('status'=>200,'mess'=>$mess);
		echo json_encode($arr);
	}
	//当月考勤
	public function attendance()
	{
		$offset = $this->input->get('pg', TRUE) ? $this->input->get('pg', TRUE) : 0;
		$psize = 31;    //每页显示7条信息
		$uid = $this->session->userdata('id');
		$this->db->where('uid='.$uid.' AND DATE_FORMAT(FROM_UNIXTIME(up_work),\'%Y%m\')=DATE_FORMAT(NOW(),\'%Y%m\')');
		$data['list'] = $this->pu_fun->article_page('work',$psize,$offset);

		// 加载分页库
		$this->load->library('pagination');
		$config['base_url'] = './attendance';  //分页URL
        $this->db->where('uid='.$uid.' AND DATE_FORMAT(FROM_UNIXTIME(up_work),\'%Y%m\')=DATE_FORMAT(NOW(),\'%Y%m\')');
		$config['total_rows'] = $this->db->count_all_results('work');
		$config['per_page'] = $psize;  //每页显示的数量
		$config['num_links'] = 3;   //表示显示3个带有连接的数字
		$config['use_page_numbers'] = FALSE;
		$config['query_string_segment'] = 'pg';  //改变页码,默认pre_page
		//打开动态分页　?pg
		$config['page_query_string'] = TRUE;
		$this->pagination->initialize($config);  //载入页码器
		$data['page'] = $this->pagination->create_links();  //页码连接
		$this->load->view('attendance',$data);
	}
	//用户列表
	public function admin()
	{
        $staid = $this->input->get_post('staid');
		$offset = $this->input->get('pg', TRUE) ? $this->input->get('pg', TRUE) : 0;
		$psize = 31;    //每页显示7条信息
        $this->db->where('id !=1');
        if($staid==1 || $staid==0 && $staid!=''){
            $this->db->where('state',$staid);
        }
		$data['list'] = $this->pu_fun->article_page('admin_user',$psize,$offset,'id');

		// 加载分页库
		$this->load->library('pagination');
		$config['base_url'] = './attendance';  //分页URL
        $this->db->where('id !=1');
		$config['total_rows'] = $this->db->count_all_results('admin_user');
		$config['per_page'] = $psize;  //每页显示的数量
		$config['num_links'] = 3;   //表示显示3个带有连接的数字
		$config['use_page_numbers'] = FALSE;
		$config['query_string_segment'] = 'pg';  //改变页码,默认pre_page
		//打开动态分页　?pg
		$config['page_query_string'] = TRUE;
		$this->pagination->initialize($config);  //载入页码器
		$data['page'] = $this->pagination->create_links();  //页码连接
		$this->load->view('admin',$data);
	}
	//添加用户页面
	public function adduser()
	{
		$this->load->view('adduser');
	}
	//插入操作
	public function admin_insert()
	{
		$password = $this->input->post('password');
		$password2 = $this->input->post('password2');
		$username = $this->pu_fun->trimall($this->input->post('username'));
        $entry = strtotime($this->input->post('entry'));
		$this->db->where('username',$username);
		$res = $this->pu_fun->showtable('admin_user');
		$rtun = '  <a href="'.base_url().'jqmain/adduser" class="close-btn exit">返回添加</a>';
		if($res)
		{
			echo '用户名已存在!';
			echo $rtun;
			die;
		}
		if($username == '')
		{
			echo '用户名不能为空!';
			echo $rtun;
			die;
		}
		if($password != $password2)
		{
			echo '密码不一致!';
			echo $rtun;
			die;
		}
		$getid = $this->get_password->get_client_ip();
		$date = time();
		$data = array(
			'username'=>$username,
			'password'=>$this->get_password->password_set_hash($password),
            'id_unmber'=>$this->input->post('id_unmber'),
            'address'=>$this->input->post('address'),
            'phone'=>$this->input->post('phone'),
            'sex'=>$this->input->post('sex'),
            'state'=>$this->input->post('state'),
            'entry'=>$entry,
			'email'=>$this->input->post('email'),
			'description'=>$this->input->post('description'),
			'add_time'=>$date,
			'up_time'=>$date,
			'login_time'=>$date,
			'login_ip'=>$getid,
		);
		$this->db->insert('admin_user', $data);
		header('location:'.base_url().'jqmain/admin');
	}
	//修改
	public function edit()
	{
		$this->db->where('id',$this->input->get_post('id'));
		$data['val'] = $this->pu_fun->showtable('admin_user');
		$this->load->view('edit',$data);
	}
    //修改密码
    public function up_pass()
    {
        if($this->input->post('submit'))
        {
            $password = $this->input->post('password');
            $password2 = $this->input->post('password2');
            if($password != $password2 || $password == '')
            {
                echo '<script>alert("密码不一致，或者为空！");window.history.back();</script>';
                die;
            }
            if($password != '')
            {
                if($password == $password2)
                {
                    $password = $this->get_password->password_set_hash($password);
                }
                else
                {
                    echo '<script>alert("密码不一致！");window.history.back();</script>';
                    die;
                }
            }
            $arr = array(
                'password' => $password
            );
            $this->db->where('id',$this->session->id);
            $this->db->update('admin_user', $arr);
            echo '<script>alert("密码已更新成功！");window.history.back();</script>';
        }
        $this->load->view('up_pass');
    }
	//执行修改操作
	public function upedit()
	{
		$password = $this->input->post('password');
		$password2 = $this->input->post('password2');
		$uid = $this->input->post('uid');
		$getid = $this->get_password->get_client_ip();
        $entry = strtotime($this->input->post('entry'));
        $quit_time = strtotime($this->input->post('quit_time'));
		$date = time();
		$rtun = '  <a href="'.base_url().'jqmain/edit?id='.$uid.'" class="close-btn exit">返回添加</a>';
		
		if($password)
		{
			if($password != $password2)
			{
				echo '密码不一致!';
				echo $rtun;
				die;
			}
			$data = array(
				'password'=>$this->get_password->password_set_hash($password),
				'id_unmber'=>$this->input->post('id_unmber'),
				'address'=>$this->input->post('address'),
				'phone'=>$this->input->post('phone'),
				'sex'=>$this->input->post('sex'),
				'state'=>$this->input->post('state'),
				'entry'=>$entry,
				'quit_time'=>$quit_time,
				'email'=>$this->input->post('email'),
				'description'=>$this->input->post('description'),
				'up_time'=>$date,
			);
		}
		else
		{
			$data = array(
                'id_unmber'=>$this->input->post('id_unmber'),
				'address'=>$this->input->post('address'),
				'phone'=>$this->input->post('phone'),
				'sex'=>$this->input->post('sex'),
				'state'=>$this->input->post('state'),
				'entry'=>$entry,
				'quit_time'=>$quit_time,
				'email'=>$this->input->post('email'),
				'description'=>$this->input->post('description'),
				'up_time'=>$date,
			);
		}
		$this->db->where('id',$uid);
		$this->db->update('admin_user', $data);
		header('location:'.base_url().'jqmain/admin');
	}
	//删除操作
	public function del()
	{
		$uid = $this->input->get_post('id');
		$this->pu_fun->onedel('admin_user',$uid);
		header('location:'.base_url().'jqmain/admin');
	}
    	//考勤表
	public function attend_user()
	{
        $offset = $this->input->get('pg', TRUE) ? $this->input->get('pg', TRUE) : 0;
		$uid = $this->input->get_post('uid');
		$psize = 30;
        $start_date = $this->input->get_post('start_date');
        $end_date = $this->input->get_post('end_date');
        $start_today = strtotime($start_date);  //起始时间
		$end_today = strtotime($end_date);  //结束时间
		$table = 'admin_user AS a';
		$table2 = 'work AS b';
		if($uid){ $this->db->where('a.id',$uid); }
        $this->db->where('a.id !=1');
        if($start_date !='' && $end_date != '' )
		{
			$this->db->where('up_work >='.$start_today.' AND  up_work <= '.$end_today);
		}
		$data['list'] = $this->pu_fun->article_jion($table,$table2,'on a.id = b.uid',$psize,$offset);
        $this->db->where('id !=1');
        $this->db->where('state',1);
		$data['user'] = $this->pu_fun->showtable('admin_user');
		// 加载分页库
		$this->load->library('pagination');
		$config['base_url'] = './attend_user?uid='.$uid.'&start_date='.$start_date.'&end_date='.$end_date;  //分页URL
		if($uid){$this->db->where('uid',$uid); }
        $this->db->where('uid !=1');
        if($start_date !='' && $end_date != '' )
		{
			$this->db->where('up_work >='.$start_today.' AND  up_work <= '.$end_today);
		}
		$config['total_rows'] = $this->db->count_all_results('work');
		$config['per_page'] = $psize;  //每页显示的数量
		$config['num_links'] = 3;   //表示显示3个带有连接的数字
		$config['use_page_numbers'] = FALSE;
		$config['query_string_segment'] = 'pg';  //改变页码,默认pre_page
		//打开动态分页　?pg
		$config['page_query_string'] = TRUE;
		$this->pagination->initialize($config);  //载入页码器
		$data['page'] = $this->pagination->create_links();  //页码连接
		$this->load->view('attend_user',$data);
	}
}
