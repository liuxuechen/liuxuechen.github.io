$(document).ready(function(){



     $("button#roll_up").click(function() {
       var table1_items = [];
       var i = 0;
       var airtable_read_endpoint = "https://api.airtable.com/v0/appgIi4oLnDe3vGNm/%E6%A6%82%E8%A7%88?api_key=keyJngv7iT0m6kzo2";
       var table1_dataSet = [];
       $.getJSON(airtable_read_endpoint, function(result) {
              $.each(result.records, function(key,value) {
                  table1_items = [];
                      table1_items.push(value.fields.学校);

                      table1_items.push(value.fields.特色);
  table1_items.push(value.fields.非本地生比例);
                      table1_dataSet.push(table1_items);
                      console.log(table1_items);
               }); // end .each
               console.log(table1_dataSet);

            $('#table1').DataTable( {
                data: table1_dataSet,
                retrieve: true,
                columns: [
                    { title: "学校",
                      defaultContent:""},

                    { title: "特色",
                      defaultContent:"" },
                      { title: "非本地生比例",
                        defaultContent:"" },

                ]
            } );
       }); // end .getJSON



         var table2_items = [];
         var i = 0;
         var airtable_read_endpoint =
         "https://api.airtable.com/v0/appgIi4oLnDe3vGNm/%E6%A6%82%E8%A7%88?api_key=keyJngv7iT0m6kzo2";
         var table2_dataSet = [];
         $.getJSON(airtable_read_endpoint, function(result) {
                $.each(result.records, function(key,value) {
                    table2_items = [];
                        table2_items.push(value.fields.学校);
                        table2_items.push(value.fields.游玩选择);
  
                        table2_dataSet.push(table2_items);
                        console.log(table2_items);
                 }); // end .each
                 console.log(table2_dataSet);
                $('#table2').DataTable( {
                    data: table2_dataSet,
                    retrieve: true,
                    ordering: false,
                    columns: [
                        { title: "学校",
                          defaultContent:""},
                        { title: "游玩选择",
                          defaultContent:""},

                    ] // rmf columns
                } ); // end dataTable

                var chart = c3.generate({

                      data: {
                          columns:table2_dataSet,
                          type : 'bar'
                      },
                      bar: {
                          title: "学校与游玩选择",
                      }
                  });

           }); // end .getJSON
        }); // end button

         // $.getJSON('http://localhost/d756a/data_export.json/Computer+TV', function(obj) {

 }); // document ready
