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
    />
    <script
      src="https://kit.fontawesome.com/bc3017ba69.js"
      crossorigin="anonymous"
    ></script>
  </head>

  <body>
    <div id="app">
      <div class="container-fluid">
        <div class="row bg-dark">
          <div class="col-lg-12">
            <p class="text-center text-light display-4 pt-2">
              Aplication to boost statistic
            </p>
          </div>
        </div>
      </div>
          <div class="col-lg-6">
          </div>
        </div>
        <hr class="bg-info" />

      <!--Add New User -->
      <div id="overlay" v-if="showAdd">
        <div class="modal-dialog">
          <div class="modal-content text-center">
            <div class="modal-header text-center">
              <h5 class="modal-title">Login in</h5>
            </div>
            <div class="modal-body p-4">
              <form action="l.php" method="POST">
                <div class="form-group">
                  <input
                    type="Login"
                    name="use"
                    class="form-control form-control-lg"
                    placeholder="Login"
                    required
                  />
                </div>
                <div class="form-group">
                  <input
                    type="password"
                    name="pas"
                    class="form-control form-control-lg"
                    placeholder="Password"
                    required
                  />
                </div>
                <div class="form-group">
                  <button class="btn btn-info btn-block btn-lg">
                    Logi in
                  </button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
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
          newP: {user: "", pwd: ""},
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
            addP(){
              var formData = app.toFormData(app.newP);
              axios.post("http://localhost/mgr/login.php", formData).then(function(response){
                app.newP={user: "", pwd: ""};
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
  </body>
</html>
