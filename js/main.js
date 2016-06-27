
function _row_editable(tr){
	var campaign = tr.find(".campaign")
	var third = tr.find(".third")
	var platform = tr.find(".platform")
	var url = tr.find(".url")
	
	var campaign_e = $("<input type='text' value='' class='form-control' />")
	
	var third_e = $("<select class='form-control'></select>").append($("<option>FuseClick</option>"))
															.append($("<option>Portal</option>"))
															.append($("<option>AppcoachM</option>"))
															
	var platform_e = $("<select class='form-control'></select>").append($("<option>ios</option>"))
															.append($("<option>android</option>"))
	
	var url_e = $("<textarea class='form-control'></textarea>")
	
	campaign.html(campaign_e.val(campaign.text()))
	third.html(third_e.val(third.text()))
	platform.html(platform_e.val(platform.text()))
	url.html(url_e.text(url.text()))
	
}



function _row_save(tr){
	var idx = $(tr.find(".idx").get(0)).text()
	
	var campaign = $(tr.find(".campaign").get(0))
	var third = $(tr.find(".third").get(0))
	var platform = $(tr.find(".platform").get(0))
	var _url = $(tr.find(".url").get(0))
	
	campaign.html($(campaign.find("input")).val())
	third.html($(third.find("select")).val())
	platform.html($(platform.find("select")).val())
	_url.html($(_url.find("textarea")).val())
	
}

function edit(){
	$(".edit").click(function(){
		console.log("edit")
		var self = $(this)
//		$(this).addClass("success")
		var tr = self.parents("tr")
		_row_editable(tr)
		self.hide()
		self.next(".save").show()
		
	})
}

function save(){
	$(".save").click(function(){
		console.log("save")
		var self = $(this)
		
		var tr = self.parents("tr")
		_row_save(tr)
		self.hide()
		self.prev(".edit").show()
		
		var form_data = {
			"idx": tr.find(".idx").text(),
			"campaign": tr.find(".campaign").text(),
			"third": tr.find(".third").text(),
			"platform": tr.find(".platform").text(),
			"url": tr.find(".url").text()
		}
		
		var data = JSON.parse(sessionStorage.getItem("data"))
				data[form_data.idx - 1] = form_data
				sessionStorage.setItem("data", JSON.stringify(data))
		
		$.post( "../model/modify_url.php", form_data)
			.done(function(data){
				console.log(data)
				
			})
	})
}

function del(){
	$(".del").click(function(){
		var tr = $(this).parents("tr")
		var idx = tr.find(".idx").text()
		console.log(idx)
		
		
		var data = JSON.parse(sessionStorage.getItem("data"))
		data.splice(idx-1, 1)
		sessionStorage.setItem("data", JSON.stringify(data))
		tr.remove()
		_reset_idx()
		
		$.getJSON("../model/del_url.php?idx=" + idx, function(data){
			console.log(data)
		})
	})
}

function clear(){
	$("#clear").click(function(){
		var data = sessionStorage.getItem("data")
		_ui_url_list(data, true)
	})
}

function search(){
	$("#search").click(function(){
		
		var campaign = $("#cam").val().trim()
		var third = $("#thi").val().trim()
		var platform = $("#pla").val().trim()
		
		
		var data = JSON.parse(sessionStorage.getItem("data"))
		console.log(data)
		
		var validData = []
		
		if (platform == "Both"){
			for(var i=0; i<data.length; i++){
				if (data[i].campaign.includes(campaign) && data[i].third.includes(third)){
					validData.push(data[i])
				}
			}
		} else {
			for(var i=0; i<data.length; i++){
				if (data[i].campaign.includes(campaign) && data[i].third.includes(third) &&data[i].platform == platform){
					validData.push(data[i])
				}
			}
		}
		
		console.log(validData)
		_ui_url_list(validData, true)
		
	})
}


function create(){
	$("#save").click(function(e){
		var form = $("form#new_url")
		var formdata = new FormData(form)
		
		$.post( "../model/create_url.php", form.serialize() )
			.done(function(data){
				
				_ui_url_list({}, true)
				loaddata(data, true)
			})

	})
}

function _ui_url_list(data, clear){
	
	var tbody = $("#url-table").find("tbody")
	if (clear){
		tbody.html("")
	}
	
	
	for (var i=0; i<data.length; i++){
		var tr = $("<tr>").append($("<td>").html('<a class="edit" href="#"><span class="glyphicon glyphicon-pencil"></span></a> <a style="display:none" class="save" href="#"><span class="glyphicon glyphicon-floppy-save"></span></a> <a class="del" href="#"><span class="glyphicon glyphicon-remove"></span></a>'))
					.append($("<td class='idx'>").text(i+1))
					.append($("<td class='campaign'>").text(data[i].campaign))
					.append($("<td class='third'>").text(data[i].third))
					.append($("<td class='platform'>").text(data[i].platform))
					.append($("<td class='url'>").text(data[i].url))
				
		tbody.append(tr)
	}
}

function _reset_idx(){
	var idx = $("#url-table").find(".idx")
	
	$.each(idx, function(k, v) {
//		console.log(v)
		$(v).text(k+1)
	});
	
}

function loaddata(){
	$.getJSON("../model/get_url_list.php", function(data){
		sessionStorage.setItem("data", JSON.stringify(data))
		_ui_url_list(data)
		
		del()
		edit()
		save()
	})
}

$(function(){
	loaddata()
	
	
	search()
	create()
	clear()
})