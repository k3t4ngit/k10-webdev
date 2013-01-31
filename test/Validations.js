
		
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
		function checkfname(){
			var ck_name = /^[A-Za-z]{5,20}$/;
			var fname= document.getElementById('fname').value;
			if(!ck_name.test(fname))
			{
				var fnamediv= document.getElementById('fnameg');
				fnamediv.setAttribute("class", "control-group error");
				return false;	
			}
			else 
			{
				var fnamediv= document.getElementById('fnameg');
				fnamediv.setAttribute("class", "control-group success");
			}
			
		}
		function checklname(){
			var ck_name = /^[A-Za-z]{5,20}$/;
			var lname= document.getElementById('lname').value;
			if(!ck_name.test(lname))
			{
				var lnamediv= document.getElementById('lnameg');
				lnamediv.setAttribute("class", "control-group error");
				return false;
			}
			else 
			{
				var lnamediv= document.getElementById('lnameg');
				lnamediv.setAttribute("class", "control-group success");
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
				// return false;
			}
			
		}
	