console.log("Connected to App");



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
