<?php

/**
 * UserIdentity represents the data needed to identity a user.
 * It contains the authentication method that checks if the provided
 * data can identity the user.
 */



class UserIdentity extends CUserIdentity
{
	private $_id;
	public $_ActivoEstudiante ;
	public $_ActivoEmpresa ;
	/**
	 * Authenticates a user.
	 * The example implementation makes sure if the username and password
	 * are both 'demo'.
	 * In practical applications, this should be changed to authenticate
	 * against some persistent user identity storage (e.g. database).
	 * @return boolean whether authentication succeeds.
	 */
	public function authenticate()
	{
		$user = UsuarioUnitec::model()->findByAttributes(array('Usuario'=>$this->username));
		//$user = UsuarioUnitec::model()->find("LOWER(username)=?",array(strtolower($this->username)));

		if($user === null)
			$this->errorCode=self::ERROR_USERNAME_INVALID;

		elseif($this->password!== $user->Contrasena)
			$this->errorCode=self::ERROR_PASSWORD_INVALID;
		else
		{

				$VerificaAsesor = 	$Curso = CarreraPorUsuarioUnitec::model()->findAllByAttributes(array('UsuarioUnitec_IdUsuarioUnitec'=>$user->IdUsuarioUnitec,'TipoUsuarioUnitec_IdTipoUsuarioUnitec'=>2,'Activo'=>1));
			
				if(!empty($VerificaAsesor)){
				$this->setState('EsJefeAcademico', true);	
				}
				else
				{
				$this->setState('EsJefeAcademico', false);	
				}

			$this->_id = $user->IdUsuarioUnitec;
			$this->errorCode=self::ERROR_NONE;

		}
			
		return !$this->errorCode;
	}

	public function getId()
	{
		return $this->_id;

	}

	public function authenticateEstudiantes()
	{
		$user = UsuarioEstudiante::model()->findByAttributes(array('Usuario'=>$this->username));
		//$user = UsuarioUnitec::model()->find("LOWER(username)=?",array(strtolower($this->username)));

		if($user === null)
			$this->errorCode=self::ERROR_USERNAME_INVALID;

		elseif($this->password!== $user->Contrasena)
			$this->errorCode=self::ERROR_PASSWORD_INVALID;
		else
		{
			$this->_ActivoEstudiante = $user->Activo ;

			$this->_id = $user->IdUsuarioEstudiante;

			$this->setState('Activo', (string) $user->Activo);
			$this->errorCode=self::ERROR_NONE;

		}
			
		return !$this->errorCode;
	}

	public function authenticateEmpresa()
	{
		$user = ContactoEmpresa::model()->findByAttributes(array('Usuario'=>$this->username));
		//$user = UsuarioUnitec::model()->find("LOWER(username)=?",array(strtolower($this->username)));

		if($user === null)
			$this->errorCode=self::ERROR_USERNAME_INVALID;

		elseif($this->password!== $user->Contrasena)
			$this->errorCode=self::ERROR_PASSWORD_INVALID;
		else
		{

			$this->_ActivoEmpresa = $user->Activo;
			$this->_id = $user->IdContactoEmpresa;

			$this->setState('Activo', (string) $user->Activo);
			$this->setState('EmpresaActivo', (string) $user->usuarioEmpresa->Activo);
			
			

			$this->errorCode=self::ERROR_NONE;

		}
			
		return !$this->errorCode;
	}

}