
		
		function checkform(){
			if (checkcname()&&checkemail()&&conpass() ==true){
		   		
		   		return true;
		   	}
		   	else{
				$("#form_empty").slideDown(1000);
				return false;
		   	}
		}
		function checkcname(){
			var ck_name = /^[A-Za-z\s'.]+$/gi;
			var chkname= document.getElementById('name').value;
			if(!ck_name.test(chkname))
			{
				var fnamediv= document.getElementById('namediv');
				fnamediv.setAttribute("class", "control-group error");

				return false;	
			}
			else 
			{
				var fnamediv= document.getElementById('namediv');
				fnamediv.setAttribute("class", "control-group success");
				return true;
			}
			
		}
		function checklogin(){
			if(checkemail()&&checkpassword()== true) {
				

				 return true;
			}
			else{
				$(".alert-error").slideDown(700);
				return false;
			}
		}
		function checkemail(){
			var ck_email = /^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/;
			var chkemail= document.getElementById('email').value;
			if(!ck_email.test(chkemail))
			{
				var lnamediv= document.getElementById('emaildiv');
				lnamediv.setAttribute("class", "control-group error");
				$("#incorrect").slideDown(500,function(){
					$("#incorrect_email").slideDown(500);
				});
				
				return false;
			}
			else 
			{
				var lnamediv= document.getElementById('emaildiv');
				lnamediv.setAttribute("class", "control-group success");
				$("#incorrect_email").slideUp(500,function(){
					$("#incorrect").slideUp();
				});
				
				return true;
			}
		}
		function checkpassword(){
			var ck_pass = /^[A-z0-9]{6,15}$/;
			var pass= document.getElementById('password').value;
			if(!ck_pass.test(pass))
			{
				var fpassdiv= document.getElementById('passdiv');
				fpassdiv.setAttribute("class", "control-group error");
				$("#incorrect").slideDown(500,function(){
					$("#incorrect_password").slideDown(500);
				});
				return false;
			}
			else 
			{
				var fpassdiv= document.getElementById('passdiv');
				fpassdiv.setAttribute("class", "control-group success");
				$("#incorrect_password").slideUp(500,function(){
					$("incorrect").slideUp();
				});
				return true;
			}	
		}
		function confirmpass(){
			var c_pass = /^[A-z0-9]{6,15}$/;
			var cpass= document.getElementById('cpassword').value;
			if(!c_pass.test(cpass))
			{	
				var cpassdiv= document.getElementById('cpassdiv');
				cpassdiv.setAttribute("class", "control-group error");
				return false;
				$("#incorrect_confirm").slideDown(700);
			}
			else 
			{
				var pass= document.getElementById('password').value;
				if(cpass==pass){
					var fpassdiv= document.getElementById('passdiv');
					fpassdiv.setAttribute("class", "control-group success");
					var cpassdiv= document.getElementById('cpassdiv');
					cpassdiv.setAttribute("class", "control-group success");
					$("#incorrect_confirm").slideUp(700);
					return true;
				}
				else
				{
					var fpassdiv= document.getElementById('passdiv');
					fpassdiv.setAttribute("class", "control-group error");
					var cpassdiv= document.getElementById('cpassdiv');
					cpassdiv.setAttribute("class", "control-group error");
					$("#incorrect_confirm").slideDown(700);
					return false;
				}
			}		
		}
		function checkmnum(){
			var ck_name = /^[0-9]{10,12}$/;
			var mnum= document.getElementById('mnum').value;
			if(!ck_name.test(mnum))
			{
				var mnumdiv= document.getElementById('mnumg');
				mnumdiv.setAttribute("class", "control-group error");
				return false;
			}
			else 
			{
				var mnumdiv= document.getElementById('mnumg');
				mnumdiv.setAttribute("class", "control-group success");
				return true;
			}
			function checkupdate(){
				if (checkcname()&&conpass() ==true){
		   		
		   		return true;
		   	}
		   	else{
				alert('Please complete the form. To submit!');
				return false;
		   	}
			}
	}