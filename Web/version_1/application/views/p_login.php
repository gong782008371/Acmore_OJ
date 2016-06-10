<style>
    .header {
      text-align: center;
    }
    .header h1 {
      font-size: 200%;
      color: #333;
      margin-top: 30px;
    }
    .header p {
      font-size: 14px;
      color:red;
    }
</style>
<div class="header">
  <div class="am-g">
    <h1>Login Page</h1>
  </div>
  <hr />
</div>
<div class="am-g">
  <div class="am-u-lg-5 am-u-md-8 am-u-sm-centered">
	<p><font color="red"><?php echo validation_errors(); ?></font></p>
    <form method="post" class="am-form" action="sign_in">
      <label for="text">User Name:</label>
      <input type="text" name="username" id="username">
      <br>
      <label for="password">Password:</label>
      <input type="password" name="password" id="password">
      <br><br/>
      <div class="am-cf">
        <input type="submit" name="" value="Confirm Login" class="am-btn am-btn-primary am-btn-sm am-fl">
        <input type="submit" name="" value="Forget Password ^_^? " class="am-btn am-btn-default am-btn-sm am-fr">
      </div>
    </form>
    <hr>
  </div>
</div>