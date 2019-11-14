<?php
defined('BASEPATH') OR exit('No direct script access allowed');
set_include_path(get_include_path() . PATH_SEPARATOR . APPPATH . 'third_party/phpseclib');
include(APPPATH . 'third_party/phpseclib/Net/SFTP.php');
include(APPPATH . 'third_party/phpseclib/Crypt/RSA.php');

class Lawyer extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function __construct() {
		parent::__construct();
		$this->load->model('Lawyers');
	}
	
	public function index()
	{
		$data['lawyers'] = $this->Lawyers->getAll();
		$this->load->view('lawyer', $data);
	}

	public function education($certificate = null)
	{
		if ($certificate === null) {
			$data['lawyers'] = $this->Lawyers->getLawyerEducation();
			$this->load->view('lawyer_education', $data);
		} else {
			$sftp = new Net_SFTP('ec2-52-87-163-228.compute-1.amazonaws.com');
			$privateKey = new Crypt_RSA();
			$privateKey->loadKey(file_get_contents('/home/admin/privateKey.pem'));
			if (!$sftp->login('alice', $privateKey)) {
				die("Login failed");
			}
			else {
				echo "YESSS";
				$sftp->chdir('upload');
				// echo $sftp->get($certificate . '.pdf', '/home/admin/test.pdf');
				print_r($sftp->nlist()); // == $sftp->nlist('.')
				// print_r($sftp->rawlist()); // == $sftp->rawlist('.')
			}
		}
	}

	public function test($test){
		echo $test;
	}
}
