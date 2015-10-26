var Validation = function () {

    return {
        
        //Validation
        initValidation: function () {
	        $("#usuario-empresa-form").validate({                   
	            // Rules for form validation
	            rules:
	            {
	                NombreEmpresa:
	                {
	                    required: true,
	                     minlength: 3,
	                    maxlength: 20
	                },
	       			puestoEmpresa  :
	                {
	                    required: true,
	                     minlength: 3,
	                    maxlength: 20
	                },
	                 nombreContactoEmpresa:
	                {
	                    required: true,
	                     minlength: 10,
	                    maxlength: 50
	                },
	                 descripcionEmpresa:
	                {
	                    required: true,
	                     minlength: 50,
	                    maxlength: 500
	                },
	                rubroEmpresa:
	                {
	                    required: true,
	                     minlength: 3,
	                    maxlength: 20
	                },
	                emailEmpresa:
	                {
	                    required: true,
	                    email: true
	                },
	                emailContacto:
	                {
	                    required: true,
	                    email: true
	                },
	                url:
	                {
	                    required: false,
	                    url: false
	                },
	                date:
	                {
	                    required: true,
	                    date: true
	                },
	                min:
	                {
	                    required: true,
	                    minlength: 5
	                },
	                max:
	                {
	                    required: true,
	                    maxlength: 5
	                },
	                range:
	                {
	                    required: true,
	                    rangelength: [5, 10]
	                },
	                digits:
	                {
	                    required: true,
	                    digits: true
	                },
	                number:
	                {
	                    required: true,
	                    number: true
	                },
	                telefonoFijoContacto:
	                {
	                    required: true,
	                    number: true
	                },
	                telefonoCelularContacto:
	                {
	                    required: true,
	                    number: true
	                },
	                ContrasenaContactoEmpresa:
	                {
	                    required: true,
	                    minlength: 3,
	                    maxlength: 20
	                },
	                minVal:
	                {
	                    required: true,
	                    min: 5
	                },
	                maxVal:
	                {
	                    required: true,
	                    max: 100
	                },
	                rangeVal:
	                {
	                    required: true,
	                    range: [5, 100]
	                }
	                , 
	                passwordConfirm:
	                {
	                    required: true,
	                    minlength: 3,
	                    maxlength: 20,
	                    equalTo: '#ContrasenaContactoEmpresa'
	                },
	                UsuarioContactoEmpresa:
	                {
	                    required: true,
	                   	minlength: 3,
	                    maxlength: 20	
	                }
	                ,
	                tipoEmpresa:
	                {
	                    required: true,
	                   
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
	                NombreEmpresa:
	                {
	                    required: 'Ingrese el nombre de la empresa que registra',
	                    minlength: 'Nombre de la empresa no puede ser menor a 3 caracteres',
	                    maxlength: 'Nombre de la empresa no puede ser mayor a 20 caracteres'
	                },
	                puestoEmpresa:
	                {
	                    required: 'Ingrese el puesto que tiene en la empresa',
	                    minlength: 'El puesto no puede ser menor a 3 caracteres',
	                    maxlength: 'El puesto no puede ser mayor a 20 caracteres'
	                },
					nombreContactoEmpresa:
	                {
	                    required: 'Ingrese su nombre completo',
	                    minlength: 'Nombre de contacto no puede ser menor a 10 caracteres',
	                    maxlength: 'Nombre de contacto no puede ser mayor a 50 caracteres'
	                },
	                descripcionEmpresa:
	                {
	                    required: 'Ingrese una descripción de su empresa',
	                    minlength: 'Descripción no puede ser menor a 50 caracteres',
	                    maxlength: 'Descripción no puede ser mayor a 500 caracteres'
	                },
 					rubroEmpresa:
	                {
	                    required: 'Ingrese el rubro de su empresa',
	                    minlength: 'Rubro no puede ser menor a 3 caracteres',
	                    maxlength: 'Rubro no puede ser mayor a 20 caracteres'
	                },
	                emailEmpresa:
	                {
	                    required: 'Ingrese un correo electronico válido',
	                    email: 'Ingrese un correo electrónico válido'

	                },
	                  emailContacto:
	                {
	                    required: 'Ingrese su correo electronico personal',
	                    email: 'Ingrese un correo electrónico válido'
	                },
	                url:
	                {
	                    required: 'Ingrese URL, Ejemplo : http://www.unitec.edu'
	                },
	                date:
	                {
	                    required: 'Please enter some date'
	                },
	                min:
	                {
	                    required: 'Please enter some text'
	                },
	                max:
	                {
	                    required: 'Please enter some text'
	                },
	                range:
	                {
	                    required: 'Please enter some text'
	                },
	                digits:
	                {
	                    required: 'Please enter some digits'
	                },
	                number:
	                {
	                    required: 'Ingrese un numero de teléfono ',
	                    number : 'Ingrese un numero de teléfono válido'
	                },
	                telefonoFijoContacto:
	                {
	                    required: 'Ingrese el telefono fijo de su oficina',
	                    number: 'Ingrese un numero de teléfono válido'
	                },
					telefonoCelularContacto:
	                {
	                    required: 'Ingrese su telefono celular',
	                     number: 'Ingrese un numero de celular válido'
	                },
	                minVal:
	                {
	                    required: 'Please enter some value'
	                },
	                maxVal:
	                {
	                    required: 'Please enter some value'
	                },
	                passwordConfirm:
	                {
	                    required: 'Por favor confirme su contraseña',
	                    minlength: 'Tamaño minimo 3 caracteres',
	                	maxlength: 'Tamaño maximo 20 caracteres',
	                    equalTo: 'Ingrese la misma contraseña de la izquierda'
	                },
	                ContrasenaContactoEmpresa:
	                {
	                    minlength: 'Tamaño minimo 3 caracteres',
	                	maxlength: 'Tamaño maximo 20 caracteres',
	                    required: 'Ingrese su contraseña'
	                },
	                rangeVal:
	                {
	                    required: 'Please enter some value'
	                },
	                UsuarioContactoEmpresa:
	                {
	                    required: 'Ingrese su nombre de usuario',
	                    minlength: 'Nombre de usuario no puede ser menor a 3 caracteres',
	                    maxlength: 'Nombre de usuario no puede ser mayor a 20 caracteres'
	                },
	                tipoEmpresa:
	                {
	                    required: 'Seleccione el tipo de empresa '
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
        }




        

    };
}();