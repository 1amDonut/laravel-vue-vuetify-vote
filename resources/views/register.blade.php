<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>註冊會員</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script type="text/javascript" src="js/api.js"></script>
    <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="/css/app.css">
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
        <div class="col-4" style="margin-top:10px">
            <label for="name">姓名</label>
            <input type="text"" class="form-control is-valid" id="name" placeholder="請輸入姓名" required>
        </div>
        <div style="margin-top: 20px;text-align:left">
            <button type="button" class="btn btn-primary" style="width:98px" onclick="register()">新增</button>
            <button type="button" class="btn btn-light" style="width:98px" onclick="history.back()">返回</button>
        </div>
    </div>
</body>
<script src="/js/app.js"></script>
</html>