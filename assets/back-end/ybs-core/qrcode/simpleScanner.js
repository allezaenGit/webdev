 let dt = new Date();
 let itime = dt.getTime();
 let optionsCam;	
 let btnScan;

(function( $ ){
	
	
	
	
	$.fn.btnScan = function(){
		return $('#container-btn-scan > .btn-scanner');
	}
	
	$.fn.titleBox = function(){
		return $(".modal-title-scanner");
	}
	
	$.fn.colorBox = function(color){
		 $(".color-box-scanner").removeClass('modal-primary');
		 $(".color-box-scanner").removeClass('modal-success');
		 $(".color-box-scanner").removeClass('modal-danger');
		 $(".color-box-scanner").removeClass('modal-info');
		 $(".color-box-scanner").removeClass('modal-warning');
		 
		 $(".color-box-scanner").addClass("modal-" + color);
	}
	

	
	
	
	$.fn.scanner= function(options){
		let data = $(this).data();
		
		let hidebtnScan = ' ';
		let hideoptionCam = ' ';
		let titleBox = ' Scanner ' ;
		
		if(options.hidebtnScan !== undefined && options.hidebtnScan==true){
			hidebtnScan = ' style="display:none " '; 
		}
		
		if(options.hideoptionCam !== undefined && options.hideoptionCam==true){
			hideoptionCam = '  style="display:none "  '; 
		}
		
		if(options.titleBox !== undefined){
			titleBox = options.titleBox ; 
		}
		
		
		btnScan = '<button '+hidebtnScan+'  type="button" class="btn btn-info form-control btn-scanner" id="btn-modal-qr-'+itime+'" data-toggle="modal" data-target="#modal-QR-'+itime+'"> '+
						'<i class="fa fa-qrcode"> Scan Now !</i>'+
					'</button>';
		
		if(options.btnScan !== undefined ){
			btnScan = $.parseHTML(options.btnScan());
			
			$(btnScan).attr('id',"btn-modal-qr-"+itime);
			$(btnScan).attr('data-toggle','modal');
			$(btnScan).attr('data-target',"#modal-QR-"+itime);
			
			btnScan = $(btnScan);
		}
		
		optionsCam = options;		
						
		let a = '<div class="form-group">'+
                '<select '+ hideoptionCam+ ' class="form-control" id="camera-select-'+itime+'"></select>'+
				'</div>'+
				'<div class="form-group" id="container-btn-scan" >'+
					//inject button with append
				'</div>';
				
				
				
		let	b = '<div class="box-modal-scanner" id="QR-Code-'+itime+'">'+
				'<div class="modal modal-primary fade color-box-scanner" id="modal-QR-'+itime+'">'+
					  '<div class="modal-dialog">'+
						'<div class="modal-content">'+
						  '<div class="modal-header">'+
							'<button type="button" class="close" data-dismiss="modal" aria-label="Close">'+
							  '<span aria-hidden="true">&times;</span></button>'+
							'<h4 class="modal-title-scanner" style="display:inline"> '+titleBox+' </h4><span><button  id="btn-setting-cam-'+itime+'" data-showconfig="0" class="btn btn-sm btn-primary"><i class="fa fa-cogs" style="color:white"></i> </button></span>'+
						  '</div>'+
						  '<div class="modal-body" style="text-align: center;">'+
								
								 '<div >'+
									'<canvas  width="320" height="240" id="webcodecam-canvas-'+itime+'"></canvas>'+
									 '<div class="scanner-laser laser-rightBottom" style="opacity: 0.5;"></div>'+
									 '<div class="scanner-laser laser-rightTop" style="opacity: 0.5;"></div>'+
									 '<div class="scanner-laser laser-leftBottom" style="opacity: 0.5;"></div>'+
									'<div class="scanner-laser laser-leftTop" style="opacity: 0.5;"></div>'+
								'</div>'+
						
								
						  '</div>'+
						  '<div class="modal-footer">'+
							'<button type="button" class="btn btn-outline pull-left" id="modal-close-qr-'+itime+'" data-dismiss="modal">Close</button>'+
							'<button type="button" class="btn btn-outline pull-left" id="modal-pause-qr-'+itime+'" >Pause</button>'+
						  '</div>'+
						  
						   '<div id="form-setting-'+itime+'" style="display:none" class="modal-footer">'+
						   '<div class="col-md-12">'+
							'<div class="well" style="width: 100%;color:black">'+
								'<label id="zoom-value-'+itime+'" width="100">Zoom: 2</label>'+
								'<input id="zoom-'+itime+'" onchange="Page.changeZoom();" type="range" min="10" max="30" value="20">'+
								'<label id="brightness-value-'+itime+'" width="100">Brightness: 0</label>'+
								'<input id="brightness-'+itime+'" onchange="Page.changeBrightness();" type="range" min="0" max="128" value="0">'+
								'<label id="contrast-value-'+itime+'" width="100">Contrast: 0</label>'+
								'<input id="contrast-'+itime+'" onchange="Page.changeContrast();" type="range" min="0" max="64" value="0">'+
								'<label id="threshold-value-'+itime+'" width="100">Threshold: 0</label>'+
								'<input id="threshold-'+itime+'" onchange="Page.changeThreshold();" type="range" min="0" max="512" value="0">'+
								'<label id="sharpness-value-'+itime+'" width="100">Sharpness: off</label>'+
								'<input id="sharpness-'+itime+'" onchange="Page.changeSharpness();" type="checkbox">'+
								'<label id="grayscale-value-'+itime+'" width="100">grayscale: off</label>'+
								'<input id="grayscale-'+itime+'" onchange="Page.changeGrayscale();" type="checkbox">'+
								'<br>'+
								'<label id="flipVertical-value-'+itime+'" width="100">Flip Vertical: off</label>'+
								'<input id="flipVertical-'+itime+'" onchange="Page.changeVertical();" type="checkbox">'+
								'<label id="flipHorizontal-value-'+itime+'" width="100">Flip Horizontal: off</label>'+
								'<input id="flipHorizontal-'+itime+'" onchange="Page.changeHorizontal();" type="checkbox">'+
							'</div>'+
						'</div>'+
						'</div>'+
						  
						'</div>'+
						'<!-- /.modal-content -->'+
					  '</div>'+
					  '<!-- /.modal-dialog -->'+
					'</div>'+
					'<!-- /.modal -->'+
					
						
					
					 
					

		  
					'</div>';	
				
				
				
				
				
		$(this).html(a);	
		$(this).append(b);	
		
		$('#container-btn-scan').append(btnScan);	
		
		
		
		
	
	
	

	
		
		
		//return this;
		
		
		//end-------
		
	}
	


	
	
	
}( jQuery ));


 
(function(undefined) {
    "use strict";

	
	

$("#camera-select-"+itime).ready(function(){
	
	$('#btn-modal-qr-'+itime).click(function(){
				decoder.play();
	});

	$('#btn-setting-cam-'+itime).click(function(){
		let display =  $("#form-setting-"+itime).css("display");
			if(display!="none"){
				$("#form-setting-"+itime ).attr("style", "display:none");
			}else{
				$("#form-setting-"+itime).attr("style", "display:block");
			}
	});	
	
	$("#modal-pause-qr-"+itime).click(function(){
		let title = $(this).text();
		if(title=="Pause"){
				decoder.pause();
				$(this).text("Start");	
		}else{
				decoder.play();
				$(this).text("Pause");	
		}
		
		
	});
 
	$("#modal-close-qr-"+itime).click(function (){
		decoder.stop();
	});
	
	 $("#modal-QR-"+itime).on('hidden.bs.modal',function(){
		decoder.stop();
	});
	 
    function Q(el) {
        if (typeof el === "string") {
            var els = document.querySelectorAll(el);
            return typeof els === "undefined" ? undefined : els.length > 1 ? els : els[0];
        }
        return el;
    }
	

	
    var txt = "innerText" in HTMLElement.prototype ? "innerText" : "textContent";
    var scannerLaser = Q(".scanner-laser"),
     
       
        contrast = Q("#contrast-"+itime),
        contrastValue = Q("#contrast-value-"+itime),
        zoom = Q("#zoom-"+itime),
        zoomValue = Q("#zoom-value-"+itime),
        brightness = Q("#brightness-"+itime),
        brightnessValue = Q("#brightness-value-"+itime),
        threshold = Q("#threshold-"+itime),
        thresholdValue = Q("#threshold-value-"+itime),
        sharpness = Q("#sharpness-"+itime),
        sharpnessValue = Q("#sharpness-value-"+itime),
        grayscale = Q("#grayscale-"+itime),
        grayscaleValue = Q("#grayscale-value-"+itime),
        flipVertical = Q("#flipVertical-"+itime),
        flipVerticalValue = Q("#flipVertical-value-"+itime),
        flipHorizontal = Q("#flipHorizontal-"+itime),
        flipHorizontalValue = Q("#flipHorizontal-value-"+itime);
	
	let btnCam = {	
					stop : function(){
						$("#modal-close-qr-"+itime).click();	
					},
					pause : function(){
						$("#modal-pause-qr-"+itime).text('Start');
						decoder.pause();
					},
					play : function(){
						$("#modal-pause-qr-"+itime).text('Pause');
						decoder.play();
					},
				  }
	
    var args = {
        autoBrightnessValue: 100,
		
        resultFunction: function(res) {
            [].forEach.call(scannerLaser, function(el) {
                fadeOut(el, 0.5);
                setTimeout(function() {
                    fadeIn(el, 0.5);
                }, 300);
            });
           
			$("#modal-pause-qr-"+itime).click();
			optionsCam.onSuccess(res,btnCam);
			
           
			
			
			
			
			
			
			
			
			
			
        },
		
        getDevicesError: function(error) {
            var p, message = "Error detected with the following parameters:\n";
            for (p in error) {
                message += p + ": " + error[p] + "\n";
            }
            alert(message);
        },
        getUserMediaError: function(error) {
            var p, message = "Error detected with the following parameters:\n";
            for (p in error) {
                message += p + ": " + error[p] + "\n";
            }
            alert(message);
        },
        cameraError: function(error) {
            var p, message = "Error detected with the following parameters:\n";
            if (error.name == "NotSupportedError") {
                var ans = confirm("Your browser does not support getUserMedia via HTTP!\n(see: https:goo.gl/Y0ZkNV).\n You want to see github demo page in a new window?");
                if (ans) {
                    window.open("https://andrastoth.github.io/webcodecamjs/");
                }
            } else {
                for (p in error) {
                    message += p + ": " + error[p] + "\n";
                }
                alert(message);
            }
        },
        cameraSuccess: function() {
           // grabImg.classList.remove("disabled");
        }
    };
	
	
    var decoder = new WebCodeCamJS('#webcodecam-canvas-'+itime).buildSelectMenu("#camera-select-"+itime, "environment|back").init(args);
    
    Page.changeZoom = function(a) {
        if (decoder.isInitialized()) {
            var value = typeof a !== "undefined" ? parseFloat(a.toPrecision(2)) : zoom.value / 10;
            zoomValue[txt] = zoomValue[txt].split(":")[0] + ": " + value.toString();
            decoder.options.zoom = value;
            if (typeof a != "undefined") {
                zoom.value = a * 10;
            }
        }
    };
    Page.changeContrast = function() {
        if (decoder.isInitialized()) {
            var value = contrast.value;
            contrastValue[txt] = contrastValue[txt].split(":")[0] + ": " + value.toString();
            decoder.options.contrast = parseFloat(value);
        }
    };
    Page.changeBrightness = function() {
        if (decoder.isInitialized()) {
            var value = brightness.value;
            brightnessValue[txt] = brightnessValue[txt].split(":")[0] + ": " + value.toString();
            decoder.options.brightness = parseFloat(value);
        }
    };
    Page.changeThreshold = function() {
        if (decoder.isInitialized()) {
            var value = threshold.value;
            thresholdValue[txt] = thresholdValue[txt].split(":")[0] + ": " + value.toString();
            decoder.options.threshold = parseFloat(value);
        }
    };
    Page.changeSharpness = function() {
        if (decoder.isInitialized()) {
            var value = sharpness.checked;
            if (value) {
                sharpnessValue[txt] = sharpnessValue[txt].split(":")[0] + ": on";
                decoder.options.sharpness = [0, -1, 0, -1, 5, -1, 0, -1, 0];
            } else {
                sharpnessValue[txt] = sharpnessValue[txt].split(":")[0] + ": off";
                decoder.options.sharpness = [];
            }
        }
    };
    Page.changeVertical = function() {
        if (decoder.isInitialized()) {
            var value = flipVertical.checked;
            if (value) {
                flipVerticalValue[txt] = flipVerticalValue[txt].split(":")[0] + ": on";
                decoder.options.flipVertical = value;
            } else {
                flipVerticalValue[txt] = flipVerticalValue[txt].split(":")[0] + ": off";
                decoder.options.flipVertical = value;
            }
        }
    };
    Page.changeHorizontal = function() {
        if (decoder.isInitialized()) {
            var value = flipHorizontal.checked;
            if (value) {
                flipHorizontalValue[txt] = flipHorizontalValue[txt].split(":")[0] + ": on";
                decoder.options.flipHorizontal = value;
            } else {
                flipHorizontalValue[txt] = flipHorizontalValue[txt].split(":")[0] + ": off";
                decoder.options.flipHorizontal = value;
            }
        }
    };
    Page.changeGrayscale = function() {
        if (decoder.isInitialized()) {
            var value = grayscale.checked;
            if (value) {
                grayscaleValue[txt] = grayscaleValue[txt].split(":")[0] + ": on";
                decoder.options.grayScale = true;
            } else {
                grayscaleValue[txt] = grayscaleValue[txt].split(":")[0] + ": off";
                decoder.options.grayScale = false;
            }
        }
    };
   
    var getZomm = setInterval(function() {
        var a;
        try {
            a = decoder.getOptimalZoom();
        } catch (e) {
            a = 0;
        }
        if (!!a && a !== 0) {
            Page.changeZoom(a);
            clearInterval(getZomm);
        }
    }, 500);

    function fadeOut(el, v) {
        el.style.opacity = 1;
        (function fade() {
            if ((el.style.opacity -= 0.1) < v) {
                el.style.display = "none";
                el.classList.add("is-hidden");
            } else {
                requestAnimationFrame(fade);
            }
        })();
    }

    function fadeIn(el, v, display) {
        if (el.classList.contains("is-hidden")) {
            el.classList.remove("is-hidden");
        }
        el.style.opacity = 0;
        el.style.display = display || "block";
        (function fade() {
            var val = parseFloat(el.style.opacity);
            if (!((val += 0.1) > v)) {
                el.style.opacity = val;
                requestAnimationFrame(fade);
            }
        })();
    }
    document.querySelector("#camera-select-"+itime).addEventListener("change", function() {
        if (decoder.isInitialized()) {
            decoder.stop().play();
        }
    });
});	
}).call(window.Page = window.Page || {});
		