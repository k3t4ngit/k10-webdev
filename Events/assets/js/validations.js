
		
		function checkform(){
			if (checkfname() || checklname() || checkmnum() ==false){
		   		alert('Please complete the form. To submit!');
		   		return false;
		   	}
			return checkfname();
		   	return checkmnum();
		   	return checklname();
		   	
		   	if (document.myform.check0.checked == false &&
		         document.myform.check1.checked == false &&
				 document.myform.check2.checked == false &&
				 document.myform.check3.checked == false) {
			  
				 alert("Please select at least one checkbox.\n");
				 return false;
		     }

		}
		function checkcname(){
			var ck_name = /^[A-Za-z\s'.]+$/gi;
			var chkname= document.getElementById('cname').value;
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
			}
			
		}
		
		function checkemail(){
			var ck_email = /^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/;
			var chkemail= document.getElementById('cemail').value;
			if(!ck_email.test(chkemail))
			{
				var lnamediv= document.getElementById('emaildiv');
				lnamediv.setAttribute("class", "control-group error");
				return false;
			}
			else 
			{
				var lnamediv= document.getElementById('emaildiv');
				lnamediv.setAttribute("class", "control-group success");
			}
			
		}
		
		function checkpassword(){
			var ck_pass = /^[A-z0-9]{6,10}$/;
			var pass= document.getElementById('password').value;
			if(!ck_pass.test(pass))
			{
				var fpassdiv= document.getElementById('passdiv');
				fpassdiv.setAttribute("class", "control-group error");
				return false;
			}
			else 
			{
				var fpassdiv= document.getElementById('passdiv');
				fpassdiv.setAttribute("class", "control-group success");
				// return false;
			}
			
		}
	function conpass(){
		var c_pass = /^[A-z0-9]{6,10}$/;
		var cpass= document.getElementById('cpassword').value;
		if(!c_pass.test(cpass))
		{	
			var cpassdiv= document.getElementById('cpassdiv');
			cpassdiv.setAttribute("class", "control-group error");
			return false;
			
		}
		else 
		{
			var pass= document.getElementById('password').value;
			if(cpass==pass){
				var fpassdiv= document.getElementById('passdiv');
				fpassdiv.setAttribute("class", "control-group success");
				var cpassdiv= document.getElementById('cpassdiv');
				cpassdiv.setAttribute("class", "control-group success");
			}
			else
			{
				var fpassdiv= document.getElementById('passdiv');
				fpassdiv.setAttribute("class", "control-group error");
				var cpassdiv= document.getElementById('cpassdiv');
				cpassdiv.setAttribute("class", "control-group error");
				return false;
			}
			// return false;
		}

	}