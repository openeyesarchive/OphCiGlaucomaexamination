
<?php
$summary = 'SummaryView';
$obj = new $summary($this->event);
$iops_left = $obj->getIOPsLeft();
$iops_right = $obj->getIOPsRight();
//else if (count($events) == 1) {
//    echo "There is only one recorded examination; add more exams to view IOP results.";
//} else {
//    echo "There are no left or right IOPs to view.";
//}
?>
<?php
if (count($iops_left) > 1 || count($iops_right) > 1) {
    ?>

    <script type="text/javascript">
                                                                                                
        // Runs on page load
        function init()
        {
            // Get reference to the drawing canvas
            var canvas = document.getElementById('canvas');
                                                                                
            // Create a drawing linked to the canvas
            eyeGraph = new EG.Graph(canvas);
                                                                                
            // Set x axis details
    <?php
    echo $obj->getEyeGraphDates();
    ?>

            // Set y axis details
            eyeGraph.axisYArray = [[0,'0'], [66,'10'], [132, '20'], [198, '30'],
                [264, '40'], [330, '50'], [396,'60']];

            // Add a series of points
            eyeGraph.addSeries("LineGraph", [<?php echo $obj->getIOPsEyeLeft(); ?>], {colour:'red'});
            eyeGraph.addSeries("LineGraph", [<?php echo $obj->getIOPsEyeRight(); ?>], {colour:'blue'});

            // Draw graph
            eyeGraph.draw();
        }
                                                                    	            
    </script>

    <div class="section" style="height:480px;" align="left">
        <h4>Intraocular Pressures (<font color="red">Left</font>/<font color="blue">Right</font>):</h4>
        <canvas id="canvas" class="eg_graph" width="1080" height="400" tabindex="1"></canvas>
    </div>
    <?php
} else {
    echo "There are no IOPs to view.";
}
?>
<!--Thumbnail scroller:-->
<script>
    /* jQuery.noConflict() for using the plugin along with other libraries. 
   You can remove it if you won't use other libraries (e.g. prototype, scriptaculous etc.) or 
   if you include jQuery before other libraries in yourdocument's head tag. 
   [more info: http://docs.jquery.com/Using_jQuery_with_Other_Libraries] */
    jQuery.noConflict(); 
    /* calling thumbnailScroller function with options as parameters */
    (function($){
        window.onload=function(){ 
            $("#tS1").thumbnailScroller({ 
                scrollerType:"hoverPrecise", 
                scrollerOrientation:"horizontal", 
                scrollSpeed:2, 
                scrollEasingAmount:300, 
                acceleration:2, 
                scrollSpeed:100, 
                noScrollCenterSpace:20, 
                autoScrolling:0, 
                autoScrollingSpeed:1000, 
                autoScrollingDelay:500 
            });
        }
    })(jQuery);
</script>

<?php
// OK, let's display the stereo disc images, if there are any:
$patient = $this->event->episode->patient;
$files = $obj->getDiscFileList($patient);

if (count($files) > 0) {
    ?>
    <?php Yii::app()->clientScript->registerCoreScript('jquery'); ?>
    <?php Yii::app()->clientScript->registerCoreScript('jquery.thumbnailScroller'); ?>
    <script type="text/javascript">
        function showImage(imgName) {
            var curImage = document.getElementById('currentImg');
            var theSource = imgName;
                                				
            curImage.src = theSource;
            curImage.alt = imgName;
            curImage.title = imgName;
        }
    </script>
    <div>
        <hr>
        <?php echo "Stereo images: " . count($files) ?>
        </hr>
    </div>
    <div id="tS1" class="jThumbnailScroller" style="height:66px; width:100px; ">
        <div class="jTscrollerContainer">
            <div class="jTscroller">
                <?php
                foreach ($files as $file) {
                    // large-size image storage location:
                    echo $obj->getDiscFileLinkText($patient->hos_num,
                            $file->original_filename);
                }
                ?>
            </div>
        </div>
    </div>
    <?php
} else {
    ?>
    <div>
        <hr>
        <?php echo "This patient has no stereo disc images." ?>
        </hr>
    </div>
    <?php
}
?>
<div class="cleartall"></div>
<script type="text/javascript">
    init();
</script>
<!--    <body onload="init();">-->