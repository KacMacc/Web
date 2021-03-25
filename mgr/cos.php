<!DOCTYPE html>
<html>
  <head>
    <title>Cos</title>
    <script src="https://ajax.googleapis.com/ajax/libs/d3js/5.15.0/d3.min.js"></script>
  </head>
  <body>
    <h2>Make a table based on JSON data.</h2>

    <p id="id"></p>

  
    <script>
      var obj,
        dbParam,
        xmlhttp,
        myObj,
        x,
        y,
        txt = "";
        txt2 = "";
      obj = { table: "phone_numbers" };
      dbParam = JSON.stringify(obj);
      console.log(dbParam);
      xmlhttp = new XMLHttpRequest();

      xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
          myObj = JSON.parse(this.responseText);

          //print "<TR><TH>Login</TH><TH>E-mail</TH><TH>Akcje</TH></TR>";
          txt2 +="<table border='1'>";
          "<th><tr>Cos</tr></th>";
          txt2 += "</table>";

          txt += "<table border='1'>";
          for (x in myObj) {
            txt +=
              "<th>" +
              myObj[x].id +
              "</th><th>" +
              myObj[x].phone_number +
              "</tr>";
          }
          txt += "</table>";
          echo txt;
          document.getElementById("id").innerHTML = txt;
          //print(txt);
        }
      };

      //+myObj[x].id
      xmlhttp.open("GET", "show.php", true);
      xmlhttp.setRequestHeader(
        "Content-type",
        "application/x-www-form-urlencoded"
      );
      xmlhttp.send("x=" + dbParam);
    </script>
  </body>
</html>
