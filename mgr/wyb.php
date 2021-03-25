<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <meta
      name="viewport"
      content="width=device-width", initial-scale=1, shrink-to-fit=no"
    />
    <title>Aplication to making wałki</title>
    <link
      rel="stylesheet"
      href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
      integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh"
      crossorigin="anonymous"
    />    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/dt-1.10.20/datatables.min.css"/>
 
    <script
      src="https://kit.fontawesome.com/bc3017ba69.js"
      crossorigin="anonymous"
    ></script>
    <style type="text/css">
      #overlay {
        position: fixed;
        top: 0;
        bottom: 0;
        left: 0;
        right: 0;
        background: rgb(0, 0, 0, 0.7);
      }
    </style>
  </head>

  <body>
    <div id="app">
      
      <div class="container-fluid">
        <div class="row bg-dark">
          <div class="col-lg-12">
            <p class="text-center text-light display-4 pt-2">
              Aplication to making wałki
            </p>
          </div>
        </div>
      </div>
      <div class="container">
        <div class="row mt-3">
          <div class="col-lg-6">
            <h3 class="text-info">Admin panel</h3>
          </div>
          <div class="col-lg-6">
          <?php echo "<p>Zalogowany jako: ".$_SESSION['user'];?>
          </div>
        </div>

        <div class="form-group">
                  <button class="btn btn-info btn-block btn-lg">
                    Logi in
                  </button>
                </div>

    <!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

<!-- Popper JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    <script
  src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.19.2/axios.min.js"></script>
    </script>
    <script src="https://cdn.jsdelivr.net/npm/vue"></script>
    <script>
      var app = new Vue({
        el: "#app",
        data: {
          errorMsg: "",
          successMsg: "",
          showAdd: false,
          editAdd: false,
          deleteModel: false,
          numbers: [],
          newPNumber: {phone_number: ""},
          editNumber: {edit_number: ""},
          currentUser:{},
        },
        mounted: function(){
            this.getAll_Phone_numbers();
        },
        methods: {
            getAll_Phone_numbers(){
                axios.get("http://localhost/mgr/show.php").then(function(response){
                    if(response.data.error){
                        app.errorMsg = response.data.message;
                    }else{
                        app.numbers = response.data.numbers;
                    }
                });
            },
            addPhone(){
              var formData = app.toFormData(app.newPNumber);
              axios.post("http://localhost/mgr/add.php", formData).then(function(response){
                app.newPNumber={phone_number: ""};
                    if(response.data.error){
                        app.errorMsg = response.data.message;
                    }else{
                      app.successMsg = response.data.message;
                        app.getAll_Phone_numbers();
                    }
                });
            },
            updatePhone(){
              var formData = app.toFormData(app.editNumber);
              axios.post("http://localhost/mgr/update.php", formData).then(function(response){
                app.editNumber={edit_number: ""};
                    if(response.data.error){
                        app.errorMsg = response.data.message;
                    }else{
                      app.successMsg = response.data.message;
                        app.getAll_Phone_numbers();
                    }
                });
            },
            toFormData(obj){
              var fd = new FormData();
              for(var i in obj){
                fd.append(i, obj[i]);
              }
              return fd;
            }
        }
      });
    </script>
        <script type="text/javascript" src="https://cdn.datatables.net/v/bs4/dt-1.10.20/datatables.min.js"></script>
    <script type="text/javascript">
    $(document).ready(function(){
      $("table").DataTable();
    });
    </script>
  </body>
</html>
