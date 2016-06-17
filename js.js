function bookAdd(json){
	//Clicked addbook button.
	//This is worst design.
	$.ajax({
		url: '?page=api&a=bookAdd',
		type: 'POST',
		data: { json: JSON.stringify(json)},
		dataType: 'json'
	});
}
function loadData(args){
	//TODO: clear table
	$.ajax({
		url: '?page=api&a=search' + args,
		type: 'GET',
		dataType: 'json'
	}).done(function(data){
		jQuery.each(data["data"], function(index,book){
			var tr = $("<tr/>",{});
			tr.append($("<td/>",{
				text: book["title"]
			}));
			authorList = $("<ul/>",{});
			jQuery.each(book["author_data"], function(index,author){
				authorList.append($("<li>" + author["name"] + "</li>"),{
				//	text: "foo"//author["name"]//Dunno why this doesn't work
				});
			});
			tr.append($("<td/>",{}).append(authorList));
			//authorList.appendTo($("<td/>",{})).appendTo(tr);
			tr.append($("<td/>",{
				text: "button"
			}));
			tr.appendTo($("#searchData"));
		});
		$("#searchResult").tablesorter();
	});
}

$(document).ready(function() {
});
