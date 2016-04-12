console.log("Connected to App");

// function IDhelp(){
//   var value = document.getElementById("ID").value;
//
//   if(value.length!=9){
//     alert("The ID number you entered is too short.");
//     location.reload;
//   }
// }
function validateForm(){
  var value = document.getElementById("ID").value;
  if(value.length < 9){
    alert("The ID number you entered is too short.");
    //location.reload;
    return false;
  }else if(value.length > 9){
  alert("The ID number you entered is too long.");
  //location.reload;
  return false;
}else{
  return true;
}

}

function checked(){
  $('#check').click(function(e){
  var value = document.getElementById("check").value;
  if(value !="PASS" || value != "NO"){
  alert("Enter only PASS or NO. :"+value);
}

});
}

function deleteStudent_confirm(){
  $('#deleteStudent').submit(function(e){
      var value= confirm("Are you sure you want to delete the student?");
      if(value== false){
        e.preventDefault();

      }
  });
}

function editStudent_confirm(){
  $('#editStudent').submit(function(e){//id must be unique
      var value= confirm("Are you sure you want to submit these changes to the student record?");
      if(value== false){
        e.preventDefault();

      }
  });
}

function editCourse_confirm(){
  $('#editCourse').submit(function(e){//id must be unique
      var value= confirm("Are you sure you want to submit these changes to the course record?");
      if(value== false){
        e.preventDefault();

      }
  });
}

function deleteCourse_confirm(){
  $('#deleteCourse').submit(function(e){//id must be unique
      var value= confirm("Are you sure you want to delete this course?");
      if(value== false){
        e.preventDefault();
      }
      if(value== true){
        location.reload();
      }
  });
}
function startReportPageSetup(){
    console.log("startReportPageSetup");

  $("#select_graph").change(changeChart);
  $(".datasrc").change(changeDataSrc);
}

// function changeChart(){
//     console.log("changeChart");
//   var choice=$(this).val();
//   alert(choice);
// }
function changeDataSrc(){
    console.log("changeDataSrc");

  var choice= $(this).val();
  //alert(choice);
}


function changeChart(){
    console.log("changeChart");

  var choice=$(this).val();
  var $chart=("#chart_sec");
  var dataSrc=$(".datasrc").filter(":checked").val();
  var url="";
url="api.php";
console.log(url);
  $.get(url,function(data){
     // console.log(data);
        if(choice==="Pie Chart"){
      drawPieChart($chart,data);
    }else{
      drawBarChart($chart,data);
    }


  },'json');//had to add 'json' because PHP echos the json_encode check 'DisplayResults.php'

  }

  function drawPieChart($chart, data){
    console.log(data);
    console.log("inside drawPieChart");
    var chartData=[];
    //for(var rec in data){
  data.forEach(function(rec){
    console.log(rec);
    var chartRec = {};
    chartRec.name = rec.Name;
    chartRec.y = parseFloat(rec.Students);
    //chartData.push({ y: parseFloat(rec.Students), color: 'blue',name:rec.Name,color:'red' });
    chartData.push(chartRec);
    // chartRec.name = rec.Word;
    // chartRec.y = parseFloat(rec.Frequency);
    // chartData.push(chartRec);
  });
        $('#chart_container').highcharts({
       chart:{type:'pie'},
       title:{text:'Student Performance'},
       tooltip:{"pointFormat":'<br>{series.name}:{point.percentage:.0f}%'},
       plotOptions: {},
       series: [{
       name:'Percentage of Students',
         colorByPoint:true,
         data:chartData
       }]
     });

    }



function drawBarChart($chart,data){
  var categoriesData=[];
  var chartData={
    name:' Number of students',
    data:[]
  };
    //for (var rec in data) {
  data.forEach(function(rec){
    categoriesData.push(rec.Name);
    chartData.data.push(parseFloat(rec.Students));

  });

  $('#chart_container').highcharts({
    chart:{type:'bar'},
    title:{text:'Student Performance'},
    xAxis:{categories:categoriesData},
    yAxis:{"min":0},
    tooltip:{"valueSuffix":''},
    plotOptions: {
      series: {
                colorByPoint: true
            }
          },
    legend:{"layout":'vertical'},
    credits:{"enabled":false},
    series :[chartData]
});
}
