$(document).ready(function(){
	/*
	*
		=========================================
			Bootstrap Initializations
		=========================================
	*
	*/



	/*
	*
		=========================================
			Core JS
		=========================================
	*
	*/
	var prodname   = $("input[name='prodname']"),
	   stocks     = $("input[name='stocks']"),
	   price	  = $("input[name='price']"),
	   addprodBtn = $("#addprodBtn"),
	   table      = $("#tableList"),
	   emptyMsg   = $("#emptyMessage"),
	   tableBody  = $("#tableList tbody"),
	   tableFirst = $("#tableList tbody tr:first"),
	   delFirst   = $("#delFirst");

	var fnameval, mival, lnameval, prodnameval, stocksval, priceval;

	var id = 0;

	
	/* Product Function */
	function createProdTemplate (prodname, stocks, price){
		var body;
		body += "<tr>";
    body +="<td style='text-align:center;'><input type='checkbox' name='chkbx'></td>";
    body +="<td class='prodname'>"+prodname+"</td>";
    body +="<td class='stocks'>"+stocks+"</td>";
    body +="<td class='price'>"+price+"</td>";
    body +="<td style='text-align:center;'><button class='btn-primary edit-btn'>Edit</button></td>";
    body +="</tr>";
		return body;
	}
	
	function emptyMessageTemplate () {
		var body;
		body += "<tr id='emptyMessage'>";
    body += "<td colspan='6' style='text-align:center;'>Table is empty</td>";
    body +="</tr>";
		return body;
	}

	function editProdRowTemplate (prodname, stocks, price){
		var body;
    body += "<td style='text-align:center;'><input type='checkbox' name='chkbx'></td>";
    body +="<td class='prodname'><input type='text' name='prodname-edit' value='"+prodname+"'><input type='hidden' name='prodname-default' value='"+prodname+"'></td>";
    body +="<td class='stocks'><input type='text' name='stocks-edit' value='"+stocks+"'><input type='hidden' name='stocks-default' value='"+stocks+"'></td>";
    body +="<td class='price'><input type='text' name='price-edit' value='"+price+"'><input type='hidden' name='price-default' value='"+price+"'></td>";
    body +="<td style='text-align:center;'><button class='btn-info save-btn'>Save</button> <button class='btn-danger cancel-btn'>Cancel</button></td>";
		return body;
	}

	function rowTemplate (prodname, stocks , price){
		var body;
    body += "<td style='text-align:center;'><input type='checkbox' name='chkbx'></td>";
    body +="<td class='prodname'>"+prodname+"</td>";
    body +="<td class='stocks'>"+stocks+"</td>";
    body +="<td class='price'>"+price+"</td>";
    body +="<td style='text-align:center;'><button class='btn-primary edit-btn'>Edit</button></td>";
		return body;
	}
	

	/* Add Product Button */

	addprodBtn.click(function(){
		prodnameval = prodname.val();
		stocksval = stocks.val();
		priceval = price.val();

		if($("#emptyMessage").length){
			$("#emptyMessage").remove();
			tableBody.append(createProdTemplate(prodnameval, stocksval, priceval));
		}else{
			tableBody.append(createProdTemplate(prodnameval, stocksval, priceval));
		}
	});
	
	/* Delete First Item Button */

	$("body").on('click', '#delFirst', function(e){
		var tableFirst = $("#tableList tbody tr:first");
		tableFirst.remove();
		if($("#tableList tbody tr").length < 1){
			tableBody.append(emptyMessageTemplate());
		}
	});

	/* Delete All Items Button */

	$("body").on('click', '#delAll', function(e){
		var tableBody = $("#tableList tbody");
		tableBody.html('');
		tableBody.append(emptyMessageTemplate());
	});

	/* Delete Selected Items Button */

	$("body").on('click', '#delSelected', function(e){
		var tableRow = $("#tableList tbody tr");
		tableRow.has("input[name='chkbx']:checked").remove();
	});

	/* Edit Index Item Button */

	$("body").on('click', '.edit-btn', function(e){
		var row = $(this).closest("tr");
		var tempprodname, tempstocks, tempprice;
		var rowEdit;

		tempprodname = $(this).closest("tr").find(".prodname").text();
		tempstocks = $(this).closest("tr").find(".stocks").text();
		tempprice = $(this).closest("tr").find(".price").text();

		rowEdit = editProdRowTemplate(tempprodname, tempstocks, tempprice);
		row.html(rowEdit);
	});

	/* Save Changes Button */

	$("body").on('click', '.save-btn', function(e){
		var row = $(this).closest("tr");
		var tempprodname, tempstocks, tempprice;
		var rowSave;

		tempprodname = $(this).closest("tr").find("input[name='prodname-edit']").val();
		tempstocks = $(this).closest("tr").find("input[name='stocks-edit']").val();
		tempprice = $(this).closest("tr").find("input[name='price-edit']").val();

		rowSave = rowTemplate(tempprodname, tempstocks, tempprice);
		row.html(rowSave);
	});

	/* Cancel Edit Button */

	$("body").on('click', '.cancel-btn', function(e){
		var row = $(this).closest("tr");
		var tempprodname, tempstocks, tempprice;
		var rowSave;

		tempprodname = $(this).closest("tr").find("input[name='prodname-default']").val();
		tempstocks = $(this).closest("tr").find("input[name='stocks-default']").val();
		tempprice = $(this).closest("tr").find("input[name='price-default']").val();

		rowSave = rowTemplate(tempprodname, tempstocks, tempprice);
		row.html(rowSave);
	});

});