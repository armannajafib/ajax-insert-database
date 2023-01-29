<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Add Province To Database Ajax</title>
    <style>
      .form {
        text-align: center;
        direction: rtl;
        margin: 50px 20px;
      }
      #btn {
        font-family: b nazanin;
        font-style: italic;
      }
      #result-div {
        border: 1px solid rgb(203, 208, 213);
        border-radius: 5px;
        background-color: #eee;
        padding: 50px;
        direction: rtl;
        text-align: right;
      }
      .success {
        color: rgb(22, 188, 22);
      }
      .error {
        color: rgb(213, 10, 30);
      }
    </style>
  </head>
  <body>
    <form action="save-province-ajax.php" method="post" class="form">
      <input type="text" name="province" id="input" />
      <input type="submit" id="btn" value="افزودن" />
    </form>
    <div id="result-div"></div>
    <script
      src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js"
      type="text/javascript"
    ></script>
    <script>
      $(document).ready(function () {
        var form = $(".form");
        var result = $("#result-div");
        form.submit(function (event) {
          result.html("<img src='loader.gif'>");
          event.preventDefault();
          $.ajax({
            data: form.serialize(),
            url: form.attr('action'),
            method: form.attr('method'),
            success: function (response) {
              result.html(response);
            },
          });
        });
      });
    </script>
  </body>
</html>
