var RegForm = function () {

    return {
        
        //Registration Form
        initRegForm: function () {
	        // Validation       
	        $("#usuario-estudiante-form").validate({                   
	            // Rules for form validation
	            rules:
	            {
	                username:
	                {
	                    required: true,
	                    minlength: 3,
	                    maxlength: 20
	                },
	                email:
	                {
	                    required: true,
	                    email: true
	                },
	                 NumeroDeCuenta:
	                {
	                    required: true,
	                    digits:true
	                   
	                },
	                password:
	                {
	                    required: true,
	                    minlength: 3,
	                    maxlength: 20
	                },
	                passwordConfirm:
	                {
	                    required: true,
	                    minlength: 3,
	                    maxlength: 20,
	                    equalTo: '#password'
	                },
	                firstname:
	                {
	                    required: true
	                },
	                PrimerApellido:
	                {
	                    required: true,
	                    minlength: 3,
	                    maxlength: 20
	                },
	                SegundoApellido:
	                {
	                    required: false,
	                    minlength: 3,
	                    maxlength: 20
	                },
	                gender:
	                {
	                    required: true
	                },
	                terms:
	                {
	                    required: true
	                },

	                NombreEstudiante:
	                {
	                    required: true,
	                    minlength: 3,
	                    maxlength: 20
	                }
	                ,

	                tipoCarrera:
	                {
	                    required: true
	                }
	                ,

	                FiltroCarrerasPorTipo:
	                {
	                    required: true
	                }



	            },
	            
	            // Messages for form validation
	            messages:
	            {
	                login:
	                {
	                    required: 'Please enter your login'
	                },
	                username:
	                {
	                    required: 'Ingrese su nombre de Usuario',
	                    minlength: 'Su usuario no puede ser menor a 3 caracteres',
	                    maxlength: 'Su usuario no puede ser mayor a 20 caracteres'
	                },
	                email:
	                {
	                    required: 'Ingrese su correo electrónico ',
	                    email: 'Por favor ingrese un correo electrónico válido'
	                },
	                password:
	                {
	                	minlength: 'Tamaño minimo 3 caracteres',
	                	maxlength: 'Tamaño maximo 20 caracteres',
	                    required: 'Ingrese su contraseña'
	                },
	                passwordConfirm:
	                {
	                    required: 'Por favor confirme su contraseña',
	                    minlength: 'Tamaño minimo 3 caracteres',
	                	maxlength: 'Tamaño maximo 20 caracteres',
	                    equalTo: 'Las contraseñas no son las mismas.'
	                },

	                NumeroDeCuenta:
	                {
	                    required: 'Ingrese su numero de cuenta de UNITEC',
	                   	digits  : 'El numero de cuenta solo es con dígitos'
	                },
	                firstname:
	                {
	                    required: 'Please select your first name'
	                },
	                PrimerApellido:
	                {
	                    required: 'Ingrese su Primer Apellido',
	                    minlength: 'Apellido no puede ser menor a 3 caracteres',
	                    maxlength: 'Apellido no puede ser mayor a 20 caracteres'
	                },
	                 SegundoApellido:
	                {
	                    required: 'El segundo apellido es opcional',
	                    minlength: 'Apellido no puede ser menor a 3 caracteres',
	                    maxlength: 'Apellido no puede ser mayor a 20 caracteres'
	                },
	                gender:
	                {
	                    required: 'Please select your gender'
	                },
	                terms:
	                {
	                    required: 'Tiene que aceptar los terminos y condiciones'
	                },
	                 NombreEstudiante:
	                {
	                    required: 'Por favor ingrese su primer y segundo nombre',
	                    minlength: 'Nombre no puede ser menor a 3 caracteres',
	                    maxlength: 'Nombre no puede ser mayor a 20 caracteres'
	                },
	                 tipoCarrera:
	                {
	                    required: 'Seleccione el tipo de carrera que estudia'
	                },
	                 FiltroCarrerasPorTipo:
	                {
	                    required: 'Seleccione la carrera que estudia'
	                }

	                
	            },  


	            
	            // Do not change code below
	            errorPlacement: function(error, element)
	            {
	                error.insertAfter(element.parent());
	            }
	        });




			    // Validation       
	        $("#usuario-unitec-form").validate({                   
	            // Rules for form validation
	            rules:
	            {
	                username:
	                {
	                    required: true,
	                    minlength: 3,
	                    maxlength: 20
	                },
	                email:
	                {
	                    required: true,
	                    email: true
	                },
	                 NumeroDeCuenta:
	                {
	                    required: true,
	                    digits:true
	                   
	                },
	                password:
	                {
	                    required: true,
	                    minlength: 3,
	                    maxlength: 20
	                },
	                passwordConfirm:
	                {
	                    required: true,
	                    minlength: 3,
	                    maxlength: 20,
	                    equalTo: '#password'
	                },
	                firstname:
	                {
	                    required: true
	                },
	                PrimerApellido:
	                {
	                    required: true,
	                    minlength: 3,
	                    maxlength: 20
	                },
	                SegundoApellido:
	                {
	                    required: false,
	                    minlength: 3,
	                    maxlength: 20
	                },
	                gender:
	                {
	                    required: true
	                },
	                terms:
	                {
	                    required: true
	                },

	                NombreJefeAsesor:
	                {
	                    required: true,
	                    minlength: 3,
	                    maxlength: 20
	                }


	            },
	            
	            // Messages for form validation
	            messages:
	            {
	                login:
	                {
	                    required: 'Please enter your login'
	                },
	                username:
	                {
	                    required: 'Ingrese su nombre de Usuario',
	                    minlength: 'Su usuario no puede ser menor a 3 caracteres',
	                    maxlength: 'Su usuario no puede ser mayor a 20 caracteres'
	                },
	                email:
	                {
	                    required: 'Ingrese su correo electrónico ',
	                    email: 'Por favor ingrese un correo electrónico válido'
	                },
	                password:
	                {
	                	minlength: 'Tamaño minimo 3 caracteres',
	                	maxlength: 'Tamaño maximo 20 caracteres',
	                    required: 'Ingrese su contraseña'
	                },
	                passwordConfirm:
	                {
	                    required: 'Por favor confirme su contraseña',
	                    minlength: 'Tamaño minimo 3 caracteres',
	                	maxlength: 'Tamaño maximo 20 caracteres',
	                    equalTo: 'Ingrese la misma contraseña de la izquierda'
	                },

	                NumeroDeCuenta:
	                {
	                    required: 'Ingrese su numero de cuenta de UNITEC',
	                   	digits  : 'El numero de cuenta solo es con dígitos'
	                },
	                firstname:
	                {
	                    required: 'Please select your first name'
	                },
	                PrimerApellido:
	                {
	                    required: 'Ingrese su Primer Apellido',
	                    minlength: 'Apellido no puede ser menor a 3 caracteres',
	                    maxlength: 'Apellido no puede ser mayor a 20 caracteres'
	                },
	                 SegundoApellido:
	                {
	                    required: 'El Segundo apellido es opcional',
	                    minlength: 'Apellido no puede ser menor a 3 caracteres',
	                    maxlength: 'Apellido no puede ser mayor a 20 caracteres'
	                },
	                gender:
	                {
	                    required: 'Please select your gender'
	                },
	                terms:
	                {
	                    required: 'Tiene que aceptar los terminos y condiciones'
	                },
	                 NombreJefeAsesor:
	                {
	                    required: 'Por favor ingrese su primer y segundo nombre',
	                    minlength: 'Nombre no puede ser menor a 3 caracteres',
	                    maxlength: 'Nombre no puede ser mayor a 20 caracteres'
	                }
	            },  


	            
	            // Do not change code below
	            errorPlacement: function(error, element)
	            {
	                error.insertAfter(element.parent());
	            }
	        });

	    //COMIENZA VALIDACIÓN CAMPOS ADICIONALES   
	        $("#ActualizarInfoAdicional").validate({                   
	            // Rules for form validation
	            rules:
	            {

	                ObjetivoProfesional:
	                {
	                    required: true,
	                    minlength: 130,
	                    maxlength: 220
	                },
	                 DescripcionPersonal:
	                {
	                    required: true,
	                    minlength: 130,
	                    maxlength: 220
	                },
	                Mision:
	                {
	                    required: true,
	                    minlength: 130,
	                    maxlength: 220
	                },
	                 Vision:
	                {
	                    required: true,
	                    minlength: 130,
	                    maxlength: 220
	                }


	            },
	            
	            // Messages for form validation
	            messages:
	            {
	               
	                 ObjetivoProfesional:
	                {
	                    required: 'Por favor ingrese su objetivo profesional',
	                    minlength: 'Objetivo profesional no puede ser menor a 130 caracteres - SIGA ESCRIBIENDO HASTA QUE EL CAMPO SE TORNE COLOR VERDE.',
	                    maxlength: 'Objetivo profesional no puede ser mayor a 220 caracteres'
	                }
	                , 
	                DescripcionPersonal:
	                {
	                    required: 'Por favor ingrese su Descripción Personal',
	                    minlength: 'Descripción personal no puede ser menor a 130 caracteres - SIGA ESCRIBIENDO HASTA QUE EL CAMPO SE TORNE COLOR VERDE.',
	                    maxlength: 'Descripción personal no puede ser mayor a 220 caracteres'
	                },
	                  Mision:
	                {
	                    required: 'Por favor ingrese la misión de su empresa',
	                    minlength: 'Misión no puede ser menor a 130 caracteres - SIGA ESCRIBIENDO HASTA QUE EL CAMPO SE TORNE COLOR VERDE.',
	                    maxlength: 'Misión no puede ser mayor a 220 caracteres'
	                }
	                , 
	                Vision:
	                {
	                    required: 'Por favor ingrese la visión de su empresa',
	                    minlength: 'La Visión no puede ser menor a 130 caracteres - SIGA ESCRIBIENDO HASTA QUE EL CAMPO SE TORNE COLOR VERDE.',
	                    maxlength: 'La Visión no puede ser mayor a 220 caracteres'
	                }
	            },  


	            
	            // Do not change code below
	            errorPlacement: function(error, element)
	            {
	                error.insertAfter(element.parent());
	            }
	        });
			//TERMINA VALIDACIÓN CAMPOS ADICIONALES

			


				 // Validando PRIMER APELLIDO View UsuarioEstudiante
                $("#NEForm").validate(
                {                   
                    // Rules for form validation
                    rules:
                    {
                        NombreEstudiante:
                        {
                            required: true,
                            minlength: 3,
	                    	maxlength: 20
                        }
                    },
                                        
                    // Messages for form validation
                    messages:
                    {
                        NombreEstudiante:
                        {
                            required: 'Ingrese su primer nombre',
                            minlength: 'Nombre no puede ser menor a 3 caracteres',
	                   	    maxlength: 'Nombre no puede ser mayor a 20 caracteres'
                        }
                    },
                    
                    // Ajax form submition                  
                    submitHandler: function(form)
                    {
                        $(form).ajaxSubmit(
                        {
                            beforeSend: function()
                            {
                                $('#NEForm button[type="submit"]').attr('disabled', true);
                            },
                            success: function()
                            {
                                $("#NEForm").addClass('submited');
                              
                            }
                        });
                    },          
                    
                    // Do not change code below
                    errorPlacement: function(error, element)
                    {
                        error.insertAfter(element.parent());
                    }
                });

		
			



				 // Validando PRIMER APELLIDO View UsuarioEstudiante
                $("#PAE").validate(
                {                   
                    // Rules for form validation
                    rules:
                    {
                        PrimerApellido:
                        {
                            required: true,
                             minlength: 3,
	                  		  maxlength: 20
                        }
                    },
                                        
                    // Messages for form validation
                    messages:
                    {
                        PrimerApellido:
                        {
                            required: 'Ingrese su primer apellido',
                            minlength: 'Apellido no puede ser menor a 3 caracteres',
	                    	maxlength: 'Apellido no puede ser mayor a 20 caracteres'
                        }
                    },
                    
                    // Ajax form submition                  
                    submitHandler: function(form)
                    {
                        $(form).ajaxSubmit(
                        {
                            beforeSend: function()
                            {
                                $('#PAE button[type="submit"]').attr('disabled', true);
                            },
                            success: function()
                            {
                                $("#PAE").addClass('submited');
                              
                            }
                        });
                    },          
                    
                    // Do not change code below
                    errorPlacement: function(error, element)
                    {
                        error.insertAfter(element.parent());
                    }
                });

		
			


				 // Validando SEGUNDO APELLIDO View UsuarioEstudiante
                $("#SAE").validate(
                {                   
                    // Rules for form validation
                    rules:
                    {
                        SegundoApellido:
                        {
                            required: true,
                            minlength: 3,
	                   		 maxlength: 20
                        }
                    },
                                        
                    // Messages for form validation
                    messages:
                    {
                        SegundoApellido:
                        {
                            required: 'Ingrese su segundo apellido',
                            minlength: 'Apellido no puede ser menor a 3 caracteres',
	                    maxlength: 'Apellido no puede ser mayor a 20 caracteres'
                        }
                    },
                    
                    // Ajax form submition                  
                    submitHandler: function(form)
                    {
                        $(form).ajaxSubmit(
                        {
                            beforeSend: function()
                            {
                                $('#SAE button[type="submit"]').attr('disabled', true);
                            },
                            success: function()
                            {
                                $("#SAE").addClass('submited');
                              
                            }
                        });
                    },          
                    
                    // Do not change code below
                    errorPlacement: function(error, element)
                    {
                        error.insertAfter(element.parent());
                    }
                });

 // Validando USUARIO View UsuarioEstudiante
                $("#usuario").validate(
                {                   
                    // Rules for form validation
                    rules:
                    {
                        username:
                        {
                            required: true, 
                             minlength: 3,
	                   		 maxlength: 20
	                   		
	                	}
                        
                    },
                                        
                    // Messages for form validation
                    messages:
                    {
                        username:
                        {
                             required: 'Ingrese su usuario',
                             minlength: 'Su usuario no puede ser menor a 3 caracteres',
	                    	 maxlength: 'Su usuario no puede ser mayor a 20 caracteres'
	                  	      
                        }
                    },
                    
                    // Ajax form submition                  
                    submitHandler: function(form)
                    {
                        $(form).ajaxSubmit(
                        {
                            beforeSend: function()
                            {
                                $('#usuario button[type="submit"]').attr('disabled', true);
                            },
                            success: function()
                            {
                                $("#usuario").addClass('submited');
                              
                            }
                        });
                    },          
                    
                    // Do not change code below
                    errorPlacement: function(error, element)
                    {
                        error.insertAfter(element.parent());
                    }
                });


		// Validando USUARIO View UsuarioEstudiante
                $("#NcuentaUpdate").validate(
                {                   
                    // Rules for form validation
                    rules:
                    {
                        NumeroDeCuenta:
                        {
                        required: true,
	                    digits:true,
	                     minlength: 3,
	                   		 maxlength: 20
	                   
	                   		
	                	}
                        
                    },
                                        
                    // Messages for form validation
                    messages:
                    {
                        NumeroDeCuenta:
                        {
                             required: 'Ingrese su numero de cuenta de UNITEC',
	                   	digits  : 'El numero de cuenta solo es con dígitos',
	                   	  minlength: 'Numero de Cuenta no puede ser menor a 3 caracteres',
	                    	 maxlength: 'Numero de Cuenta no puede ser mayor a 20 caracteres'
	                  	      
                        }
                    },
                    
                    // Ajax form submition                  
                    submitHandler: function(form)
                    {
                        $(form).ajaxSubmit(
                        {
                            beforeSend: function()
                            {
                                $('#NcuentaUpdate button[type="submit"]').attr('disabled', true);
                            },
                            success: function()
                            {
                                $("#NcuentaUpdate").addClass('submited');
                              
                            }
                        });
                    },          
                    
                    // Do not change code below
                    errorPlacement: function(error, element)
                    {
                        error.insertAfter(element.parent());
                    }
                });

	


// Validando EMAIL View UsuarioEstudiante
                $("#emailUsuarioEstudiante").validate(
                {                   
                    // Rules for form validation
                    rules:
                    {
                        email:
	                {
	                    required: true,
	                    email: true
	                }
                        
                    },
                                        
                    // Messages for form validation
                    messages:
                    {
	                       email:
		                {
		                    required: 'Ingrese su correo electrónico ',
		                    email: 'Por favor ingrese un correo electrónico válido'
		                }
                    },
                    
                    // Ajax form submition                  
                    submitHandler: function(form)
                    {
                        $(form).ajaxSubmit(
                        {
                            beforeSend: function()
                            {
                                $('#emailUsuarioEstudiante button[type="submit"]').attr('disabled', true);
                            },
                            success: function()
                            {
                                $("#emailUsuarioEstudiante").addClass('submited');
                              
                            }
                        });
                    },          
                    
                    // Do not change code below
                    errorPlacement: function(error, element)
                    {
                        error.insertAfter(element.parent());
                    }
                });


// Validando Creación de  tipos de Carreras en Parametrizacion  - Usuario Unitec
                $("#TDC").validate(
                {                   
                    // Rules for form validation
                    rules:
                    {
                        Nombre:
	                {
	                    required: true,  
	                    minlength: 5,
	                    maxlength: 50,
	                    
	                }
                        
                    },
                                        
                    // Messages for form validation
                    messages:
                    {
	                       Nombre:
		                {
		                    required: 'Por favor ingrese el tipo de carrera',
		                    minlength: 'Tipo de carrera no puede ser menor a 5 caracteres',
		                    maxlength: 'Tipo de carrera no puede ser mayor a 50 caracteres'
		                }
                    },
                    
                    // Ajax form submition                  
                    submitHandler: function(form)
                    {
                        $(form).ajaxSubmit(
                        {
                            beforeSend: function()
                            {
                                $('#TDC button[type="submit"]').attr('disabled', true);
                            },
                            success: function()
                            {
                                $("#TDC").addClass('submited');
                              
                            }
                        });
                    },          
                    
                    // Do not change code below
                    errorPlacement: function(error, element)
                    {
                        error.insertAfter(element.parent());
                    }
                });



// Validando Creación de  tipos de Carreras en Parametrizacion  - Usuario Unitec
                $("#CrearCarrera").validate(
                {                   
                    // Rules for form validation
                    rules:
                    {
                        NombreCarrera:
	                {
	                    required: true,  
	                    minlength: 5,
	                    maxlength: 50,
	                    
	                },
	                   TipoCarreraId:
	                {
	                    required: true,  
	                   
	                    
	                }
                        
                    },
                                        
                    // Messages for form validation
                    messages:
                    {
	                       NombreCarrera:
		                {
		                    required: 'Por favor ingrese el nombre de la carrera',
		                    minlength: 'Nombre de la carrera no puede ser menor a 5 caracteres',
		                    maxlength: 'Nombre de la carrera no puede ser mayor a 50 caracteres'
		                },
		                  TipoCarreraId:
		                {
		                    required: 'Por favor seleccione el tipo de la carrera'
		                   
		                }
                    },
                    
                    // Ajax form submition                  
                    submitHandler: function(form)
                    {
                        $(form).ajaxSubmit(
                        {
                            beforeSend: function()
                            {
                                $('#CrearCarrera button[type="submit"]').attr('disabled', true);
                            },
                            success: function()
                            {
                                $("#CrearCarrera").addClass('submited');
                              
                            }
                        });
                    },          
                    
                    // Do not change code below
                    errorPlacement: function(error, element)
                    {
                        error.insertAfter(element.parent());
                    }
                });

	
		// Validando Creación de  tipos de Carreras en Parametrizacion  - Usuario Unitec
                $("#CrearTipoEmpresaa").validate(
                {                   
                    // Rules for form validation
                    rules:
                    {
                        NombreTipoEmpresa:
	                {
	                    required: true,  
	                    minlength: 5,
	                    maxlength: 50,
	                    
	                }
                        
                    },
                                        
                    // Messages for form validation
                    messages:
                    {
	                       NombreTipoEmpresa:
		                {
		                    required: 'Tipo de Empresa no puede ser vacio',
		                    minlength: 'Tipo de empresa no puede ser menor a 5 caracteres',
		                    maxlength: 'Tipo de Empresa no puede ser mayor a 50 caracteres'
		                }
                    },
                    
                    // Ajax form submition                  
                    submitHandler: function(form)
                    {
                        $(form).ajaxSubmit(
                        {
                            beforeSend: function()
                            {
                                $('#CrearTipoEmpresaa button[type="submit"]').attr('disabled', true);
                            },
                            success: function()
                            {
                                $("#CrearTipoEmpresaa").addClass('submited');
                              
                            }
                        });
                    },          
                    
                    // Do not change code below
                    errorPlacement: function(error, element)
                    {
                        error.insertAfter(element.parent());
                    }
                });


	// Creando Cursos
                $("#CrenadoCursosCarrerasPorCurso").validate(
                {                   
                    // Rules for form validation
                    rules:
                    {
                        NombreCurso:
	                {
	                    required: true,  
	                    minlength: 5,
	                    maxlength: 50,
	                    
	                },
	                 CodigoCurso:
	                {
	                    required: true,
	                    minlength: 3,
	                    maxlength: 10,
	                  
	                   
	                },
	                 SeccionCurso:
	                {
	                    required: true,
	                    digits:true,
	                    minlength: 2,
	                  
	                }   
	                ,
	                 AsesorCurso:
	                {
	                    required: true,
	                  
	                }   
	                ,
	                 PeriodoAcademicoCurso:
	                {
	                    required: true,
	                  
	                }   
	                ,
	                 Carreras:
	                {
	                    required: true,
	                  
	                }   
                        
                    },
                                        
                    // Messages for form validation
                    messages:
                    {
	                       NombreCurso:
		                {
		                    required: 'Nombre del curso NO puede ser vacio',
		                    minlength: 'Nombre del curso no puede ser menor a 5 caracteres',
		                    maxlength: 'Nombre del curso no puede ser mayor a 50 caraciteres'
		                },
		                  CodigoCurso:
		                {
		                    required: 'Código NO puede ser vacio',
		                    minlength: 'Código no puede ser menor a 3 caracteres',
		                    maxlength: 'Código  no puede ser mayor a 10 caraciteres'
		                },
		                SeccionCurso:
		                {
		                    required: 'Sección NO puede ser vacio',
		                    minlength: 'Seccion NO puede ser menor a 2 digitos',
		                    digits: 'Solamente se permiten digitos'
		                   
		                },
		                AsesorCurso:
		                {
		                    required: ''
		                    
		                   
		                }
		                ,
		                PeriodoAcademicoCurso:
		                {
		                    required: ''
		                    
		                   
		                }
		                 ,
		                Carreras:
		                {
		                    required: ''
		                    
		                   
		                }


                    },
                    
                    // Ajax form submition                  
                    submitHandler: function(form)
                    {
                        $(form).ajaxSubmit(
                        {
                            beforeSend: function()
                            {
                                $('#CrenadoCursosCarrerasPorCurso button[type="submit"]').attr('disabled', true);
                            },
                            success: function()
                            {
                                $("#CrenadoCursosCarrerasPorCurso").addClass('submited');
                              
                            }
                        });
                    },          
                    
                    // Do not change code below
                    errorPlacement: function(error, element)
                    {
                        error.insertAfter(element.parent());
                    }
                });



						// Creando Cursos
                $("#EditandoCursosCarrerasPorCurso").validate(
                {                   
                    // Rules for form validation
                    rules:
                    {
	                 AsesorCurso2:
	                {
	                    required: true,
	                  
	                }   
	                ,
	                 PeriodoAcademicoCurso2:
	                {
	                    required: true,
	                  
	                }   
	                ,
	                 Carreras2:
	                {
	                    required: true,
	                  
	                }   
                        
                    },
                                        
                    // Messages for form validation
                    messages:
                    {
	            
		                AsesorCurso2:
		                {
		                    required: ''
		                    
		                   
		                }
		                ,
		                PeriodoAcademicoCurso2:
		                {
		                    required: ''
		                    
		                   
		                }
		                 ,
		                Carreras2:
		                {
		                    required: ''
		                    
		                   
		                }


                    },
                    
                    // Ajax form submition                  
                    submitHandler: function(form)
                    {
                        $(form).ajaxSubmit(
                        {
                            beforeSend: function()
                            {
                                $('#EditandoCursosCarrerasPorCurso button[type="submit"]').attr('disabled', true);
                            },
                            success: function()
                            {
                                $("#EditandoCursosCarrerasPorCurso").addClass('submited');
                              
                            }
                        });
                    },          
                    
                    // Do not change code below
                    errorPlacement: function(error, element)
                    {
                        error.insertAfter(element.parent());
                    }
                });

					
						// Enviando solicitud de asesor o jefe Usuario Unitec
                $("#CrearAsesoramientoParaAlumno").validate(
                {                   
                    // Rules for form validation
                    rules:
                    {
	                 comentarios:
	                {
	                    required: true,
	                    minlength: 10,
	                    maxlength: 400,

	                  
	                }   
	                ,
	                 asesoramiento:
	                {
	                    required: true,
	                    minlength: 10,
	                    maxlength: 800,
	                  
	                }   
	             
                        
                    },
                                        
                    // Messages for form validation
                    messages:
                    {
	            
		                comentarios:
		                {
		                    required: 'Ingrese un comentario',
		                     minlength: 'El comentario debe de tener al menos 10 caracteres ',
	                    maxlength: 'El comentario debe de tener un maximo de  400 caracteres '
		                    
		                   
		                }
		                ,
		                asesoramiento:
		                {
		                    required: 'Ingrese las recomendaciones o puntos acordados en el asesoramiento',
		                     minlength: 'Los puntos acordados deben  tener al menos 10 caracteres ',
	                    maxlength: 'Los puntos acordados deben  tener un maximo de  800 caracteres '
		                   
		                }
		          


                    },
                    
                    // Ajax form submition                  
                    submitHandler: function(form)
                    {
                        $(form).ajaxSubmit(
                        {
                            beforeSend: function()
                            {
                                $('#CrearAsesoramientoParaAlumno button[type="submit"]').attr('disabled', true);
                            },
                            success: function()
                            {
                                $("#CrearAsesoramientoParaAlumno").addClass('submited');
                              
                            }
                        });
                    },          
                    
                    // Do not change code below
                    errorPlacement: function(error, element)
                    {
                        error.insertAfter(element.parent());
                    }
                });





						// Enviando solicitud de asesor o jefe Usuario Unitec
                $("#SolicitudCarreraAsesor").validate(
                {                   
                    // Rules for form validation
                    rules:
                    {
	                 Carrera:
	                {
	                    required: true,
	                  
	                }   
	                ,
	                 TipoUsuarioUnitec:
	                {
	                    required: true,
	                  
	                }   
	             
                        
                    },
                                        
                    // Messages for form validation
                    messages:
                    {
	            
		                Carrera:
		                {
		                    required: 'Seleccione una Carrera'
		                    
		                   
		                }
		                ,
		                TipoUsuarioUnitec:
		                {
		                    required: 'Seleccione si desea ser asesor o Jefe'
		                    
		                   
		                }
		          


                    },
                    
                    // Ajax form submition                  
                    submitHandler: function(form)
                    {
                        $(form).ajaxSubmit(
                        {
                            beforeSend: function()
                            {
                                $('#SolicitudCarreraAsesor button[type="submit"]').attr('disabled', true);
                            },
                            success: function()
                            {
                                $("#SolicitudCarreraAsesor").addClass('submited');
                              
                            }
                        });
                    },          
                    
                    // Do not change code below
                    errorPlacement: function(error, element)
                    {
                        error.insertAfter(element.parent());
                    }
                });


	
				// Enviando solicitud de asesor o jefe Usuario Unitec
                $("#uploadform").validate(
                {                   
                    // Rules for form validation
                    rules:
                    {
	                 Imagen:
	                {
	                    required: true,
	                  
	                }   
	              
                        
                    },
                                        
                    // Messages for form validation
                    messages:
                    {
	            
		                Imagen:
		                {
		                    required: 'Es necesario que seleccione una imágen desde su computadora.'
		                    
		                   
		                }

                    },
                    
                    // Ajax form submition                  
                    submitHandler: function(form)
                    {
                        $(form).ajaxSubmit(
                        {
                            beforeSend: function()
                            {
                                $('#uploadform button[type="submit"]').attr('disabled', true);
                            },
                            success: function()
                            {
                                $("#uploadform").addClass('submited');
                              
                            }
                        });
                    },          
                    
                    // Do not change code below
                    errorPlacement: function(error, element)
                    {
                        error.insertAfter(element.parent());
                    }
                });

	




							// Enviando solicitud de asesor o jefe Usuario Unitec
                $("#SolicitudPracticaProfesional").validate(
                {                   
                    // Rules for form validation
                    rules:
                    {
	                 AreaODepartamento:
	                {
	                    required: true,
	                  
	                }   
	                ,
	                 PuestoDesempeniar:
	                {
	                    required: true,
	                  
	                }   
	                 ,
	                 HoraEntrada:
	                {
	                    required: true,
	                  
	                }   
	                 ,
	                 HoraSalida:
	                {
	                    required: true,
	                  
	                }   
	                  ,
	                 FechaVencimientoPlaza:
	                {
	                     required: true,
	                    date: true
	                  
	                }   
	                 ,
	                 ObjetivoDelCargo:
	                {
	                    required: true,
	                    minlength: 155,
	                    maxlength: 350
	                  
	                }     ,
	                 Reponsabilidades:
	                {
	                    required: true,
	                  
	                }   
	                  ,
	                 Observaciones:
	                {
	                     required: false,
	                   
	                  
	                }   
	                 ,
	                 terms:
	                {
	                    required: true,
	                  
	                }   
	                 ,
	                 carrerita:
	                {
	                    required: true,
	                  
	                } ,
	                
	                 carrerasPracticaProfesional:
	                {
	                    required: true,
	                  
	                } 
	             
	             
                        
                    },
                                        
                    // Messages for form validation
                    messages:
                    {
	            
		                AreaODepartamento:
		                {
		                    required: 'Ingrese el area o departamento.'
		                    
		                   
		                }
		                ,
		                PuestoDesempeniar:
		                {
		                    required: 'Ingrese puesto a desempeñar por el alumno.'
		                    
		                   
		                }
		                 ,
		                HoraEntrada:
		                {
		                    required: 'Ingrese la hora de entrada del alumno.'
		                    
		                   
		                }
		                 ,
		                HoraSalida:
		                {
		                    required: 'Ingrese la hora de salida del alumno.'
		                    
		                   
		                } ,
		                FechaVencimientoPlaza:
		                {
		                	required: 'Ingrese fecha de vencimiento de vacante.',
		                    date: 'Ingrese la fecha de vencimiento de la plaza. '
		                    
		                   
		                }
		                 ,
		                ObjetivoDelCargo:
		                {
								required: 'Ingrese objetivo del cargo.',
								minlength: 'El objetivo del cargo tiene que ser al menos 155 caracteres.',
								maxlength: 'El objetivo del cargo no puede ser mayor a 350 caracteres'

		                    
		                   
		                }
		                 ,
		                Reponsabilidades:
		                {
		                    required: 'Ingrese las responsabilidades del alumno dividas por coma. '
		                    
		                   
		                } ,
		                Observaciones:
		                {
		                    required: 'Ingrese observaciones adicionales para el asesor o el alumno. '
		                    
		                   
		                }
		                 ,
		                terms:
		                {
		                    required: 'Debe de aceptar los terminos y conodiciones. Leer Aqui'
		                    
		                   
		                }
		                 ,
		                carrerita:
		                {
		                    required: 'Debe de seleccionar carreras que se relacionen con esta vacante de práctica'
		                    
		                   
		                } ,
		                carrerasPracticaProfesional:
		                {
		                    required: 'Por favor seleccione una o varias carreras'
		                    
		                   
		                }
		          


                    },
                    
                    // Ajax form submition                  
                    submitHandler: function(form)
                    {
                        $(form).ajaxSubmit(
                        {
                            beforeSend: function()
                            {
                                $('#SolicitudPracticaProfesional button[type="submit"]').attr('disabled', true);
                            },
                            success: function()
                            {
                                $("#SolicitudPracticaProfesional").addClass('submited');
                              
                            }
                        });
                    },          
                    
                    // Do not change code below
                    errorPlacement: function(error, element)
                    {
                        error.insertAfter(element.parent());
                    }
                });


        }

    };
}();


