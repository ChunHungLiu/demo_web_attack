<?php
/*
 * class DB
 * �������ݿ����
 *
 */
class DB{
	private $host="localhost";
	private $name="root";
	private $pass="123456";
	private $db="securetest";
	//���ݿ���DB�Ĺ��캯��
	function __construct(){
		$this->connect();
	}
	
	//�������ݿ�ĺ������ɹ��캯������
	 function connect(){
		$conn=mysql_connect($this->host,$this->name,$this->pass) or die ("���ӳ�����".$this->error());
		mysql_select_db($this->db,$conn) or die("û�и����ݿ⣺".$this->db);
		if(!mysql_query("SET NAMES 'GBK'"))
		{
			echo "�������ݿ��ַ�ʧ��<br>";
		}
	}
	
	 function query($sql) {
		if( !($result=mysql_query($sql)) ){
			echo "<br>ִ��mysql_query����ʧ��<br>".mysql_error();
		}
		return $result;
	}
	
	//��ȡһ��course������
	function getCourseName($cid){
		$sql = "select * from course where cid=$cid";
		$result = mysql_query($sql);
		$row = mysql_fetch_array($result, MYSQL_ASSOC);
		return $row['cname'];
	}
	//ȡ��ǰһ�� MySQL ������Ӱ��ļ�¼����
	 function affected_rows() {
		return mysql_affected_rows();
	}
	
	//ȡ�ý�������е���Ŀ
	 function num_rows($result) {
		return @mysql_num_rows($result);
	}

	//�ͷŽ���ڴ�
	 function free_result($result) {
		return mysql_free_result($result);
	}
	
	//ȡ����һ�� INSERT ���������� ID 
	 function insert_id() {
		return mysql_insert_id();
	}
	
	//�ӽ������ȡ��һ����Ϊö������
	 function fetch_row($query) {
		return mysql_fetch_row($query);
	}
	//�ӽ������ȡ��һ����Ϊö������
	 function fetch_array($query) {
		return mysql_fetch_array($query);
	}
	
	 function close() {
		return mysql_close();
	}
	
	 function insert($table,$name,$value){
		$this->query("insert into $table ($name) value ($value)");
		echo "����ɹ�<br>";
	}
}
$dbconn = new DB();