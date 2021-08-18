


<script>
function suggest(inputString){
		if(inputString.length == 0) {
			$('#suggestions').fadeOut();
		} else {
		$('#country').addClass('load');
			$.post("../asteroid/includes/autosuggest.php", {queryString: ""+inputString+""}, function(data){
				if(data.length >0) {
					$('#suggestions').fadeIn();
					$('#suggestionsList').html(data);
					$('#country').removeClass('load');
				}
			});
		}
	}

	function fill(thisValue) {
		$('#country').val(thisValue);
		setTimeout("$('#suggestions').fadeOut();", 600);
	}

</script>

<style>

#country{


	font-size:14px;
}
.suggestionsBox {
	position: absolute;
	left: 107px;
	top:20px;
	margin: 0px 0px 0px 0px;
	width: 248px;
	padding:0px;
  background : rgba(2, 76, 96, .8);

	color: #fff;
}
.suggestionsBoxprofile {
	position: absolute;
	left: 108px;
	top:20px;
	margin: 0px 0px 0px 0px;
	width: 230px;
	padding:0px;
  background : rgba(2, 76, 96, 1);

	color: #fff;
}
.suggestionList {
	margin: 0px;
	padding: 0px;
}
.suggestionList ul li {
	list-style:none;
	margin: 0px;
	padding: 6px;
	border-bottom:1px dotted #666;
	cursor: pointer;
}
.suggestionList ul li:hover {
	background-color: #000;
	color:#ffffff;
}
ul {

	font-size:11px;
	color:#fff;
	padding:0;
	margin:0;
}


#suggest {
	position:absolute;

}

</style>
