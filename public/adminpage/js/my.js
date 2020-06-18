$(function() {
    $('#list_capres').change(function(){
        var id = $(this).val();
        mediashare(id);
    })
})
function elec(){
    var myChart = new FusionCharts( base_url+"assets/Charts/Bar2D.swf", "myChartId", "100%", "350", "0" );
    myChart.setXMLUrl(base_url+"home/elect");
    myChart.render("chart_elec");
}
function popularity(){
    myChart = new FusionCharts( base_url+"assets/Charts/Doughnut3D.swf", "myChartId1", "100%", "350", "0" );
    myChart.setXMLUrl(base_url+"home/popularity");
    myChart.render("chart_popularity");
}
function engagement(){
    myChart = new FusionCharts( base_url+"assets/Charts/MSLine.swf", "myChartId4", "100%", "350", "0" );
    myChart.setXMLUrl(base_url+"home/engagement");
    myChart.render("chart_eng");
}
function reputation(){
    myChart = new FusionCharts( base_url+"assets/Charts/Bubble.swf", "myChartId2", "100%", "350", "0" );
    myChart.setXMLUrl(base_url+"home/reputation");
    myChart.render("chart_rep");
}
function darling(){
    myChart = new FusionCharts( base_url+"assets/Charts/Bar2D.swf", "myChartMediaDarling", "100%", "300", "0" );
    myChart.setXMLUrl(base_url+"home/mediadarling");
    myChart.render("chartmediadarling");
}
function mediashare(id){
    idx = (id) ? id : '';
    myChart = new FusionCharts( base_url+"assets/Charts/Bar2D.swf", "myChartMediaShare", "100%", "300", "0" );
    myChart.setXMLUrl(base_url+"home/mediashare/"+idx);
    myChart.render("chartmediashare");
}
FB.init({appId: "486197324793561", status: true, cookie: true});
function postToFeed(name,description,link,caption,picture) {
    // calling the API ...
    link        = link          ? link          : 'http://politikapedia.com';
    name        = name          ? name          : '';
    caption     = caption       ? caption       : ' ';
    description = description   ? description   : '';
    picture     = picture       ? picture       : 'http://politikapedia.com/chart.png';
    // calling the API ...
        var obj = {
          method: 'feed',
          //redirect_uri: 'http://politikapedia.com',
            picture     : 'http://politikapedia.com/chart.png',
            name        : name,
            caption     : caption,
            description : description,
            link        : link
    };
    function callback(response) {
      //document.getElementById('msg').innerHTML = "Post ID: " + response['post_id'];
    }
    FB.ui(obj, callback);
}


(function(d, s, id) {
      var js, fjs = d.getElementsByTagName(s)[0];
      if (d.getElementById(id)) return;
      js = d.createElement(s); js.id = id;
      js.src = "//connect.facebook.net/id_ID/all.js#xfbml=1";
      fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));
  !function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="https://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");
