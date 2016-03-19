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
  var resultArray;
  if(dataSrc==="php"){
    url="DisplayResults.php"
    console.log(url);
  }

  $.get(url,function(data){
   console.log("the data");
      console.log(data);
     //resultArray=data;
        if(choice==="Pie Chart"){
          console.log("about to enter drawPieChart");
      drawPieChart($chart,data);

    }else{
      drawBarChart($chart,data);
    }


  });//had to add 'json' because PHP echos the json_encode check 'DisplayResults.php'

  }

  function drawPieChart($chart, data){
    console.log("inside drawPieChart");
    var chartData=[];
    console.log("THE DATA");
    console.log(data);
    //for (var rec in data) {
  data.foreach(function(rec){
    var chartRec = {};
    chartRec.name = rec.StudentID; 
    chartRec.y = parseInt(rec.Grade);
    chartData.push(chartRec);
  });
//console.log(chartData);
        $('#chart_container').highcharts({
       chart:{type:'pie'},
       title:{text:'Pass rate'},
       tooltip:{"pointFormat":'{series.name}: <b>{point.percentage:.0f}%</b>'},
       plotOptions: {},
       series: [{
       name:'Grade',
         colorByPoint:true,
         data:chartData
       }]
     });

    }



function drawBarChart($chart,data){
  var categoriesData=[];
  var chartData={
    name:'Pass',
    data:[]
  };
    for (var rec in data) {
  //data.forEach(function(rec){
    categoriesData.push(rec.Grade);
    chartData.data.push(rec.StudentID);
  };

  $('#chart_container').highcharts({
    chart:{type:'bar'},
    title:{text:'Pass Rate'},
    xAxis:{categories:categoriesData},
    yAxis:{"min":0},
    tooltip:{"valueSuffix":''},
    plotOptions:{},
    legend:{"layout":'vertical'},
    credits:{"enabled":false},
    series :[chartData]
});
}