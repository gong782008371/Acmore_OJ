<script type="text/javascript">
	function onCheck() {
		var username 	= document.getElementById("username").value;
		var password 	= document.getElementById("password").value;
		var comfirmpwd 	= document.getElementById("comfirmpwd").value;
		if(usernmae == '') {
			alert("username can not be empty!");
			return false;
		}
		if(password == '') {
			alert("password can not be empty!");
			return false;
		}
		if(password != comfirmpwd) {
			alert("two password is not the same!");
			return false;
		}
			
	}
</script>

<div class="am-g">
  <div class="am-u-lg-6 am-u-sm-8 am-u-sm-centered">
    <h1>Registration</h1>
    <hr>
	<form method="POST" class="am-form am-form-horizontal" onsubmit="return onCheck()" action="sign_up">
	
	  <div class="am-form-group">
	    <label for="doc-ipt-3" class="am-u-sm-3 am-form-label">User Name</label>
	    <div class="am-u-sm-9">
	      <input type="text" name="username" id="username" placeholder="Username">
	    </div>
	  </div>

	  <div class="am-form-group">
	    <label for="doc-ipt-3" class="am-u-sm-3 am-form-label">Password</label>
	    <div class="am-u-sm-9">
	      <input type="password" name="password" id="password" placeholder="Password">
	    </div>
	  </div>
	  
	  <div class="am-form-group">
	    <label for="doc-ipt-3" class="am-u-sm-3 am-form-label">Comfirm Pwd</label>
	    <div class="am-u-sm-9">
	      <input type="password" name="comfirmpwd" id="comfirmpwd" placeholder="Comfirm Password">
	    </div>
	  </div>

	  <div class="am-form-group">
	    <label for="doc-ipt-3" class="am-u-sm-3 am-form-label">Email</label>
	    <div class="am-u-sm-9">
	      <input type="email" name="email" id="email" placeholder="Email">
	    </div>
	  </div>
	  
	  <div class="am-form-group">
	    <label for="doc-ipt-3" class="am-u-sm-3 am-form-label">School</label>
	    <div class="am-u-sm-9">
	      <input type="text" name="school" id="school" placeholder="School">
	    </div>
	  </div>
	  
	  <div class="am-form-group">
	    <label for="doc-ipt-3" class="am-u-sm-3 am-form-label">Motto</label>
	    <div class="am-u-sm-9">
	      <input type="text" name="motto" id="motto" placeholder="Motto">
	    </div>
	  </div>
	  
	  <div class="am-form-group">
	    <label for="doc-ipt-3" class="am-u-sm-3 am-form-label"></label>
	    <div class="am-u-sm-9">
	      <button type="submit" class="am-btn am-btn-success">Comfirm Registration</button> 
	    </div>
	  </div>
	</form>
    <hr>
  </div>
</div>