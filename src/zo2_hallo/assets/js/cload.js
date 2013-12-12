/*
 Author: Sergey Onishchenko 
 Description: for dynamic inserting js or css files
*/
function Cload(options){
	this.linkElements = [];
	options.useBaseurl = options.useBaseurl || false;
	options.onresize = options.onresize || false;

	this.getBaseurl = function() {
	   return location.protocol + "//" + location.hostname + 
		  (location.port && ":" + location.port);
	},
	
	this.runOnResize = function(){
		var $this = this;
		var addEvent =  window.attachEvent||window.addEventListener;
		var event = window.attachEvent ? 'onresize' : 'resize';
		addEvent(event, function(){
			$this.loadfile();
		});
	},
	
	this.loadfile = function(){ 
					//insert file to the document
		function setFile(filename, $this, w) {
			var el = document.getElementsByTagName('link');
			for ( var i=0; i<el.length; i++ ) { //check if file already exists, thus return
				if ( el[i].href === filename || el[i].href === $this.getBaseurl() + options.match[prop] ) {
					return;
				} 
			}			
			if ( filename.indexOf('.js', 0) != -1 ) { //if filename is JavaScript file
				var fileref=document.createElement('script')
				fileref.setAttribute("type","text/javascript")
				fileref.setAttribute("src", filename)
			}
			if ( filename.indexOf('.css', 0) != -1 ) { //if filename is CSS file
				var fileref=document.createElement("link")
				fileref.setAttribute("rel", "stylesheet")
				fileref.setAttribute("type", "text/css")
				fileref.setAttribute("href", filename)
			}
			if (typeof fileref!="undefined") {
				document.getElementsByTagName("head")[0].appendChild(fileref)
			}
			$this.linkElements.push([min,max,fileref]); //preserve data for deleting 
		}
		
		var w = document.html.offsetWidth;
		
		for ( var prop in options.match) { 
			// create rules
			var rules = prop.split('_') 
			var min = rules[0] < rules[1] ? rules[0] : rules[1];
			var max = rules[0] > rules[1] ? rules[0] : rules[1];	
			
			var filename = options.match[prop];
		
			//if current width is in the set of rules, insert file
			if ( w >= min && w <= max ){
				setFile(filename, this, w);
			}
			
			//unset files if rules do not correspond to current width
			function unsetFile($this, filename, w) {	
				 for ( var i=0; i<$this.linkElements.length; i++ ) { 
					if ( $this.linkElements[i][1] < w || $this.linkElements[i][0] > w ) {
						$this.linkElements[i][2].parentNode.removeChild($this.linkElements[i][2]);
						$this.linkElements.splice(i,1);
					} 
				 }
			}
			if ( options.onresize ) {
				unsetFile(this, filename, w);
			}	
	
		}	
		this.firstCall = false;
	}
	
	this.autoload = (function(){
		this.loadfile();
		if ( options.onresize ) {
			this.runOnResize();
		}	
	}).call(this)	
};


