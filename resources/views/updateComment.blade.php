<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>編輯留言</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script type="text/javascript" src="js/api.js"></script>
    <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="/css/app.css">
    <script>
        let comment_id="<?php echo $_GET["id"]?>";
        function getData() {
            let url="/api/getCommentData",
                method="GET",
                data={ comment_id:comment_id,token:window.localStorage.getItem("token") };
            getCommentData(url,method,data);
        }

        function submitData() {
            let url="/api/updateCommentData",
                method="PUT",
                data={
                    comment_id:comment_id,
                    title:$('#title').val(),
                    content:$('#content').val(),
                    token:window.localStorage.getItem("token")
                },
                path="/home";
                successContent="更新成功！";
            updateCommentData(url,method,data,successContent,path);
        }
    </script>
</head>
<body onload="getData()">
    <div style="display: flex; flex-direction: column;justify-content: center;height: 500px;width: 500px;text-align: center;margin: 0 auto;">
        <div class="col-4">
            <label for="account">標題</label>
            <input type="text" class="form-control" id="title" placeholder="請輸入標題">
        </div>
        <div class="col-4" style="margin-top:10px">
            <label for="content">內容</label>
            <textarea class="form-control" id="content" rows="5" required></textarea>
        </div>
        <div style="margin-top: 20px;">
            <button class="btn btn-primary" style="width:100%" onclick="submitData()">新增</button>
            <button class="btn btn-light" style="width:100%;margin-top:5px" onclick="history.back()">返回</button>
        </div>
    </div>
</body>
<script src="/js/app.js"></script>
</html>