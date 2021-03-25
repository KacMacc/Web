<!DOCTYPE html>
<html>
    <head>
        <title>Cos</title>
        <script src="https://ajax.googleapis.com/ajax/libs/d3js/5.15.0/d3.min.js"></script>

    </head>
<body>

    
    <table class="table table-striped">
        <thead>
        <tr>
            <th>Id</th>
            <th>Phone Numbers</th>  
            </tr>
        </thead>
      
    <tbody id="data">
        
        </tbody>
           
           </table>
<script>
fetch("show.php").then(
res=>{
    res.json().then(
    data=>{
        console.log(data);
        if(data.length >0){
            var temp="";
            
            data.forEach((u)=>{
                temp +="<tr>";
                temp +="<td>"+u.id+"</td>";
                temp +="<td>"+u.phone_number+"</td></tr>";
            })
            
            document.getElementById("data").innerHTML=temp;
        }
    })
})
</script>

</body>
</html>