$("#country-sel").change(function(){
    var selVal = $(this).val().toLowerCase();          
  
    $.getJSON("/build/static/parlament-list.json", function(data){
        var parsedList = data.filter(function(e){
            return (e.country).toLowerCase() == selVal;
        });
        console.log(parsedList);
        $("#country-results").empty();
        for (var i in parsedList){
            $("#country-results").append(
                '<div class="result-' + i + '>\n' + 
                '    <span class="result-name">' + parsedList[i].fullName + '</span>\n' +
                '</div>'
            );
        }
    });
});
