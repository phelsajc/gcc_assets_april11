            
 <?php

  session_start();
  ?>

<!doctype html>
<html class="no-js">
  <head>
    <meta charset="utf-8">
    <title>gcc_inv</title>



    <link rel="stylesheet" href="jqwidgets/styles/jqx.base.css" type="text/css" />
    <link rel="stylesheet" href="enlarge.css" type="text/css" />
    <script type="text/javascript" src="scripts/jquery-1.11.1.min.js"></script>


    <script type="text/javascript" src="jqwidgets/jqxcore.js"></script>
    <script type="text/javascript" src="jqwidgets/jqxdata.js"></script> 
    <script type="text/javascript" src="jqwidgets/jqxbuttons.js"></script>
    <script type="text/javascript" src="jqwidgets/jqxscrollbar.js"></script>
    <script type="text/javascript" src="jqwidgets/jqxmenu.js"></script>
    <script type="text/javascript" src="jqwidgets/jqxcheckbox.js"></script>
    <script type="text/javascript" src="jqwidgets/jqxlistbox.js"></script>
    <script type="text/javascript" src="jqwidgets/jqxscrollbar.js"></script>
    <script type="text/javascript" src="jqwidgets/jqxdropdownlist.js"></script>
    <script type="text/javascript" src="jqwidgets/jqxgrid.js"></script>
    <script type="text/javascript" src="jqwidgets/jqxgrid.selection.js"></script> 
    <script type="text/javascript" src="scripts/demos.js"></script>
    <script type="text/javascript" src="jqwidgets/jqxwindow.js"></script>
    <script type="text/javascript" src="jqwidgets/jqxgrid.edit.js"></script> 
    <script type="text/javascript" src="jqwidgets/jqxcheckbox.js"></script>
    <script type="text/javascript" src="jqwidgets/jqxdropdownlist.js"></script>
    <script type="text/javascript" src="jqwidgets/jqxdata.js"></script>
    <script type="text/javascript" src="jqwidgets/jqxgrid.filter.js"></script>
    <script type="text/javascript" src="jqwidgets/jqxgrid.sort.js"></script>
    <script type="text/javascript" src="jqwidgets/jqxgrid.selection.js"></script>
    <script type="text/javascript" src="jqwidgets/jqxcalendar.js"></script>
    <script type="text/javascript" src="jqwidgets/jqxgrid.pager.js"></script>
    <script type="text/javascript" src="jqwidgets/jqxgrid.columnsresize.js"></script>
    <script type="text/javascript" src="jqwidgets/jqxdatetimeinput.js"></script>
    <script type="text/javascript" src="jqwidgets/jqxcombobox.js"></script>
    <script type="text/javascript" src="jqwidgets/jqxinput.js"></script>
    <script type="text/javascript" src="jqwidgets/jqxfileupload.js"></script>
  <script type="text/javascript" src="jqwidgets/globalization/globalize.js"></script>
    <script type="text/javascript" src="jqwidgets/globalization/globalize.culture.de-DE.js"></script>  

    <script type="text/javascript">
        $(document).ready(function () {

            var countries = [
                 { value: "Male", label: "Male" },
                 { value: "Female", label: "Female" }
                 ];


                 var countriesSource =
            {
                 datatype: "array",
                 datafields: [
                     { name: 'label', type: 'string' },
                     { name: 'value', type: 'string' }
                 ],
                 localdata: countries
            };


            var countriesAdapter = new $.jqx.dataAdapter(countriesSource, {
                autoBind: true
            });   


            var level = [
                 { value: "admin", label: "Administrator" },
                 { value: "super admin", label: "Super Administrator" }
                 ];


                 var levelSource =
            {
                 datatype: "array",
                 datafields: [
                     { name: 'label', type: 'string' },
                     { name: 'value', type: 'string' }
                 ],
                 localdata: level
            };


            var levelAdapter = new $.jqx.dataAdapter(levelSource, {
                autoBind: true
            });        






            var barangays = [
                 { value: "Alangilan", label: "Alangilan" },
                 { value: "Alijis", label: "Alijis" },
                 { value: "Banago", label: "Banago" },
                 { value: "Bata", label: "Bata" },
                 { value: "Cabug", label: "Cabug" },
                 { value: "Estefania", label: "Estefania" },
                 { value: "Felisa", label: "Felisa" },
                 { value: "Granada", label: "Granada" },
                 { value: "Handumanan", label: "Handumanan" },
                 { value: "Mandalagan", label: "Mandalagan" },
                 { value: "Mansilingan", label: "Mansilingan" },
                 { value: "Montevista", label: "Montevista" },
                 { value: "Pahanocoy", label: "Pahanocoy" },
                 { value: "Punta-taytay", label: "Punta-taytay" },
                 { value: "Singcang-Airport", label: "Singcang-Airport" },
                 { value: "Sum-ag", label: "Sum-ag" },
                 { value: "Taculing", label: "Taculing" },
                 { value: "Tangub", label: "Tangub" },
                 { value: "Villamonte", label: "Villamonte" },
                 { value: "Vista Alegre", label: "Vista Alegre" },
                 { value: "Barangay 1", label: "Barangay 1" },
                 { value: "Barangay 2", label: "Barangay 2" },
                 { value: "Barangay 3", label: "Barangay 3" },
                 { value: "Barangay 4", label: "Barangay 4" },
                 { value: "Barangay 5", label: "Barangay 5" },
                 { value: "Barangay 6", label: "Barangay 6" },
                 { value: "Barangay 7", label: "Barangay 7" },
                 { value: "Barangay 8", label: "Barangay 8" },
                 { value: "Barangay 9", label: "Barangay 9" },
                 { value: "Barangay 10", label: "Barangay 10" },
                 { value: "Barangay 11", label: "Barangay 11" },
                 { value: "Barangay 12", label: "Barangay 12" },
                 { value: "Barangay 13", label: "Barangay 13" },
                 { value: "Barangay 14", label: "Barangay 14" },
                 { value: "Barangay 15", label: "Barangay 15" },
                 { value: "Barangay 16", label: "Barangay 16" },
                 { value: "Barangay 17", label: "Barangay 17" },
                 { value: "Barangay 18", label: "Barangay 18" },
                 { value: "Barangay 19", label: "Barangay 19" },
                 { value: "Barangay 20", label: "Barangay 20" },
                 { value: "Barangay 21", label: "Barangay 21" },
                 { value: "Barangay 22", label: "Barangay 22" },
                 { value: "Barangay 23", label: "Barangay 23" },
                 { value: "Barangay 24", label: "Barangay 24" },
                 { value: "Barangay 25", label: "Barangay 25" },
                 { value: "Barangay 26", label: "Barangay 26" },
                 { value: "Barangay 27", label: "Barangay 27" },
                 { value: "Barangay 28", label: "Barangay 28" },
                 { value: "Barangay 29", label: "Barangay 29" },
                 { value: "Barangay 30", label: "Barangay 30" },
                 { value: "Barangay 31", label: "Barangay 31" },
                 { value: "Barangay 32", label: "Barangay 32" },
                 { value: "Barangay 33", label: "Barangay 33" },
                 { value: "Barangay 34", label: "Barangay 34" },
                 { value: "Barangay 35", label: "Barangay 35" },
                 { value: "Barangay 36", label: "Barangay 36" },
                 { value: "Barangay 37", label: "Barangay 37" },
                 { value: "Barangay 38", label: "Barangay 38" },
                 { value: "Barangay 39", label: "Barangay 39" },
                 { value: "Barangay 40", label: "Barangay 40" },
                 { value: "Barangay 41", label: "Barangay 41" }
                 ];


            var barangaysSource =
            {
                 datatype: "array",
                 datafields: [
                     { name: 'label', type: 'string' },
                     { name: 'value', type: 'string' }
                 ],
                 localdata: barangays
            };


            var barangaysAdapter = new $.jqx.dataAdapter(barangaysSource, {
                autoBind: true
            });
var source =
{
    datatype: "json",
    cache: false,
    datafields: [
        { name: 'e_idp'},
        { name: 'e_id'},//employee_id
        { name: 'e_fn'},//employee_fname
        { name: 'e_mn'},//employee_mname
        { name: 'e_ln'},//employee_lname
        { name: 'e_ag'},//employee_age
        { name: 'e_db'},//employee_dob
        { name: 'e_gd'},//employee_gender
        { name: 'e_en'},//employee_id_number
        { name: 'e_po'},//employee_position
        { name: 'e_hnum'},//employee_house_#
        { name: 'e_st'},//employee_street
        { name: 'e_sb'},//employee_subd
        { name: 'e_bl'},//employee_block
        { name: 'e_lnum'},//employee_lot_#
        { name: 'e_by'},//employee_brgy
        { name: 'e_ct'},//employee_country
        { name: 'e_pl'},//employee_postal
        { name: 'e_un'},//username
        { name: 'e_pw'},//password
        { name: 'e_al'}//employee_access_level
],
id: 'e_id',
url: 'controller.php',
addrow: function (rowid, rowdata, position, commit) {
    // synchronize with the server - send insert command
    var data = "insert=true&;" + $.param(rowdata);
        $.ajax({
            dataType: 'json',
            url: 'controller.php',
            data: data,
            cache: false,
            success: function (data, status, xhr) {
                // insert command is executed.
                commit(true,data.e_idp);      
                //alert(data);        
            },
            error: function(jqXHR, textStatus, errorThrown)
            {
                commit(false);
            }
        });                         
},
deleterow: function (rowid, commit) {
          var data = "delete=true&" + $.param({e_id: rowid});
                       $.ajax({
                            dataType: 'json',
                            url: 'controller.php',
                            cache: false,
                            data: data,
                            success: function (data, status, xhr) {
                               // delete command is executed.
                               commit(true);
                                      
                            },
                            error: function(jqXHR, textStatus, errorThrown)
                            {
                                commit(false);
                            }
                        });                                             
},


updaterow: function (rowid, rowdata, commit) {
       

var data = "update=true&e_fn=" + rowdata.e_fn + "&e_mn=" + rowdata.e_mn + "&e_ln=" + rowdata.e_ln + "&e_ag=" + rowdata.e_ag + "&e_db=" + rowdata.e_db + "&e_gd=" + rowdata.e_gd;
data = data + "&e_en=" + rowdata.e_en + "&e_po=" + rowdata.e_po  + "&e_hnum=" + rowdata.e_hnum + "&e_st=" + rowdata.e_st  + "&e_sb=" + rowdata.e_sb  + "&e_bl=" + rowdata.e_bl;
data = data + "&e_lnum=" + rowdata.e_lnum + "&e_by=" + rowdata.e_by + "&e_ct=" + rowdata.e_ct + "&e_pl=" + rowdata.e_pl + "&e_un=" + rowdata.e_un + "&e_pw=" + rowdata.e_pw + "&e_al=" + rowdata.e_al + "&e_id=" + rowdata.e_id;
                    $.ajax({
                        dataType: 'json',
                        url: 'controller.php',
                        data: data,
                        success: function (data, status, xhr) {
                            // update command is executed.
                            commit(true);
                        }
                    });   
}};




var generaterow = function (id) {//adding new row for new data entry
                var row = {};
              
                row["e_id"] = "";
                row["e_fn"] = "";
                row["e_mn"] = "";
                row["e_ln"] = "";
                row["e_db"] = "";
                row["e_ag"] = "";
                row["e_gd"] = "";
                row["e_en"] = "";
                row["e_po"] = "";
                row["e_hnum"] = "";
                row["e_st"] = "";
                row["e_sb"] = "";
                row["e_bl"] = "";
                row["e_lnum"] = "";
                row["e_by"] = "";
                row["e_ct"] = "";
                row["e_pl"] = "";
                row["e_un"] = "";
                row["e_pw"] = "";
                row["e_al"] = "";
              
                return row;
            }


         var pagerrenderer = function () {
                var element = $("<div style='margin-top: 5px;float:left; width: 100%; height: 100%;'>");
                var paginginfo = $("#jqxgrid").jqxGrid('getpaginginformation');
                for (i = 0; i < paginginfo.pagescount; i++) {
                    // add anchor tag with the page number for each page.
                    var anchor = $("<a style='padding: 5px;' href='#" + i + "'>" + i + "</a></div>");
                    anchor.appendTo(element);
                    anchor.click(function (event) {
                        // go to a page.
                        var pagenum = parseInt($(event.target).text());
                        $("#jqxgrid").jqxGrid('gotopage', pagenum);
                    });
                }
                return element;
            }  
var n=2;


var dataAdapter = new $.jqx.dataAdapter(source);
// initialize jqxGrid
$("#jqxgrid").jqxGrid(
{           
                editable: true,
               //  editmode: false,
                width: 1500,
                height: 900,
                showfilterrow: true,
                filterable: true,
                sortable: true,
                selectionmode: 'checkbox',//'singlecell'
                pageable: true,
                pagermode:'simple',
                autoheight: true,
                columnsresize: true,
                source: dataAdapter,
                showtoolbar: true,

                rendertoolbar: function (toolbar) {
                    var me = this;
                    var container = $("<div style='margin: 5px;'></div>");
                    toolbar.append(container);
                    container.append('<input id="addrowbutton" type="button" disabled value="Add New Row" />');
                   
                    container.append('<input style="margin-left: 5px;" id="deleterowbutton" type="button" disabled value="Delete Selected Row"  />');
                  
                   $("#addrowbutton").jqxButton();
                   if(n==1){
                    $("#addrowbutton").jqxButton({ disabled: true});
                }
                else{
$("#addrowbutton").jqxButton({ disabled: false});

                }
                    $("#deleterowbutton").jqxButton();
                    
                    // update row.
                    $("#updaterowbutton").on('click', function () {
                        var datarow = generaterow();
                        var selectedrowindex = $("#jqxgrid").jqxGrid('getselectedrowindex');
                        var rowscount = $("#jqxgrid").jqxGrid('getdatainformation').rowscount;
                        if (selectedrowindex >= 0 && selectedrowindex < rowscount) {
                            var id = $("#jqxgrid").jqxGrid('getrowid', selectedrowindex);
                            var commit = $("#jqxgrid").jqxGrid('updaterow', id, datarow);

                            $("#jqxgrid").jqxGrid('ensurerowvisible', selectedrowindex);
                        }
                    });


                    // create new row.
                    $("#addrowbutton").on('click', function () {
                       

                    var datarow = generaterow();                
                    var commit = $("#jqxgrid").jqxGrid('addrow', null, datarow,'first');
                     
                    });

                    //delete row
                    $("#deleterowbutton").on('click', function () {
                    var selectedrowindexes = $("#jqxgrid").jqxGrid('getselectedrowindexes');
                    var rowscount = $("#jqxgrid").jqxGrid('getdatainformation').rowscount;
                    // begin update. Stops the Grid's rendering.
                    $("#jqxgrid").jqxGrid('beginupdate');
                    selectedrowindexes.sort();
                    // delete the selected rows by using the 'deleterow' method of jqxGrid.
                    for (var m = 0; m < selectedrowindexes.length; m++) {
                        var selectedrowindex = selectedrowindexes[selectedrowindexes.length - m - 1];
                        if (selectedrowindex >= 0 && selectedrowindex < rowscount) {
                            var id = $("#jqxgrid").jqxGrid('getrowid', selectedrowindex);
                            $("#jqxgrid").jqxGrid('deleterow', id);
                        }
                    }
                    $("#jqxgrid").jqxGrid('endupdate');
              });
    },
            columns: [
           
                    { text: 'EmployeeID', datafield: 'e_id', editable: false,width: 100 },
                    { text: 'First Name', datafield: 'e_fn', width: 100  },
                    { text: 'Middle Name', datafield: 'e_mn', width: 100 },
                    { text: 'Last Last Name', datafield: 'e_ln', width: 100 },
                    { text: 'Age', datafield: 'e_ag', width:50 },
                    { text: 'Date of Birth', datafield: 'e_db', filtertype: 'date',columntype: 'datetimeinput', width:85, align: 'right', cellsalign: 'right', cellsformat: 'dddd-MMMM-yyyy'
                    },
                    { text: 'Gender', datafield: 'e_gd', columntype: 'dropdownlist', width: 125,
                        createeditor: function (row, value, editor) {
                            editor.jqxDropDownList({ source: countriesAdapter, displayMember: 'label', valueMember: 'value' });
                        }
                    },
                    { text: 'Employee ID Code', datafield: 'e_en', width: 180 },
                    { text: 'Position', datafield: 'e_po', width: 100 },
                    { text: 'House #', datafield: 'e_hnum', width: 100 },
                    { text: 'Street', datafield: 'e_st', width: 100 },
                    { text: 'Subdivision', datafield: 'e_sb', width: 100 },
                    { text: 'Block', datafield: 'e_bl', width: 100 },
                    { text: 'Lot #', datafield: 'e_lnum', width: 100 },
                    { text: 'Brgy', datafield: 'e_by', columntype: 'dropdownlist', width: 125,
                        createeditor: function (row, value, editor) {
                            editor.jqxDropDownList({ source: barangaysAdapter, displayMember: 'label', valueMember: 'value' });
                        }
                    },
                    { text: 'Country', datafield: 'e_ct', width: 300 },
                    { text: 'Postal', datafield: 'e_pl', width: 100 },
                    { text: 'Username', datafield: 'e_un', width: 100 },
                   { text: 'Password', columntype: 'custom', columngroup: 'ProductDetails', datafield: 'e_pw', width: 250,
                    createeditor: function (row, cellValue, editor, cellText, width, height) {
                        var element = $('<input type="password" style="width: 100%; height: 100%;"/>');
                        editor.append(element);
                        element.jqxPasswordInput();
                    },
                    initeditor: function (row, cellValue, editor, cellText, width, height) {
                        var element = editor.find('input:first');
                        element.jqxPasswordInput('val', cellValue);
                    },
                    geteditorvalue: function (row, cellvalue, editor) {
                        var element = editor.find('input:first');
                        return element.val();
                    },
                    cellsrenderer: function (row, columnfield, value, defaulthtml, columnproperties) {
                        var hiddenValue = "";
                        for (var i = 0; i < value.length; i++) {
                            hiddenValue += "*";
                        };
                        return hiddenValue;
                    }
    },
                    { text: 'Access level', datafield: 'e_al', columntype: 'dropdownlist', width: 125,
                        createeditor: function (row, value, editor) {
                            editor.jqxDropDownList({ source: levelAdapter, displayMember: 'label', valueMember: 'value' });
                        }
                    }

                    
                ]
        });//end of jqxgrid


});
</script>

<!---->
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width">
    <link rel="shortcut icon" href="/favicon.ico">

    <link rel="stylesheet" href="../css/bootstrap.css" />
   
    <link rel="stylesheet" href="../css/main.css">
    <link rel="stylesheet" href="../css/style.css">
 

  </head>
  <body>

       <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">GC&amp;C Inventory WELCOME  <?php


  echo $_SESSION['access']." ";
  echo $_SESSION['full']."</br>";?>  </a>

        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav navbar-right">
            <li><a href="#">Profile</a></li>
            <li><a href="php/logout.php">Log Out</a></li>
          </ul>
          <form class="navbar-form navbar-right">
            <input type="text" class="form-control" placeholder="Search...">
          </form>
        </div>
      </div>
    </nav>

    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-3 col-md-2 sidebar">
          <ul class="nav nav-sidebar">
            <li class="active"><a href="#">Overview <span class="sr-only">(current)</span></a></li>
            <li><a href="#" data-toggle="modal" data-target="#myModal">Add Item</a></li>
            <li><a href="#">View Inventory</a></li>
          </ul>
          <ul class="nav nav-sidebar">
            <li><a href="#" data-toggle="modal" data-target="#addEmployeeModal">Add Employee</a></li>
            <li><a href="">View Employees</a></li>
          </ul>
          <ul class="nav nav-sidebar">
            <li><a href="">Add Company</a></li>
            <li><a href="">View Company</a></li>
          </ul>
          <ul class="nav nav-sidebar">
            <li><a href="">Add Location</a></li>
            <li><a href="">View Location</a></li>
          </ul>
        </div>
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
          <h1 class="page-header">Inventory</h1>
          <div class="table-responsive">

                <div class="test"><div id="jqxgrid">
            </div></div>


          </div>
       <?php include("items.php");?>

        </div>

      </div>

    </div>

    <script>
      (function(b,o,i,l,e,r){b.GoogleAnalyticsObject=l;b[l]||(b[l]=
      function(){(b[l].q=b[l].q||[]).push(arguments)});b[l].l=+new Date;
      e=o.createElement(i);r=o.getElementsByTagName(i)[0];
      e.src='//www.google-analytics.com/analytics.js';
      r.parentNode.insertBefore(e,r)}(window,document,'script','ga'));
      ga('create','UA-XXXXX-X');ga('send','pageview');
    </script>

      
</body>
</html>
