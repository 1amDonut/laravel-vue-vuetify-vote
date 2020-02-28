{/* <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script> */ }
function login() {
    $.ajax({
        url: "/api/login",
        method:"POST",
        data:{ account:$('#account').val(), password:$('#password').val()},
        success: function( result ) {
            window.localStorage.setItem("token",result);
            window.localStorage.setItem("account",$('#account').val());
            window.location="/home"
        },
        error: function( result ) {
           alert("查無此會員，請重新登入！");
           $('#account').val("");
           $('#password').val("");
        }
    });
}

function register() {
    $.ajax({
        url: "/api/register",
        method:"POST",
        data:{ account:$('#account').val(),password:$('#password').val(),name:$('#name').val() },
        success: function( result ) {
            alert('註冊成功，返回登入頁');
            window.location="/login";
        },
        error: function( error ) {
            const errorMsg=error.responseJSON;
            if(errorMsg.length>1){
                let error="";
                errorMsg.forEach((item,index) => {
                    error= error + (index+1) + '.' + item + '\r\n';
                });
               alert(error)
            }else{
                alert(errorMsg);
            }
        }
    });
}

function getUserData(url, method, data) {
    $.ajax({
        url: url,
        method: method,
        data: data,
        success: function (result) {
            let showContent = "Hi！" + result.name + "你好"
            document.getElementById("show").innerHTML = showContent;
        }
    });
}

function postComment(url, method, data, successContent, path) {
    $.ajax({
        url: url,
        method: method,
        data: data,
        success: function (result) {
            alert(successContent);
            window.location = path;
        },
        error: function( error ) {
            const errorMsg=error.responseJSON;
            if(errorMsg.length>1){
                let error="";
                errorMsg.forEach((item,index) => {
                    error= error + (index+1) + '.' + item + '\r\n';
                });
               alert(error)
            }else{
                alert(errorMsg);
            }
        }
    });
}

function getUserComment(url, method, data) {
    $.ajax({
        url: url,
        method: method,
        data: data,
        success: function (result) {
            $('#showComment').append("<thead><tr><th style='text-align:center'>序號</th><th style='text-align:center'>標題</th><th style='text-align:center'>內容</th><th style='text-align:center'>管理</th></tr></thead>");
            $.each(result, function (index, value) {
                $('#showComment').append(
                    '<tbody><tr><td>' + (index + 1) + '</td><td>' + value.title + '</td><td style="text-align:left">' + value.content + '</td><td><a href="updateComment?id=' + value.comment_id + '">修改</a>　｜　<a href="javascript:deleteData(' + value.comment_id + ')">刪除</a></td></tr></tbody>'
                );
            });
        }
    });
}
function getCommentData(url, method, data) {
    $.ajax({
        url: url,
        method: method,
        data: data,
        success: function (result) {
            document.getElementById("title").value = result[0].title;
            document.getElementById("content").value = result[0].content;
        }
    });
}

function updateCommentData(url, method, data, successContent, path) {
    $.ajax({
        url: url,
        method: method,
        data: data,
        success: function (result) {
            alert(successContent);
            window.location = path;
        },
        error: function( error ) {
            const errorMsg=error.responseJSON;
            if(errorMsg.length>1){
                let error="";
                errorMsg.forEach((item,index) => {
                    error= error + (index+1) + '.' + item + '\r\n';
                });
               alert(error)
            }else{
                alert(errorMsg);
            }
        }
    });
}

function deleteCommentData(url, method, data, successContent, path) {
    $.ajax({
        url: url,
        method: method,
        data: data,
        success: function (result) {
            alert(successContent);
            location.reload();
        }
    });
}

