<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <title>Login Aplikasi Product Knowledge</title>
  <link rel="stylesheet" href="<?= base_url() ?>assets/dist/css/style.css">
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
</head>

<body>
  <div id="card">
    <div id="card-content">
      <div id="card-title">
        <h4>Silahkan Login</h4>
        <h5>Product Knowledge</h5>
        <div class="underline-title"></div>
      </div>
      
      <form action="<?= site_url('auth/process') ?>" method="post" class="form">
      
        <label style="padding-top:13px">
            &nbsp;User
        </label>
        <input class="form-content" type="text" name="username" autocomplete="on" required />
        <div class="form-border"></div>
        
        <label style="padding-top:22px">
            &nbsp;Password
        </label>
            <input class="form-content" type="password" name="password" required />
        <div class="form-border"></div> 
        
        <input id="submit-btn" type="submit" name="login"/>
      </form>
    </div>
  </div>
</body>

</html>
