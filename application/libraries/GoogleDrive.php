<?php
if(!defined('cli')) define('cli','runscript');

include_once BASEPATH . "libraries/ybs/cli/dbloader.php";

use ybs\cli\dbloader;
use ybs\http\Response;

class GoogleDrive   {
	
	public $folderSec 		= "./file_sec/";
	public $token			= "token.json";
	public $applicationName = "Google Drive API YBS Sistem";
	public $scoup			= "https://www.googleapis.com/auth/drive";
	
	
	public function __construct(){
		$this->prepareClient();
		$this->service = new Google_Service_Drive($this->client);
	}
	
	
	/*
	* share  
	* @param $fileID File ID of File to be shared	
	* @param $email Email destination
	* @param $message Message for email
	*/
	public function share($fileID,$email,$message){
		
		$role = 'reader';
		$userEmail = $email;
		$fileId = $fileID;

		$userPermission = new Google_Service_Drive_Permission(array(
			  'type' 			=> 'user',
			  'role' 			=> $role,
			  'emailAddress' 	=> $userEmail,
			  
		));

		$request = $this->service->permissions->create(
			  $fileId, $userPermission, array('fields' => 'id','emailMessage'=>$message)
		);
	}
	
	/*
	* shareFile  
	* @param $filePath FilePath in Google Drive 
	* @param $email Email destination
	* @param $message Message for email
	* $param $role role User
	* @return IDPermission 
	*/
	public function shareFile($filePath,$email,$message,$role="reader"){
		
		$userRole = $role;
		$userEmail = $email;
		$files = $this->getFiles($filePath);
		$fileId = @$files['data'][0]['id'];
		
		if(!$fileId) return false;

		$userPermission = new Google_Service_Drive_Permission(array(
			  'type' 			=> 'user',
			  'role' 			=> $userRole,
			  'emailAddress' 	=> $userEmail,
			  
		));

		$request = $this->service->permissions->create(
			  $fileId, $userPermission, array('fields' => 'id','emailMessage'=>$message)
		);
		
		return $request->id;
	}
	
	/*
	* removeShare  
	* @param $filePath FilePath in Google Drive 
	* @param $userEmail Email destination
	* @return boolean 
	*/
	public function removeShare($filePath,$userEmail){
		$files = $this->getFiles($filePath);
		$fileId = @$files['data'][0]['id'];
		if(!$fileId) return false;
		
		$permit = $this->getPermissionFile($filePath);
		
		foreach($permit as $permission){
			if($permission->emailAddress ==$userEmail){
				try {
					$this->service->permissions->delete($fileId, $permission->id);
					return true;
				  } catch (Exception $e) {
					print "An error occurred: " . $e->getMessage();
					return false;
				}
			}
		}
		
		 
	}
	
	/*
	* deleteFile  
	* @param $filePath FilePath in Google Drive 
	* @return boolean 
	*/
	function deleteFile($filePath) {
		$files = $this->getFiles($filePath);
		$fileId = @$files['data'][0]['id'];
		if(!$fileId) return false;
		
	  try {
		$this->service->files->delete($fileId);
		return true;
	  } catch (Exception $e) {
		print "An error occurred: " . $e->getMessage();
		return false;
	  }
	}
	
	/*
	* getPermissionFile  
	* @param $filePath FilePath in Google Drive 
	* @return Permission List 
	*/
	public function getPermissionFile($filePath) {
	  try {
		
		  
		$files = $this->getFiles($filePath);
		$fileId = @$files['data'][0]['id']; 
		
		
		 $parameters = array();
		// Specify what fields you want 
		$parameters['fields'] = "permissions(*)"; 
		$permissions = $this->service->permissions->listPermissions($fileId,$parameters);
		
		return $permissions->getPermissions();
		
	  } catch (Exception $e) {
		print "An error occurred: " . $e->getMessage();
	  }
	  return NULL;
	}
	
	public function getPermissionEmail($email){
		 try {
			$permissionId = $service->permissions->getIdForEmail($email);

			print "ID: " . $permissionId->getId();
		  } catch (Exception $e) {
			print "An error occurred: " . $e->getMessage();
		  }
	}
	
	/*
	* upload Upload File to Google Drive 
	* @param $folderDest path/folder Destination in Google Drive
	* @param $file_path path file upload ,incude the file name
	* @param $file_name file name destination in google drive
	*/
	function upload($file_path,$folderDest, $file_name ){
		
		//$this->verifyToken();
		
		$fold = trim($folderDest);
		$fold = trim($fold,"/");
		$folders = explode("/",$fold);
		
		$parent_id = "";
		foreach($folders as $v){
			//create folder when not exist
			$parent_id = $this->createFolder($v, $parent_id);
		}
		
		
	
		$file = new Google_Service_Drive_DriveFile();

		

		$file->setName( $file_name );

		if( !empty( $parent_id ) ){
			$file->setParents( [ $parent_id ] );        
		}

		$result = $this->service->files->create(
			$file,
			array(
				'data' => file_get_contents($file_path),
				'mimeType' => 'application/octet-stream',
			)
		);

		$is_success = false;
		
		if( isset( $result['name'] ) && !empty( $result['name'] ) ){
			$is_success = true;
		}

		return $is_success;
	}
	
	
	/*
	* createFolder  CreateFolder if not exist and return the IDFolder
	* @param $folder_name 
	* @param $parent_id IDFolder Parent if you want createFolder in Sub
	*/
	function createFolder( $folder_name, $parent_id=null ){

		$folder_list = $this->isExistFolder( $folder_name );
		
		// if folder does not exists
		if(  $folder_list['success']  == 0 ){
			
			$folder = new Google_Service_Drive_DriveFile();
		
			$folder->setName( $folder_name );
			$folder->setMimeType('application/vnd.google-apps.folder');
			if( !empty( $parent_id ) ){
				$folder->setParents( [ $parent_id ] );        
			}

			$result = $this->service->files->create( $folder );
		
			$folder_id = null;
			
			if( isset( $result['id'] ) && !empty( $result['id'] ) ){
				$folder_id = $result['id'];
			}
		
			return $folder_id;
		}

		return $folder_list['data']['id'];
    
	}
	
	
	/*
	* isExistFolder check folder if exist
	* @param $name folder 
	* @param $IDparent Parent folder
	*/
    public function isExistFolder( $name, $IDparent=null ) {
		//$this->prepareClient();
        $retval = array(
            'success' => 0,
            'errorMessage' => null,
            'data'  => array()
        );

		
        $qParent="";
		if ($IDparent)$qParent = "and '$IDparent' in parents";

        $pageToken = null;

        do {
            $response = $this->service->files->listFiles(array(
                'q' => "mimeType='application/vnd.google-apps.folder' and trashed=false $qParent",
                'spaces' => 'drive',
                'pageToken' => $pageToken,
                'fields' => 'nextPageToken, files(id, name,parents)',
            ));

            foreach ($response->files as $file) {
                if ( $file->name === "$name") {
                    $retval['success'] = 1;
                    $retval['data']['id'] = $file->id;
					$retval['data']['name'] = $file->name;
					$retval['data']['parents'] = $file->parents;
                    return $retval;
                }
            }
                $pageToken = $response->nextPageToken;

        } while ($pageToken != null);

        // nothing was found, then return false
        $retval['success'] = 0;
        $retval['errorMessage'] = 'no entry was found';
        return $retval;

    }
	
	
	
	/*
	* getFiles Search Files in Folder
	* @param $folderName The folder you want to see
	* @param $pageSize	Size perpage for list data
	* @param $nextPageToken
	*/
	public function getFiles($folderName=null,$pageSize=20,$nextPageToken=null){
		//$this->prepareClient();
		
		$fold = trim($folderName);
		$fold = trim($fold,"/");
		$folders = explode("/",$fold);
		
		
		$IDFolder="";
		$infoFolder="";
		$xFile=0;
		
		foreach($folders as $v){
			//create folder when not exist
			$infoFolder = $this->isExistFolder($v, $IDFolder);
			$id = @$infoFolder['data']['id'];
			if(!$id) break;
			$IDFolder = @$infoFolder['data']['id'];	
			$xFile++;
		}
		
		/*penanda $xFile adalah posisi file pada array $folders 
		* tapi mutlak,karena jika folder terakhir pada looping di atas
		* tidak di temukan ID nya maka looping berhenti dan di anggap sebagai file
		* ini hanya methode pendekatan
		*/
		$fileName ="";
		if(count($folders) > $xFile) $fileName =  @$folders[$xFile];
		

		
        $retval = array(
            'success' => 0,
            'errorMessage' => null,
            'data'  => array()
        );

		
        $qParent="";
		if ($IDFolder)$qParent = "and '$IDFolder' in parents";

        $pageToken = $nextPageToken;
		
		$lfile=array();
        do {
            $response = $this->service->files->listFiles(array(
                'q' => "mimeType != 'application/vnd.google-apps.folder' and trashed=false $qParent",
				'pageSize' => $pageSize,
				'spaces' => 'drive',
                'pageToken' => $pageToken,
                'fields' => 'nextPageToken, files(id, name,parents)',
            ));

            
			/**
			* Jika $fileName tidak kosong, maka
			* Output $lfile hanya berisi 1 data atau tidak sama sekali,(pengecekan file)
			*
			* jika $fileName kosong maka output $lfile dapat berisi lebih dari 1 atau kosong (pengecekan folder)
			*/
			foreach ($response->files as $file) {
					if($fileName){
						if($file->name == $fileName){
							$lfile [] =[
							'id' => $file->id,
							'name'=> $file->name,
							'parents' => $file->parents
							];
							break;
						}
						
					}else{
						$lfile [] =[
						'id' => $file->id,
						'name'=> $file->name,
						'parents' => $file->parents
						];
					}	
            }
			
               // $pageToken = $response->nextPageToken;

        } while ($pageToken != null);

		if($lfile){
					$retval['success'] = 1;
					$retval['pageSize'] = $pageSize;
                    $retval['data'] = $lfile;
					$retval['nextPageToken'] = $response->nextPageToken;
                    return $retval;
		}

        // nothing was found, then return false
        $retval['success'] = 0;
        $retval['errorMessage'] = 'no entry was found';
        return $retval;
		
	}
	
	
	/*
	* getInfo Get Info from File
	* @param $fileId The FileID from file you want to check
	*/
	public function getInfo( $fileId ) {

        $retval = array(
            'success' => 0,
            'errorMessage' => null,
            'data'  => array()
        );

        $response = $this->service->files->get($fileId, array(
            'fields' => 'id, name, modifiedTime',
            'supportsTeamDrives' => true,
        ));

        if (empty($response)){
            $retval['success'] = 0;
            return $retval;
        }
        
        $retval['success'] = 1;
        $retval['data'] = $response;
        return $retval;
    }
	
	
	
	private function prepareClient(){
		
		$credit =  $this->getActiveCredential();
		
		$this->client = new Google_Client();
		$this->client->setApplicationName($this->applicationName);
		$this->client->setScopes($this->scoup); 
		$this->client->setAuthConfig( $credit->credential );
		$this->client->setAccessType('offline');
		$this->client->setPrompt('select_account consent');
	
		
		$tokenPath =   $this->folderSec . $credit->token_name ;
    if (file_exists($tokenPath)) {
        $accessToken = json_decode(file_get_contents($tokenPath), true);
        $this->client->setAccessToken($accessToken);
    }

    // If there is no previous token or it's expired.
    if ($this->client->isAccessTokenExpired()) {
        // Refresh the token if possible, else fetch a new one.
        if ($this->client->getRefreshToken()) {
            $this->client->fetchAccessTokenWithRefreshToken($this->client->getRefreshToken());
        } else {
            // Request authorization from the user.
            $authUrl = $this->client->createAuthUrl();
			$ci = & get_instance();
			
			
			if (!$ci->input->is_ajax_request()){
				header("Location:".$authUrl);
				die;
			}
			$o = new Outputview();
			$o->success = "redirect";
			$o->message = $authUrl;
			Response::json($o->result());
			
			
        }
        // Save the token to a file.
        if (!file_exists(dirname($tokenPath))) {
            mkdir(dirname($tokenPath), 0700, true);
        }
        file_put_contents($tokenPath, json_encode($this->client->getAccessToken()));
    }
	
	}
	
	
	
	private function getActiveCredential(){
		$model = new dbloader();
		
		$model->db->select("path_credential as credential,token_name");
		$model->db->where('sys_gdrive.status', '1');
		$credit = $model->db->get("sys_gdrive")->row();
		if(!$credit){
			echo "Opps Credential Google Drive Not Found..";
			die;
		}	
		return $credit;
	}
	
	
	private function verifyToken(){
		$credit = $this->getActiveCredential();
		
		if(file_exists("./file_sec/" . $credit->token_name))return;
		
		die;
		
	}
	

	

	
}