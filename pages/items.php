
<link rel="stylesheet" href="enlarge.css" type="text/css" />
    
 <link rel="stylesheet" href="smoothzoom.css">
 <script type="text/javascript" src="easing.js"></script> 
<script type="text/javascript" src="smoothzoom.min.js"></script> 
<script type="text/javascript">
   $(window).load( function() {
            $('img').smoothZoom({
                // Options go here
            });
        });
$(document).ready(function () {
var ifname ='';
var iid='';
var source =
{
    datatype: "json",
    cache: false,
    datafields: [
        { name: 'item_idp'},//item_id for the lastInserted
        { name: 'i_id'},//item id
        { name: 'i_name'},//item name
        { name: 'i_serial'},//serial
        { name: 'i_model'},//model
        { name: 'i_qty'},//qunatity
        { name: 'i_dob'},//date of purchase
        { name: 'ee_name'},//employee name
        { name: 'ee_id'},//employee name
        { name: 'i_remarks'},//remarks
        { name: 'i_item_description'},//descrioption
        { name: 'i_price'},
        { name: 'ca_name'},//categoryname
        { name: 'co_id'},
        {name: 'i_image'},
        { name: 'co_name'}//company_name
],
id: 'i_id',
url: 'items-controller.php',
addrow: function (rowid, rowdata, position, commit) {
    // synchronize with the server - send insert command
    var data = "insert=true&;" + $.param(rowdata);
        $.ajax({
            dataType: 'json', 
            url: 'items-controller.php',
            type: "GET", 
            data: data,
            cache: false,
            success: function (data, status, xhr) {
                // insert command is executed. Recieve the id
                commit(true,data.item_idp);                               
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
       

var data = "update=true&item_name=" + rowdata.i_name + "&item_serial="+ rowdata.i_serial + "&item_model="+ rowdata.i_model +"&item_idp=" + rowdata.i_id;
data = data + "&item_qty=" + rowdata.i_qty + "&item_price=" + rowdata.i_price + "&item_date=" + rowdata.i_dob + "&item_employee=" + rowdata.ee_id;
data = data + "&xcomx=" + rowdata.co_id;
                    $.ajax( {
                        dataType: 'json',
                        url: 'items-controller.php',
                        type: 'GET',
                        data: data,
                        success: function (data, status, xhr) {
                            // update command is executed.
                            commit(true);
                            alert(data);
                        },
                        error: function(jqXHR, textStatus, errorThrown)
                            {
                                commit(false);
                                //alert(errorThrown);
                            }
                    });     
}
};


var dataAdapter = new $.jqx.dataAdapter(source);
var editrow = -1;


    var date = new Date();
        date.setFullYear(2015, 0, 1);
      var imagerenderer = function (row, datafield, value) {
                return '<img rel="zoom" class="float-left" height="60" width="50" src="/db_gcc_inv-holyweek/pages/' + value + '"/>';
            } 
   $('#birthInput1').jqxDateTimeInput({ width: 150, height: 22, value: $.jqx._jqxDateTimeInput.getDateTime(date) });
   $('#birthInput2').jqxDateTimeInput({ width: 150, height: 22, value: $.jqx._jqxDateTimeInput.getDateTime(date) });
   $("#jq").jqxGrid(
   {           
                //editable: true,
                //editmode: false,
                width: 1400,
                //rowsheight: 60,
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
                    container.append('<input style="margin-left: 5px;" id="additem" type="button" value="Add New Item" />');
                    container.append('<input style="margin-left: 5px;" id="deleteitem" type="button" value="Delete Selected Item" />');
                    container.append('<input style="margin-left: 5px;" id="ref" type="button" value="Refresh Grid" />');
                    $("#additem").jqxButton();
                    $("#deleteitem").jqxButton();
                    $("#ref").jqxButton();

                 
                    $("#additem").on('click', function () {
                      $("#popupadd").jqxWindow('open');
                    });
                    $("#deleteitem").on('click', function () {
                      alert("delete");
                     });
                    $("#ref").on('click', function () {
                     $("#jq").jqxGrid('updatebounddata', 'cells');
                     });
      },
          
            columns: [
           
                    { text: 'Items Id', datafield: 'i_id', editable: false,width: 100 },
                    { text: 'Image', datafield: 'i_image', width: 100,cellsrenderer: imagerenderer},
                    { text: 'Item Name', datafield: 'i_name', width: 100  },
                    { text: 'Serial', datafield: 'i_serial', width: 100 },
                    { text: 'Model', datafield: 'i_model', width: 100 },
                    { text: 'Price', datafield: 'i_price', width:50 },
                    { text: 'Quantity', datafield: 'i_qty', width:50 },
                    { text: 'Date of Birth', datafield: 'i_dob', filtertype: 'date',columntype: 'datetimeinput', width:85, align: 'right', cellsalign: 'right', cellsformat: 'dddd-MMMM-yyyy'
                    },
                    { text: 'Recieved by', datafield: 'ee_name', columntype: 'dropdownlist', width: 125,
                        createeditor: function (row, value, editor) {
                            editor.jqxDropDownList({ source: countriesAdapter, displayMember: 'label', valueMember: 'value' });
                        }
                    },
                   { text: 'Category', datafield: 'ca_name',filtertype: 'checkedlist',    columntype: 'dropdownlist', width: 125,
                        createeditor: function (row, value, editor) {
                            editor.jqxDropDownList({ source: countriesAdapter, displayMember: 'label', valueMember: 'value' });
                        }
                    },
                    { text: 'Remarks', datafield: 'i_remarks', width: 180 },
                    { text: 'description', datafield: 'i_item_description', width: 100 },
                    { text: 'Company', datafield: 'co_name',filtertype: 'checkedlist',    columntype: 'dropdownlist', width: 125,
                        createeditor: function (row, value, editor) {
                            editor.jqxDropDownList({ source: countriesAdapter, displayMember: 'label', valueMember: 'value' });
                        }
                    },
                    { text: 'Edit', datafield: 'Edit', columntype: 'button', cellsrenderer: function () {
                     return "Edit";
                    }, buttonclick: function (row) {
                       // open the popup window when the user clicks a button.
                         editrow = row;
                     var offset = $("#jqxgrid").offset();
                     $("#popupadd").jqxWindow({ position: { x: parseInt(offset.left) + 60, y: parseInt(offset.top) + 60 } });

                     // get the clicked row's data and initialize the input fields.
                     var dataRecord = $("#jq").jqxGrid('getrowdata', editrow);
                     $("#itemnamex").val(dataRecord.i_name);
                     $("#itemidx").val(dataRecord.i_id);
                     $("#itemserialx").val(dataRecord.i_serial);
                     $("#itemmodelx").val(dataRecord.i_model);
                     $("#itememployeeD").val(dataRecord.ee_name);
                     $("#itempricex").val(dataRecord.i_price);
                     $("#itemqtyx").val(dataRecord.i_qty);
                     $("#birthInput2").val(dataRecord.i_dob);
                     $("#itemcompanyD").val(dataRecord.co_name);
                     $("#itemremarksx").val(dataRecord.i_remarks);
                     $("#itemdescriptionx").val(dataRecord.i_item_description);
                     $("#itemcategoryD").val(dataRecord.ca_name);
                     //$("#imageuploadx").val(dataRecord.i_image);
                   //  $("#imageuploadx").attr("value","dataRecord.i_image");
                  // document.getElementById('imageuploadx').value = dataRecord.ca_name;
                     // show the popup window.
                        


                     //  alert(iid+' '+ifname); 
                     $("#popupedit").jqxWindow('open');
                     }
                   }]
        });//end of jqxgrid


      $("#popupadd").jqxWindow({
        width: 800, height:500,resizable: false,  isModal: true, autoOpen: false, cancelButton: $("#Cancel"), modalOpacity: 0.01           
      });


  $("#popupedit").jqxWindow({
        width: 800, height:500,resizable: false,  isModal: true, autoOpen: false, cancelButton: $("#Cancel"), modalOpacity: 0.01           
      });
    
        //////////////////////////////////////// prepare the data
        var source =
        {
            datatype: "json",
            datafields: [
            { name: 'allid'},
            { name: 'fullname'},
            ],
            url: 'comboboxdata.php',
            async: false
        };
         var companysource =
        {
            datatype: "json",
            datafields: [
            { name: 'cid'},
            { name: 'cname'},
            ],
            url: 'comboboxdata-company.php',
            async: false
        };
        var categorysource =
        {
            datatype: "json",
            datafields: [
            { name: 'catid'},
            { name: 'catname'},
            ],
            url: 'comboboxdata-category.php',
            async: false
        };
        ////////////////////////////////

        var dataAdapter = new $.jqx.dataAdapter(source);
        var dataAdapterCompany = new $.jqx.dataAdapter(companysource);
        var dataAdapterCategory = new $.jqx.dataAdapter(categorysource); 

        var generaterow = function (id) {//adding new row for new data entry
                var row = {};

                row["item_idp"] = "";              
                row["item_name"] = $("#itemname").val();
                row["item_serial"] = $("#itemserial").val();
                row["item_model"] = $("#itemmodel").val();
                row["item_qty"] =  $("#itemqty").val();
                row["item_dop"] = $("#birthInput1").val();
                row["item_employee"] = $("#itememployee").val();
                row["item_remarks"] = $("#itemremarks").val();
                row["item_description"] = $("#itemdescription").val();
                row["item_category"] = $("#itemcategory").val();
                row["item_company"] =$("#itemcompany").val();
                row["item_price"] =$("#itemprice").val();
                row["image"] =$("#imageupload").val();
                      
                return row;
        }//end of generaterow

        var tobeupdate = function (id) {
                var row = {};
                row["item_idp"] = iid;            
                row["item_names"] = ifname;      
                return row;
        }//adding new row for new dsata entry
       
        $("#itememployee").jqxComboBox(
        {
            source: dataAdapter,
            
            width: 169,
            height: 25,
            selectedIndex: 0,
            promptText: "Select customer",
            displayMember: 'fullname',
            valueMember: 'allid'
        }); 

        $("#itemcompany").jqxComboBox(
        {
            source: dataAdapterCompany,
            
            width: 169,
            height: 25,
            selectedIndex: 0,
            promptText: "Select customer",
            displayMember: 'cname',
            valueMember: 'cid'
        }); 

        $("#itemcategory").jqxComboBox(
        {
            source: dataAdapterCategory,
            
            width: 169,
            height: 25,
            selectedIndex: 0,
            promptText: "Select customer",
            displayMember: 'catname',
            valueMember: 'catid'
        });  

  $("#itememployeeD").jqxComboBox(
        {
            source: dataAdapter,
            
            width: 169,
            height: 25,
            selectedIndex: 0,
            promptText: "Select customer",
            displayMember: 'fullname',
            valueMember: 'allid'
        }); 

        $("#itemcompanyD").jqxComboBox(
        {
            source: dataAdapterCompany,
            
            width: 169,
            height: 25,
            selectedIndex: 0,
            promptText: "Select customer",
            displayMember: 'cname',
            valueMember: 'cid'
        }); 

        $("#itemcategoryD").jqxComboBox(
        {
            source: dataAdapterCategory,
            
            width: 169,
            height: 25,
            selectedIndex: 0,
            promptText: "Select customer",
            displayMember: 'catname',
            valueMember: 'catid'
        });  

 /*$("#Save").click(function () { 
     var datarow = generaterow();
     var commit = $("#jq").jqxGrid('addrow', null, datarow,'first');       
                     $("#popupadd").jqxWindow('hide');
                     $('#itemname').val('');
                     $('#nname').val('');
                     $('#nserial').val('');
                     $('#nmodel').val('');
                     $('#nqty').val('');
                     $('#nprice').val('');
                     $('#nremarks').val('');
                     $('#ndesc').val('');                     
});//end of save function*/

/*$("#Update").click(function () {

        if (editrow >= 0) {

         var row = {i_name: $("#itemname").val(), i_serial: $("#itemserial").val(), i_model: $("#itemmodel").val(), i_qty: $("#itemqty").val(),i_price: $("#itemprice").val(),i_dob: $("#birthInput1").val(),ee_id: $("#itememployee").val(),co_id: $("#itemcompany").val(),i_id: $("#itemid").val()};                   
            var rowID = $('#jq').jqxGrid('getrowid', editrow);
            $('#jq').jqxGrid('updaterow', rowID, row);
           $("#popupadd").jqxWindow('hide');
                     $('#itemname').val('');
                     $('#nname').val('');
                     $('#nserial').val('');
                     $('#nmodel').val('');
                     $('#nqty').val('');
                     $('#nprice').val('');
                     $('#nremarks').val('');
                     $('#ndesc').val('');        
        }

 });//end of update function*/

$("#nname").jqxInput({placeHolder: "Item", height: 25, width: 200, minLength: 1});
$("#nserial").jqxInput({placeHolder: "Serial", height: 25, width: 200, minLength: 1});
$("#nmodel").jqxInput({placeHolder: "Model", height: 25, width: 200, minLength: 1});
$("#nqty").jqxInput({placeHolder: "Quantity", height: 25, width: 200, minLength: 1});
$("#nprice").jqxInput({placeHolder: "Price", height: 25, width: 200, minLength: 1});
$("#nremarks").jqxInput({placeHolder: "Remarks", height: 25, width: 200, minLength: 1});
$("#ndesc").jqxInput({placeHolder: "Description", height: 100, width: 200, minLength: 1});
$("#nid").jqxInput({placeHolder: "Item ID", height: 25, width: 200, minLength: 1});
 
//$('#jqxFileUpload').jqxFileUpload({browseTemplate: 'success', uploadTemplate: 'primary',  cancelTemplate: 'danger', width: 300, uploadUrl: 'imageUpload.php', fileInputName: 'item_image' });
    
});//end of function

</script>


   <html>
  <body>

      
            <div id="jq">
            </div>

  
<div id="popupadd">
            <div>Edit</div>
            <div style="overflow: hidden;">
            <form method="POST" enctype="multipart/form-data" action="items-controller.php">
              <table>
                    <tr>
                        <td align="right"></td>
                        <td align="left"><div id="nname"><input id="itemname" name="item_name" /></div></td>
                        <td align="left"><div id="nid"><input id="itemid" name="item_id" hidden/></div></td>

                        <td align="left"><div id="nserial"><input id="itemserial" name="item_serial" /></div></td>
                    </tr>
                    <tr>
                        <td align="right">Model:</td>
                        <td align="left"><div id="nmodel"><input id="itemmodel" name="item_model" /></div></td>
                    
                        <td align="right">Quantity:</td>
                        <td align="left"><div id="nqty"><input id="itemqty" name="item_qty"/></div></td>
                    </tr>
                    <tr>
                        <td align="right">Price:</td>
                        <td align="leaft"><div id="nprice"><input id="itemprice" name="item_price"/></div></td>
                    
                        <td align="right">Date:</td>
                        <td><div name="item_dop" id="birthInput1"></div></td>
                    </tr>
                     <tr>
                    
                        <td align="right">For Employee:</td>
                        <td align="left"><div name="item_employee" id="itememployee" style="width:169 px;"></div></td>

                   
                        <td align="right">For Company:</td>
                        <td><div name="item_company" id="itemcompany" style="width:169 px;"></div></td>
                    </tr>
                     <tr>
                        <td align="right">Remakrs:</td>
                        <td align="left"><div id="nremarks"><input id="itemremarks" name="item_remarks"/></div></td>
                    
                        <td align="right">Descriptions:</td>
                        <td><div id="ndesc"><input id="itemdescription"  name="item_description"/></div></td>
                    </tr>     
                    <tr>
                        <td align="right">Image:</td>
                        <td align="left"><input type="file" name="image"  id="imageupload"></div></td>
                    
                        <td align="right">Category:</td>
                        <td><div name="item_category" id="itemcategory" style="width:169 px;"></div></td>
                    </tr>               
                    <tr>
                        <td align="right"></td>
                        <td style="padding-top: 10px;" align="right"><input style="margin-right: 5px;" type="submit" id="Save" value="Save" name="insert" /><input id="Cancel" type="button" value="Cancel" /></td>
                    </tr>
                </table>
                </form>
            </div>

</div>



<div id="popupedit">
            <div>Edit</div>
            <div style="overflow: hidden;">
            <form method="POST" enctype="multipart/form-data" action="items-controller.php">
              <table>
                    <tr>
                        <td align="right"></td>
                        <td align="left"><div id="nname"><input id="itemnamex" name="item_name" /></div></td>
                        <td align="left"><div id="nid"><input id="itemidx" name="item_id" hidden/></div></td>

                        <td align="left"><div id="nserial"><input id="itemserialx" name="item_serial" /></div></td>
                    </tr>
                    <tr>
                        <td align="right">Model:</td>
                        <td align="left"><div id="nmodel"><input id="itemmodelx" name="item_model" /></div></td>
                    
                        <td align="right">Quantity:</td>
                        <td align="left"><div id="nqty"><input id="itemqtyx" name="item_qty"/></div></td>
                    </tr>
                    <tr>
                        <td align="right">Price:</td>
                        <td align="leaft"><div id="nprice"><input id="itempricex" name="item_price"/></div></td>
                    
                        <td align="right">Date:</td>
                        <td><div name="item_dop" id="birthInput2"></div></td>
                    </tr>
                     <tr>
                    
                        <td align="right">For Employee:</td>
                        <td align="left"><div name="item_employee" id="itememployeeD" style="width:169 px;"></div></td>

                   
                        <td align="right">For Company:</td>
                        <td><div name="item_company" id="itemcompanyD" style="width:169 px;"></div></td>
                    </tr>
                     <tr>
                        <td align="right">Remakrs:</td>
                        <td align="left"><div id="nremarks"><input id="itemremarksx" name="item_remarks"/></div></td>
                    
                        <td align="right">Descriptions:</td>
                        <td><div id="ndesc"><input id="itemdescriptionx"  name="item_description"/></div></td>
                    </tr>     
                    <tr>
                        <td align="right">Image:</td>
                        <td align="left"><input type="file" name="image"  id="imageuploadx"></td>
                    
                        <td align="right">Category:</td>
                        <td><div name="item_category" id="itemcategoryD" style="width:169 px;"></div></td>
                    </tr>               
                    <tr>
                        <td align="right"></td>
                        <td style="padding-top: 10px;" align="right"><input style="margin-right: 5px;" type="submit" id="Update" value="Update" name="update" /><input id="Cancel" type="button" value="Cancel" /></td>
                    </tr>
                </table>
                </form>
            </div>

</div>

</body>
</html>