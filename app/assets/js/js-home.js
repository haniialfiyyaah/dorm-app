// JavaScript Document

        jssor_1_slider_init = function() {

            var jssor_1_SlideoTransitions = [
              [{b:500,d:300,c:{x:487},e:{c:{x:16}}},{b:800,d:300,c:{x:-487},e:{c:{x:16}}}],
              [{b:800,d:300,o:-1},{b:1100,d:300,o:1}],
              [{b:-1,d:1,sX:-0.2},{b:300,d:400,sX:0.3,sY:0.4,e:{sX:19,sY:19}}],
              [{b:200,d:300,o:-1}],
              [{b:-1,d:1,o:-1},{b:100,d:300,o:1}],
              [{b:-1,d:1,o:-1,c:{t:-199}},{b:580,d:220,y:28,o:1,c:{t:199},e:{y:16,o:16,c:{t:16}}}],
              [{b:-1,d:1,o:-1,c:{m:-119}},{b:980,d:600,y:28,o:1,c:{m:119},e:{y:16,o:16,c:{m:16}}}],
              [{b:-1,d:1,o:-1,c:{t:-413}},{b:740,d:340,y:31,o:1,c:{t:413},e:{y:16,o:16,c:{t:16}}}],
              [{b:-1,d:1,sX:-1,sY:-1},{b:100,d:480,x:-32,y:38,r:180,sX:1,sY:1,e:{x:16,y:16,r:16,sX:16,sY:16}}],
              [{b:-1,d:1,o:-1},{b:1580,d:260,y:28,o:1,e:{y:16}}],
              [{b:-1,d:1,o:-1},{b:20,d:380,o:1,e:{o:7}}],
              [{b:100,d:400,c:{x:198.0,t:-22.0},e:{c:{x:7,t:7}}}],
              [{b:-1,d:1,c:{y:53.5,m:-53.5}},{b:100,d:500,c:{y:-53.5,m:53.5},e:{c:{y:16,m:16}}}],
              [{b:-1,d:1,o:-1,c:{y:61}},{b:500,d:600,o:1,c:{y:-61},e:{c:{y:16}}}],
              [{b:-1,d:1,o:-1,sY:0.5,c:{x:333}},{b:900,d:700,o:1,c:{x:-333},e:{c:{x:16}}}],
              [{b:-1,d:1,o:-1,c:{m:-43}},{b:500,d:400,o:1,c:{m:43}}],
              [{b:-1,d:1,c:{t:-608}},{b:1000,d:400,c:{t:608},e:{c:{t:7}}}],
              [{b:-1,d:1,o:-1,c:{t:-608}},{b:100,d:400,o:1,c:{t:608},e:{c:{t:7}}},{b:900,d:400,c:{x:608},e:{c:{x:7}}}],
              [{b:-1,d:1,o:-1,c:{x:608}},{b:300,d:400,o:1,c:{x:-608},e:{c:{x:7}}},{b:1800,d:400,c:{x:608},e:{c:{x:7}}}],
              [{b:-1,d:1,o:-1,c:{x:608}},{b:500,d:400,o:1,c:{x:-608},e:{c:{x:7}}},{b:1700,d:400,c:{t:-608},e:{c:{t:7}}}],
              [{b:-1,d:1,o:-1,c:{x:505}},{b:1400,d:500,x:-36,o:1,c:{x:-505},e:{x:7,c:{x:7}}}]
            ];

            var jssor_1_options = {
              $AutoPlay: 0,
              $Idle: 2000,
              $SlideEasing: $Jease$.$InOutSine,
              $DragOrientation: 3,
              $CaptionSliderOptions: {
                $Class: $JssorCaptionSlideo$,
                $Transitions: jssor_1_SlideoTransitions
              },
              $ArrowNavigatorOptions: {
                $Class: $JssorArrowNavigator$
              },
              $BulletNavigatorOptions: {
                $Class: $JssorBulletNavigator$
              }
            };

            var jssor_1_slider = new $JssorSlider$("jssor_1", jssor_1_options);

            //make sure to clear margin of the slider container element
            jssor_1_slider.$Elmt.style.margin = "";

            /*#region responsive code begin*/

            /*
                parameters to scale jssor slider to fill parent container

                MAX_WIDTH
                    prevent slider from scaling too wide
                MAX_HEIGHT
                    prevent slider from scaling too high, default value is original height
                MAX_BLEEDING
                    prevent slider from bleeding outside too much, default value is 1
                    0: contain mode, allow up to 0% to bleed outside, the slider will be all inside parent container
                    1: cover mode, allow up to 100% to bleed outside, the slider will cover full area of parent container
                    0.1: flex mode, allow up to 10% to bleed outside, this is better way to make full window slider, especially for mobile devices
            */

            var MAX_WIDTH = 10000;
            var MAX_HEIGHT = 10000;
            var MAX_BLEEDING = 1;

            function ScaleSlider() {
                var containerElement = jssor_1_slider.$Elmt.parentNode;
                var containerWidth = containerElement.clientWidth;

                if (containerWidth) {
                    var originalWidth = jssor_1_slider.$OriginalWidth();
                    var originalHeight = jssor_1_slider.$OriginalHeight();

                    var containerHeight = containerElement.clientHeight || originalHeight;

                    var expectedWidth = Math.min(MAX_WIDTH || containerWidth, containerWidth);
                    var expectedHeight = Math.min(MAX_HEIGHT || containerHeight, containerHeight);

                    //scale the slider to expected size
                    jssor_1_slider.$ScaleSize(expectedWidth, expectedHeight, MAX_BLEEDING);

                    //position slider at center in vertical orientation
                    jssor_1_slider.$Elmt.style.top = ((containerHeight - expectedHeight) / 2) + "px";

                    //position slider at center in horizontal orientation
                    jssor_1_slider.$Elmt.style.left = ((containerWidth - expectedWidth) / 2) + "px";
                }
                else {
                    window.setTimeout(ScaleSlider, 30);
                }
            }

            function OnOrientationChange() {
                ScaleSlider();
                window.setTimeout(ScaleSlider, 800);
            }

            ScaleSlider();

            $Jssor$.$AddEvent(window, "load", ScaleSlider);
            $Jssor$.$AddEvent(window, "resize", ScaleSlider);
            $Jssor$.$AddEvent(window, "orientationchange", OnOrientationChange);
            /*#endregion responsive code end*/
        };