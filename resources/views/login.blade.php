<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>會員登入</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="/css/app.css">
    <script type="text/javascript" src="js/api.js"></script>
    
    <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
</head>
<body>
    <div style="display: flex; flex-direction: column;justify-content: center;height: 300px;width: 200px;text-align: center;margin: 0 auto;">
        <div class="col-4">
            <label for="account">帳號</label>
            <input type="text" class="form-control is-valid" id="account" placeholder="請輸入帳號" required>
        </div>
        <div class="col-4" style="margin-top:10px">
            <label for="password">密碼</label>
            <input type="password" class="form-control is-valid" id="password" placeholder="請輸入密碼" required>
        </div>
        <div style="margin-top: 20px;">
            <button class="btn btn-primary" style="width:100%" onclick="login()">登入</button>
            <button class="btn btn-light" style="width:100%;margin-top:5px" onclick="window.location='/register'">註冊</button>
        </div>
    </div>
</body>

</html>