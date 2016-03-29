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
  if(dataSrc==="php"){
    url="DisplayResults.php"
    console.log(url);
  }

  $.get(url,function(data){
     //var datas = $.parseJSON(data);
      console.log(data);

        if(choice==="Pie Chart"){
          //console.log("about to enter drawPieChart");
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
    var chartRec = {};
    chartRec.name = rec.StudentID; 
    chartRec.y = parseFloat(rec.course);
    chartData.push(chartRec);
    // chartRec.name = rec.Word;
    // chartRec.y = parseFloat(rec.Frequency);
    // chartData.push(chartRec);
  });
console.log(chartData);
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
    name:'StudentID',
    data:[]
  };
    //for (var rec in data) {
  data.forEach(function(rec){
    categoriesData.push(rec.StudentID);
    chartData.data.push(rec.StudentID);
  });

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