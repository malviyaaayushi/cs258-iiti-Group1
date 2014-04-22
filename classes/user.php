<?php 
	class user{
		private $_db,
				$_data,
				$_sessionName,
				$_isLoggedIn,
				$_profile,
				$_biodata,
				$_certificate,
				$_qualifyingService,
				$_foreignService,
				$_ltcDeclaration,
				$_ltcDependents,
				$_serviceRegister;

		public function __construct($user = NULL){
			
			$this->_db = db::get_instance();
			$this->_sessionName = config::get('session/sessionName');

			if(!$user){
				if(session::exists($this->_sessionName)){
					$user = session::get($this->_sessionName);
					if($this->find('username', $user)){
						$this->_isLoggedIn = true;
					}
				}
			}
			else{
				$this->find('id', $user);
			}
		}

		public function create($login, $profile, $biodata, $certification, $declaration){

			if(!$this->_db->insert('login_credentials_tb', $login)){
				echo "Error1";
				throw new exception ('There was an error creating the account');
			}
			if(!$this->_db->insert('profile_information_tb', $profile)){
				echo "Error2";
				throw new exception ('There was an error creating the account');
			}
			if(!$this->_db->insert('biodata_tb', $biodata)){
				echo "Error3";
				throw new exception ('There was an error creating the account');
			}
			if(!$this->_db->insert('certification_attestation_tb', $certification)){
				echo "Error4";
				throw new exception ('There was an error creating the account');
			}
			if(!$this->_db->insert('ltc_declaration_tb', $declaration)){
				echo "Error5";
				throw new exception ('There was an error creating the account');
			}
		}

		public function add_previous_services($previousServices){
			if(!$this->_db->insert('previous_qualifying_service_tb', $previousServices)){
				echo "Error6";
				throw new exception ('There was an error creating the account');
			}
			echo "Added entry from User!";
		}

		public function add_foreign_services($foreignServices){
			if(!$this->_db->insert('foreign_service_tb', $foreignServices)){
				echo "Error7";
				throw new exception ('There was an error creating the account');
			}
		}

		public function find($field, $user = NULL){
			if($user){
				$data = $this->_db->get('login_credentials_tb', array($field, '=', $user));  
				if($data->count()){
					$this->_data = $data->first();
					return $this->_data;
				}
			}
		}
		
		public function profile(){
			$this->_profile = $this->_db->get('profile_information_tb', array('userID', '=', $this->_data->id))->first();
			
		}

		public function biodata(){
			$this->_biodata = $this->_db->get('biodata_tb', array('userID', '=', $this->_data->id))->first();
		}

		public function certificate(){
			$this->_certificate = $this->_db->get('certification_attestation_tb', array('userID', '=', $this->_data->id))->first();
		}

		public function qualifying_service(){
			$this->_qualifyingService = $this->_db->get('previous_qualifying_service_tb', array('userID', '=', $this->_data->id, 'ORDER BY `from`'));			
		}

		public function foreign_services_compute(){
			$this->_foreignService = $this->_db->get('foreign_service_tb', array('userID', '=', $this->_data->id, 'ORDER BY `fromPeriod`'));			
		}

		public function compute_LTC_declaration(){
			$this->_ltcDeclaration = $this->_db->get('ltc_declaration_tb', array('userID', '=', $this->_data->id))->first();
		}
		public function compute_LTC_dependents(){
			$this->_ltcDependents = $this->_db->get('ltc_dependents_tb', array('userID', '=', $this->_data->id));
		}
		public function compute_service_register(){
			$this->_serviceRegister = $this->_db->get('service_register_tb', array('userID', '=', $this->_data->id));	
		}

		public function verify($userCredentials = NULL, $password){
			if($userCredentials){
				$hash = hash::make($password, $userCredentials->salt);
				return ($hash == $userCredentials->password)?true:false;
			}
			return false;
		}

		public function changePassword($newPassword){
			$salt = hash::salt(32);
			$hash = hash::make($newPassword, $salt);
			$this->_db->update('login_credentials_tb', $this->_data->id, 'password', $hash);
			$this->_db->update('login_credentials_tb', $this->_data->id, 'salt', $salt);
		}

		public function login($username, $password){
			$user = $this->find('username', $username);			
			if($this->verify($user, $password)){
				session::put($this->_sessionName, $user->username);
				return true;
			}
			return false;
		}

		public function logout(){
			$this->_isLoggedIn = false;
			session::delete($this->_sessionName);
		}

		public function is_logged_in(){
			return ($this->_isLoggedIn)?true:false;
		}

		public function data(){
			return $this->_data;
		}
		public function profile_data(){
			return $this->_profile;
		}
		public function get_biodata(){
			return $this->_biodata;
		}
		public function get_certificate(){
			return $this->_certificate;
		}
		public function get_qualifying_services(){
			return $this->_qualifyingService;
		}
		public function get_foreign_services(){
			return ($this->_foreignService);
		}
		public function get_ltc_declaration(){
			return $this->_ltcDeclaration;
		}
		public function get_ltc_dependents(){
			return $this->_ltcDependents;
		}
		public function get_service_register(){
			return $this->_serviceRegister;
		}

		public function update_field($field){
			$data = $this->_data;
			
		}		
	}

?>