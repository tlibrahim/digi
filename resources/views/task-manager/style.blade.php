<style type="text/css" media="screen">
	.fa-times{
		position: absolute;
		top: -15px;
		right: 0px
	}
	.fa-times:hover{
		cursor:pointer;
		color: gray
	}
	.p-a:hover{
		cursor: pointer;
		color: gray
	}
  	.progress-bar-parent{
      	width:100%;
      	border:1px solid #337ab7;
    	border-radius:5px;
  	}
  	.progress-bar-child{
      	background-color:#70bdff;
      	height:100%;
      	padding:1px 10px 0;
      	border-radius:5px;
  	}
  	.tabs {
	    margin: 0 auto;
	    padding: 0 10px;
  	}
  	#tab-button {
	    display: table;
	    table-layout: fixed;
	    width: 100%;
	    margin: 0;
	    padding: 0;
	    list-style: none;
  	}
  	#tab-button li {
	    display: table-cell;
	    width: 20%;
  	}
  	#tab-button li a {
	    display: block;
	    padding: .5em;
	    background: #eee;
	    border: 1px solid #ddd;
	    text-align: center;
	    color: #000;
	    text-decoration: none;
  	}
  	#tab-button li:not(:first-child) a {
    	border-left: none;
  	}
  	#tab-button li a:hover,
  	#tab-button .is-active a {
	    border-bottom-color: transparent;
	    background: #fff;
  	}
  	.tab-contents {
    	padding: 20px;
    	border: 1px solid #ddd;
  	}
  	.tab-button-outer {
    	display: none;
  	}
  	.tab-contents {
    	margin-top: 20px;
  	}
  	@media screen and (min-width: 768px) {
    	.tab-button-outer {
	      	position: relative;
	      	z-index: 2;
	      	display: block;
    	}
    	.tab-select-outer {
      		display: none;
    	}
    	.tab-contents {
	      	position: relative;
	      	top: -1px;
	      	margin-top: 0;
    	}
  	}
</style>