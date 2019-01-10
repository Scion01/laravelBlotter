<?php
  $tempOrders = $orders
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Intuhire | Blotter Problem</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" type="text/css" media="screen" href="main.css" />
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
  <style>
  table, th, td {
  border: 1px solid black;
  text-align: center;
  color: #FFC200;
  } 
  table{
    background-color: #01325B;
  }
  </style>
  <script>
  var allowedOrders = null
  function init(){
    allowedOrders = '<?php echo $orders?>';
    var allowedOrders = JSON.parse(allowedOrders);
    console.log(allowedOrders);
    createTable(allowedOrders);
  }
  
  var change=1;
  function toggle(){
    change=(change==1)? 0:1;
    filterRows();
  }
  function filterRows(){
    var ccyCheck = document.getElementById('ccy').value;
    var statusCheck = document.getElementById('status').value;
    ccyCheck = ccyCheck.toUpperCase();
    var originalOrders = '<?php echo $orders ?>';
    var originalOrders = JSON.parse(originalOrders);
    var allowedOrders = []
    if(change==1){
    for (var count=0; count<originalOrders.length;count++){
      console.log(originalOrders[count].Status)
      if((originalOrders[count].CcyPair).includes(ccyCheck)==true && originalOrders[count].Status.includes(statusCheck)==true){
        allowedOrders.push(originalOrders[count])
      }
    }
    }
    else{
      for (var count=originalOrders.length-1; count>=0;count--){
      console.log(originalOrders[count].Status)
      if((originalOrders[count].CcyPair).includes(ccyCheck)==true && originalOrders[count].Status.includes(statusCheck)==true){
        allowedOrders.push(originalOrders[count])
      }
    }
    }
    createTable(allowedOrders)
    console.log(allowedOrders)
  }
  function createTable(allowedOrders){
    console.log("Inside Create")
    console.log(allowedOrders.length)
    var table = document.getElementById("table");
    console.log("table length: "+table.rows.length)
    while(table.rows.length!=1){
      console.log("Deleted row: "+i);
      console.log("table length simult: "+table.rows.length)
      table.deleteRow(1);
    }
    for(var i=0;i<allowedOrders.length;i++){
      var tr = document.createElement('tr');
      var row = table.insertRow(i+1);
      var cell1 = row.insertCell(0);
      var cell2 = row.insertCell(1);
      var cell3 = row.insertCell(2);
      var cell4 = row.insertCell(3);
      var cell5 = row.insertCell(4);
      var cell6 = row.insertCell(5);
      var cell7 = row.insertCell(6);
      cell1.innerHTML = allowedOrders[i].Side
      if(allowedOrders[i].Side == "Buy")
        cell1.style.color="green"
      else
        cell1.style.color="red"
      cell2.innerHTML = allowedOrders[i].OrderType
      cell3.innerHTML = allowedOrders[i].CcyPair
      cell4.innerHTML = allowedOrders[i].Price
      cell5.innerHTML = allowedOrders[i].Amount
      cell6.innerHTML = allowedOrders[i].Status
      if(allowedOrders[i].Status == "Cancelled")
        cell6.style.color="red"
      else if(allowedOrders[i].Status == "Working")
        cell6.style.color="#fff"
      else  
        cell6.style.color="#A9A9A9"
      cell7.innerHTML = allowedOrders[i].Time
    }
    console.log("table length@end: "+table.rows.length)
  }
   
  
  </script>
</head>
<body onload="init()">

<table id="table" class="mt-5" style="width:100%;">
  <tr >
  @foreach ($columns as $cols)
  <?php if($cols->column_name=="Time"):?>
  <th>{{$cols->column_name}}
  <button onClick="toggle()" class="ml-4"style="background-color: #01325B; color:white;">Sort</button></th>
  <?php elseif($cols->column_name=="CcyPair"):?>
  <th>{{$cols->column_name}}
  <input id="ccy" onkeyup="filterRows()" type="text" placeholder="Search"></th>
  <?php elseif($cols->column_name=="Status"):?>
  <th>{{$cols->column_name}}
  <input id="status" onkeyup="filterRows()" type="text" placeholder="Search"></th>
  <?php else:?>
  <th>{{$cols->column_name}}
  <?php endif;?>
  @endforeach
  </tr>
</table> 
</body>
</html>