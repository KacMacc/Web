<?php
session_start();

if((empty($_SESSION['zalogowany']))&&($_SESSION['zalogowany']==false))
{
header ('Location:i.php');
 exit;

if((isset($_SESSION['zalogowany']))&&($_SESSION['zalogowany']==true))
{
  header ('Location:wyb.php');
 exit;
}
}
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
    <title>Aplication to boost statistic</title>
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
            Aplication to boost statistic</p>
            <p class="text-center text-light display-4 pt-2">
            Phone numbers</p>
          </div>
        </div>
      </div>
      <div class="container">
        <div class="row mt-4">
          <div class="col-lg-4">
            <h4 class="text-info">User panel</h4>
          </div>
          <div class="col-lg-4">
          <h5><?php echo "<p>Loged as: ".$_SESSION['user'];?></h5>
          </div>
          <div class="col-lg-4">
            <button class="btn btn_info float-right" @click="showAdd=true">
              <i class="fas fa-user"></i>&nbsp;&nbsp;Add New Number
            </button>
            <button class="btn btn_info float-right">
            <i class="fas fa-user-slash" p style="color:red;"></i>&nbsp;&nbsp;<a href="wyloguj.php"><p style="color:red;">Log out</p></a>
            </button>
          </div>
          <div class="row-mt-0">
          <div class="col-lg-30">
          <a href="wyb.php" class="btn btn-info btn-block btn-lg">MENU</a>
          </div>
          </div>

        </div>
        <hr class="bg-info" />
        <div class="alert alert-danger" v-if="errorMsg">
          {{errorMsg}}
        </div>
        <div class="alert alert-success" v-if="successMsg">
         {{successMsg}}
        </div>

        <!--Displaying the data-->
        <div class="row">
          <div class="col-lg-12">
            <table class="table table-bordered table-striped">
              <thead>
                <tr class="text-center bg-info text-light" >
                  <th>Id</th>
                  <th>Phone Number</th>
                  <th>Delete</th>
                  <th>Select</th>
                </tr>
              </thead>
              <tbody>
                <tr class="text-center" v-for="phone_number in numbers">
                  <td>{{phone_number.id}}</td>
                  <td>{{phone_number.phone_number}}</td>
                  <td>
                    <a href="#" class="text-danger" @click="deleteModel=true; selectNumber(phone_number);" 
                      ><i class="fas fa-trash-alt"></i
                    ></a>
                  </td>
                  <td>
                    <a href="#" class="text-select" @click="useModel=true; selectNumber(phone_number);"
                      ><i class="fas fa-check"></i></a>
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>

      <!--Add New Numer -->
      <div id="overlay" v-if="showAdd">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title">Add number window</h5>
              <button type="button" class="close" @click="showAdd=false"> 
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body p-4">
              <form action="#" method="post">
                <div class="form-group">
                  <input
                    type="text"
                    name="phone_number"
                    class="form-control form-control-lg"
                    placeholder="Phone number"
                    required
                    v-model="newPNumber.phone_number"
                  />
                </div>
                <!--<div class="form-group">
                  <input
                    type="text"
                    name="psw"
                    class="form-control form-control-lg"
                    placeholder="Password"
                    required
                  />
                </div>-->
                <div class="form-group">
                  <button class="btn btn-info btn-block btn-lg" @click="showAdd=false; addPhone(); clearMsg();">
                    Add Number
                  </button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>

      <!--Delete Card number-->
      <div id="overlay" v-if="deleteModel">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title">Delete</h5>
              <button type="button" class="close" @click="deleteModel=false">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body p-4">
              <h4 class="text-danger">
                Do you want to delete this phone number?
              </h4>
              <h5>Usuwasz '{{currentNumber.phone_number}}'</h5>
              <hr />
              <button class="btn btn-danger btn-lg" @click="deleteModel=false; deletePhone(); clearMsg();">YEYE</button>
              &nbsp;&nbsp;&nbsp;&nbsp;
              <button class="btn btn-success btn-lg" @click="deleteModel=false">
                No
              </button>
            </div>
          </div>
        </div>
      </div>
      <!--Delete Card number-->
      <div id="overlay" v-if="useModel">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title">Use</h5>
              <button type="button" class="close" @click="useModel=false">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body p-4">
              <h4 class="text-danger">
                Do you want to USE this phone number?
              </h4>
              <h5>Używasz '{{currentNumber.phone_number}}'</h5>
              <hr />
              <button class="btn btn-danger btn-lg" @click="useModel=false; usePhone(); clearMsg();">YEYE</button>
              &nbsp;&nbsp;&nbsp;&nbsp;
              <button class="btn btn-success btn-lg" @click="useModel=false">
                No
              </button>
            </div>
          </div>
        </div>
      </div>
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
          useModel: false,
          numbers: [],
          newPNumber: {phone_number: ""},
          currentNumber:{},
        },
        mounted: function(){
            this.getAll_Phone_numbers();
        },
        methods: {
            getAll_Phone_numbers(){
                axios.get("http://localhost/mgr/v/process.php?action=read").then(function(response){
                  app.numbers = response.data.numbers;
                   
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
            deletePhone(){
              var formData = app.toFormData(app.currentNumber);
              axios.post("http://localhost/mgr/v/process.php?action=delete", formData).then(function(response){
                app.currentNumber={};
                    if(response.data.error){
                        app.errorMsg = response.data.message;
                    }else{
                      app.successMsg = response.data.message;
                        app.getAll_Phone_numbers();
                    }
                });
            },
            usePhone(){
              var formData = app.toFormData(app.currentNumber);
              axios.post("http://localhost/mgr/v/process.php?action=use", formData).then(function(response){
                app.currentNumber={};
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
            },
            selectNumber(phone_number){
              app.currentNumber = phone_number;
            },
            clearMsg(){
              app.errorMsg = "";
              app.successMsg = "";
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
