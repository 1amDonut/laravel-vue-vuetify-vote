<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>會員資訊</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script type="text/javascript" src="js/api.js"></script>
    <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="/css/app.css">
    <script>
        function getData() {
            let url="/api/getUserData",
            method="GET",
            data={ token:window.localStorage.getItem("token") };
            getUserData(url,method,data);

            url="/api/getUserComment",
            method="GET",
            data={ account:window.localStorage.getItem("account"), token:window.localStorage.getItem("token") },
            getUserComment(url,method,data);

        }

        function logout() {
            window.localStorage.removeItem("token");
            window.localStorage.removeItem("account");
            window.location="/logout";
        }
        
        function deleteData(id) {
            let url="/api/deleteCommentData",
            method="DELETE",
            data={ comment_id:id,token:window.localStorage.getItem("token") };
            successContent="刪除成功！"
            deleteCommentData(url,method,data,successContent);
        }
    </script>
</head>
<body onload="getData();">
    <nav class="navbar" style="background-color: #212529;color:#FFFFFF">
        <div id="show" style="display:inline-block;font-size:24px;margin-top:5px"></div>
        <div style="display:inline-block;float:right;margin-top:5px">
            <button type="button" class="btn btn-primary" style="width:98px" onclick="window.location='/comment'">新增留言</button>
            <button type="button" class="btn btn-light" style="width:98px;color:#212529" onclick="logout()">登出</button>
        </div>
    </nav>
    <table id="showComment" class="table table-hover table-bordered" style="width:700px;margin:0 auto;text-align:center"></table>
    
</body>
<script src="/js/app.js"></script>
</html>